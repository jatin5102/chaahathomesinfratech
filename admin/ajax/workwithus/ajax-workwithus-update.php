<?php 
	include_once '../../config/conn.php';
$id = $_POST['id'];
$title = $_POST['title'];
$description = mysqli_real_escape_string($conn, $_POST['description']);
$experience = mysqli_real_escape_string($conn, $_POST['experience']);
$location = mysqli_real_escape_string($conn, $_POST['location']);
$skills = $_POST['skills'];
// $oldSkills = $_POST['oldSkills'];

foreach($skills as $values){
    $finalSkills[] = $values;
}

$implode_skills = implode(',', $finalSkills);


$sql = "UPDATE workwithus SET title='$title', description='$description', experience='$experience', location='$location', skills='$implode_skills' WHERE id='$id'";
$result = mysqli_query($conn, $sql);

if(!$result){
    die('Query failed '.mysqli_error($conn));
}

?>