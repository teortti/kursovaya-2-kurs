<?php

session_start();

include_once ('../connect_db.php');

$order=$_POST['order'];
$name=$_POST['name'];
$surname=$_POST['surname'];
$tel_number=$_POST['tel_number'];
$email=$_POST['email'];
$city=$_POST['city'];
$adress=$_POST['adress'];
$count=$_POST['count'];


$add_order="INSERT INTO `orders`(`name_user`, `surname_user`, `tel_number`, `email`, `city_country`, `adress`, `price`, `goods`) VALUES ('$name','$surname','$tel_number','$email','$city','$adress','$count', '".$_SESSION['count']['product_name']."')";

$add_user_info="UPDATE `users` SET `tel_number`='$tel_number',`city_and_country`='$city',`adress`='$adress' WHERE id='".$_SESSION['user']['id']."'";

if ($order) {
	if ($name && $surname && $tel_number && $email && $city && $adress) {
		$run_user_info=mysqli_query($connect, $add_user_info);
		$run_add_order=mysqli_query($connect, $add_order);
		header("Location:../shopping_cart/success_order/index.php");

	}
	else
	{
		
		header("Location:../shopping_cart/order/index.php");
		echo "Что-то не заполнено";
	}
	
}


?>