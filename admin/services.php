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
		}

		

	}

	
?>

<section class="microsite-area">
	<div class="inner-micro-structure">
		<div class="row">
			<div class="col-md-12">
				<div class="microbox">
					<div class="head-box">
						<h6><i class="fa fa-building" aria-hidden="true"></i> Meta Micro Site</h6>
					</div>
					<div class="box">
						<div class="admin-text">
							<span>Meta Title:</span>
						</div>
						<div class="input-sec custom_input_sec">
							<input type="text" class="form-control" value="<?php echo $meta_title ?>" id="project_meta" placeholder="Title Here" >
							<!--<i class="fa fa-times" aria-hidden="true"></i>-->
						</div>
					</div><!---------box---------->
					<div class="box">
						<div class="admin-text">
							<span>Meta Keyword:</span>
						</div>
						<div class="input-sec custom_input_sec">
							<input type="text" class="form-control" value="<?php echo $meta_keyword ?>" id="project_keyword" placeholder="Title Here">
							<!--<i class="fa fa-times" aria-hidden="true"></i>-->
						</div>
					</div><!---------box---------->
					<div class="box">
						<div class="admin-text">
							<span>Meta Description:</span>
						</div>
						<div class="input-sec custom_input_sec">
							<input type="text" class="form-control" value="<?php echo $meta_description; ?>" id="project_description" placeholder="Title Here">
							<!--<i class="fa fa-times" aria-hidden="true"></i>-->
						</div>
					</div><!---------box---------->
				</div>
				<!---<div class="btn-save">
					<button class="save-btn">Save</button>
				</div>
				<br><br>--->
			</div>

			<div class="col-md-12">
				
					<div class="microbox">
						<div class="head-box">
							<h6><i class="fa fa-building" aria-hidden="true"></i> Other Details</h6>
						</div>

						
						<div class="row">
							<div class="col-md-6">
								<div class="box">
									<div class="admin-text">
										<span>Thumbnail Image</span>
										<small>Image Size 800*450 Only</small>
									</div>
									<div class="input-sec-multi">
										<input type="file" class="form-control-file form-control" id="floorImage">
										<span><small id="floorImage_err" class="text-danger"></small></span>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="box">
									<div class="admin-text">
										<span>
										Alt Text:
										</span>
									</div>
									<div class="input-sec custom_input_sec">
										<input type="text" class="form-control" value="<?php echo $name; ?>" id="project_name" placeholder="Enter Alt Text">
										<span><small class="text-danger" id="project_name_err"></small></span>
										<!--<i class="fa fa-times" aria-hidden="true"></i>-->
									</div>
								</div><!---------box---------->
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="box">
									<div class="admin-text">
										<span>Feature Image</span>
										<small>Image Size 1900*715 Only</small>
									</div>
									<div class="input-sec-multi">
										<input type="file" class="form-control-file form-control" id="floorImage">
										<span><small id="floorImage_err" class="text-danger"></small></span>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="box">
									<div class="admin-text">
										<span>
										Alt Text:
										</span>
									</div>
									<div class="input-sec custom_input_sec">
										<input type="text" class="form-control" value="<?php echo $name; ?>" id="project_name" placeholder="Enter Alt Text">
										<span><small class="text-danger" id="project_name_err"></small></span>
										<!--<i class="fa fa-times" aria-hidden="true"></i>-->
									</div>
								</div><!---------box---------->
							</div>
						</div>
						
						<div class="box">
							<div class="admin-text">
								<span>
								Title:
								</span>
							</div>
							<div class="input-sec custom_input_sec">
								<input type="text" class="form-control" value="<?php echo $name; ?>" id="project_name" placeholder="Enter Title">
								<span><small class="text-danger" id="project_name_err"></small></span>
								<!--<i class="fa fa-times" aria-hidden="true"></i>-->
							</div>
						</div><!---------box---------->

						<div class="box">
							<div class="admin-text">
								<span>Page Url:</span>
							</div>
							<div class="input-sec custom_input_sec">
								<input type="text" class="form-control" value="<?php echo $address ?>" id="project_address" placeholder="Page Url">
								<span><small class="text-danger" id="project_address_err"></small></span>
								<!--<i class="fa fa-times" aria-hidden="true"></i>-->
							</div>
						</div><!---------box---------->

						<div class="box">
							<div class="admin-text">
								<span>
								Description:
								</span>
							</div>
							<div class="input-sec custom_input_sec">
								<!-- <input type="text" class="form-control" value="<?php echo $name; ?>" id="project_name" placeholder="Enter Title"> -->
								<textarea id="ckplot"></textarea>
								<!-- <span><small class="text-danger" id="project_name_err"></small></span> -->
							</div>
						</div><!---------box---------->
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
							<button class="save-btn" id="submit">Save</button>
						</div><br><br>
				<?php
					}
				?>
				</div>
			</div>
		</div>
	</div>
