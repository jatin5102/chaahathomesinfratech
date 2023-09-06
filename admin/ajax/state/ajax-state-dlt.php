<?php 
	include_once '../../config/conn.php';
	
	$id = $_POST['dlt_id'];
	
	//hard delete 
	$sql = "DELETE FROM state WHERE id = '$id'";
	$query = mysqli_query($conn, $sql) or die('Error :'.mysqli_connect_error($conn));
	if($query){
		echo "success";
	}else{
		echo "failed";
	}
?>