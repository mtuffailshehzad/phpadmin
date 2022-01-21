<?php
include('dbconfig.php');
$id = $_GET['id'];
$query  =   mysqli_query($conn, "DELETE FROM tblproducts WHERE pkproductid = $id");
header("Location: product.php");
die();
?>