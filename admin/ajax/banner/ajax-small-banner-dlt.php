<?php 
	include_once('../../config/conn.php');
	 
	 $id = $_POST['id'];
	
	$slc_sql = "SELECT * FROM micro_site_banner WHERE id = '$id'";
	$slc_query = mysqli_query($conn, $slc_sql);
	if(mysqli_num_rows($slc_query) > 0){
		$row = mysqli_fetch_assoc($slc_query);
		
			if(isset($_POST['small_name']) && $_POST['small_name'] != '')
			{
				$id = $_POST['id'];
				$dlt_img_name = $_POST['small_name'];
				$path = "../../uploads/microsite/$dlt_img_name";
				$images = $row['mb_image'];
				$img_array = explode(',', $images);
				
				if(file_exists($path)){
					unlink($path);
					// if file / image delete in folder 
					if(in_array($dlt_img_name, $img_array)){
						$key = array_search($dlt_img_name, $img_array);
						unset($img_array[$key]);
						
						$img_arr = implode(',', $img_array);
						$sql_img = "UPDATE micro_site_banner SET mb_image = '$img_arr' WHERE id = '$id'";
						$query_img = mysqli_query($conn, $sql_img);
						if($query_img){
							echo 1;
						}else{
							echo 0;
						}
					}
				}else{
					echo 0;
				}
			}
			
			if(isset($_POST['small_video']) && $_POST['small_video'] != '')
			{	
				$dlt_video_id = $_POST['id'];
				$dlt_video_name = $_POST['small_video'];
				$path = "../../uploads/microsite/$dlt_video_name";

				// $videos = $row['win_video'];
				// $videos_array = explode(',', $videos);

				if(file_exists($path)){
					// unlink($path);
					// if file / image delete in folder 
					if(unlink($path)){
						// $key = array_search($dlt_video_name, $videos_array);
						// unset($videos_array);
						
						// $video_arr = implode(', ', $videos_array);
						$sql = "UPDATE micro_site_banner SET mb_video = '' WHERE id = '$dlt_video_id'";
						$query = mysqli_query($conn, $sql);
						if($query){
							echo 1;
						}else{
							echo 0;
						}
					}
				}else{
					echo 0;
				}
			}
		
	}
	// $sql = "DELETE FROM micro_site_banner";
?>