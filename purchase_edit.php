<?php
include('partials/header.php');
if(isset($_REQUEST['id'])) { $id = $_REQUEST['id']; }else{ $id = ''; }
$messages	=	'';
if(isset($_POST['categoryid'])){$categoryid = $_POST['categoryid'];}else{$categoryid = '';}
if(isset($_POST['productid'])){$productid = $_POST['productid'];}else{$productid = '';}
if(isset($_POST['quantity'])){$quantity = $_POST['quantity'];}else{$quantity = '';}
if(isset($_POST['supplierid'])){$supplierid = $_POST['supplierid'];}else{$supplierid = '';}
if(isset($_POST['descriptions'])){$descriptions = $_POST['descriptions'];}else{$descriptions = '';}
if(isset($_POST['submit']) && $id != '')
{

    $query = mysqli_query($conn, "UPDATE tblpurchase SET (categoryid = '" . $categoryid . "', productid = '" . $productid . "', quantity = '" . $quantity . "', supplierid = '" . $supplierid . "', descriptions = '" . $descriptions . "' WHERE pkpurchaseid=".$id);
    echo jsredirecturl('purchase.php');
    exit;
}
else
{
    if ($id != '')
    {
        $purchasequery = mysqli_query($conn,"SELECT * FROM tblpurchase" );
        if(mysqli_num_rows($purchasequery) >0){
            $tblpurchase = mysqli_fetch_assoc($purchasequery);
            $categoryid = $tblpurchase['categoryid'];
            $productid = $tblpurchase['productid'];
            $supplierid = $tblpurchase['supplierid'];
            $quantity= $tblpurchase['quantity'];
            $descriptions = $tblpurchase['descriptions'];
        }
    }
    else
    {
        $messages = 'PLease provide id to update data.';
    }
}
$category =   mysqli_query($conn, "SELECT * FROM tblcategory");
$product = mysqli_query($conn, "SELECT * FROM tblproducts WHERE category_id=".$categoryid);
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
                    <h5>Manage Purchase</h5>
                </div>
                <div class="ibox-content">
                    <form class="m-t" role="form"method="post" action="purchase_add.php">
                        <div class="form-group row">
                            <label class="col-sm-2 col-sm-2 col-form-label">Product Category</label>
                            <div class="col-sm-10">
                                <select name="categoryid" id="categoryid" class="form-control">
                                    <option value="">Select Product Category</option>
                                    <?php
                                    if(mysqli_num_rows($category) > 0)
                                    {
                                        while($row = mysqli_fetch_assoc($category))
                                        {
                                            ?>
                                            <option value="<?php echo $row['pkcategoryid']; ?>" <?php if($row['pkcategoryid'] == $categoryid){ echo 'selected'; } ?>><?php echo $row['category_name']; ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-sm-2 col-form-label">Product Name</label>
                            <div class="col-sm-10">
                                <select name="productid" id="productid" class="form-control">
                                    <option value="">Select Product Name</option>
                                    <?php
                                    if(mysqli_num_rows($product) > 0)
                                    {
                                        while($row = mysqli_fetch_assoc($product))
                                        {
                                            ?>
                                            <option value="<?php echo $row['pkproductid']; ?>"<?php if($row['pkproductid'] == $productid){ echo 'selected'; } ?>><?php echo $row['product_name']; ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-sm-2 col-form-label">Quantity</label>
                            <div class="col-sm-10">
                                <input type="text" name="quantity" id="quantity" class="form-control" placeholder="Enter The purchase quantity" value="<?php echo $quantity  ?>"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-sm-2 col-form-label">Supplier Name</label>
                            <div class="col-sm-10">
                                <select name="supplierid" id="supplierid" class="form-control">
                                    <option value="">Select Supplier Name</option>
                                    <?php
                                    if(mysqli_num_rows($supplier) > 0)
                                    {
                                        while($row = mysqli_fetch_assoc($supplier))
                                        {
                                            ?>
                                            <option value="<?php echo $row['pksupplierid']; ?>"<?php  if($row['pksupplierid']== $supplierid){ echo "selected";}?>><?php echo $row['supplier_name']; ?></option>
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
                                <input type="text" name="descriptions" id="descriptions" class="form-control" placeholder="Enter The Purchase descriptions" value="value="<?php echo $descriptions?>">
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
