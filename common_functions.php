<?php
date_default_timezone_set("Asia/Karachi");
require("dbconfig.php");

/////////////////// JavaScript Redirect to other page function /////////////////
function jsredirecturl($url)
{
	return "<script> window.location.href = '".$url."';</script>";
}


?>