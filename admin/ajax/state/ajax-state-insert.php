<?php 
	include_once '../../config/conn.php';
	date_default_timezone_set("Asia/Calcutta"); 
	
	$name = $_POST['name'];
	$date = date("Y-m-d h:i:s");

	$sql = "INSERT INTO state (name, created_date) VALUES ('$name', '$date')";
	$query = mysqli_query($conn, $sql) or die ('Error :'.mysqli_connect_error($conn));
	if($query){
		echo 'success';
	}else{
		echo 'failed';
	}
?>