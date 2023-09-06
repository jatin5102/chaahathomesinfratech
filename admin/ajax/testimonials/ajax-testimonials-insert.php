<?php 
	include_once '../../config/conn.php';

    $validator=array();
	$error=0;
	if(empty($_POST['name'])){
		$validator['name']="This fields is required";
		$error=1;
	}

	if(empty($_POST['designation'])){
		$validator['designation']="This fields is required";
		$error=1;
	}


	if(empty($_POST['description'])){
		$validator['description']="This fields is required";
		$error=1;
	}


    if($error == 1){
        
        echo json_encode(['status'=>3,'message'=>"Please Fill Mandatory Fields",'errors'=>$validator]);

    }else if($error == 0){
        $sql = "INSERT INTO testimonials_emp (name, designation, description) VALUES ('".$_POST['name']."', '".$_POST['designation']."', '".$_POST['description']."')";
        $query = mysqli_query ($conn, $sql) or die('Error '.mysqli_connect_error($conn));
        if($query){
            echo json_encode(['status'=>1, 'message'=>"Your data has been submited successfully!"]);
        }

    }
?>