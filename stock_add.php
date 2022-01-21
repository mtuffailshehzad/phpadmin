<?php
include ('partials/header.php');
$errors = array();
if(isset($_POST['categoryid'])){ $categoryid = $_POST['categoryid'];}else{ $categoryid = '';}
if(isset($_POST['productid'])){ $productid = $_POST['productid'];}else{ $productid = '';}
if(isset($_POST['stock_total'])){ $stock_total = $_POST['stock_total'];}else{ $stock_total = '';}
if(isset($_POST['submit'])) {
    if ($categoryid === '') {
        $errors['categoryid'] =  "select category name";
    }if ($productid === '') {
        $errors['productid'] = "select Product Name";
    }if ($stock_total === '') {
        $errors['stock_total'] = "Enter the Total Stock";
    }
    if (count($errors) === 0) {
        $query = mysqli_query($conn, "INSERT INTO tblstock (fkcategoryid, fkproductid, stock_total) VALUE ('" . $categoryid . "', '" . $productid . "', '" . $stock_total . "')");
        echo jsredirecturl('stock.php');
        exit;
    }
}
$category =   mysqli_query($conn, "SELECT * FROM tblcategory");
?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Manage Stock</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="stock.php">Manage Stock</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Add Stock</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-md-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <?php
                    if (count($errors)>0){
                        ?>
                    <ul class="alert alert-danger" role="alert">
                        <?php
                        foreach ($errors as $key => $error){
                            ?>
                        <li><?php echo $error; ?> </li>
                        <?php
                        }?>
                    </ul><?php
                    }
                    ?>
                    <h5>Manage Stock</h5>
                </div>
                <div class="ibox-content">
                    <form class="m-t" role="form"method="post" action="stock_add.php">
                        <div class="form-group row">
                            <label class="col-sm-2 col-sm-2 col-form-label">Product Category</label>
                            <div class="col-sm-10">
                                <select name="categoryid" id="categoryid" class="form-control">
                                    <option value="">Select Product Category</option>
                                    <?php
                                    if(mysqli_num_rows($category) > 0)
                                    {
                                        $count =   1;
                                        while($row = mysqli_fetch_assoc($category))
                                        {
                                            ?>
                                            <option value="<?php echo $row['pkcategoryid']; ?>" <?php if($row['pkcategoryid'] === $categoryid){ echo 'selected'; } ?>><?php echo $row['categoryname']; ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-sm-2 col-form-label">Product</label>
                            <div class="col-sm-10">
                                <select name="productid" id="productid" class="form-control">
                                    <option value="">Select Product</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-sm-2 col-form-label">Total Stock</label>
                            <div class="col-sm-10">
                                <input type="text" name="stock_total" id="stock_total" class="form-control" placeholder="Enter The total stock" value="<?php echo $stock_total;?>"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 text-right">
                                <a href="stock.php" class="btn btn-danger btn-lg float-right">Cancel</a>
                                <button class="btn btn-success btn-lg float-right" type="submit" name="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('partials/footer.php') ?>
<script>
    $(document).ready(function(){
        $('#categoryid').on('change', function(){
            var category_id = $(this).val();
            if(category_id != '')
            {
                $.ajax({
                    type:'POST',
                    url:'get_products.php',
                    data:'category_id='+category_id,
                    success:function(response){
                        $('#productid').html(response);
                    }
                });
            }
            else
            {
                $('#categoryid').html('<option value="">Select Category</option>');
            }
        });
    });
</script>
