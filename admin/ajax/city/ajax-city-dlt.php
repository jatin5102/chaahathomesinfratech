<?php 
	include_once '../../config/conn.php';
	
	$id = $_POST['dlt_id'];
	
	$sql = "DELETE FROM city WHERE id = '$id'";
	$query = mysqli_query($conn, $sql);
	if($query){
		echo "success";
	}else{
		echo "failed";
	}
?>