<?php
require("common_functions.php");
$id =   $_REQUEST['category_id'];
$product = mysqli_query($conn, "SELECT * FROM tblproducts WHERE category_id=".$id);
?>
<option value="">Select Product</option>
<?php
if(mysqli_num_rows($product) > 0)
{
    while($row = mysqli_fetch_assoc($product))
    {
?>
<option value="<?php echo $row['pkproductid']; ?>"><?php echo $row['product_name']; ?></option>
<?php
    }
}
?>