<?php
	include_once '../../config/conn.php';
	
	 
	$update_id = $_POST['update_id'];
	$price_cr = $_POST['price1'];
	$price_am = $_POST['price2'];
	$price_sq = $_POST['price3'];
	$sold_cr = $_POST['sold1'];
	$sold_am = $_POST['sold2'];
	$sold_sq = $_POST['sold3'];
	$esti_cr = $_POST['estimate1'];
	$esti_am = $_POST['estimate2'];
	$esti_sq = $_POST['estimate3'];
	
	
	
	$slc_sql = "SELECT * FROM micro_site_price_insight WHERE project_id = '$update_id'";
	$slc_query = mysqli_query($conn, $slc_sql) or die ('Error :'.mysqli_connect_error($slc_sql));
	if(mysqli_num_rows($slc_query) > 0){
		$update_sql = "UPDATE micro_site_price_insight SET price_cr = '$price_cr', price_am = '$price_am', price_sq = '$price_sq', sold_cr = '$sold_cr', sold_am = '$sold_am', sold_sq = '$sold_sq', estimate_cr = '$esti_cr', estimate_am = '$esti_am', estimate_sq = '$esti_sq' WHERE project_id = '$update_id'";
		$update_query = mysqli_query($conn, $update_sql) or die('Error :'.mysqli_connect_error($conn));
		if($update_query){
			echo "success";
		}else{
			echo "failed";
		}
	}else{
		$ins_sql = "INSERT INTO micro_site_price_insight (project_id, price_cr, price_am, price_sq, sold_cr, sold_am, sold_sq, estimate_cr, estimate_am, estimate_sq) VALUES ('$update_id', '$price_cr', '$price_am', '$price_sq', '$sold_cr', '$sold_am', '$sold_sq', '$esti_cr', '$esti_am', '$esti_sq')";
		$ins_query = mysqli_query($conn, $ins_sql) or die('Error :'.mysqli_connect_error($conn));
			
		if($ins_query){
			echo "success";
		}else{
			echo "failed";
		}
	}


	
?>