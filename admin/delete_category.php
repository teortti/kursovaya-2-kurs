<?php 
include_once ('../connect_db.php');
$delete_id=$_GET['delete_id'];

$str_delete_category="DELETE FROM `category` WHERE id='$delete_id'";
$run_delete_category=mysqli_query($connect, $str_delete_category);

header("Location: ../admin/index.php");

?>