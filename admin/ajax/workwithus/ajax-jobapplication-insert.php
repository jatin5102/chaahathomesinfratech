<?php 
	include_once '../../config/conn.php';

$name = $_POST['name'];
$email = $_POST['email'];
$description = $_POST['description'];
$phone = $_POST['phone'];
$experience = $_POST['experience'];
$position = $_POST['position'];

$resume = $_FILES['resume']['name'];
$resume_tmp = $_FILES['resume']['tmp_name'];

$rand = rand();
$extension = pathinfo($resume, PATHINFO_EXTENSION);
$newName = "jobapplication-$rand.$extension";

$location = "../../uploads/jobapplication/".$newName;

// die();

$sql = "INSERT INTO jobapplication(name, email, mobile, position, experience, description, resume) VALUES('$name', '$email', '$phone', '$position', '$experience', '$description', '$newName')";
$result = mysqli_query($conn, $sql);

if($result){
    move_uploaded_file($resume_tmp, $location);
}else{
    die('Query failed '.mysqli_error($conn));
}






?>