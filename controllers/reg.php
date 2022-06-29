<?php
session_start();
	include_once '../connect_db.php';


$name=$_POST['name'];
$surname=$_POST['surname'];
$login=$_POST['login'];
$password=$_POST['password'];
$r_password=$_POST['r_password'];
$reg=$_POST['reg'];


if ($reg) {
	if ($name && $surname && $login) {
		$str_check_user="SELECT * FROM `users` WHERE login='$login'";
		$run_check_user=mysqli_query($connect, $str_check_user);
		$count_user=mysqli_num_rows($run_check_user);
	if ($count_user==0) {
			if ($password==$r_password) {
				$password=md5($password);
				
				$str_add_user="INSERT INTO `users`(`name`, `surname`, `login`, `password`) VALUES ('$name','$surname','$login','$password')";

				$run_add_user=mysqli_query($connect, $str_add_user);
				if ($run_add_user) {
					$str_select_user="SELECT * FROM `users` WHERE login='$login'";
					$run_select_user=mysqli_query($connect, $str_select_user);
					$out_user=mysqli_fetch_array($run_select_user);
					
					$_SESSION['user']=[
		"login"=>$out_user['login'],
		"surname"=>$out_user['surname'],
		"name"=>$out_user['name'],
		"id"=>$out_user['id'],
		"role"=>$out_user['role']
	];
	header("Location:../personal_account/index.php");
				}

				else 
				{
					$_SESSION['reg_error']="Ошибка при регистрации";
					header("Location:../index.php#registration");
				}
		}
		else
		{
			$_SESSION['reg_error']="Пароли не совпадают!";
			header("Location:../index.php#registration");
		}

		}
		else
		{
			$_SESSION['reg_error']="Такой пользователь существует!";
			header("Location:../index.php#registration");
		}
						   
	}

	else
	{
		$_SESSION['reg_error']="Заполните все поля!";
		header("Location:../index.php#registration");
	}
}

?>