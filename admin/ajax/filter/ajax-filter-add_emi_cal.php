<?php 
	include_once '../../config/conn.php';
	
	$id = $_POST['emi_cal_update_id'];
	$status = $_POST['emi_cal_status'];
	
	$sql = "UPDATE micro_site SET emi_cal_status = '$status' WHERE id = '$id'";
	
	$query = mysqli_query($conn, $sql) or die('Error :'.mysqli_connect_error($conn));
	if($query){
		echo 'success';
	}else{
		echo 'failed';
	}
?>