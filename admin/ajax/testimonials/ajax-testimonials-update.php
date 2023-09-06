<?php 
	include_once '../../config/conn.php';

	$id = $_POST['id'];
	$name = $_POST['name'];
	
	if(isset($_FILES['image'])){
		$image = $_FILES['image']['name'];
		$image_tmp = $_FILES['image']['tmp_name'];
		$oldImage = $_POST['oldImage'];

		$temp_name = '';
		if($_POST['oldImage'] != ''){
			$temp_name = $_POST['oldImage'];
			
		}else{
			$rand = rand();
			$extension = pathinfo($image, PATHINFO_EXTENSION);
			$newName = 'testimonials-'.$rand.'.'.$extension;
			$temp_name = $newName;
		}
		$location = '../../uploads/testimonials/'.$temp_name;
		move_uploaded_file($image_tmp, $location);
		$updated_image = $temp_name;
		
	}else{
		$updated_image = $_POST['oldImage'];
		
	}

$designation = $_POST['designation'];
$description = mysqli_real_escape_string($conn, $_POST['description']);
	
$sql = "UPDATE testimonials_emp SET name='$name', image='$updated_image', description='$description', designation='$designation' WHERE id='$id'";
$result = mysqli_query($conn, $sql);

if(!$result){
	die('Query failed '.mysqli_error($conn));
}

?>