<?php 
	include_once '../../config/conn.php';
	// date_default_timezone_set("Asia/Calcutta"); 

	$id = $_GET['id'];

	// echo $id;
	
	$sql = "SELECT * FROM property WHERE id='$id'";
	$result = mysqli_query($conn, $sql);
	if(!$result){
		die('Query failed '.mysqli_error($conn));
	}
	if(mysqli_num_rows($result)){
		while($row = mysqli_fetch_assoc($result)){
			echo json_encode($row);
		}
	}
?>