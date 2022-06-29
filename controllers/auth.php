<?php
session_start();
	include_once '../connect_db.php';

			$login_auth=$_POST['login_auth'];
			$password_auth=$_POST['password_auth'];
			$auth=$_POST['auth'];
			$password_auth=md5($password_auth);
				$str_auth="SELECT * FROM `users` WHERE login='$login_auth' && password='$password_auth'";
	$run_auth=mysqli_query($connect, $str_auth);
	$count_user=mysqli_num_rows($run_auth);
	$found_user=mysqli_fetch_array($run_auth);
		
	if ($count_user>0) {
	$_SESSION['user']=[
		"login"=>$found_user['login'],
		"surname"=>$found_user['surname'],
		"name"=>$found_user['name'],
		"id"=>$found_user['id'],
		"role"=>$found_user['role']
	];

	if ($_SESSION['user']['role']==1) {
		header("Location:../admin/index.php");
	
	}
	elseif ($_SESSION['user']['role']==0)
	{
		header("Location:../personal_account/index.php");
	}
	
	}
	else
	{
		$_SESSION['auth_error']="Не верный логин или пароль";
		header("Location:../#reg_form");
	}



?>