<?php 

	include_once 'config/conn.php';
	include_once 'include/function.php';
		if($_GET['action']=='editmicrrobanenrs'){
		$eid=encryptor('decrypt',$_POST['dataid']);
			$isnerrecord = mysqli_query($conn, "SELECT win_images,win_video_url FROM `micro_site_banner` WHERE id=".$eid."");
			if($isnerrecord->num_rows >0){
				$data=mysqli_fetch_assoc($isnerrecord);
				echo json_encode(['status'=>1,'message'=>"success",'data'=>$data]);
			}else{
				echo json_encode(['status'=>0,'message'=>"Somthin went wrong"]);




			}

		}elseif($_GET['action']=='updatemicromannersrecord'){
	
			$eid=encryptor('decrypt',$_POST['eid']);
			$sqlstr="";
			if(!empty($_FILES['upddatefile']['name'])){
				$meta_logo = $_FILES['upddatefile'];
				$meta_logo_name = $_FILES['upddatefile']['name'];
				$meta_logo_tmp_name = $_FILES['upddatefile']['tmp_name'];
				$image_ext = pathinfo($meta_logo_name, PATHINFO_EXTENSION);
				
				$brochure_date = time();
				$new_brochure = "banners-$brochure_date.$image_ext";
				
				$meta_path = "uploads/microsite/banners/$new_brochure";
				if(move_uploaded_file($meta_logo_tmp_name, $meta_path)){
					$bannerslist = $new_brochure;
					$sqlstr=",win_images='$bannerslist'";
				}
			}
			$video_url_update=$_POST['video_url_update'];

		
			$isnerrecord = mysqli_query($conn, "UPDATE `micro_site_banner` SET `win_video_url`='$video_url_update' $sqlstr WHERE id=".$eid."");
			if($isnerrecord==1){
				echo json_encode(['status'=>1,'message'=>"Update Successfully"]);
			}else{
				echo json_encode(['status'=>0,'message'=>"Somthin went wrong"]);
			}


		}elseif($_GET['action']=='deletebannersmicrosw'){
		
			$dataid=encryptor('decrypt',$_POST['dataid']);
			$checkrecord = mysqli_query($conn, "SELECT * FROM `micro_site_banner` WHERE id=".$dataid."");
			if($checkrecord->num_rows>0){
				$data=mysqli_fetch_assoc($checkrecord);
				$meta_path = "uploads/microsite/banners/".$data['win_images'];
				if (file_exists($meta_path)){
					if (unlink($meta_path)) {   
						
					}    
				}

			mysqli_query($conn, "DELETE FROM `micro_site_banner` WHERE id=".$dataid."");
			echo json_encode(['status'=>1,'message'=>"Deleted Successfully"]);

			}else{
				echo json_encode(['status'=>0,'message'=>"Somthin went wrong"]);
			}

		}

		elseif($_GET['action']=='addothermicrosites'){
			$validator=array();
			$error=0;
			if(empty($_POST['othertype'])){
				$validator['othertype']="This fields is required";
				$error=1;
			}

			if(empty($_POST['heading'])){
				$validator['heading']="This fields is required";
				$error=1;
			}

			if($error==0){
			$eid=encryptor('decrypt',$_POST['eid']);

			$checkrecord = mysqli_query($conn, "INSERT INTO `other_type_section_item`(`project_id`, `other_type_section_type`, `heading`) VALUES ('$eid',".$_POST['othertype'].",'".$_POST['heading']."')");
				if($checkrecord==1){
					echo json_encode(['status'=>1,'message'=>"Added Successfully"]);
				}else{
					echo json_encode(['status'=>0,'message'=>"SOmething went wrong"]);

				}
		

		}else{
			echo json_encode(['status'=>3,'message'=>"Plese Fill Mandaoty Fields",'errors'=>$validator]);
		}	
	}elseif($_GET['action']=='editothermicrosites'){
		$eid=encryptor('decrypt',$_POST['dataid']);
			$isnerrecord = mysqli_query($conn, "SELECT other_type_section_type,heading FROM `other_type_section_item` WHERE id=".$eid."");
			if($isnerrecord->num_rows >0){
				$data=mysqli_fetch_assoc($isnerrecord);
				echo json_encode(['status'=>1,'message'=>"success",'data'=>$data]);
			}else{
				echo json_encode(['status'=>0,'message'=>"Somthin went wrong"]);




			}

		}elseif($_GET['action']=='editspecifiactions'){
			$eid=encryptor('decrypt',$_POST['dataid']);
				$isnerrecord = mysqli_query($conn, "SELECT heading,descriptions FROM `micro_specifications` WHERE id=".$eid."");
				if($isnerrecord->num_rows >0){
					$data=mysqli_fetch_assoc($isnerrecord);
					echo json_encode(['status'=>1,'message'=>"success",'data'=>$data]);
				}else{
					echo json_encode(['status'=>0,'message'=>"Somthin went wrong"]);
	
	
	
	
				}
	
			}elseif($_GET['action']=='editfloorplanimages'){
				$eid=encryptor('decrypt',$_POST['dataid']);
					$isnerrecord = mysqli_query($conn, "SELECT image FROM `micro_site_floorplan` WHERE id=".$eid."");
					if($isnerrecord->num_rows >0){
						$data=mysqli_fetch_assoc($isnerrecord);
						echo json_encode(['status'=>1,'message'=>"success",'data'=>$data]);
					}else{
						echo json_encode(['status'=>0,'message'=>"Somthin went wrong"]);
		
		
		
		
					}
		
				}elseif($_GET['action']=='editgalleryplanimages'){
					$eid=encryptor('decrypt',$_POST['dataid']);
						$isnerrecord = mysqli_query($conn, "SELECT image FROM `micro_site_gallery` WHERE id=".$eid."");
						if($isnerrecord->num_rows >0){
							$data=mysqli_fetch_assoc($isnerrecord);
							echo json_encode(['status'=>1,'message'=>"success",'data'=>$data]);
						}else{
							echo json_encode(['status'=>0,'message'=>"Somthin went wrong"]);
			
			
			
			
						}
			
					}elseif($_GET['action']=='updateothermicrodata'){

			$eid=encryptor('decrypt',$_POST['eid']);
			$validator=array();
			$error=0;
			if(empty($_POST['othertypeupdate'])){
				$validator['othertypeupdate']="This fields is required";
				$error=1;
			}

			if(empty($_POST['updateheading'])){
				$validator['updateheading']="This fields is required";
				$error=1;
			}


			if($error==0){
				$isnerrecord = mysqli_query($conn, "UPDATE `other_type_section_item` SET `other_type_section_type`=".$_POST['othertypeupdate']." ,`heading`='".$_POST['updateheading']."' WHERE id=".$eid."");
			if($isnerrecord==1){
				echo json_encode(['status'=>1,'message'=>"Update Successfully"]);
			}else{
				echo json_encode(['status'=>0,'message'=>"Somthin went wrong"]);
			}

			}else{
				echo json_encode(['status'=>3,'message'=>"Plese Fill Mandaoty Fields",'errors'=>$validator]);
			}
			

		}elseif($_GET['action']=='specificationsadd'){
			$validator=array();
			$error=0;
			if(empty($_POST['heading'])){
				$validator['heading']="This fields is required";
				$error=1;
			}

			if(empty($_POST['descriptions'])){
				$validator['descriptions']="This fields is required";
				$error=1;
			}

			if($error==0){
			
			$eid=encryptor('decrypt',$_POST['eid']);
			$heading=mysqli_real_escape_string($conn, $_POST['heading']);
			$descriptions=mysqli_real_escape_string($conn, $_POST['descriptions']);



			$checkrecord = mysqli_query($conn, "INSERT INTO `micro_specifications`(`project_id`, `heading`, `descriptions`) VALUES ('$eid','$heading','$descriptions')");
				if($checkrecord==1){
					echo json_encode(['status'=>1,'message'=>"Added Successfully"]);
				}else{
					echo json_encode(['status'=>0,'message'=>"SOmething went wrong"]);

				}
		

		}else{
			echo json_encode(['status'=>3,'message'=>"Plese Fill Mandaoty Fields",'errors'=>$validator]);
		}	
	}elseif($_GET['action']=='updatespecifications'){

		$eid=encryptor('decrypt',$_POST['eid']);

		$validator=array();
		$error=0;
		if(empty($_POST['updateheading'])){
			$validator['updateheading']="This fields is required";
			$error=1;
		}

		if(empty($_POST['updatedescriptions'])){
			$validator['updatedescriptions']="This fields is required";
			$error=1;
		}


		if($error==0){
			$heading=mysqli_real_escape_string($conn, $_POST['updateheading']);
			$descriptions=mysqli_real_escape_string($conn, $_POST['updatedescriptions']);
			$isnerrecord = mysqli_query($conn, "UPDATE `micro_specifications` SET `heading`='$heading' ,`descriptions`='$descriptions' WHERE id=".$eid."");
		if($isnerrecord==1){
			echo json_encode(['status'=>1,'message'=>"Update Successfully"]);
		}else{
			echo json_encode(['status'=>0,'message'=>"Somthin went wrong"]);
		}

		}else{
			echo json_encode(['status'=>3,'message'=>"Plese Fill Mandaoty Fields",'errors'=>$validator]);
		}
		

	}elseif($_GET['action']=='addfloorplands'){


		$validator=array();
			$error=0;
			if(empty($_FILES['floorImage']['name'])){
				$validator['floorImage']="This fields is required";
				$error=1;
			}

	
			if($error==0){

		
		
		$eid=encryptor('decrypt',$_POST['eid']);
				$meta_path="";
	
		if(!empty($_FILES['floorImage']['name'])){
			$meta_logo = $_FILES['floorImage'];
			$meta_logo_name = $_FILES['floorImage']['name'];
			$meta_logo_tmp_name = $_FILES['floorImage']['tmp_name'];
			$image_ext = pathinfo($meta_logo_name, PATHINFO_EXTENSION);
			
			$brochure_date = time();
			$new_brochure = "floors-$brochure_date.$image_ext";
			
			$meta_path = "uploads/microsite/floors/$new_brochure";
			if(move_uploaded_file($meta_logo_tmp_name, $meta_path)){
			
			}
		}


	
		$isnerrecord = mysqli_query($conn, "INSERT INTO `micro_site_floorplan`(`project_id`, `image`) VALUES ('$eid','$meta_path')");
		if($isnerrecord==1){
			echo json_encode(['status'=>1,'message'=>"Update Successfully"]);
		}else{
			echo json_encode(['status'=>0,'message'=>"Somthing went wrong"]);
		}

	}else{
		echo json_encode(['status'=>3,'message'=>"Plese Fill Mandaoty Fields",'errors'=>$validator]);

	}
	}
	elseif($_GET['action']=='updaremicrofloorplans'){


		$eid=encryptor('decrypt',$_POST['eid']);

		
		if(!empty($_FILES['floorimagesupdaste']['name'])){
			$meta_logo = $_FILES['floorimagesupdaste'];
			$meta_logo_name = $_FILES['floorimagesupdaste']['name'];
			$meta_logo_tmp_name = $_FILES['floorimagesupdaste']['tmp_name'];
			$image_ext = pathinfo($meta_logo_name, PATHINFO_EXTENSION);
			
			$brochure_date = time();
			$new_brochure = "floors-$brochure_date.$image_ext";
			
			$meta_path = "uploads/microsite/floors/$new_brochure";
			if(move_uploaded_file($meta_logo_tmp_name, $meta_path)){
			
			}

			$isnerrecord = mysqli_query($conn, "UPDATE `micro_site_floorplan` SET `image`='$meta_path' WHERE id=".$eid."");
			if($isnerrecord==1){
				echo json_encode(['status'=>1,'message'=>"Update Successfully"]);

			}else{
				echo json_encode(['status'=>0,'message'=>"Somthing went wrong"]);
			}

		}else{
			echo json_encode(['status'=>1,'message'=>"Update Successfully"]);

		}



		}elseif($_GET['action']=='deletefloorplands'){
		
			$dataid=encryptor('decrypt',$_POST['dataid']);
			
			$checkrecord = mysqli_query($conn, "SELECT * FROM `micro_site_floorplan` WHERE id=".$dataid."");
			if($checkrecord->num_rows>0){
				$data=mysqli_fetch_assoc($checkrecord);
				$meta_path = $data['image'];
				if (file_exists($meta_path)){
					if (unlink($meta_path)) {   
						
					}    
				}

			mysqli_query($conn, "DELETE FROM `micro_site_floorplan` WHERE id=".$dataid."");
			echo json_encode(['status'=>1,'message'=>"Deleted Successfully"]);

			}else{
				echo json_encode(['status'=>0,'message'=>"Somthin went wrong"]);
			}

		}elseif($_GET['action']=='addmicrogallery'){


			$validator=array();
				$error=0;
				if(empty($_FILES['floorImage']['name'])){
					$validator['floorImage']="This fields is required";
					$error=1;
				}
	
		
				if($error==0){
	
			
			
			$eid=encryptor('decrypt',$_POST['eid']);
					$meta_path="";
		
			if(!empty($_FILES['floorImage']['name'])){
				$meta_logo = $_FILES['floorImage'];
				$meta_logo_name = $_FILES['floorImage']['name'];
				$meta_logo_tmp_name = $_FILES['floorImage']['tmp_name'];
				$image_ext = pathinfo($meta_logo_name, PATHINFO_EXTENSION);
				
				$brochure_date = time();
				$new_brochure = "gallery-$brochure_date.$image_ext";
				
				$meta_path = "uploads/microsite/gallery/$new_brochure";
				if(move_uploaded_file($meta_logo_tmp_name, $meta_path)){
				
				}
			}
			$isnerrecord = mysqli_query($conn, "INSERT INTO `micro_site_gallery`(`project_id`, `image`) VALUES ('$eid','$meta_path')");
			if($isnerrecord==1){
				echo json_encode(['status'=>1,'message'=>"Update Successfully"]);
			}else{
				echo json_encode(['status'=>0,'message'=>"Somthing went wrong"]);
			}
	
		}else{
			echo json_encode(['status'=>3,'message'=>"Plese Fill Mandaoty Fields",'errors'=>$validator]);
	
		}
		}elseif($_GET['action']=='updaremicrogallery'){


			$eid=encryptor('decrypt',$_POST['eid']);
	
			
			if(!empty($_FILES['floorimagesupdaste']['name'])){
				$meta_logo = $_FILES['floorimagesupdaste'];
				$meta_logo_name = $_FILES['floorimagesupdaste']['name'];
				$meta_logo_tmp_name = $_FILES['floorimagesupdaste']['tmp_name'];
				$image_ext = pathinfo($meta_logo_name, PATHINFO_EXTENSION);
				
				$brochure_date = time();
				$new_brochure = "floors-$brochure_date.$image_ext";
				
				$meta_path = "uploads/microsite/floors/$new_brochure";
				if(move_uploaded_file($meta_logo_tmp_name, $meta_path)){
				
				}
	
				$isnerrecord = mysqli_query($conn, "UPDATE `micro_site_gallery` SET `image`='$meta_path' WHERE id=".$eid."");
				if($isnerrecord==1){
					echo json_encode(['status'=>1,'message'=>"Update Successfully"]);
	
				}else{
					echo json_encode(['status'=>0,'message'=>"Somthing went wrong"]);
				}
	
			}else{
				echo json_encode(['status'=>1,'message'=>"Update Successfully"]);
	
			}
	
	
	
			}elseif($_GET['action']=='deletemicrogallery'){
		
				$dataid=encryptor('decrypt',$_POST['dataid']);
				
				$checkrecord = mysqli_query($conn, "SELECT * FROM `micro_site_gallery` WHERE id=".$dataid."");
				if($checkrecord->num_rows>0){
					$data=mysqli_fetch_assoc($checkrecord);
					$meta_path = $data['image'];
					if (file_exists($meta_path)){
						if (unlink($meta_path)) {   
							
						}    
					}
	
				mysqli_query($conn, "DELETE FROM `micro_site_gallery` WHERE id=".$dataid."");
				echo json_encode(['status'=>1,'message'=>"Deleted Successfully"]);
	
				}else{
					echo json_encode(['status'=>0,'message'=>"Somthin went wrong"]);
				}
	
			}


	
	
	?>