<?php 


include '../../config/conn.php';
include '../../include/function.php';
$eid = encryptor('decrypt',$_POST['eid']);
$validator=array();
$error=0;
if(empty($_FILES['image']['name'])){
	$validator['banner_video']="This fields is required";
	$error=1;
}
if($error==0){

	$bannerslist = '';
		if(!empty($_FILES['image']['name'])){
			$meta_logo = $_FILES['image'];
			$meta_logo_name = $_FILES['image']['name'];
			$meta_logo_tmp_name = $_FILES['image']['tmp_name'];
			$image_ext = pathinfo($meta_logo_name, PATHINFO_EXTENSION);
			
			$brochure_date = time();
			$new_brochure = "banners-$brochure_date.$image_ext";
			
			$meta_path = "../../uploads/microsite/banners/$new_brochure";
			if(move_uploaded_file($meta_logo_tmp_name, $meta_path)){
				$bannerslist = $new_brochure;
			}
		}
		

		$videourl = $_POST['banner_video_url'];
	$isnerrecord = mysqli_query($conn, "INSERT INTO `micro_site_banner`(`project_id`, `win_images`,`win_video_url`) VALUES ('$eid','$bannerslist','$videourl')");
	if($isnerrecord==1){
		echo json_encode(['status'=>1,'message'=>"banner Added Successfully"]);

	}else{
		echo json_encode(['status'=>0,'message'=>"Something went wrong"]);
	}
}else{
	echo json_encode(['status'=>3,'message'=>"Plese Fill Mandaoty Fields",'errors'=>$validator]);



}



?>