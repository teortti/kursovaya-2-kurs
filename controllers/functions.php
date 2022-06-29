<?php
include_once('../connect_db.php');

function get_course_by_id( $id ){
	global $connect;

	$query = "SELECT * FROM goods WHERE id=" . $id;
	$req = mysqli_query($connect, $query);
	$resp = mysqli_fetch_array($req);

	return $resp;
}

