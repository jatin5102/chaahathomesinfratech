<?php 
	include_once '../../config/conn.php';

$id = $_POST['id'];
$sql = "SELECT * FROM awards WHERE id='$id'";
$result = mysqli_query($conn,$sql);

if(!$result){
    die('Query failed '.mysqli_error($conn));
}

$row = mysqli_fetch_assoc($result);

$id = $row['id'];
$date = $row['date'];
$heading = $row['cat_title'];
$images = $row['cat_img'];
$videos = $row['cat_vdo'];

$fetchImages = explode(',', $images);
 
$finalImages = count($fetchImages);
$multipleImages = '';
if($images == ''){
    $multipleImages = '';
}else{
    for($i = 0; $i < $finalImages; $i++){
        $multipleImages .= '<div class="img-box">
        <img src="../admin/uploads/awards/'.$fetchImages[$i].'">
        <a href="javascript:void(0)" onclick=deleteImageName("'.$fetchImages[$i].'",'.$id.')><i class="fa fa-times" aria-hidden="true"></i></a>
        </div>';
    }
}


$fetchVideos = explode(',', $videos);

$finalVideos = count($fetchVideos);
$multipleVideos = '';
if($videos == ''){
    $multipleVideos = '';
}
else{
for($i = 0; $i < $finalVideos; $i++){
    $multipleVideos .= '<div class="img-box">
    <video src="../admin/uploads/awards/'.$fetchVideos[$i].'" autoplay="" muted=""></video>
    <a href="javascript:void(0)" onclick=deleteVideoName("'.$fetchVideos[$i].'",'.$id.')><i class="fa fa-times" aria-hidden="true"></i></a>
    </div>';
}
}

$html = ['id' => $id, 'heading' => $heading, 'date' => $date, 'images' => $multipleImages, 'videos' => $multipleVideos, 'oldImages' => $images, 'oldVideos' => $videos];

echo json_encode($html);

?>