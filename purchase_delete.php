<?php
include('dbconfig.php');
$id = $_GET['id'];
$query  =   mysqli_query($conn, "DELETE FROM tblpurchase WHERE pkpurchaseid = $id");
header("Location: purchase.php");
die();
?>