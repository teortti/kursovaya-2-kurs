<?php 

session_start();

include_once '../connect_db.php';

$id_order=$_GET['id_order'];
$str_delete_order="DELETE FROM `orders` WHERE id='$id_order'";
$run_delete_order=mysqli_query($connect, $str_delete_order);

unset($_SESSION['count']);

header("Location: orders.php");

?>