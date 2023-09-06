<?php 
	include_once '../../config/conn.php';
	
		
	$id = $_POST['dlt_id'];
	$name = $_POST['logo_name'];
	
	$path = "../../uploads/developer/$name";
	
	if(unlink($path)){
		$sql = "DELETE FROM developer WHERE id = '$id'";
		$query = mysqli_query($conn, $sql);
		if($query){
			echo "success";
		}else{
			echo "failed";
		}
	}else{
		echo "Something went wrong!";
	}
	
?>