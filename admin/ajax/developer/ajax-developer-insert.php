<?php 
	include_once '../../config/conn.php';
	
	
	
	$name = $_POST['d_name'];
	$address = mysqli_real_escape_string($conn, $_POST['d_address']);
	$about = $_POST['d_about'];
	$char_about = htmlspecialchars($about, ENT_QUOTES);
	$logo = $_FILES['d_logo'];
	$logo_name = $_FILES['d_logo']['name'];
	$logo_tmp_name = $_FILES['d_logo']['tmp_name'];
	$logo_ext = pathinfo($logo_name, PATHINFO_EXTENSION);
	
	$name_date = date('Y-m-d-h-i-s');
	$new_name = "developer-logo-$name_date.$logo_ext";
	
	$path = "../../uploads/developer/$new_name";
	
	$db_logo_name = '';
	if(move_uploaded_file($logo_tmp_name, $path)){
		$db_logo_name = $new_name;
		$sql = "INSERT INTO developer (name, logo, address, about) VALUES ('$name', '$db_logo_name', '$address', '$char_about')";
		$query = mysqli_query($conn, $sql) or die('Error :'.mysqli_connect_error($conn));
		if($query){
			echo "success";
		}else{
			echo "failed";
		}
	}
	
	
	
?>