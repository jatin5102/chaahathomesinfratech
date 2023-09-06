<?php 
	include_once '../../config/conn.php';

	$id = $_POST['id'];
	// $type = $_POST['type'];
	// $property = $_POST['property'];

	$sql = "DELETE FROM property WHERE id='$id'";
	$query = mysqli_query($conn, $sql) or die ('Error :'.mysqli_connect_error($conn));
	if($query){
		echo 'updated';
	}else{
		echo 'failed';
	}

	$sql2 = "SET @autoid:=0";
	$result2 = mysqli_query($conn,$sql2);
	$sql3 = "UPDATE property SET id=@autoid:=(@autoid+1)";
	$result3 = mysqli_query($conn,$sql3);
	$sql4 = "ALTER table property Auto_Increment=1";
	$result3 = mysqli_query($conn,$sql4);


?>