</section>

<?php 
	include_once 'layout/footer/footer.php';
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" ></script>
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

<script>
	CKEDITOR.replace("ckplot");
	// CKEDITOR.instances["ckplot"].setData("<h1> data to render</h1>");
</script>

<script>
	$(document).ready(function(){
		project_property_onload();
		Project_state_onload();
	});
 
</script>



<script>
	function get_fileExt(filename)
	{
		var parts = filename.split('.');
		return parts[parts.length - 1];
	}


	function isImage(filename)
	{
		var ext = get_fileExt(filename);
		switch (ext.toLowerCase()) {
			case 'jpg':
			case 'png':
			case 'jpeg':
			// etc
		return true;
		}
		return false; 
	}
	
	function isMobile(phoneNumber)
	{
		var filter = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;

		if (filter.test(phoneNumber)) {
			if(phoneNumber.length==10){
				return true;
			} else {
				return false;
			}
		}
		else {
			return false;
		}
	}

	function project_property_onload(){
		var value = $("#project_category").val();
		var type_id = '<?php echo $typology ?>';
 
		$.ajax({
			url : 'ajax/microsite/ajax-microsite-property-type.php',
			type : 'POST',
			data : {'cat_id' : value, 'type_id' : type_id},
			success : function(resp){
				var data = JSON.parse(resp);
				$("#project_property_type").html(data);
			}
		})

	}

	function project_property(val){

		$.ajax({
			url : 'ajax/microsite/ajax-microsite-property-type.php',
			type : 'POST',
			data : {'cat_id' : val},
			success : function(resp){
				var data = JSON.parse(resp);
				$("#project_property_type").html(data);
			}
		})
	}
	
	function Project_state_onload(){
		var val = $("#project_state").val();
		var city_id  = '<?php echo $city ?>';

		$.ajax({
			url : 'ajax/microsite/ajax-microsite-get-city.php',
			type : 'POST',
			data : {'state_id' : val, 'city_id' : city_id},
			success : function(resp){
				var data = JSON.parse(resp);
				$("#project_city").html(data);

				var city_id = $("select#project_city option").filter(":selected").val();
				project_city_onload(city_id);
			}
		})
	}
	
	function Project_state(val){
		$.ajax({
			url : 'ajax/microsite/ajax-microsite-get-city.php',
			type : 'POST',
			data : {'state_id' : val},
			success : function(resp){
				var data = JSON.parse(resp);
				$("#project_city").html(data);

				var city_id = $("select#project_city option").filter(":selected").val();
				project_city_onload(city_id);
			}
		})
	}
	
	function project_city_onload(val){
		var location_id = '<?php echo $location ?>';

		$.ajax({
			url : 'ajax/microsite/ajax-microsite-get-locality.php',
			type : 'POST',
			data : {'city_id' : val, 'location_id' : location_id},
			success : function(resp){
				var data = JSON.parse(resp);
				$("#project_location").html(data);
			}
		})
	}
	
	function project_city(val){
		
		$.ajax({
			url : 'ajax/microsite/ajax-microsite-get-locality.php',
			type : 'POST',
			data : {'city_id' : val},
			success : function(resp){
				var data = JSON.parse(resp);
				$("#project_location").html(data);
			}
		})
	}
</script>


