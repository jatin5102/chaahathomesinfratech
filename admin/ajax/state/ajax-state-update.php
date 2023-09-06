<?php 
	include_once '../../config/conn.php';
	date_default_timezone_set("Asia/Calcutta");
	
	$id = $_POST['id'];
	$name = $_POST['name'];
	$update_date = date('Y-m-d h:i:s');
	
	$sql = "UPDATE state SET name = '$name', created_date = '$update_date' WHERE id = '$id'";
	$query = mysqli_query($conn, $sql) or die ('Error :'.mysqli_connect_error($conn));
	if($query){
		echo "success";
	}else{
		echo "failed";
	}
?>