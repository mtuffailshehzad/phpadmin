<?php
include('dbconfig.php');
$id = $_GET['id'];
$query  =   mysqli_query($conn, "DELETE FROM tblexpensetype WHERE pkexpensetypeid = $id");
header("Location: expense_type.php");
die();
?>