<?php 
session_start();
include_once('../connect_db.php');

$ammount=$_GET['ammount'];
$count= $_POST['count'];



	foreach($_SESSION['cart_list'] as $course ){ 


	$product_name .=$course['product_name']."<br><br>";



	$_SESSION['count']=["count"=>$_POST['count'], "ammount"=>$_GET['ammount'], "product_name"=>$product_name];



}



header("Location: ../shopping_cart/order/index.php");

?>
