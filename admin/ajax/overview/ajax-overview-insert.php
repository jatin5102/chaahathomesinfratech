<?php 
	include_once '../../config/conn.php';
	include_once '../../include/function.php';
	$update_Id = encryptor('decrypt',$_POST['eid']);
	$project_desc = mysqli_real_escape_string($conn, $_POST['project_desc']);
	

	$chck_sql = mysqli_query($conn,"SELECT * FROM micro_site_overview WHERE project_id = '$update_Id'");

	
	if(mysqli_num_rows($chck_sql) > 0){

		$update_sql = mysqli_query($conn,"UPDATE micro_site_overview SET description = '$project_desc' WHERE project_id = '$update_Id'");

		if($update_sql==1){
			echo json_encode(['status'=>1,'message'=>"Updated Successfully"]);
		}else{
			echo json_encode(['status'=>0,'message'=>"Something went wrong"]);

		}
	}else{
		$sql = mysqli_query($conn,"INSERT INTO micro_site_overview (project_id, description) VALUES ('$update_Id', '$project_desc')");
	
		if($sql==1){
			echo json_encode(['status'=>1,'message'=>"Updated Successfully"]);
		}else{
			echo json_encode(['status'=>0,'message'=>"Something went wrong"]);

		}
	}
?>