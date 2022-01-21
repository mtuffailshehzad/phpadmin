<?php
include('partials/header.php');
$message    =   array();
if(isset($_POST['product_name'])){ $product_name = $_POST['product_name']; }else{ $product_name = ''; }
if(isset($_POST['is_physical'])){ $is_physical = $_POST['is_physical']; }else{ $is_physical = ''; }
if(isset($_POST['category_id'])){ $category_id = $_POST['category_id']; }else{ $category_id = ''; }
if(isset($_POST['product_image'])){ $product_image = $_POST['product_image']; }else{ $product_image = ''; }
if(isset($_POST['product_price'])){ $product_price = $_POST['product_price']; }else{ $product_price = ''; }
if(isset($_POST['product_description'])){ $product_description = $_POST['product_description']; }else{ $product_description = ''; }
if(isset($_POST['submit']))
{
    if ($product_name == '')
    {
        $message['product_name'] = "Enter the Product name";
    }
    if ($is_physical == '')
    {
        $message['is_physical'] = "Is Product Physical";
    }
    if ($category_id == '')
    {
        $message['category_id'] = "Select The Category Id";
    }
    if ($product_price == '')
    {
        $message['product_price'] = "Enter the Product Price";
    }
    if ($product_description== '')
    {
        $message['product_description'] = "Enter the product description ";
    }
    if ($is_physical == '1' && $product_image == '')
    {
        $message['product_image'] = "Upload the image";
    }
    if (count($message)==0) {
        $query = mysqli_query($conn, "INSERT INTO  tblproducts(product_name, is_physical, product_image, product_price, product_description) VALUE('" . $product_name . "', '" . $is_physical . "', '" . $product_image . "', '" . $product_price . "', '" . $product_description . "')");
        echo jsredirecturl('product.php');
        exit;
    }
}
else
{
    echo "Post data is empty!";
}
$category =   mysqli_query($conn, "SELECT * FROM tblcategory")
?>
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Manage Product</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.php">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="product.php">Manage Product</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Add Product</strong>
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
                        <h5>Manage Product</h5>
                    </div>
                    <div class="ibox-content">
                        <?php
                        if (count($message)>0) {
                        ?>
                        <ul class="alert alert-danger" role="alert">
                            <?php
                            foreach ($message as $key => $error){
                                ?>
                            <li><?php echo $error; ?></li><?php
                            }
                            ?>
                        </ul>
                        <?php
                            }
                            ?>
                        <form class="m-t" role="form"method="post" action="product_add.php">
                            <div class="form-group row">
                                <label class="col-sm-2 col-sm-2 col-form-label">Product Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="product_name" id="product_name" class="form-control" placeholder="Enter The Product Name" value="<?php echo $product_name;?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-sm-2 col-form-label" for="is_physical">Is Physical</label>
                                <div class="col-sm-10">
                                    <select name="is_physical" id="is_physical" class="form-control" >
                                        <option value="">Is product physical</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row" id="image_main" style="display: none;">
                                <label class="col-sm-2 col-sm-2 col-form-label">Product Image</label>
                                <div class="col-sm-10">
                                    <input type="file" name="product_image" id="product_image" class="form-control" placeholder="Upload The Product Image" value="<?php echo $product_image;?>" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-sm-2 col-form-label">Product Category</label>
                                <div class="col-sm-10">
                                    <select name="category_id" id="category_id" class="form-control" >
                                        <option value="">Select Product Category</option>
                                        <?php
                                        if(mysqli_num_rows($category) > 0)
                                        {
                                            $count =   1;
                                            while($row = mysqli_fetch_assoc($category))
                                            {
                                                ?>
                                                <option value="<?php echo $row['pkcategoryid']; ?>" <?php if($row['pkcategoryid'] === $category_id){ echo 'selected'; } ?>><?php echo $row['category_name']; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-sm-2 col-form-label">Product price</label>
                                <div class="col-sm-10">
                                    <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter The Product price" value="<?php echo $product_price;?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-sm-2 col-form-label">Product Description</label>
                                <div class="col-sm-10">
                                    <input type="text" name="product_description" id="product_description" class="form-control" placeholder="Enter The Product description" value="<?php echo $product_description;?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12 text-right">
                                    <a href="product.php" class="btn btn-danger btn-lg float-right">Cancel</a>
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
    $('#is_physical').change(function() {
        var val = $(this).val();
        if (val == '1')
        {
            $("#image_main").show();
        }
        else
        {
            $("#image_main").hide();
        }
    })
</script>
