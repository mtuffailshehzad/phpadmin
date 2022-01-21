<?php
session_start();
require("common_functions.php");
if($_POST)
{
	$email			=	$_POST['email'];
	$password		=	$_POST['password'];
	///validation??
	$getuserdata	=	mysqli_query($conn,"SELECT * FROM tblusers WHERE email = '".$email."' AND password = '".$password."'");
	if(mysqli_num_rows($getuserdata) > 0)
	{
		$usersdata					=	mysqli_fetch_assoc($getuserdata);
		$usersid					=	$usersdata["id"];
		$email						=	$usersdata["email"];
		$_SESSION["user_id"]		=	$usersid;
		$_SESSION["email"]			=	$email;
		$_SESSION["logged_in"]		=	TRUE;
		if(sizeof($_SESSION) > 0)
		{
			header("Location: index.php");
			echo exit;
		}
		else
		{
			header("Location: login.php?msg=session errors");
			echo exit;
		}
	}
	else
	{
		header("Location: login.php?msg=incorrect email/password");
		echo exit;
	}
}


?>