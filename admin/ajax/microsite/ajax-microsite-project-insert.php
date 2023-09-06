<?php 
	include_once '../../config/conn.php';

	include_once '../../include/function.php';


	$validator=array();
	$error=0;
	if(empty($_POST['project_developer'])){
		$validator['project_developer']="This fields is required";
		$error=1;
	}

	if(empty($_POST['project_name'])){
		$validator['project_name']="This fields is required";
		$error=1;
	}


	if(empty($_POST['project_category'])){
		$validator['project_category']="This fields is required";
		$error=1;
	}


	if(empty($_POST['project_property_type'])){
		$validator['project_property_type']="This fields is required";
		$error=1;
	}


	if(empty($_POST['project_status'])){
		$validator['project_status']="This fields is required";
		$error=1;
	}


	
	if(empty($_POST['project_address'])){
		$validator['project_address']="This fields is required";
		$error=1;
	}
	if(empty($_POST['project_state'])){
		$validator['project_state']="This fields is required";
		$error=1;
	}
	if(empty($_POST['project_city'])){
		$validator['project_city']="This fields is required";
		$error=1;
	}
	if(empty($_POST['project_location'])){
		$validator['project_location']="This fields is required";
		$error=1;
	}
	if(empty($_POST['project_price'])){
		$validator['project_price']="This fields is required";
		$error=1;
	}

	if(empty($_POST['project_rera_no'])){
		$validator['project_rera_no']="This fields is required";
		$error=1;
	}

	
	if(empty($_POST['page_url'])){
		$validator['page_url']="This fields is required";
		$error=1;
	}
	

	if(empty($_POST['project_ivr_no'])){
		$validator['project_ivr_no']="This fields is required";
		$error=1;
	}

	if(empty($_POST['project_whatapp_no'])){
		$validator['project_whatapp_no']="This fields is required";
		$error=1;
	}
	if($error==0){




	$dev_id = $_POST['project_developer'];
	$name = $_POST['project_name'];
	
	$page_url = $_POST['page_url'].getName(2).time();
	
	$meta_title = mysqli_real_escape_string($conn, $_POST['project_meta']);
	$meta_keyword = mysqli_real_escape_string($conn, $_POST['project_keyword']);
	$meta_desc = mysqli_real_escape_string($conn, $_POST['project_description']);
	


	$address = mysqli_real_escape_string($conn, $_POST['project_address']);
	$cat_id = $_POST['project_category'];
	$type = $_POST['project_property_type'];
	$status = $_POST['project_status'];
	$state = $_POST['project_state'];
	$city = $_POST['project_city'];
	$location = $_POST['project_location'];
	$price = $_POST['project_price'];
	// $area = $_POST['P_area'];
	$rera = $_POST['project_rera_no'];
	
	$ivr_call = $_POST['project_ivr_no'];
	$wp_no = $_POST['project_whatapp_no'];
	

	
	
		$project_image_brochure = '';
		if(isset($_FILES['project_brochure']) && !empty($_FILES['project_brochure'])){
			$meta_logo = $_FILES['project_brochure'];
			$meta_logo_name = $_FILES['project_brochure']['name'];
			$meta_logo_tmp_name = $_FILES['project_brochure']['tmp_name'];
			$image_ext = pathinfo($meta_logo_name, PATHINFO_EXTENSION);
			
			$brochure_date = date('Y-m-d-h-i-s');
			$new_brochure = "microsite-projects-brochure-$brochure_date.$image_ext";
			
			$meta_path = "../../uploads/microsite/$new_brochure";
			if(move_uploaded_file($meta_logo_tmp_name, $meta_path)){
				$project_image_brochure = $new_brochure;
			}
		}
		 


		$query = mysqli_query($conn, "INSERT INTO micro_site (page_url,developer_id, cat_id, type_id, status_id, state_id, city_id, locality_id, title, keyword, description, project_brochure, name, address, payment_plan, rera_no, project_ivr_no, whatapp_no) VALUES ('$page_url','$dev_id', '$cat_id', '$type', '$status', '$state', '$city', '$location', '$meta_title', '$meta_keyword', '$meta_desc', '$project_image_brochure', '$name', '$address', '$price', '$rera',  '$ivr_call', '$wp_no')");
		if($query==1){
			echo json_encode(['status'=>1,'message'=>"Page Added Successfully"]);
		}else{
			echo json_encode(['status'=>0,'message'=>"Something went wrong"]);
		}
	}else{
		echo json_encode(['status'=>3,'message'=>"Plese Fill Mandaoty Fields",'errors'=>$validator]);

	}
	
	

?>