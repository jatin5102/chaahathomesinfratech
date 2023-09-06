<?php 
	include_once 'config/conn.php';
	include_once 'layout/header/header.php';
	include_once 'layout/side-nav/left-side-nav.php';
	
	$update_id = '';
	$meta_title = '';
	$meta_keyword = '';
	$meta_description = '';
	$meta_brochure = '';
	$developer_name = '';
	$name = '';
	$image = '';
	$address = '';
	$category = '';
	$typology = '';
	$status = '';
	$state = '';
	$city = '';
	$location = '';
	$bedrooms = '';
	$cus_bedrooms = '';
	$price = '';
	$area = '';
	$rera = '';	
	$compilitaion_date = '';
	$ivr_no = '';
	$whatsapp = '';
	$page_url = '';

	if(isset($_GET['id']) && !empty($_GET['id'])){
		$update_id = $_GET['id'];
		include_once 'layout/side-nav/right-side-nav.php';
		$get_sql = "SELECT * FROM micro_site WHERE id = '$update_id'";
		$get_query = mysqli_query($conn, $get_sql);
		if(mysqli_num_rows($get_query) > 0){
			$get_row = mysqli_fetch_assoc($get_query);
			$meta_title = $get_row['title'];
			$meta_keyword = $get_row['keyword'];
			$meta_description = $get_row['description'];
			$meta_brochure = $get_row['project_brochure'];
			$developer_name = $get_row['developer_id'];
			$name = $get_row['name'];
			$image = $get_row['image'];
			$address = $get_row['address'];
			$category = $get_row['cat_id'];
			$typology = $get_row['type_id'];
			$status = $get_row['status_id'];
			$state = $get_row['state_id'];
			$city = $get_row['city_id'];
			$location = $get_row['locality_id'];
			$bedrooms = $get_row['bedroom'];
			$cus_bedrooms = $get_row['cm_bedrooms'];
			$price = $get_row['payment_plan'];
			$area = $get_row['area'];
			$rera = $get_row['rera_no'];	
			$compilitaion_date = $get_row['complitaion_date'];
			$ivr_no = $get_row['project_ivr_no'];
			$whatsapp = $get_row['whatapp_no'];
			$page_url = $get_row['page_url'];
		}

		

	}

	
?>

