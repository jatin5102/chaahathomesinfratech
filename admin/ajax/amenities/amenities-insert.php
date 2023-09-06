<?php 
	include_once '../../config/conn.php';
	

	$update_id = $_POST['update_id'];
	$get_amenities = $_POST['val'];
	$imp_amenities_id = implode(',', $get_amenities);
	

	$chk_sql = "SELECT * FROM micro_site_amenities WHERE project_id = '$update_id'";
	$chk_query = mysqli_query($conn, $chk_sql);

	if(mysqli_num_rows($chk_query) > 0){
		$update_sql = "UPDATE micro_site_amenities SET amenities_logo_id = '$imp_amenities_id' WHERE id = '$update_id'";
		$update_query = mysqli_query($conn, $update_sql);
		if($update_query){
			echo "success";
		}else{
			echo "failed";
		}
	}else{
		$sql_ins = "INSERT INTO micro_site_amenities (project_id, amenities_logo_id) VALUES ('$update_id', '$imp_amenities_id')";
		$query_ins = mysqli_query($conn, $sql_ins) or die('Error :'.mysqli_connect_error($conn));
		if($query_ins){
			echo "success";
		}else{
			echo "failed";
		}
	}
?>