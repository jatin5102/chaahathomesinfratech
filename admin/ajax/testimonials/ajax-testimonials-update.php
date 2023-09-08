<?php 
	include_once '../../config/conn.php';
	include_once '../../include/function.php';

	$eid=encryptor('decrypt',$_POST['eid']);

	$validator=array();
	$error=0;
	if(empty($_POST['testimonials_update_name'])){
		$validator['testimonials_update_name']="This fields is required";
		$error=1;
	}

	// if(empty($_POST['testimonials_update_designation'])){
	// 	$validator['testimonials_update_designation']="This fields is required";
	// 	$error=1;
	// }


	if(empty($_POST['testimonials_update_paragraph'])){
		$validator['testimonials_update_paragraph']="This fields is required";
		$error=1;
	}

	
	

	if($error == 0){
		$designation = mysqli_real_escape_string($conn, $_POST['testimonials_update_designation']);
		$description = mysqli_real_escape_string($conn, $_POST['testimonials_update_paragraph']);
		$query = mysqli_query($conn, "UPDATE testimonials_emp SET name='".$_POST['testimonials_update_name']."', description = '$description', designation = '$designation' WHERE id = '$eid'");

		if($query == 1){
			echo json_encode(['status'=>1, 'message'=>'Your data has been Updated successfully!']);
		}else{
			echo json_encode(['status'=> 0, 'message'=> 'Something went wrong']);
		}
	}else{
		echo json_encode(['status'=> 3, 'message'=> 'Please Fill Mandatory Fields', 'errors'=>$validator]);
	}

	
?>