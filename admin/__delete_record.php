<?php 

	include_once 'config/conn.php';
	include_once 'include/function.php';
		if($_GET['action']=='deleteData'){
		
			$tablename=$_POST['tablename'];
			$comparename=$_POST['comparename'];
			$id=encryptor('decrypt',$_POST['id']);

	
			$checkrecord = mysqli_query($conn, "DELETE FROM $tablename WHERE $comparename=".$id."");
			if($checkrecord==1){
				echo json_encode(['status'=>1,'message'=>"Deleted Successfully"]);
			}else{
				echo json_encode(['status'=>0,'message'=>"Something went wrong"]);
			}

		}
		
	
	?>