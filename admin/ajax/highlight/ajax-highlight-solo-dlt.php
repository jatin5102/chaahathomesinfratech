<?php 
	include_once '../../config/conn.php';
	
	$dlt_id = $_POST['id'];
	
	$sql = "DELETE FROM micro_site_highlights WHERE id = '$dlt_id'";
	$query = mysqli_query($conn, $sql) or die('Error :'.mysqli_connect_error($conn));
	if($query){
		echo "delete";
	}else{
		echo "falied";
	}
?>