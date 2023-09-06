<?php
	include '../../config/conn.php';
	
	$id = $_POST['dlt_id'];
	$type = $_POST['type'];
	
	$sql = '';
	if($type == 'image'){
		$sql = "UPDATE micro_site_location SET image = '' WHERE id = '$id'";
	}else{
		$sql = "UPDATE micro_site_location SET iframe = '' WHERE id = '$id'";
	}
	
	$query = mysqli_query($conn, $sql) or die ('Error :'.mysqli_connect_error($conn));
	if($query){
		echo "success";
	}else{
		echo "failed";
	}
?>