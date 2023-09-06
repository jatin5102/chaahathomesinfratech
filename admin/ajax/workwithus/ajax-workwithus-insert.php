<?php 
	include_once '../../config/conn.php';

$title = $_POST['title'];
$description = mysqli_real_escape_string($conn, $_POST['description']);
$experience = mysqli_real_escape_string($conn, $_POST['experience']);
$location = mysqli_real_escape_string($conn, $_POST['location']);
$skills = $_POST['skills'];

foreach($skills as $values){
    $finalSkills[] = $values;
}

$implode_skills = implode(',', $finalSkills);
// echo $implode_skills;

$sql = "INSERT INTO workwithus(title, description, experience, location, skills) VALUES('$title', '$description', '$experience', '$location', '$implode_skills')";
$result = mysqli_query($conn,$sql);

if(!$result){
    die('Query failed '.mysqli_error($conn));
}


?>