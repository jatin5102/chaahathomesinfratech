<?php 
	include_once '../../config/conn.php';
    $id = $_POST['id'];
    $heading = $_POST['heading'];
    $date = $_POST['date'];
    $oldImages = $_POST['oldImages'];
    $oldVideos = $_POST['oldVideos'];

    print_r($_POST);
 

    if(isset($_FILES['images'])){
    $images = count($_FILES['images']['name']);

    for($i = 0; $i < $images; $i++){
        $imagesAll = $_FILES['images']['name'][$i];
        $imagesAll_tmp = $_FILES['images']['tmp_name'][$i];
    
        $rand = rand();
        $extension = pathinfo($imagesAll, PATHINFO_EXTENSION);
        $newName[] = "work-culture-".$rand.'.'.$extension;
        
        $updateImage = implode(',',$newName);

        $location = "../../uploads/work-culture/$newName[$i]";
    
       if(move_uploaded_file($imagesAll_tmp, $location));
      }    
            if($oldImages != ''){
             $newUpdatedfinalImages = $updateImage.','.$oldImages;
            }
            else{
                $newUpdatedfinalImages = $updateImage;  
            }
            
    }else{
        $newUpdatedfinalImages = $oldImages;
    }

    if(isset($_FILES['videos'])){
      $videos = count($_FILES['videos']['name']);
    
      for($j = 0; $j < $videos; $j++){
        $videosAll = $_FILES['videos']['name'][$j];
        $videosAll_tmp = $_FILES['videos']['tmp_name'][$j];
    
        $rand1 = rand();
        $extension1 = pathinfo($videosAll, PATHINFO_EXTENSION);
        $newName1[] = "work-culture-".$rand1.'.'.$extension1;
        
        $updatevideos = implode(',',$newName1);
    
        $location1 = "../../uploads/work-culture/$newName1[$j]";
    
       if(move_uploaded_file($videosAll_tmp, $location1));
    }
        if($oldVideos != ''){
            $newUpdatedfinalVideos = $updatevideos.','.$oldVideos;
        }
        else{
            $newUpdatedfinalVideos = $updatevideos;  
        }
      
    }else{
        $newUpdatedfinalVideos = $oldVideos;
    }

  
    $sql = "UPDATE workculturegallery SET cat_title='$heading', date='$date', cat_img='$newUpdatedfinalImages', cat_vdo='$newUpdatedfinalVideos' WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    
    if(!$result){
        die('Query failed '.mysqli_error($conn));
    }

?>