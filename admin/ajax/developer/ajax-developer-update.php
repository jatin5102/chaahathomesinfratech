<?php
	include_once '../../config/conn.php';

	
	$id = $_POST['d_update_id'];
	$name = $_POST['d_name'];
	$address = mysqli_real_escape_string($conn, $_POST['d_address']);
	$about = $_POST['d_about'];
	$char_about = htmlspecialchars($about, ENT_QUOTES);
	
	
	$db_logo_name = '';
	if(isset($_FILES['d_logo'])){
		$old_logo_name = $_POST['d_old_logo'];
		$logo = $_FILES['d_logo'];
		$logo_name = $_FILES['d_logo']['name'];
		$logo_tmp_name = $_FILES['d_logo']['tmp_name'];
		 
		$path = "../../uploads/developer/$old_logo_name";
		
		if(move_uploaded_file($logo_tmp_name, $path)){
			$db_logo_name = $old_logo_name;
		}
	}else{
			$db_logo_name = $_POST['d_old_logo'];
	}
	
 
		$sql = "UPDATE developer SET name = '$name', logo = '$db_logo_name', address = '$address', about = '$char_about' WHERE id = '$id'";
		$query = mysqli_query($conn, $sql) or die('Error :'.mysqli_connect_error($conn));
		if($query){
			echo "success";
		}else{
			echo "failed";
		}
?>
