<?php 

session_start();
include_once '../../connect_db.php';

$tel_number=$_POST['tel_number'];
$city_and_country=$_POST['city_and_country'];
$adress=$_POST['adress'];
$edit_adress=$_POST['edit_adress'];

				

				if ($edit_adress) {
					if ($tel_number && $city_and_country && $adress) {
				$password=md5($password);
				$str_upd_adress="UPDATE `users` SET `tel_number`='$tel_number',`city_and_country`='$city_and_country',`adress`='$adress' WHERE id='".$_SESSION['user']['id']."'";
				$run_upd_adress=mysqli_query($connect, $str_upd_adress);
				$_SESSION['edit_adress']="Данные успешно обновлены";
				header("Location: ../personal_account_settings/index.php");
					}
					
					else
					{
						$_SESSION['edit_adress']="Что-то не заполненно";
					}

			}

				?>