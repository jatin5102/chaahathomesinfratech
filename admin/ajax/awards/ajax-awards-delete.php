<?php 
	include_once '../../config/conn.php';


$id = $_POST['id'];

$sqlSelect = "SELECT * FROM awards WHERE id='$id'";
$result1 = mysqli_query($conn,$sqlSelect);

$row = mysqli_fetch_assoc($result1);

$image = $row['cat_img'];
$imageArr = explode(',', $image);
$count = count($imageArr);
for($i = 0; $i < $count; $i++){
unlink('../../uploads/awards/'.$imageArr[$i]);
}

$video = $row['cat_vdo'];
$videoArr = explode(',', $video);
$count1 = count($videoArr);
for($j = 0; $j < $count1; $j++){
unlink('../../uploads/awards/'.$videoArr[$j]);
}

$sql = "DELETE FROM awards wHERE id='$id'";
$result = mysqli_query($conn,$sql);

if(!$result){
	die('Query failed '.mysqli_error($conn));
}


?>
