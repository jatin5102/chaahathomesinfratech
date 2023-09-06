<?php 
	include_once 'config/conn.php';
	include_once 'layout/header/header.php';
	include_once 'layout/side-nav/left-side-nav.php';
	$update_id = '';
	if(isset($_GET['id'])){
		$update_id = $_GET['id'];
		$sold_price = '';
		$registry_date = '';
		$area = '';
		$floor = '';
		$price = '';
		include_once 'layout/side-nav/right-side-nav.php';
		$trn_sql = "SELECT * FROM micro_site_transaction WHERE project_id = '$update_id'";
		$tnr_query = mysqli_query($conn, $trn_sql);
		if(mysqli_num_rows($tnr_query) > 0){
		
			$sold_price = '';
			$registry_date = '';
			$area = '';
			$floor = '';
			$price = '';
			
			
		}
	}
?>

<section class="microsite-area">
	<div class="inner-micro-structure">
		<div class="single-box-area">
			<div class="microbox">
				<div class="head-box">
					<h6><i class="fa fa-building" aria-hidden="true"></i> Edit/Delete Transaction Details List</h6>
				</div>
				<div class="inner-table">
					<div class="box-table-add">
						<div class="inner-add-box-table">
							<div class="box">
								<div class="admin-text">
									<span>Sold Price</span>
									<small>Registry Date</small>
								</div>
								<div class="input-sec">
									<div class="custom-input-sec">
										<input type="text" class="form-control" id="trans_sold_price0" placeholder="1.5 Cr" name="trans_sold_price[]">
										<span><small class="text-danger" id="trans_sold_price_err0"></small></span>
									</div>
									<div class="custom-input-sec">
										<input type="text" class="form-control form-controltwo" id="trans_regiestry_date0" placeholder="05 April" name="trans_regiestry_date[]">
										<span><small class="text-danger" id="trans_regiestry_date_err0"></small></span>
									</div>
								</div>
							</div>
						</div><!---------inner-add-box-table--------->

						<div class="inner-add-box-table">
							<div class="box">
								<div class="admin-text">
									<span>Area</span>
									<small>Flat & Floor No.</small>
								</div>
								<div class="input-sec">
									<div class="custom-input-sec">
										<input type="text" class="form-control" id="trans_area0" placeholder="754" name="trans_area[]">
										<span><small class="text-danger" id="trans_area_err0"></small></span>
									</div>
									<div class="custom-input-sec">
										<input type="text" class="form-control form-controltwo" id="trans_floor_no0" placeholder="#2004, Floor 30" name="trans_floor_no[]">
										<span><small class="text-danger" id="trans_floor_no_err0"></small></span>
									</div>
								</div>
							</div>
						</div><!---------inner-add-box-table--------->

						<div class="inner-add-box-table">
							<div class="box">
								<div class="admin-text">
									<span>Price</span>
									<small>Per Sq.ft.(₹)</small>
								</div>
								<div class="input-sec">
									<div class="custom-input-sec">
										<input type="text" class="form-control" id="trans_price0" placeholder="20.45K" name="trans_price[]">
										<span><small class="text-danger" id="trans_price_err0"></small></span>
									</div>
									<!--<input type="text" class="form-control form-controltwo" placeholder="Sq.Ft.">-->
								</div>
							</div>
						</div><!---------inner-add-box-table--------->
					</div><!--------box-table-------->
					<div id="add_new_transaction"></div>
					<div class="box-table-add-bottom">
						<div class="btn-add">
							<button id="add_more_transaction" class="mr-2">Add More Transaction</button>
							<button id="remove_transaction" class="mr-2">Remove Transaction</button>
							<button class="save-btn" id="submit">Save</button>
						</div>
					</div>


					<div class="box-table">
						<div>
							<input type = "checkbox" id="checkAll"/>
							<span>Checkbox</span>
						</div>
						<div class="inner-box-table">
							<h4>Sold Price <span>Registry Date</span></h4>
						</div>
						<div class="inner-box-table">
							<h4>Area <span>Flat & Floor No.</span></h4>
						</div>
						<div class="inner-box-table">
							<h4>Price</h4>
						</div>
						<div class="inner-box-table-two">
							<h4>Delete</h4>
						</div>
					</div><!--------box-table-------->
					<?php 
						if(mysqli_num_rows($tnr_query) > 0){
							while($trn_row = mysqli_fetch_array($tnr_query)){
								$id = $trn_row['id'];
						?>
								<div class="box-table">
									<div class="">
										<input type="checkbox" name="update[]" value="<?php echo $trn_row['id']; ?>" />
									</div>
									<div class="inner-box-table">
										<input type="text" class="form-control border-dashed" value="<?php echo $trn_row['sold_price']; ?>" placeholder="(₹)1.54 Cr" id="update_sold_price_<?php echo $id; ?>">
										<input type="text" class="form-control border-dashed" value="<?php echo $trn_row['registry_date']; ?>" placeholder="Apr 2023" id="update_registry_date_<?php echo $id; ?>">
									</div>
									<div class="inner-box-table">
										<input type="text" class="form-control border-dashed" value="<?php echo $trn_row['area']; ?>" placeholder="754" id="update_area_<?php echo $id; ?>">
										<input type="text" class="form-control border-dashed" value="<?php echo $trn_row['floor']; ?>" placeholder="#305, Floor 30" id="update_floor_<?php echo $id; ?>">
									</div>
									<div class="inner-box-table">
										<input type="text" class="form-control border-dashed" value="<?php echo $trn_row['price']; ?>" placeholder="₹ 20.45K" id="update_price_<?php echo $id; ?>">
										<input type="text" class="form-control border-dashed" placeholder="Sq.Ft." id="update_sq_<?php echo $id; ?>">
									</div>
									<div class="inner-box-table-two">
										<h4><span onclick="solo_trans_delete(<?php echo $trn_row['id']; ?>)"><i class="fa fa-times" aria-hidden="true"></i></span></h4>
									</div>
								</div>
						<?php
							}
						}	
					?>
				</div>
			</div>
			<div class="btn-save">
				<button class="save-btn" id="update">Update</button>
			</div>
		</div>
	</div>
