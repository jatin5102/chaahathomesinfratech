<?php 
	include_once '../../config/conn.php';

$id = $_POST['id'];
$name = $_POST['vdoname'];

$sqlSelect = "SELECT * FROM workculturegallery WHERE id='$id'";
$result1 = mysqli_query($conn, $sqlSelect);

if(!$result1){
	die('Query failed '.mysqli_error($conn));
}

$row = mysqli_fetch_assoc($result1);
$videos = $row['cat_vdo'];

$totalVideos = explode(',', $videos);
$key = array_search($name, $totalVideos);
unset($totalVideos[$key]);

$finalVideos = implode(',', $totalVideos);

$sql = "UPDATE workculturegallery SET cat_vdo='$finalVideos' WHERE id='$id'";
$result = mysqli_query($conn, $sql);

if(!$result){
	die('Query failed '.mysqli_error($conn));
}

unlink('../../uploads/work-culture/'.$name);

?>
