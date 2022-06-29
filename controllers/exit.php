<?php
session_start();
	unset($_SESSION['user']);
	unset($_SESSION['auth_error']);
	unset($_SESSION['reg_error']);
	unset($_SESSION['edit_adress']);
	unset($_SESSION['edit']);

	header("Location:../index.php")
?>