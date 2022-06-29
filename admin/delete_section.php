<?php 
include_once ('../connect_db.php');
$delete_id=$_GET['delete_id'];

$str_delete_sections="DELETE FROM `sections` WHERE id='$delete_id'";
$run_delete_sections=mysqli_query($connect, $str_delete_sections);

header("Location: ../admin/index.php");

?>