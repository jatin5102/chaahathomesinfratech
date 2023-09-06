<?php 
	include_once '../../config/conn.php';
	date_default_timezone_set("Asia/Calcutta");	
		
		
	$address = $_POST['name'];	
	$city_id = $_POST['city_id'];
	$date = date("Y-m-d h:i:s");
	
	
	$sql = "INSERT INTO locality (city_id, address, created_date) VALUES ('$city_id', '$address', '$date')";
	$query = mysqli_query($conn, $sql) or die('Error :'.mysqli_connect_error($conn));
	if($query){
		echo "success";
	}else{
		echo "failed";
	}
	
?>