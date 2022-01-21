<?php

    include('dbconfig.php');
    $message    =   '';
    if(isset($_POST['first_name'])){ $first_name = $_POST['first_name']; }else{ $first_name = ''; }
    if(isset($_POST['last_name'])){ $last_name = $_POST['last_name'] ;}else{ $last_name = '' ;}
    if(isset($_POST['email'])){ $email = $_POST['email'];}else{ $email = '' ;}
    if(isset($_POST['password'])){ $password = $_POST['password'] ;}else{ $password = '' ;}
    if(isset($_POST['confirm_password'])){ $confirm_password = $_POST['confirm_password'] ;}else{ $confirm_password = '' ;}
    if(isset($_POST['submit']))
    {
        if($first_name == '' )
        {
            $message    =   'Please enter first name. <br />';
            header("Location: register.php?msg=".$message);
        }
        elseif($last_name == '' )
        {
            $message    =   'Please enter last name. <br />';
            header("Location: register.php?msg=".$message);
        }
        elseif($email == '')
        {
            $message    =   'Please enter email. <br />';
            header("Location: register.php?msg=".$message);
        }
        elseif($password == '')
        {
            $message    =   'Please enter password. <br />';
            header("Location: register.php?msg=".$message);
        }
        elseif($confirm_password == '')
        {
            $message    =   'Please enter password. <br />';
            header("Location: register.php?msg=".$message);
        }
        elseif($password !== $confirm_password)
        {
            $message    =   'password doesnot match. <br />';
            header("Location: register.php?msg=".$message);
        }
        else
        {
            $query  =   mysqli_query($conn, "INSERT INTO  tblusers(first_name, last_name, email, password ) VALUE('".$first_name."', '".$last_name."', '".$email."', '".$password."')");
            header("Location: login.php");
            die();
        }       
    }
    else
    {
        echo "Post data is empty!";
    }