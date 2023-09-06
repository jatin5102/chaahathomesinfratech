<?php 
	include_once '../../config/conn.php';
	include_once '../../include/function.php';

	$update_id = encryptor('decrypt',$_POST['update_id']);
	$chk_sql = "SELECT * FROM micro_site_location WHERE project_id = '$update_id'";
	$chk_query = mysqli_query($conn, $chk_sql);
	
	$chk_list_sql = "SELECT * FROM micro_site_location_list WHERE project_id = '$update_id'";
	$chk_list_query = mysqli_query($conn, $chk_sql);
	
	if(mysqli_num_rows($chk_query) > 0 && mysqli_num_rows($chk_list_query) > 0){
		$update_img_name = '';
		if(isset($_FILES['image'])){
			$chk_name = '';
			$img_name = $_FILES['image']['name'];
			$img_tmp_name = $_FILES['image']['tmp_name'];
			$img_upload_location = "../../uploads/microsite/";
			
			$img_rand_no = rand(10, 1000);
			$img_date = date("d-m-Y-h-i-s");
			$imagename = "location-img-$img_rand_no-$img_date.png";                
			
			if($_POST['old_image'] != ''){
				$chk_name = $_POST['old_image'];
			}else{
				$chk_name = $imagename;
			}
			 
			$img_ext = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));
			$valid_img_ext = array("jpg", "jpeg", "png");
			if(in_array($img_ext, $valid_img_ext)){
				$img_path = $img_upload_location.$chk_name;
				if(move_uploaded_file($img_tmp_name, $img_path)){
					$update_img_name = $chk_name;
				}
			}
		}
		
		
		
		$update_iframe_name = '';
		if(isset($_POST['iframe']) && !empty($_POST['iframe'])){
			if($_POST['iframe'] != ''){
				$update_iframe_name = $_POST['iframe'];
			}else{
				$update_iframe_name = $_POST['old_iframe'];
			}
		}
		
		$update_sql = "UPDATE micro_site_location SET image = '$update_img_name', iframe = '$update_iframe_name' ";
		$update_query = mysqli_query($conn, $update_sql);
		if($update_query){
			echo "success";
		}else{
			echo "failed";
		}
	}else{
		$ins_img_name = "";
		if(isset($_FILES['image']) && $_FILES['image'] != ''){
			$img_name = $_FILES['image']['name'];
			$img_tmp_name = $_FILES['image']['tmp_name'];
			$img_upload_location = "../../uploads/microsite/";
			
			$img_rand_no = rand(10, 1000);
			$img_date = date("d-m-Y-h-i-s");
			$imagename = "location-img-$img_rand_no-$img_date.png";                
			
			 
			$img_ext = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));
			$valid_img_ext = array("jpg", "jpeg", "png");
			if(in_array($img_ext, $valid_img_ext)){
				$img_path = $img_upload_location.$imagename;
				if(move_uploaded_file($img_tmp_name, $img_path)){
					$ins_img_name = $imagename;
				}
			}
		}
		
		$iframe = '';
		if(isset($_POST['iframe']) && $_POST['iframe'] != ''){
			$iframe = $_POST['iframe'];
		}
		
		$mutli_sql = "INSERT INTO micro_site_location (project_id, image, iframe) VALUES ('$update_id', '$ins_img_name', '$iframe');";

		if($mutli_sql != ''){
			$ins_query = mysqli_multi_query($conn, $mutli_sql) or die ('Error :'.mysqli_connect_error($conn));
			if($ins_query){
				echo "success";
			}else{
				echo "failed";
			}
		}
	}
	
	
	
	
	
	
	
?>