<script>
	function validation(){
		var flag = true;
		var developer = $("#project_developer").val();
		var name = $("#project_name").val();
		// var image = document.getElementById("project_image");
		var category = $("#project_category").val();
		var type = $("#project_property_type").val();
		var status = $("#project_status").val();		
		var state = $("#project_state").val();
		var city = $("#project_city").val();
		var location = $("#project_location").val();
		var price = $("#project_price").val();
	 
		var rera_no = $("#project_rera_no").val();
		var complition_date = $("#project_complition_date").val();
		var hide_image = $("#project_old_name").val();
		var ivr_no = $("#project_ivr_no").val();
		var whatapp_no = $("#project_whatapp_no").val();
	
		
		// if(hide_image == ''){
			// if(image.files.length == 0){
				// $("#project_image_err").html("This field is required");
				// flag = false;
			// }else if(image.files.length != 0){
				// if(!isImage(image.files[0].name)){
					// $("#project_image_err").html("Valid file extension allow jpg, png and jpeg etc.");
					// flag = false;
				// }else{
					// $("#project_image_err").html("");
				// }
			// }else{
				// $("#project_image_err").html("");
			// }
		// }
		
		if(developer == ''){
			$("#project_developer_err").html("This field is required");
			flag = false;
		}else{
			$("#project_developer_err").html("");
		}
		
		if(name == ''){
			$("#project_name_err").html("This field is required");
			flag = false;
		}else{
			$("#project_name_err").html("");
		}
		
		if(category == ''){
			$("#project_category_err").html("This field is required");
			flag = false;
		}else{
			$("#project_category_err").html("");
		}
		
		if(type == ''){
			$("#project_property_type_err").html("This field is required");
			flag = false;
		}else{
			$("#project_property_type_err").html("");
		}
		
		if(status == ''){
			$("#project_status_err").html("This field is required");
			flag = false;
		}else{
			$("#project_status_err").html("");
		}
		
		if(state == ''){
			$("#project_state_err").html("This field is required");
			flag = false;
		}else{
			$("#project_state_err").html("");
		}
		
		if(city == ''){
			$("#project_city_err").html("This field is required");
			flag = false;
		}else{
			$("#project_city_err").html("");
		}
		
		if(location == ''){
			$("#project_location_err").html("This field is required");
			flag = false;
		}else{
			$("#project_location_err").html("");
		}
		
		if(price == ''){
			$("#project_price_err").html("This field is required");
			flag = false;
		}else{
			$("#project_price_err").html("");
		}
 
		if(rera_no == ''){
			$("#project_rera_no_err").html("This field is required");
			flag = false;
		}else{
			$("#project_rera_no_err").html("");
		}
		
		
		if(complition_date == ''){
			$("#project_complition_date_err").html("This field is required");
			flag = false;
		}else{
			$("#project_complition_date_err").html("");
		}
		
		if(ivr_no == ''){
			$("#project_ivr_no_err").html("This field is required");
			flag = false;
		}else if (!isMobile(ivr_no)){
			$("#project_ivr_no_err").html("Please check your phone number");
			flag = false;
		}else{
			$("#project_ivr_no_err").html("");
		}
		

		if(whatapp_no == ''){
			$("#project_whatapp_no_err").html("This field is required");
			flag = false;
		}else if (!isMobile(whatapp_no)){
			$("#project_whatapp_no_err").html("Please check your phone number");
			flag = false;
		}else{
			$("#project_whatapp_no_err").html("");
		}
		//onchange || 'or' && 'and' || keyup
		// if(hide_image == ''){
			// $("#project_image").on('change', function(){
				// if(this.files.length == 0){
					// $("#project_image_err").html("This field is required");
				// }else if(this.files.length != 0){
					// if(!isImage(this.files[0].name)){
						// $("#project_image_err").html("Valid file extension allow jpg, png and jpeg etc.");
					// }else{
						// $("#project_image_err").html("");
					// }
				// }else{
					// $("#project_image_err").html("");
				// }
			// })
		// }
		
		$("#project_developer").on('change', function(){
			if(this.value == ''){
				$("#project_developer_err").html("This field is required");
			}else{
				$("#project_developer_err").html("");
			}
		})
		
		$("#project_name").on('keyup', function(){
			if(this.value == ''){
				$("#project_name_err").html("This field is required");
			}else{
				$("#project_name_err").html("");
			}
		})
		
		$("#project_name").on('keyup', function(){
			if(this.value == ''){
				$("#project_name_err").html("This field is required");
			}else{
				$("#project_name_err").html("");
			}
		})
		
		$("#project_category").on('change', function(){
			if(this.value == ''){
				$("#project_category_err").html("This field is required");
			}else{
				$("#project_category_err").html("");
			}
		});
		
		$("#project_property_type").on('change', function(){
			if(this.value == ''){
				$("#project_property_type_err").html("This field is required");
			}else{
				$("#project_property_type_err").html("");
			}
		});
		
		$("#project_property_type").on('change', function(){
			if(this.value == ''){
				$("#project_property_type_err").html("This field is required");
			}else{
				$("#project_property_type_err").html("");
			}
		});
		
		$("#project_status").on('change', function(){
			if(this.value == ''){
				$("#project_status_err").html("This field is required");
			}else{
				$("#project_status_err").html("");
			}
		});
		
		$("#project_state").on('change', function(){
			if(this.value == ''){
				$("#project_state_err").html("This field is required");
			}else{
				$("#project_state_err").html("");
			}
		});
		
		$("#project_city").on('change', function(){
			if(this.value == ''){
				$("#project_city_err").html("This field is required");
			}else{
				$("#project_city_err").html("");
			}
		});
		
		$("#project_location").on('change', function(){
			if(this.value == ''){
				$("#project_location_err").html("This field is required");
			}else{
				$("#project_location_err").html("");
			}
		});
		
		$("#project_price").on('keyup', function(){
			if(this.value == ''){
				$("#project_price_err").html("This field is required");
			}else{
				$("#project_price_err").html("");
			}
		})
		
 
		
		$("#project_rera_no").on('keyup', function(){
			if(this.value == ''){
				$("#project_rera_no_err").html("This field is required");
			}else{
				$("#project_rera_no_err").html("");
			}
		});
		
		$("#project_complition_date").on('change', function(){
			if(this.value == ''){
				$("#project_complition_date_err").html("This field is required");
			}else{
				$("#project_complition_date_err").html("");
			}
		});
		
		
		
		
		
		if(flag){
			return true;
		}else{
			return false;
		}
	}
