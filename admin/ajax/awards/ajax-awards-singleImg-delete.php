<?php 
	include_once '../../config/conn.php';

$id = $_POST['id'];
$name = $_POST['name'];

$sqlSelect = "SELECT * FROM awards WHERE id='$id'";
$result1 = mysqli_query($conn, $sqlSelect);

if(!$result1){
	die('Query failed '.mysqli_error($conn));
}

$row = mysqli_fetch_assoc($result1);
$images = $row['cat_img'];

$totalImages = explode(',', $images);
$key = array_search($name, $totalImages);
unset($totalImages[$key]);

$finalImages = implode(',', $totalImages);

$sql = "UPDATE awards SET cat_img='$finalImages' WHERE id='$id'";
$result = mysqli_query($conn, $sql);

if(!$result){
	die('Query failed '.mysqli_error($conn));
}

unlink('../../uploads/awards/'.$name);
?>
