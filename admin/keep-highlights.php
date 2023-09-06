<?php 
	include_once 'config/conn.php';
	include_once 'layout/header/header.php';
	include_once 'layout/side-nav/left-side-nav.php';
	include_once 'include/function.php';
	$update_id = '';
	$image = '';
	$Iframe = '';
	$old_image = '';
	$old_iframe = '';
	$row_id = '';
	if(isset($_GET['id'])){
		$update_id = $_GET['id'];
		$eid = encryptor('decrypt',$_GET['id']);
		include_once 'layout/side-nav/right-side-nav.php';
		
		$location_sql = "SELECT * FROM micro_site_highlights WHERE project_id = '$eid'";
		$location_query = mysqli_query($conn, $location_sql);
			
		$map_sql = "SELECT * FROM micro_site_location WHERE project_id = '$eid'";
		$map_query = mysqli_query($conn, $map_sql);
		if(mysqli_num_rows($map_query) > 0){
			$map_row = mysqli_fetch_assoc($map_query);
			$row_id = $map_row['id'];
			$old_image = $map_row['image'];
			$old_iframe = $map_row['iframe'];
		}
	
	}
?>
<section class="microsite-area">
	<div class="inner-micro-structure">
		<div class="right-area">
			<div class="microbox">
				<div class="head-box">
					<h6><i class="fa fa-building" aria-hidden="true"></i> Location Advantage</h6>
				</div>
				<div class="locatio-box" id="add_more_location_list">
					<div class="inner-location-box w-100">
						 
						<div class="custom_input_sec w-100">
							<input type="text" class="form-control border-dashed" id="location_destination0" name="destination[]" placeholder="">
							<span><small class="text-danger" id="location_destination_err0"></small></span>
						</div>
							<span class="d-none"><i class="fa fa-times" aria-hidden="true"></i></span>
					</div>
				</div>
				<div class="box">
					<div class="input-sec">
						<button id="add_more_location_btn"><i class="fas fa-plus-circle"></i> Add Location advantage</button>
					</div>
					<div class="input-sec">
						<button id="remove_more_location_btn"><i class="fas fa-plus-circle"></i> Remove Location advantage</button>
					</div>
					<div class="admin-text"></div>
				</div>
			</div>
			<div class="btn-save">
				<button class="save-btn" id="submit">Save</button>
			</div><br><br>
			<hr>
		</div>
		<div class="right-area">
			<div class="microbox">
				<div class="inner-table">
							<!--Add heading for update -->
							
							<?php 
								if(mysqli_num_rows($location_query) > 0){
									echo  '<input type="checkbox" id ="checkAll"/>
									<label style="color:#fff;">checkbox</label>';
									while($location_row = mysqli_fetch_array($location_query)){
										$id = $location_row['id'];
										$range = $location_row['meter'];
										$destination = $location_row['destination'];
							?>				
								<div class="locatio-box">
									<div class="inner-location-box w-100">
									<input type="checkbox"  name="update[]" value="<?php echo $id; ?>"/>
										 
										<div class="custom_input_sec w-100">
											<input type="text" class="form-control border-dashed" id="update_location_destination_<?php echo $id; ?>" value="<?php echo $destination; ?>" placeholder="">
										</div>
										<span onclick="solo_dlt_sub_locatio('<?php echo $id ?>')"><i class="fa fa-times" aria-hidden="true"></i></span>
									</div>
								</div>
							<?php
									}
									echo '<div class="btn-save mt-4">
									<button class="save-btn" id="update">Update</button>
								</div>';
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

	function isSize(size)
	{
		if(size <= 15728640){
		  return true;
		}
		return false;
	}

	
	function add_validation() {
		var flag = true;
			
			// var meter = document.getElementsByName('meter[]');
			// if(meter.length != 0){
				// for(var p = 0; p < meter.length; p++){
					// if(meter[p].value == ''){
						// $("#location_meter_err"+p+"").html("This field is required");
						// flag = false;
					// }else{
						// $("#location_meter_err"+p+"").html("");
					// }
				// }
			// }
		
	
		var destination = document.getElementsByName('destination[]');
		if(destination.length != 0){
			for(var d = 0; d < destination.length; d++){
				if(destination[d].value == ''){
					$("#location_destination_err"+d+"").html("This field is required");
					flag = false;
				}else{
					$("#location_destination_err"+d+"").html("");
				}
			}
		}

			
			
		if(flag){
			return true;
		}else{
			return false;
		}
	}
	
</script>

<script>
	$(document).ready(function(){
		
		$("#checkAll").change(function(){
			if($(this).is(':checked')){
				$('input[name="update[]"]').prop('checked', true);
			}else{
				$('input[name="update[]"]').each(function(){
					$(this).prop('checked', false);
				});
				
			}
		});
		
		$('input[name="update[]"]').click(function(){
			var total_checkboxes = $('input[name="update[]"]').length;
			var total_checkboxes_checked = $('input[name="update[]"]:checked').length;
			
			if(total_checkboxes_checked == total_checkboxes){
				$("#checkAll").prop('checked', true);
			}else{
				$("#checkAll").prop('checked', false);				
			}
		});
		
		
		$("#add_more_location_btn").on('click', function(){
		 	if(!add_validation()){
				return false;
			}else{
				var count = $("#add_more_location_list").children($(".inner-location-box")).length;
				// var i = count - 1;
				var i = count ;
					$("#add_more_location_list").append('<div class="inner-location-box w-100"> <div class="custom_input_sec w-100"><input type="text" class="form-control border-dashed" id="location_destination'+i+'" name="destination[]" placeholder=""><span><small class="text-danger" id="location_destination_err'+i+'"></small></span></div></div>');
				i++;
			}
		});
 
 
		$("#submit").on('click', function(){
			debugger;
			if(!add_validation()){
				return false;
			}
			
			$(".loader-icon-head").css('display', 'flex');
			var data = new FormData();
			var get_id = "<?php echo $_GET['id'] ?>";
			var count = $("#add_more_location_list").children($(".inner-location-box")).length;
			// var meter = document.getElementsByName('meter[]');
			data.append('update_id', get_id);
			data.append('length', count);
			// for(var p = 0; p < meter.length; p++){
				// data.append('meter[]', meter[p].value);
			// }

			var destination = document.getElementsByName('destination[]');
			for(var d = 0; d < destination.length; d++){
				data.append('destination[]', destination[d].value);
			}


			$.ajax({
				url : 'ajax/highlight/ajax-highlight-list-insert.php',
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
		});
	
		
		//update
		$("#update").on('click', function(){
			
			if($('input[name="update[]"]').is(':checked')){
				var total_checkboxes_val = $('input[name="update[]"]:checked').val();
				var t_checkboxes_arr = [];
				$('input[name="update[]"]:checked').each(function(){
					t_checkboxes_arr.push($(this).val());
				});
				
				
				var updateFormData = new FormData();
				var update_project_id = "<?php echo $_GET['id'] ?>";
				updateFormData.append('check_id', update_project_id)
				for(var c = 0; c < t_checkboxes_arr.length; c++){
					var update_id = t_checkboxes_arr[c];
					updateFormData.append('update_id[]', t_checkboxes_arr[c]);
					// updateFormData.append('update_meter[]', $("#update_location_meter_"+update_id+"").val());
					updateFormData.append('update_destination[]', $("#update_location_destination_"+update_id+"").val());
				}
				
				
				$(".loader-icon-head").css('display', 'flex');
				$.ajax({
					url : 'ajax/highlight/ajax-highlight-update.php',
					type : 'POST',
					data : updateFormData,
					contentType : false,
					processData : false,
					success : function(resp){
						if(resp == 'success'){
							window.location.reload();
						} 
					}
				})
				
			}else{
				alert("Please select the checkbox for update");
			}
		});
		
		$("#remove_more_location_btn").on("click", function(){
			$("#add_more_location_list .inner-location-box:last-child").remove();
		})
		
	})
	
</script>
<script>

	function solo_dlt_sub_locatio(id){
		var id = id;
		
		$(".loader-icon-head").css('display', 'flex');
		$.ajax({
			url : 'ajax/highlight/ajax-highlight-solo-dlt.php',
			type : 'POST',
			data : {'id' : id},
			success : function(resp){
				if(resp == 'delete'){
					$(".loader-icon-head").css('display', 'none');
					window.location.reload();
				}
			}
		})
	}
</script>
