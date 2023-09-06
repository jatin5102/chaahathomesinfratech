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
					<h6><i class="fa fa-building" aria-hidden="true"></i> Locality Name</h6>
					<div class="input-group mb-4">
						<input type="text" class="form-control" onkeyup="search_locality(this.value)" placeholder="Search locality" aria-label="Recipient's username" aria-describedby="basic-addon2">
						<div class="input-group-append">
							<span class="input-group-text" id="basic-addon2"><i class="fa fa-search"></i></span>
						</div>
					</div>
				</div>
				<div class="inner-table">
					<table class="table">
						<thead>
							<tr>
								<th>Locality Name</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody id="locality_listing">
							<?php
								$sql = "SELECT * FROM locality ORDER BY id DESC";
								$query = mysqli_query($conn, $sql);
								if(mysqli_num_rows($query) > 0){
									while($row = mysqli_fetch_array($query)){
							?>
										<tr>
											<td><?php echo $row['address'] ?></td>
											<td><span onclick="edit_locality(<?php echo $row['id'] ?>)"><i class="fa fa-pencil" aria-hidden="true"></i></span></td>
											<td><span onclick="dlt_locality(<?php echo $row['id'] ?>)"><i class="fa fa-times" aria-hidden="true"></i></span></td>
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
				<button class="save-btn">Save</button>
			</div>
		</div>
		<div class="edit-list-area list-area-other-r">
			<div class="box-border">
				<h6><i class="fa fa-building" aria-hidden="true"></i> Add Locality Name</h6>

				<div class="out-edit-box pt-2">
					<div class="edit-form">
						<div class="form-group">
							<label for="email">Select City :</label>
							<div class="in-form">
								<select class="form-control" id="slct_city">
									<?php
										$sql = "SELECT * FROM city ORDER BY city_name ASC";
										$query = mysqli_query($conn, $sql);
										if(mysqli_num_rows($query) > 0){
											while($row = mysqli_fetch_array($query)){
									?>
												<option value="<?php echo $row['id'] ?>"><?php echo $row['city_name'] ?></option>
									<?php
											}
										}
									?>
								</select>
							</div>
						</div>
					</div>
					<div class="edit-form">
						<div class="form-group">
							<label for="locality_name">Add New Locality :</label>
							<div class="in-form">
								<input type="hidden" id="hide_id"/>
								<input type="text" class="form-control" placeholder="New Locality" id="locality_name">
							</div>
							<span><small class="text-danger" id="locality_name_err"></small></span>
						</div>
					</div><!----------edit-form---------->
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
	function validation(){
		var flag = true;
		var name = $("#locality_name").val();
		
		if(name == ''){
			$("#locality_name_err").html("This field is required");
			flag = false;
		}else{
			$("#locality_name_err").html("");
		}
		
		
		$("#locality_name").on('keyup', function(){
			if(this.value == ''){
				$("#locality_name_err").html("This field is required");
			}else{
				$("#locality_name_err").html("");
			}
		})
		
		
		if(flag){
			return true;
		}else{
			return false;
		}
	}
</script>

<script>
	function edit_locality(id){
		$(".loader-icon-head").css('display', 'flex');
		$.ajax({
			url : 'ajax/locality/ajax-locality-edit.php',
			type : 'POST',
			data : {'id' : id},
			success : function(resp){
				var data = JSON.parse(resp);
				if(data != ''){
					document.getElementById("update").classList.remove("d-none");
					document.getElementById("submit").classList.add("d-none");
					$("#slct_city").val(data.city_id);
					$("#locality_name").val(data.address);
					$("#hide_id").val(data.id);
					$(".loader-icon-head").css('display', 'none');
				}
			}
		})
		
	}

	
	function dlt_locality(id){
		$(".loader-icon-head").css('display', 'flex');
		$.ajax({
			url : 'ajax/locality/ajax-locality-dlt.php',
			type : 'POST',
			data : {'dlt_id' : id},
			success : function(resp){
				if(resp == 'success'){
					$(".loader-icon-head").css('display', 'none');		
					window.location.reload();
				}
			}
		})
	}
	
	
	function search_locality(val){
		$.ajax({
			url : 'ajax/locality/ajax-search-locality.php',
			type : 'POST',
			data : {'name' : val},
			success : function(resp){
				if(resp){
					var data = JSON.parse(resp);
					$("#locality_listing").html(data);
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
			
			var city_id = $("#slct_city").val();
			var name = $("#locality_name").val();
			
			$(".loader-icon-head").css('display', 'flex');
			$.ajax({
				url : 'ajax/locality/ajax-locality-insert.php',
				type : 'POST',
				data : {'name' : name, 'city_id' : city_id},
				success : function(resp){
					if(resp == 'success'){
						$(".loader-icon-head").css('display', 'none');
						window.location.reload();
					}
				}
			})
		})
		
		
		//update
		$("#update").on('click', function(){
			if(!validation()){
				return false;
			}
			var city_id = $("#slct_city").val();
			var val = $("#locality_name").val();
			var id = $("#hide_id").val();
			
			$(".loader-icon-head").css('display', 'flex');
			$.ajax({
				url : 'ajax/locality/ajax-locality-update.php',
				type : 'POST',
				data : {'id' : id, 'city_id' : city_id ,'name' : val},
				success : function(resp){
					if(resp == 'success'){
						$(".loader-icon-head").css('display', 'none');				
						window.location.reload();
					}
				}
			})
		})
	})
</script>