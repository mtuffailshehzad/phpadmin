<?php
require("common_functions.php");
session_start();
session_destroy();
echo jsredirecturl('login.php');
?>