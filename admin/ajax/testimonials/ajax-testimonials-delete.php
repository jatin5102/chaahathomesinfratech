<?php 
	include_once '../../config/conn.php';


$id = $_POST['id'];

$sqlSelect = "SELECT * FROM testimonials_emp WHERE id='$id'";
$result1 = mysqli_query($conn,$sqlSelect);

$row = mysqli_fetch_assoc($result1);
$image = $row['image'];

unlink('../../uploads/testimonials/'.$image);


$sql = "DELETE FROM testimonials_emp wHERE id='$id'";
$result = mysqli_query($conn,$sql);

if(!$result){
	die('Query failed '.mysqli_error($conn));
}


?>
