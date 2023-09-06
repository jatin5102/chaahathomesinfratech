<?php 
	include_once 'config/conn.php';
	include_once 'layout/header/header.php';
	include_once 'layout/side-nav/left-side-nav.php';
?>
<section class="state-back other-body-width">
	<div class="list-sec-other-b">
		<div class="list-area-other-l">
			<div class="box-border">
				<div class="head-list-area-other-l">
					<h6><i class="fa fa-building" aria-hidden="true"></i> Amenities Name</h6>
					<div class="input-group mb-4">
						<input type="text" class="form-control" placeholder="Search Developers" aria-label="Recipient's username" aria-describedby="basic-addon2">
						<div class="input-group-append">
							<span class="input-group-text" id="basic-addon2"><i class="fa fa-search"></i></span>
						</div>
					</div>
				</div>
				<div class="inner-table">
					<table class="table">
						<thead>
							<tr>
								<th>Amenities Name</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody id="developer_listing">
							<?php 
								$sql = "SELECT * FROM amenities_logo ORDER BY id DESC";
								$query = mysqli_query($conn, $sql);
								if(mysqli_num_rows($query) > 0){
									while ($row = mysqli_fetch_array($query)){
							?>
										<tr>
											<td><?php echo $row['name']; ?></td>
											<td><span id="edit_chck" onclick="edit_developer(<?php echo $row['id'] ?>)"><i class="fa fa-pencil" aria-hidden="true"></i></span></td>
											<td><span onclick="dlt_developer(<?php echo $row['id'] ?>,'<?php echo $row['logo'] ?>')"><i class="fa fa-times" aria-hidden="true"></i></span></td>
										</tr>
							<?php
									}
								}
							?>
						</tbody>
					</table>
				</div>
			</div>
			<div class="btn-save">
			  <!--<button class="save-btn">Save</button>-->
			</div>
		</div>
		<div class="edit-list-area list-area-other-r">
			<div class="box-border">
				<h6><i class="fa fa-building" aria-hidden="true"></i> Add Developers Logo/Name</h6>

				<div class="box">
					<div class="admin-text">
						<span>Amenities Name:</span>
					</div>
					<div class="input-sec custom_input_sec">
						<input type="hidden" id="hide_id"/>
						<input class="form-control" id="developer_name" placeholder="New Amenities Name"/>
						<span><small class="text-danger" id="developer_name_err"></small></span>
					</div>
				</div>

				<div class="box">
					<div class="admin-text">
						<span id="dev_img_head">Amenities Image: </span>
					</div>
					<div class="input-sec custom_input_sec">
						<input type="file" id="developer_logo" class="form-control-file">
						<input type="hidden" id="old_developer_logo" />
						<span><small class="text-danger" id="developer_logo_err"></small></span>
					</div>
				</div>
			</div>
			<div class="btn-save">
			  <button class="save-btn" id="submit">Save</button>
			  <button class="save-btn d-none" id="update">Update</button>
			</div>
		</div>
	</div><!------------list-sec---------->
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
</script>

<script>
	function validation(){
		var flag = true;
		var name = $("#developer_name").val();
		var logo = document.getElementById("developer_logo");
		
		
		if(name == ''){
			$("#developer_name_err").html("This filed is required");
			flag = false;
		}else{
			$("#developer_name_err").html("");
		}
		
		if(logo.files.length == 0){
			$("#developer_logo_err").html("This field is required");
			flag = false;
		}else if(logo.files.length != 0){
			if(!isImage(logo.files[0].name)){
				$("#developer_logo_err").html("Valid file extension allow jpg, png and jpeg etc.");
				flag = false;
			}else{
				$("#developer_logo_err").html("");
			}
		}else{
			$("#developer_logo_err").html("");
		}		
		
		

		$("#developer_name").on('keyup', function(){
			if(this.value == ''){
				$("#developer_name_err").html("This filed is required");
			}else{
				$("#developer_name_err").html("");
			}
		});
		
		
		$("#developer_logo").on('change', function(){
			if(this.files.length == 0){
				$("#developer_logo_err").html("This field is required");
			}else if(this.files.length != 0){
				if(!isImage(this.files[0].name)){
					$("#developer_logo_err").html("Valid file extension allow jpg, png and jpeg etc.");
				}else{
					$("#developer_logo_err").html("");
				}
			}else{
				$("#developer_logo_err").html("");
			}
		});
		
		
		
		if(flag){
			return true;
		}else{
			return false;
		}
	}
	
	
	function edit_developer(id){
		$(".loader-icon").css('display', 'block');
		$.ajax({
			url : 'ajax/amenities_logo/ajax-amenities-logo-edit.php',
			type : 'POST',
			data : {'id' : id},
			success : function(resp){
				var data = JSON.parse(resp);
				if(data != ''){
					document.getElementById("update").classList.remove("d-none");
					document.getElementById("submit").classList.add("d-none");
					$("#developer_name").val(data.name);
					$("#dev_img_head").html("Change Amenities Image:");
					// var img = document.createElement("img");
					// img.setAttribute("src", "uploads/developer/"+data.logo+"");
					// img.setAttribute("width", "150");
					// img.setAttribute("height", "100");
					// document.getElementById("old_developer_logo").append(img);
					document.getElementById("old_developer_logo").value = data.logo;
					$("#hide_id").val(data.id);
					$(".loader-icon").css('display', 'none');
				}
			}
		})
	}


	function dlt_developer(id, logo){
		$(".loader-icon").css('display', 'block');
		$.ajax({
			url : 'ajax/amenities_logo/ajax-amenities-logo-dlt.php',
			type : 'POST',
			data : {'dlt_id' : id, 'logo_name' : logo},
			success : function(resp){
				if(resp == 'success'){
					$(".loader-icon").css('display', 'none');					
					window.location.reload();
				}
			}
		})
	}
</script>	
	
<script>
	$(document).ready(function(){
		
		$("#submit").on('click', function(){
			if(!validation()){
				return false;
			}
			
			$(".loader-icon").css('display', 'block');
			var name = $("#developer_name").val();
			var logo = document.getElementById("developer_logo").files[0];
				
			var data = new FormData();
			data.append('d_name', name);
			data.append('d_logo', logo);
			
			
			$.ajax({
				url : 'ajax/amenities_logo/ajax-amenities-logo-insert.php',
				type : 'POST',
				data : data,
				contentType : false,
				processData : false,
				success : function(resp){
					if(resp == 'success'){
						$(".loader-icon").css('display', 'none');
						window.location.reload();
					}
				}
			})
		})
		
		
		$("#update").on("click", function(){
			
			// if(!validation()){
				// return false;
			// }
			
			var update_id = $("#hide_id").val();
			var name = $("#developer_name").val();
			var logo = document.getElementById("developer_logo").files[0];
			var old_logo = $("#old_developer_logo").val();
			
			var data = new FormData();
			data.append('d_update_id', update_id);
			data.append('d_name', name);
			data.append('d_logo', logo);
			data.append('d_old_logo', old_logo);
			
			$.ajax({
				url : 'ajax/amenities_logo/ajax-amenities-logo-update.php',
				type : 'POST',
				data : data,
				contentType : false,
				processData : false,
				success : function(resp){
					if(resp == 'success'){
						window.location.reload();
					}
				}
			})
		})
		
		
	})
	
</script>