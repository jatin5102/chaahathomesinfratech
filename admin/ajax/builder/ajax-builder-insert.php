<?php 
	include_once '../../config/conn.php';

	$update_id = $_POST['update_id'];
	$releated = $_POST['releated'];
	$near_sale = $_POST['near_sale'];

 
	$new_releated = implode(',', $releated);
	$new_near_sale = implode(',', $near_sale);

	$sql = "UPDATE micro_site SET releated_id = '$new_releated', near_sale_id = '$new_near_sale' WHERE id = '$update_id'";
	$query = mysqli_query ($conn, $sql) or die('Error :'.mysqli_connect_error($conn));
	if($query){
		echo 'success';
	}else{
		echo 'failed';
	}


	// $chk_sql = "SELECT * FROM micro_site_builder WHERE id = '$update_id'";
	// $chk_query = mysqli_query($conn, $chk_sql);
	// if(mysqli_num_rows($chk_query) > 0){
		// $upate_sql = "UPDATE micro_site_builder SET description = '$about', total_project = '$total_project', com_project = '$complete_project', con_project = '$construction' WHERE id = '$update_id'";
		// $update_query = mysqli_query($conn, $upate_sql);
		// if($update_query){
			// echo "success";
		// }else{
			// echo "failed";
		// }
	// }else{
		// $ins_sql = "INSERT INTO micro_site_builder (project_id, description, total_project, com_project, con_project) VALUES ('$update_id', '$about', '$total_project', '$complete_project', '$construction')";
		// $ins_query = mysqli_query($conn, $ins_sql) or die ('Error :'.mysqli_connect_error($conn));
		// if($ins_query){
			// echo 'success';
		// }else{
			// echo 'failed';
		// }
	// }

	
?>