<?php 
include_once ('../connect_db.php');
$delete_id=$_GET['delete_id'];

$str_delete_prod="DELETE FROM `goods` WHERE id='$delete_id'";
$run_delete_prod=mysqli_query($connect, $str_delete_prod);

header("Location: goods.php");

?>