</script>

<script>
	$(document).ready(function(){
		$("#submit").on('click', function(){
			
			if(!validation()){
				return false;
			}
			

			 
			var title = $("#project_meta").val();
			var Keyword = $("#project_keyword").val();
			var desc = $("#project_description").val();
			var brochure = document.getElementById("project_brochure").files[0];
			var hide_project_brochure = $("#hide_project_brochure").val();
			
			var developer = $("#project_developer").val();
			var name = $("#project_name").val();
			// var image = document.getElementById("project_image").files[0];
			// var hide_image = $("#project_old_name").val();
			var address = $("#project_address").val();
			var category = $("#project_category").val();
			var type = $("#project_property_type").val();
			var status = $("#project_status").val();		
			var state = $("#project_state").val();
			var city = $("#project_city").val();
			var location = $("#project_location").val();
			var price = $("#project_price").val();
			// var area = $("#project_area").val();
			var rera_no = $("#project_rera_no").val();
			var complition_date = $("#project_complition_date").val();
			// var cm_bedroom = $("#project_custom_bedroom").val();
			var ivr_call = $("#project_ivr_no").val();
			var whatapp_call = $("#project_whatapp_no").val();
			// var arr_bedrooms = [];
			// $("input[name=bedrooms]:checked").each(function(){
			  // arr_bedrooms.push($(this).val());
			// });
			// var arr_bathrooms = [];
			// $("input[name = bathroom]:checked").each(function(){
				// arr_bathrooms.push($(this).val());
			// });
			
			$(".loader-icon-head").css('display', 'flex');
			var data = new FormData();
			// data.append('P_check_id', check_id);
			data.append('P_meta_title', title);
			data.append('P_meta_keyword', Keyword);
			data.append('P_meta_desc', desc);
			data.append('P_meta_brochure', brochure);
			data.append('P_hide_meta_brochure', hide_project_brochure);
			data.append('P_developer', developer);
			data.append('P_name', name);
			// data.append('P_image', image);
			// data.append('P_old_image_name', hide_image);
			data.append('P_address', address);
			data.append('P_category', category);
			data.append('P_type', type);
			data.append('P_status', status);
			data.append('P_state', state);
			data.append('P_city', city);
			data.append('P_location', location);
			data.append('P_price', price);
		 
			data.append('P_rera_no', rera_no);
			data.append('P_complition_date', complition_date);
			 
			data.append('P_ivr_call', ivr_call);
			data.append('P_whatapp_call', whatapp_call);

				
			$.ajax({
				url : 'ajax/microsite/ajax-microsite-project-insert.php',
				type : 'POST',
				data : data,
				contentType : false,
				processData : false,
				success : function(resp){
					// console.log(resp);
					if(resp == 'success'){
						$(".loader-icon-head").css('display', 'none');
						window.location.reload();
					}
				}
			})
		});
		
		
		$("#update").on('click', function(){
			if(!validation()){
				return false;
			}
			
			var check_id = '<?php echo $update_id ?>';
			var title = $("#project_meta").val();
			var Keyword = $("#project_keyword").val();
			var desc = $("#project_description").val();
			var brochure = document.getElementById("project_brochure").files[0];
			var hide_project_brochure = $("#hide_project_brochure").val();
			
			var developer = $("#project_developer").val();
			var name = $("#project_name").val();
			// var image = document.getElementById("project_image").files[0];
			// var hide_image = $("#project_old_name").val();
			var address = $("#project_address").val();
			var category = $("#project_category").val();
			var type = $("#project_property_type").val();
			var status = $("#project_status").val();		
			var state = $("#project_state").val();
			var city = $("#project_city").val();
			var location = $("#project_location").val();
			var price = $("#project_price").val();
			// var area = $("#project_area").val();
			var rera_no = $("#project_rera_no").val();
			var complition_date = $("#project_complition_date").val();
			// var cm_bedroom = $("#project_custom_bedroom").val();
			var ivr_call = $("#project_ivr_no").val();
			var whatapp_call = $("#project_whatapp_no").val();
			// var arr_bedrooms = [];
			// $("input[name=bedrooms]:checked").each(function(){
			  // arr_bedrooms.push($(this).val());
			// });
			// var arr_bathrooms = [];
			// $("input[name = bathroom]:checked").each(function(){
				// arr_bathrooms.push($(this).val());
			// });
			
			$(".loader-icon-head").css('display', 'flex');
			var data = new FormData();
			data.append('P_check_id', check_id);
			data.append('P_meta_title', title);
			data.append('P_meta_keyword', Keyword);
			data.append('P_meta_desc', desc);
			data.append('P_meta_brochure', brochure);
			data.append('P_hide_meta_brochure', hide_project_brochure);
			data.append('P_developer', developer);
			data.append('P_name', name);
			// data.append('P_image', image);
			// data.append('P_old_image_name', hide_image);
			data.append('P_address', address);
			data.append('P_category', category);
			data.append('P_type', type);
			data.append('P_status', status);
			data.append('P_state', state);
			data.append('P_city', city);
			data.append('P_location', location);
			data.append('P_price', price);
			data.append('P_rera_no', rera_no);
			data.append('P_complition_date', complition_date);
			data.append('P_ivr_call', ivr_call);
			data.append('P_whatapp_call', whatapp_call);

				
			$.ajax({
				url : 'ajax/microsite/ajax-microsite-project-update.php',
				type : 'POST',
				data : data,
				contentType : false,
				processData : false,
				success : function(resp){
					if(resp == 'success'){
						$(".loader-icon-head").css('display', 'none');
						window.location.reload();
					}
				}
			})
		})
	});
</script>

