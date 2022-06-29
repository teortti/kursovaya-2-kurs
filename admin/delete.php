<?php 
include_once ('../connect_db.php');
$delete_id=$_GET['delete_id'];

$str_delete_user="DELETE FROM `users` WHERE id='$delete_id'";
$run_delete_user=mysqli_query($connect, $str_delete_user);

header("Location: ../admin/index.php");

?>