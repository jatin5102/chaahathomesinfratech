<?php 
	include_once '../../config/conn.php';
	date_default_timezone_set("Asia/calcutta");

	$id = $_POST['id'];
	$state_id = $_POST['city_id'];
	$name = $_POST['name'];
	$update_date = date('Y-m-d h:i:s');
	
	$sql = "UPDATE locality SET city_id = '$state_id', address = '$name', created_date = '$update_date' WHERE id = '$id'";
	$query = mysqli_query($conn, $sql) or die ('Error :'.mysqli_connect_error($conn));
	if($query){
		echo "success";
	}else{
		echo "failed";
	}
?>