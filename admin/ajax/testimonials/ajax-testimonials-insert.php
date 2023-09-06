<?php 
	include_once '../../config/conn.php';


$name = $_POST['name'];

if(isset($_FILES['image'])){
$image = $_FILES['image']['name'];
$image_tmp = $_FILES['image']['tmp_name'];

$rand = rand();
$extension = pathinfo($image, PATHINFO_EXTENSION);
$newName = 'testimonials-'.$rand.'.'.$extension;
$location = '../../uploads/testimonials/'.$newName;
}

if(move_uploaded_file($image_tmp, $location))


$designation = $_POST['designation'];
$description = mysqli_real_escape_string($conn, $_POST['description']);

$sql = "INSERT INTO testimonials_emp(name, image, designation, description) VALUES('$name', '$newName', '$designation', '$description')";
$result = mysqli_query($conn, $sql);

if(!$result){
    die('Query failed '.mysqli_error($conn));
}













?>