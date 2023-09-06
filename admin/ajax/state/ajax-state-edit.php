<?php 
	include_once '../../config/conn.php';
	
	$id = $_POST['id'];
	$sql = "SELECT * FROM state WHERE id = '$id'";
	$query = mysqli_query($conn, $sql) or die('Error :'.mysqli_connect_error($conn));
	if(mysqli_num_rows($query) > 0){
		$row = mysqli_fetch_array($query);
		echo json_encode($row);
	}else{
		echo "failed";
	}
?>