<?php 
	include_once '../../config/conn.php';

	$length = '';
	if(isset($_POST['length'])){
		$length = $_POST['length'];
	}
	
	$update_id = $_POST['check_id'];
	
	$chk_sql = "SELECT * FROM micro_site_transaction WHERE project_id = '$update_id'";
	$chk_query = mysqli_query($conn, $chk_sql);
	if(mysqli_num_rows($chk_query) > 0){
		$update_count = count($_POST['update_id']);
		// print_r($update_count);
		// die;
		$update_sql = '';
		for($u = 0; $u < $update_count; $u++){
			$row_update_id = $_POST['update_id'][$u]; 
			$update_sold_price = $_POST['update_sold_price'][$u];
			$update_date = $_POST['update_regiestry_date'][$u];
			$update_area = $_POST['update_area'][$u];
			$update_floor = $_POST['update_floor'][$u];
			$update_price = $_POST['update_price'][$u];
			
			$update_sql .= "UPDATE micro_site_transaction SET project_id = '$update_id', sold_price = '$update_sold_price', registry_date = '$update_date', area = '$update_area', floor = '$update_floor', price = '$update_price' WHERE id = '$row_update_id';";
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
		// $ins_sql = '';
		// for($i = 0; $i <= $length; $i++){
			// $trns_sold_price = $_POST['sold_price'][$i];
			// $trns_date = $_POST['trns_date'][$i];
			// $trns_area = $_POST['trns_area'][$i];
			// $trns_floor = $_POST['trns_floor'][$i];
			// $trns_price = $_POST['trns_price'][$i];
			
			// $ins_sql .= "INSERT INTO micro_site_transaction (project_id, sold_price, registry_date, area, floor, price) VALUES ('$update_id', '$trns_sold_price', '$trns_date', '$trns_area', '$trns_floor', '$trns_price');";
		// }
		// if($ins_sql != ''){
			// $ins_query = mysqli_multi_query($conn, $ins_sql) or die ('Error :'.mysqli_connect_error($conn));
			// if($ins_query){
				// echo "success";
			// }else{
				// echo "failed";
			// }
		// }
		echo "please check";
	}
?>