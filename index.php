<?php 
session_start();

error_reporting(0);
if ($_SESSION['user']) {
	include ('header2.php');
}

else
{
include ('header.php');	
}


include ('content.php');
include ('footer.php');
include_once ('connect_db.php');
include ('reg_auth_forms.php')
?>

