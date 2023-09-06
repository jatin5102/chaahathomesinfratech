<?php 
	include_once '../../config/conn.php';
	// date_default_timezone_set("Asia/Calcutta"); 

	$type = $_POST['type'];
	$property = $_POST['property'];
	// $date = date("Y-m-d h:i:s");

	$sql = "INSERT INTO property (cat_id, name) VALUES ('$type', '$property')";
	$query = mysqli_query($conn, $sql) or die ('Error :'.mysqli_connect_error($conn));
	if($query){
		echo 'success';
	}else{
		echo 'failed';
	}
?>