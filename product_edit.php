<?php
include('partials/header.php');
$messages	=	'';
if(isset($_REQUEST['id'])) { $id = $_REQUEST['id']; }else{ $id = ''; }
if(isset($_POST['product_name'])){$product_name=$_POST['product_name'];}else{ $product_name= ''; }
if(isset($_POST['product_image'])){$product_image=$_POST['product_image'];}else{$product_image='';}
if(isset($_POST['product_price'])){$product_price=$_POST['product_price'];}else{$product_price='';}
if(isset($_POST['product_description'])){$product_description=$_POST['product_description'];}else{$product_description='';}
if(isset($_POST['old_product_image'])){$product_image=$_POST['old_product_image'];}else{$product_image='';}
if(isset($_POST['submit']))
{
    if($product_name == '')
    {
        $messages='please enter the product name';
    }
    elseif($product_price == '')
    {
        $messages='please enter the product price';
    }
    elseif($product_description == '')
    {
        $messages='please enter the product description';
    }
    else 
	{
		if($product_image == '')
		{
			$product_image	=	$_POST['old_product_image'];
		}
        $query  =   mysqli_query($conn, "UPDATE tblproducts SET product_name='".$product_name."', product_image='".$product_image."' , product_price='".$product_price."' , product_description='".$product_description."'  WHERE pkproductid=".$id);
        echo jsredirecturl('product.php');
        exit;
    }
}
else
{
    if($id != '')
    {
        $query  =   mysqli_query($conn, "SELECT * FROM tblproducts WHERE pkproductid=".$id);
        if(mysqli_num_rows($query) > 0)
        {
            $tblproduct   =   mysqli_fetch_assoc($query);
            $product_name =   $tblproduct['product_name'];
            $product_image =   $tblproduct['product_image'];
            $product_price =   $tblproduct['product_price'];
            $product_description =   $tblproduct['product_description'];
        }
    }
}
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
                    <strong>Edit Product</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>
	<?php echo $messages; ?>
    <form class="m-t" role="form"method="post" action="">
    <div class="form-group">
        <input type="text" name="product_name" id="product_name" class="form-control" placeholder="Product Name" value="<?php echo $product_name; ?>">
    </div>
    <div class="form-group">
        <input type="file" name="product_image" id="product_image" class="form-control" placeholder="Product Image" />
		<input type="hidden" name="old_product_image" id="old_product_image" value="<?php echo $product_image; ?>" />
    </div>
    <div class="form-group">
        <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Product Price" value="<?php echo $product_price; ?>">
    </div>
    <div class="form-group">
        <input type="text" name="product_description" id="product_description" class="form-control" placeholder="Product Description" value="<?php echo $product_description; ?>">
    </div>
    <div>
        <button type="submit" name="submit" class="btn btn-primary block full-width m-b">Edit</button>
    </div>

<?php include('partials/footer.php') ?>