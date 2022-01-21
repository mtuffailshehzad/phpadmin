<?php
include('dbconfig.php');
$id = $_GET['id'];
$query  =   mysqli_query($conn, "DELETE FROM tblcategory WHERE pkcategoryid = $id");
header("Location: categories.php");
die();
?>