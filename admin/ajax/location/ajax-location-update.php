<?php 
	include_once '../../config/conn.php';
	include_once '../../include/function.php';

	$length = '';
	if(isset($_POST['length'])){
		$length = $_POST['length'];
	}
	
	$update_id = encryptor('decrypt',$_POST['check_id']);

	$chk_sql = "SELECT * FROM micro_site_location_list WHERE project_id = '$update_id'";
	$chk_query = mysqli_query($conn, $chk_sql);
	if(mysqli_num_rows($chk_query) > 0){
		$update_count = count($_POST['update_id']);

		// print_r($_POST);
		// die;
		$update_sql = '';
		for($u = 0; $u < $update_count; $u++){
			
			$row_update_id = $_POST['update_id'][$u]; 
			
			$update_destination = mysqli_real_escape_string($conn, $_POST['update_destination'][$u]);
			
			$update_sql .= "UPDATE micro_site_location_list SET project_id = '$update_id', destination = '$update_destination' WHERE id = '$row_update_id';";
		}
		
		if($update_sql != ''){
			$update_query = mysqli_multi_query($conn, $update_sql) or die ('Error :'.mysqli_connect_error($conn));
			if($update_query){
				echo "updated";
			}else{
				echo "failed";
			}
		}	
	}else{
		echo "failed";
	}
?>