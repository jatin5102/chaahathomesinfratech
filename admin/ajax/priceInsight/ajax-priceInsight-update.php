<?php 
	include_once '../../config/conn.php';

	$length = '';
	if(isset($_POST['length'])){
		$length = $_POST['length'];
	}
	
	$update_id = $_POST['check_id'];
	
	$chk_sql = "SELECT * FROM micro_site_price_list WHERE project_id = '$update_id'";
	$chk_query = mysqli_query($conn, $chk_sql);
	if(mysqli_num_rows($chk_query) > 0){
		$update_count = count($_POST['update_id']);
		// print_r($_POST);
		// die;
		$update_sql = '';
		for($u = 0; $u < $update_count; $u++){
			
			$row_update_id = $_POST['update_id'][$u]; 
			$update_years = $_POST['update_years'][$u];
			$update_quartly = $_POST['update_quarlty'][$u];
			$update_price_sq = $_POST['update_price_sq'][$u];
			
			$update_sql .= "UPDATE micro_site_price_list SET project_id = '$update_id', years = '$update_years', quartly = '$update_quartly', price_per_sq = '$update_price_sq' WHERE id = '$row_update_id';";
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