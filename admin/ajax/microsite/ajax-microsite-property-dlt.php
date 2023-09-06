<?php
	include_once '../../config/conn.php';
	
	$dlt_id = $_POST['id'];
	
	$sql = "DELETE FROM micro_site WHERE id = '$dlt_id'";
	$query = mysqli_query($conn, $sql);
	if($query){
		echo 'success';
	}else{
		echo 'failed';
	}
?>