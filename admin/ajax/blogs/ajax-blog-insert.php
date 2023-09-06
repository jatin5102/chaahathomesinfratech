<?php 
	include_once '../../config/conn.php';


$date = $_POST['date'];

$image = $_FILES['image']['name'];
$image_tmp = $_FILES['image']['tmp_name'];

$rand = rand();
$extension = pathinfo($image, PATHINFO_EXTENSION);
$newName = 'blog-'.$rand.'.'.$extension;
$location = '../../uploads/blogs/'.$newName;
move_uploaded_file($image_tmp, $location);

$heading = $_POST['heading'];
$subHeading = $_POST['subHeading'];
$description = $_POST['description'];

$sql = "INSERT INTO blogs(heading,subheading,image,description,blogDate) VALUES('$heading','$subHeading','$newName','$description','$date')";
$result = mysqli_query($conn,$sql);

if(!$result){
    die('Query failed '.mysqli_error($conn));
}


?>