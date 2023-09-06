<?php
	include_once '../../config/conn.php';
	
	$length = $_POST['length'];
	$update_id = $_POST['update_id'];
	
	
	// $slc_sql = "SELECT * FROM micro_site_price_list WHERE project_id = '$update_id'";
	// $slc_query = mysqli_query($conn, $slc_sql) or die ('Error :'.mysqli_connect_error($slc_sql));
	// if(mysqli_num_rows($slc_query) > 0){
		// echo "update query";
	// }else{
		$ins_sql = '';
		for($i = 0; $i < $length; $i++){
			$year = $_POST['year'][$i];
			$quartly = $_POST['quartly'][$i];
			$price_sq = $_POST['price_sq'][$i];
			
			$ins_sql .= "INSERT INTO micro_site_price_list (project_id, years, quartly, price_per_sq) VALUES ('$update_id', '$year', '$quartly', '$price_sq');";
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
	// }


	
?>