<section class="microsite-area">
	<form action="" id="addnewmicrsite">
		<div class="inner-micro-structure">
			<div class="left-area">
				<div class="microbox">
					<div class="head-box">
						<h6><i class="fa fa-building" aria-hidden="true"></i> Page Info</h6>
					</div>
					<div class="box">
						<div class="admin-text">
							<span>
							Developer Name:
							</span>
						</div>
						<div class="input-sec custom_input_sec">
							<select class="form-control" name="project_developer" id="project_developer">
								<option value="">---Select Developer---</option>
								<?php 
									$sql_dev = "SELECT * FROM developer ORDER BY id DESC";
									$query_dev = mysqli_query($conn, $sql_dev);
									if(mysqli_num_rows($query_dev) > 0){
										while($row_dev = mysqli_fetch_array($query_dev)){
								?>
											<option value="<?php echo $row_dev['id'] ?>" <?php echo $developer_name ==  $row_dev['id'] ? 'selected="selected"' : ''; ?> ><?php echo $row_dev['name'] ?></option>
								<?php
										}
									}
								?>
							</select>
							
						</div>
					</div>
	
					<div class="box">
						<div class="admin-text">
							<span>
							Project Name:
							</span>
						</div>
						<div class="input-sec custom_input_sec">
							<input type="text" class="form-control" onkeypress="generateUrl(this,'page_url')" value="<?php echo $name; ?>" name="project_name" id="project_name" placeholder="Fill Project Name">
			
						
						</div>
					</div>
					<div class="box">
						<div class="admin-text">
							<span>
							Page url:
							</span>
						</div>
						<div class="input-sec custom_input_sec">
							<input type="text" class="form-control" value="<?php echo $page_url; ?>" name="page_url" id="page_url" placeholder="Page Url">
			
						
						</div>
					</div>

					<div class="box">
						<div class="admin-text">
							<span>
							Project Category:
							</span>
						</div>
						<div class="input-sec custom_input_sec">
							<select class="form-control" onchange="project_property(this.value)" id="project_category" name="project_category" > 
								<option value="">---Select Category---</option>
								<?php 
									$sql_cat = "SELECT * FROM category ORDER BY name ASC";
									$query_cat = mysqli_query($conn, $sql_cat);
									if(mysqli_num_rows($query_cat) > 0){
										while($row_cat = mysqli_fetch_array($query_cat)){
								?>
											<option value="<?php echo $row_cat['id'] ?>" <?php echo $category ==  $row_cat['id'] ? 'selected="selected"' : ''; ?> ><?php echo $row_cat['name'] ?></option>
								<?php
										}
									}
								?>
							</select>
						
						</div>
					</div>
	
					<div class="box">
						<div class="admin-text">
							<span>
							Project Typology:
							</span>
						</div>
						<div class="input-sec custom_input_sec">
							<div class="d-flex">
								<!--<input type="text" class="form-control mr-2" placeholder="ex. 1,1.5,2,2.5"/>-->
								<select class="form-control" id="project_property_type" name="project_property_type">
									<option value="">---Select Typology---</option>
								</select>
							</div>
					
						</div>
					</div>
					<div class="box">
						<div class="admin-text">
						  <span>
							Project Status:
						  </span>
						</div>
						<div class="input-sec custom_input_sec">
						  <select class="form-control" id="project_status" name="project_status">
							  <option value="">---Select Status---</option>
							  <?php 
								  $sql_status = "SELECT * FROM projectstatus ORDER BY id DESC";
								  $query_status = mysqli_query($conn, $sql_status);
								  if(mysqli_num_rows($query_status) > 0){
									  while($row_status = mysqli_fetch_array($query_status)){
							  ?>
										  <option value="<?php echo $row_status['id'] ?>" <?php echo $status ==  $row_status['id'] ? 'selected="selected"' : ''; ?> ><?php echo $row_status['name'] ?></option>
							  <?php
									  }
								  }
							  ?>
						  </select>
						 
						</div>
					  </div>
	
					<div class="box">
						<div class="admin-text">
							<span>Meta Title:</span>
						</div>
						<div class="input-sec custom_input_sec">
							<input type="text" class="form-control" value="<?php echo $meta_title ?>" name="project_meta" id="project_meta" placeholder="Title Here" >
							<!--<i class="fa fa-times" aria-hidden="true"></i>-->
						</div>
					</div><!---------box---------->
					<div class="box">
						<div class="admin-text">
							<span>Meta Keyword:</span>
						</div>
						<div class="input-sec custom_input_sec">
							<input type="text" class="form-control" value="<?php echo $meta_keyword ?>" name="project_keyword" id="project_keyword" placeholder="Title Here">
							<!--<i class="fa fa-times" aria-hidden="true"></i>-->
						</div>
					</div><!---------box---------->
					<div class="box">
						<div class="admin-text">
							<span>Meta Description:</span>
						</div>
						<div class="input-sec custom_input_sec">
							<input type="text" class="form-control" value="<?php echo $meta_description; ?>" name="project_description" id="project_description" placeholder="Title Here">
							<!--<i class="fa fa-times" aria-hidden="true"></i>-->
						</div>
					</div><!---------box---------->
					<div class="box-two">
						<div class="admin-text">
							<span>Upload Brochure</span>
						</div>
						<div class="input-sec custom_input_sec">
							<input type="file" id="project_brochure" name="project_brochure" class="form-control-file form-control">
							<input type="hidden" id="hide_project_brochure" value="<?php echo $meta_brochure; ?>"/>
							<?php
								// if(!empty($meta_brochure)){
							?>	
									<!--<img src="uploads/microsite/<?php echo $meta_brochure; ?>" />-->
							<?php
								// }
							?>	
							<!--<i class="fa fa-times" aria-hidden="true"></i>-->
						</div>
					</div><!-------------box-2-------->
				</div>
				
			</div>
			<div class="right-area">
				<div class="microbox">
					<div class="head-box">
						<h6><i class="fa fa-building" aria-hidden="true"></i> Basic Details Micro Site</h6>
					</div>
					<!---------box---------->
					
					
					<div class="box d-none">
						<div class="admin-text">
							<span>
							Project image:
							</span>
						</div>
						<div class="input-sec custom_input_sec">
							<input type="file" class="form-control" id="project_image" placeholder="Fill Project Name">
							<input type="hidden" value="<?php echo $image; ?>" id="project_old_name" name="project_old_name"/>
		
						</div>
					</div><!---------box---------->
	
					<div class="box">
						<div class="admin-text">
							<span>Address:</span>
						</div>
						<div class="input-sec custom_input_sec">
							<input type="text" class="form-control" value="<?php echo $address ?>" name="project_address" id="project_address" placeholder="Fill Address">
					
							<!--<i class="fa fa-times" aria-hidden="true"></i>-->
						</div>
					</div><!---------box---------->
	
				
				<!---------box---------->
					
					<div class="box">
					  <div class="admin-text">
						<span>
						  Project State:
						</span>
					  </div>
					  <div class="input-sec custom_input_sec">
						<select class="form-control" onchange="Project_state(this.value)" name="project_state" id="project_state">
							<option value="">---Select State---</option>
							<?php 
								$sql_state = "SELECT * FROM state ORDER BY id ASC";
								$query_state = mysqli_query($conn, $sql_state);
								if(mysqli_num_rows($query_state) > 0){
									while($row_state = mysqli_fetch_array($query_state)){
							?>
										<option value="<?php echo $row_state['id'] ?>" <?php echo $state ==  $row_state['id'] ? 'selected="selected"' : ''; ?>><?php echo $row_state['name'] ?></option>
							<?php
									}
								}
							?>
						</select>
					
					  </div>
					</div><!---------box---------->
					
					<div class="box">
					  <div class="admin-text">
						<span>
						  Project City:
						</span>
					  </div>
					  <div class="input-sec custom_input_sec">
						<select class="form-control project_city" id="project_city"  name="project_city">
							<option value="">---Select City---</option>
						</select>
						
					  </div>
					</div><!---------box---------->
	
					<div class="box">
					  <div class="admin-text">
						<span>
						  Project location:
						</span>
					  </div>
					  <div class="input-sec custom_input_sec">
						<select class="form-control" id="project_location" name="project_location">
							<option value="">---Select Location---</option>
							
						</select>
			
					  </div>
					</div><!---------box---------->
	
	 
				
					
					<div class="box">
					  <div class="admin-text">
						<span>
						  Payment Plan:
						</span>
					  </div>
					  <div class="input-sec custom_input_sec">
						<input type="text" class="form-control" value="<?php echo $price; ?>" name="project_price" id="project_price" placeholder="00 : 00 : 00">
						
					  </div>
					</div><!---------box---------->
					
					<div class="box-two">
						<div class="admin-text">
						  <span>RERA Number:</span>
						</div>
						<div class="input-sec custom_input_sec">
						<input type="text" class="form-control" value="<?php echo $rera; ?>" name="project_rera_no" id="project_rera_no" placeholder="p5412445782245" name="">
		
						<!--<i class="fa fa-times" aria-hidden="true"></i>-->
						</div>
					</div><!-------------box-2-------->
	
			
					<div class="box">
						<div class="admin-text">
							<span>
							Project IVR No.:
							</span>
						</div> 
						<div class="input-sec custom_input_sec">
							<input type="text" class="form-control" value="<?php echo $ivr_no; ?>" name="project_ivr_no" id="project_ivr_no" placeholder="IVR call no" name="">
							
						</div>
					</div><!---------box---------->
	
					<div class="box">
						<div class="admin-text">
							<span>
							Project Whatsapp No.:
							</span>
						</div>
						<div class="input-sec custom_input_sec">
							<input type="text" class="form-control" value="<?php echo $whatsapp; ?>" name="project_whatapp_no" id="project_whatapp_no" placeholder="whatapp no" name="">
						
						</div>
					</div><!---------box---------->
				</div>
				<?php 
					if(isset($_GET['id'])){
				?>
						<div class="btn-save">
							<button class="save-btn" id="update">Update</button>
						</div>
				<?php
					}else{
				?>
						<div class="btn-save">
							<button class="save-btn" id="submit">Submit</button>
						</div><br><br>
				<?php
					}
				?>
			</div>
		</div>
	</form>
</section>

<?php 
	include_once 'layout/footer/footer.php';
?>

<script src="vendor/addmicroSite.js"></script>