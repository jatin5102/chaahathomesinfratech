<?php 
	include_once '../../config/conn.php';

	$update_id = $_POST['project_id'];
	 
	$total_project = $_POST['T_project'];
	$complete_project = $_POST['com_project'];
	$construction = $_POST['con_project'];

	$chk_sql = "SELECT * FROM micro_site_builder WHERE id = '$update_id'";
	$chk_query = mysqli_query($conn, $chk_sql);
	if(mysqli_num_rows($chk_query) > 0){
		$upate_sql = "UPDATE micro_site_builder SET total_project = '$total_project', com_project = '$complete_project', con_project = '$construction' WHERE id = '$update_id'";
		 
		$update_query = mysqli_query($conn, $upate_sql);
		if($update_query){
			echo "success";
		}else{
			echo "failed";
		}
	}else{
		$ins_sql = "INSERT INTO micro_site_builder (project_id, total_project, com_project, con_project) VALUES ('$update_id', '$total_project', '$complete_project', '$construction')";
		$ins_query = mysqli_query($conn, $ins_sql) or die ('Error :'.mysqli_connect_error($conn));
		if($ins_query){
			echo 'success';
		}else{
			echo 'failed';
		}
	}

	
?>