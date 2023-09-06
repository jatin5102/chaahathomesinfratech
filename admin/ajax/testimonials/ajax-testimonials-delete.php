<?php 
	include_once '../../config/conn.php';
	include_once '../../include/function.php';


	$dataid=encryptor('decrypt',$_POST['dataid']);
	
	$delete_query = mysqli_query($conn, "DELETE FROM `testimonials_emp` WHERE id=".$dataid."");
	if($delete_query == 1){
		echo json_encode(['status'=>1,'message'=>"Deleted Successfully"]);
	}else{
		echo json_encode(['status'=>0,'message'=>"Something went wrong!"]);
	}

?>
