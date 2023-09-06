<?php 
	include_once '../../config/conn.php';
	
	$id = $_POST['hot_projects_id'];
	$val = $_POST['updated_val'];
 
	$sql = "UPDATE micro_site SET hot_project = '$val' WHERE id = '$id'";
	// print_r($sql);
	// die();
	$query = mysqli_query($conn, $sql) or die('Error :'.mysqli_connect_error($conn));
	if($query){
		echo 'success';
	}else{
		echo 'failed';
	}

?>