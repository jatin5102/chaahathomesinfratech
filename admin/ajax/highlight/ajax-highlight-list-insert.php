<?php 
	include_once '../../config/conn.php';
	include_once '../../include/function.php';



	
	$update_id=encryptor('decrypt',$_POST['update_id']);
	$length = $_POST['length'];
	// $chk_list_sql = "SELECT * FROM micro_site_location_list WHERE project_id = '$update_id'";
	// $chk_list_query = mysqli_query($conn, $chk_sql);
	
	// if(mysqli_num_rows($chk_list_query) > 0){
		// echo "updataquery";
	// }else{
		

		//location destination list
		$mutli_sql = '';
		for($i = 0; $i < $length; $i++){
			// $meter = $_POST['meter'][$i];
			$destination = mysqli_real_escape_string($conn, $_POST['destination'][$i]);

			$mutli_sql .= "INSERT INTO micro_site_highlights (project_id, destination) VALUES ('$update_id', '$destination');";
		}

		if($mutli_sql != ''){
			$ins_query = mysqli_multi_query($conn, $mutli_sql) or die ('Error :'.mysqli_connect_error($conn));
			if($ins_query){
				echo "success";
			}else{
				echo "failed";
			}
		}
	// }
	
	
	
	
	
	
	
?>
