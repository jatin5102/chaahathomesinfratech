<?php
    include_once '../../admin/config/conn.php';

    $validator=array();
	$error=0;
	if(empty($_POST['query_name'])){
		$validator['query_name']="This fields is required";
		$error=1;
	}

	if(empty($_POST['query_email'])){
		$validator['query_email']="This fields is required";
		$error=1;
	}


	if(empty($_POST['query_phone'])){
		$validator['query_phone']="This fields is required";
		$error=1;
	}


	if(empty($_POST['query_msg'])){
		$validator['query_msg']="This fields is required";
		$error=1;
	}

    if($error == 1){
        
        echo json_encode(['status'=>3,'message'=>"Please Fill Mandatory Fields",'errors'=>$validator]);

    }else if($error == 0){
        $sql = "INSERT INTO contact_us (name, email, phone, message) VALUES ('".$_POST['query_name']."', '".$_POST['query_email']."', '".$_POST['query_phone']."', '".$_POST['query_msg']."')";
        $query = mysqli_query ($conn, $sql) or die('Error '.mysqli_connect_error($conn));
        if($query){
            echo json_encode(['status'=>1, 'message'=>"Your data has been submited successfully!"]);
        }

    }
?>