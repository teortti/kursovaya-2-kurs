<?php 

session_start();
include_once '../../connect_db.php';

$name=$_POST['name'];
$surname=$_POST['surname'];
$login=$_POST['login'];
$password=$_POST['password'];
$r_password=$_POST['r_password'];
$gender=$_POST['gender'];
$edit=$_POST['edit'];

				

				if ($edit) {
					if ($name && $surname && $login && $password && $r_password && $gender) {
						if ($password==$r_password) {
				$password=md5($password);
				$str_upd_user="UPDATE `users` SET `name`='$name',`surname`='$surname',`gender`='$gender',`login`='$login',`password`='$password' WHERE id='".$_SESSION['user']['id']."'";
				$run_upd_user=mysqli_query($connect, $str_upd_user);
				$_SESSION['edit']="Данные успешно обновлены";
				header("Location: ../personal_account_settings/index.php");
					}
					else
					{
						$_SESSION['edit']="Пароли не совпадают";
					}
					
				}
					else
					{
						$_SESSION['edit']="Что-то не заполненно";
					}

			}

				?>