</section>

<?php 
	include_once 'layout/footer/footer.php';
?>

<script>
	function validation(){
		var flag = true;
		var sold_price = $("#trans_sold_price").val();
		var regiestry_Date = $("#trans_regiestry_date").val();
		var area = $("#trans_area").val();
		var floor_no = $("#trans_floor_no").val();
		var trans_price = $("#trans_price").val();
		
		var trns_sold = document.getElementsByName('trans_sold_price[]');
		if(trns_sold.length != 0){
			for(var p = 0; p < trns_sold.length; p++){
				if(trns_sold[p].value == ''){
					$("#trans_sold_price_err"+p+"").html("This field is required");
					flag = false;
				}else{
					$("#trans_sold_price_err"+p+"").html("");
				}
				
				//on event
				$("#trans_sold_price"+p+"").on('keyup', function(){
					var pa = p - 1;
					if(this.value == ''){
						$("#trans_sold_price_err"+pa+"").html("This field is required");
					}else{
						$("#trans_sold_price_err"+pa+"").html("");
					}
				})
			}
		}
		
	
		var trns_date = document.getElementsByName('trans_regiestry_date[]');
		if(trns_date.length != 0){
			for(var d = 0; d < trns_date.length; d++){
				if(trns_date[d].value == ''){
					$("#trans_regiestry_date_err"+d+"").html("This field is required");
					flag = false;
				}else{
					$("#trans_regiestry_date_err"+d+"").html("");
				}
				
				
				//on event
				$("#trans_regiestry_date"+d+"").on('keyup', function(){
					var da = d - 1;
					if(this.value == ''){
						$("#trans_regiestry_date_err"+da+"").html("This field is required");
					}else{
						$("#trans_regiestry_date_err"+da+"").html("");
					}
				})
			}
		}

		
		var trns_area = document.getElementsByName('trans_area[]');
		if(trns_area.length != 0){
			for(var a = 0; a < trns_area.length; a++){
				if(trns_area[a].value == ''){
					$("#trans_area_err"+a+"").html("This field is required");
					flag = false;
				}else{
					$("#trans_area_err"+a+"").html("");			
				}
				
				//on event
				$("#trans_area"+a+"").on('keyup', function(){
					var ab = a - 1;
					if(this.value == ''){
						$("#trans_area_err"+ab+"").html("This field is required");
					}else{
						$("#trans_area_err"+ab+"").html("");			
					}
				})
			}
		}

		
		var trns_floor = document.getElementsByName('trans_floor_no[]');
		if(trns_floor.length != 0){
			for(var f = 0; f < trns_floor.length; f++){
				if(trns_floor[f].value == ''){
					$("#trans_floor_no_err"+f+"").html("This field is required");
					flag = false;
				}else{
					$("#trans_floor_no_err"+f+"").html("");
				}
				
				$("#trans_floor_no"+f+"").on("keyup", function(){
					var fa = f - 1;
					if(this.value == ''){
						$("#trans_floor_no_err"+fa+"").html("This field is required");
					}else{
						$("#trans_floor_no_err"+fa+"").html("");
					}
				})
			}
		}
		

		
		var trns_price = document.getElementsByName('trans_price[]');
		if(trns_price.length != 0){
			for(var s = 0; s < trns_price.length; s++){
				if(trns_price[s].value == ''){
					$("#trans_price_err"+s+"").html("This field is required");
					flag = false;
				}else{
					$("#trans_price_err"+s+"").html("");
				}
				
				
				//on event
				$("#trans_price"+s+"").on("keyup", function(){
					var sa = s - 1;
					if(this.value == ''){
						$("#trans_price_err"+sa+"").html("This field is required");
					}else{
						$("#trans_price_err"+sa+"").html("");
					}
				})
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
		
		
		$("#update").on('click', function(){
			
			if($('input[name="update[]"]').is(':checked')){
				
				var total_checkboxes_val = $('input[name="update[]"]:checked').val();
				var t_checkboxes_arr = [];
				$('input[name="update[]"]:checked').each(function(){
					t_checkboxes_arr.push($(this).val());
				});
				
				
				
				var updateFormData = new FormData();
				var update_project_id = <?php echo $_GET['id'] ?>;
				updateFormData.append('check_id', update_project_id)
				for(var c = 0; c < t_checkboxes_arr.length; c++){
					var update_id = t_checkboxes_arr[c];
					updateFormData.append('update_id[]', t_checkboxes_arr[c]);
					updateFormData.append('update_sold_price[]', $("#update_sold_price_"+update_id+"").val());
					updateFormData.append('update_regiestry_date[]', $("#update_registry_date_"+update_id+"").val());
					updateFormData.append('update_area[]', $("#update_area_"+update_id+"").val());
					updateFormData.append('update_floor[]', $("#update_floor_"+update_id+"").val());
					updateFormData.append('update_price[]', $("#update_price_"+update_id+"").val());
					//add a new field 
				}
				
				
				$(".loader-icon-head").css('display', 'flex');
				$.ajax({
					url : 'ajax/transaction/ajax-transaction-insert.php',
					type : 'POST',
					data : updateFormData,
					contentType : false,
					processData : false,
					success : function(resp){
						if(resp == 'updated'){
							window.location.reload();
						}
					}
				})
				
			}else{
				alert("Please select the checkbox for update");
			}
			
			
		});
		
		
		
		
		$("#add_more_transaction").on('click', function(){
			if(!validation()){
				return false;
			}else{
				var count = $("#add_new_transaction").children($(".box-table-add")).length;
				var i = count;
				i++;
				$("#add_new_transaction").append('<div class="box-table-add"><div class="inner-add-box-table"><div class="box"><div class="admin-text"><span>Sold Price</span><small>Registry Date</small></div><div class="input-sec"><div class="custom-input-sec"><input type="text" class="form-control" id="trans_sold_price'+i+'" placeholder="1.5 Cr" name="trans_sold_price[]"><span><small class="text-danger" id="trans_sold_price_err'+i+'"></small></span></div><div class="custom-input-sec"><input type="text" class="form-control form-controltwo" id="trans_regiestry_date'+i+'" placeholder="05 April" name="trans_regiestry_date[]"><span><small class="text-danger" id="trans_regiestry_date_err'+i+'"></small></span></div></div></div></div><div class="inner-add-box-table"><div class="box"><div class="admin-text"><span>Area</span><small>Flat & Floor No.</small></div><div class="input-sec"><div class="custom-input-sec"><input type="text" class="form-control" id="trans_area'+i+'" placeholder="754" name="trans_area[]"><span><small class="text-danger" id="trans_area_err'+i+'"></small></span></div><div class="custom-input-sec"><input type="text" class="form-control form-controltwo" id="trans_floor_no'+i+'" placeholder="#2004, Floor 30" name="trans_floor_no[]"><span><small class="text-danger" id="trans_floor_no_err'+i+'"></small></span></div></div></div></div><div class="inner-add-box-table"><div class="box"><div class="admin-text"><span>Price</span><small>Per Sq.ft.(₹)</small></div><div class="input-sec"><div class="custom-input-sec"><input type="text" class="form-control" id="trans_price'+i+'" placeholder="20.45K" name="trans_price[]"><span><small class="text-danger" id="trans_price_err'+i+'"></small></span></div></div></div></div></div>');
			s}
		});
		
		$("#remove_transaction").on("click", function(){
			$("#add_new_transaction .box-table-add:last-child").remove();
		})
		
		
		
		$("#submit").on('click', function(){
			
			// var chk_update_id = <?php echo $_GET['id'] ?>;
			// if(chk_update_id == ''){
				if(!validation()){
					return false;
				}				
			// }

			var update_id = <?php echo $_GET['id'] ?>;
			var count = $("#add_new_transaction").children($(".box-table-add")).length;
			
			var data = new FormData();
			
			data.append('length', count);
			data.append('check_id', update_id);
			var trns_sold = document.getElementsByName('trans_sold_price[]');
			if(trns_sold.length != 0){
				for(var p = 0; p < trns_sold.length; p++){
					data.append('sold_price[]', trns_sold[p].value);
				}
			}
			
			var trns_date = document.getElementsByName('trans_regiestry_date[]');
			if(trns_date.length != 0){
				for(var d = 0; d < trns_date.length; d++){
					data.append('trns_date[]', trns_date[d].value);
				}
			}
			
			var trns_area = document.getElementsByName('trans_area[]');
			if(trns_area.length != 0){
				for(var a = 0; a < trns_area.length; a++){
					data.append('trns_area[]', trns_area[a].value);
				}
			}
			
			var trns_floor = document.getElementsByName('trans_floor_no[]');
			if(trns_floor.length){
				for(var f = 0; f < trns_floor.length; f++){
					data.append('trns_floor[]', trns_floor[f].value);
				}
			}
			
			var trns_price = document.getElementsByName('trans_price[]');
			if(trns_price.length != 0){
				for(var s = 0; s < trns_price.length; s++){
					data.append('trns_price[]', trns_price[s].value);
				}
			}
			
			
			
			
			
			$(".loader-icon-head").css('display', 'flex');
			$.ajax({
				url : 'ajax/transaction/ajax-transaction-sep-insert.php',
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
		
	})
</script>
<script>
	function solo_trans_delete(id){
		var id = id;
		
		$(".loader-icon-head").css('display', 'flex');
		$.ajax({
			url : 'ajax/transaction/ajax-transaction-solo-dlt.php',
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


