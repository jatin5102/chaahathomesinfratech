<?php 
	include_once '../../config/conn.php';

	$length = '';
	if(isset($_POST['length'])){
		$length = $_POST['length'];
	}
	
	$update_id = $_POST['check_id'];

	$ins_sql = '';
	for($i = 0; $i <= $length; $i++){
		$trns_sold_price = $_POST['sold_price'][$i];
		$trns_date = $_POST['trns_date'][$i];
		$trns_area = $_POST['trns_area'][$i];
		$trns_floor = $_POST['trns_floor'][$i];
		$trns_price = $_POST['trns_price'][$i];
		
		$ins_sql .= "INSERT INTO micro_site_transaction (project_id, sold_price, registry_date, area, floor, price) VALUES ('$update_id', '$trns_sold_price', '$trns_date', '$trns_area', '$trns_floor', '$trns_price');";
		// $ins_query = mysqli_query($conn, $ins_sql) or die ('Error :'.mysqli_connect_error($conn));
	}
	if($ins_sql != ''){
		$ins_query = mysqli_multi_query($conn, $ins_sql) or die ('Error :'.mysqli_connect_error($conn));
		if($ins_query){
			echo "success";
		}else{
			echo "failed";
		}
	}

?>