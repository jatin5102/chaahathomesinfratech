<?php 
	include_once '../../config/conn.php';

    $date = $_POST['date'];
    $id = $_POST['hiddenId'];
    

   
    if(isset($_FILES['image'])){
      $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $oldImage = $_POST['oldImage'];

        $temp_image_name = '';
        if($_POST['oldImage'] != ''){
            $temp_image_name = $_POST['oldImage'];
        }else{
            $rand = rand();
            $extension = pathinfo($image, PATHINFO_EXTENSION);
            $newName = 'blog-'.$rand.'.'.$extension;
            $temp_image_name = $newName;
        }
        $location = '../../uploads/blogs/'.$temp_image_name;
        move_uploaded_file($image_tmp, $location);
        $updatedImage = $temp_image_name;
    }else{
        $updatedImage = $_POST['oldImage'];
    }
  
    
    $heading = $_POST['heading'];
    $subHeading = $_POST['subHeading'];
    $description = $_POST['description'];
    
    $sql = "UPDATE blogs SET heading='$heading', subHeading='$subHeading', image='$updatedImage', description='$description', blogDate='$date' WHERE id='$id'";
    $result = mysqli_query($conn,$sql);
    
    if(!$result){
        die('Query failed '.mysqli_error($conn));
    }
    















?>
asdf