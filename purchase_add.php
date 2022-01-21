<?php
include ('partials/header.php');
$errors = array();
if(isset($_POST['categoryid'])){$categoryid = $_POST['categoryid'];}else{$categoryid = '';}
if(isset($_POST['productid'])){$productid = $_POST['productid'];}else{$productid = '';}
if(isset($_POST['quantity'])){$quantity = $_POST['quantity'];}else{$quantity = '';}
if(isset($_POST['supplierid'])){$supplierid = $_POST['supplierid'];}else{$supplierid = '';}
if(isset($_POST['descriptions'])){$descriptions = $_POST['descriptions'];}else{$descriptions = '';}
if(isset($_POST['submit'])) {
    if ($categoryid === '') {
        $errors['categoryid'] =  "select category name";
    }
    if ($productid === '') {
        $errors['productid'] = "select Product Name";
    }
    if ($quantity === '') {
        $errors['quantity'] = "Enter the quantity";
    }
    if ($supplierid === '') {
        $errors['supplierid'] = "select Supplier Name";
    }
    if ($descriptions === '') {
        $errors['descriptions'] = "Enter the descriptions";
    }
    if(count($errors) === 0) {
        $query = mysqli_query($conn, "INSERT INTO tblpurchase (categoryid, productid, quantity, supplierid, descriptions) VALUE ('" . $categoryid . "', '" . $productid . "', '" . $quantity . "', '" . $supplierid . "', '" . $descriptions . "')");
        echo jsredirecturl('purchase.php');
        exit;
    }
}
else
{
    echo "Post data is empty!";
}
$category =   mysqli_query($conn, "SELECT * FROM tblcategory");
$supplier = mysqli_query($conn, "SELECT * FROM tblsupplier");
?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Manage Purchase</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="purchase.php">Manage Purchase</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Add Purchase</strong>
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
                        foreach ($errors as $key => $error){?>
                        <li><?php echo $error;?></li>
                        <?php
                        }?>
                    </ul>
                    <?php
                    }
                    ?>
                    <h5>Manage Purchase</h5>
                </div>
                <div class="ibox-content">
                    <form class="m-t" role="form"method="post" action="">
                        <div class="form-group row">
                            <label class="col-sm-2 col-sm-2 col-form-label">Product Category</label>
                            <div class="col-sm-10">
                                <select name="categoryid" id="categoryid" class="form-control">
                                    <option value=value="<?php echo $categoryid; ?>">Select Product Category</option>
                                    <?php
                                    if(mysqli_num_rows($category) > 0)
                                    {
                                        $count =   1;
                                        while($row = mysqli_fetch_assoc($category))
                                        {
                                            ?>
                                            <option value="<?php echo $row['pkcategoryid']; ?>" <?php if($row['pkcategoryid'] === $categoryid){ echo 'selected'; } ?>><?php echo $row['category_name']; ?></option>
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
                            <label class="col-sm-2 col-sm-2 col-form-label">Quantity</label>
                            <div class="col-sm-10">
                                <input type="text" name="quantity" id="quantity" class="form-control"  placeholder="Enter The purchase quantity" value="<?php echo $quantity; ?>"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-sm-2 col-form-label">Supplier</label>
                            <div class="col-sm-10">
                                <select name="supplierid" id="supplierid" class="form-control">
                                    <option value=value="">Select Supplier</option>
                                    <?php
                                    if(mysqli_num_rows($supplier) > 0)
                                    {
                                        $count =   1;
                                        while($row = mysqli_fetch_assoc($supplier))
                                        {
                                            ?>
                                            <option value="<?php echo $row['pksupplierid']; ?>" <?php if($row['pksupplierid'] === $supplierid){ echo 'selected'; } ?>><?php echo $row['supplier_name']; ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                                <input type="text" name="descriptions" id="descriptions" class="form-control" placeholder="Enter The Purchase descriptions" value="<?php echo $descriptions; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 text-right">
                                <a href="purchase.php" class="btn btn-danger btn-lg float-right">Cancel</a>
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