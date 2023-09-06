<?php 
	include_once 'layout/header/header.php';
	include_once 'layout/side-nav/left-side-nav.php';
	include_once 'config/conn.php';
?>


<section class="state-back other-body-width">
	<div class="list-sec-other-b">
		<div class="list-area-other-l">
			<div class="box-border">
				<div class="head-list-area-other-l">
					<h6><i class="fa fa-building" aria-hidden="true"></i> State Name</h6>

					<div class="input-group mb-4">
						<input type="text" class="form-control" onkeyup="search_state(this.value)" placeholder="Search State" aria-label="Recipient's username" aria-describedby="basic-addon2">
						<div class="input-group-append">
							<span class="input-group-text" id="basic-addon2"><i class="fa fa-search"></i></span>
						</div>
					</div>
				</div>
			
				<div class="inner-table">
					<table class="table">
						<thead>
							<tr>
								<th>State Name</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody id="state_listing">
							<?php 
								$sql = "SELECT * FROM state ORDER BY id DESC";
								$query = mysqli_query($conn, $sql);
								if(mysqli_num_rows($query) > 0){
									while($row = mysqli_fetch_array($query)){
							?>
										<tr>
											<td><?php echo $row['name']; ?></td>
											<td><span onclick="edit_state(<?php echo $row['id'] ?>)"><i class="fa fa-pencil" aria-hidden="true"></i></span></td>
											<td><span onclick="dlt_state(<?php echo $row['id'] ?>)"><i class="fa fa-times" aria-hidden="true"></i></span></td>
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
				<h6><i class="fa fa-building" aria-hidden="true"></i> Add State Name</h6>
				<div class="out-edit-box pt-2">
					<div class="edit-form">
						<div class="form-group">
							<label for="email">Add New State :</label>
							<div class="in-form">
								<input type="hidden" id="hide_id"/>
								<input type="text" class="form-control" placeholder="New State" id="state_name">
							</div>
							<span><small class="text-danger" id="state_name_err"></small></span>
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
		var name = $("#state_name").val();
		
		if(name == ''){
			$("#state_name_err").html("This field is required");
			flag = false;
		}else{
			$("#state_name_err").html("");
		}
		
		
		$("#state_name").on('keyup', function(){
			if(this.value == ''){
				$("#state_name_err").html("This field is required");
			}else{
				$("#state_name_err").html("");
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
	function edit_state(id){
		
		$(".loader-icon-head").css('display', 'flex');
		$.ajax({
			url : 'ajax/state/ajax-state-edit.php',
			type : 'POST',
			data : {'id' : id},
			success : function(resp){
				var data = JSON.parse(resp);
				if(data != ''){
					document.getElementById("update").classList.remove("d-none");
					document.getElementById("submit").classList.add("d-none");
					$("#state_name").val(data.name);
					$("#hide_id").val(data.id);
					$(".loader-icon-head").css('display', 'none');
				}
			}
		})
	}


	
	function dlt_state(id){
		$(".loader-icon-head").css('display', 'flex');
		$.ajax({
			url : 'ajax/state/ajax-state-dlt.php',
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
	

	
	function search_state(val){
		$.ajax({
			url : 'ajax/state/ajax-search-state.php',
			type : 'POST',
			data : {'name' : val},
			success : function(resp){
				if(resp){
					var data = JSON.parse(resp);
					$("#state_listing").html(data);
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
			var name = $("#state_name").val();
			$(".loader-icon-head").css('display', 'flex');
			
			$.ajax({
				url : 'ajax/state/ajax-state-insert.php',
				type : 'POST',
				data : {'name' : name},
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
			
			var id = $("#hide_id").val();
			var val = $("#state_name").val();
			
			$(".loader-icon-head").css('display', 'flex');
			$.ajax({
				url : 'ajax/state/ajax-state-update.php',
				type : 'POST',
				data : {'id' : id, 'name' : val},
				success : function(resp){
					if(resp == 'success'){
						$(".loader-icon-head").css('display', 'none');	
						window.location.reload();
					}
				}
			})
			
		});
		
		
	})
</script>