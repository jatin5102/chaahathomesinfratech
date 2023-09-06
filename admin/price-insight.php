<?php 
	include_once 'config/conn.php';
	include_once 'layout/header/header.php';
	include_once 'layout/side-nav/left-side-nav.php';
	$update_id = '';
	$id = '';
	$years = '';
	$quartily = '';
	$price = '';
	
	$insight_update_Id = '';
	$price_insight_Cr = '';
	$price_insight_Amt = '';
	$price_insight_Sq = '';
	$sold_insight_Cr = '';
	$sold_insight_Amt = '';
	$sold_insight_Sq = '';
	$estimate_insight_Cr = '';
	$estimate_insight_Amt = '';
	$estimate_insight_Sq	= '';
	if(isset($_GET['id'])){
		
		$insight_update_Id = $_GET['id'];
		$insight_sql = "SELECT * FROM micro_site_price_insight WHERE project_id = '$insight_update_Id'";
		$insight_query = mysqli_query($conn, $insight_sql);
		
		
		$update_id = $_GET['id'];
		$price_sql = "SELECT * FROM micro_site_price_list WHERE project_id = '$update_id'";
		$price_query = mysqli_query($conn, $price_sql);
		include_once 'layout/side-nav/right-side-nav.php';
	
	}
?>

<section class="microsite-area">
	<div class="inner-micro-structure">
		<div class="left-area">
			<?php 
				if(mysqli_num_rows($insight_query) > 0){
					while($insight_row = mysqli_fetch_assoc($insight_query)){
						$price_insight_Cr = $insight_row['price_cr'];
						$price_insight_Amt = $insight_row['price_am'];
						$price_insight_Sq = $insight_row['price_sq'];
						$sold_insight_Cr = $insight_row['sold_cr'];
						$sold_insight_Amt = $insight_row['sold_am'];
						$sold_insight_Sq = $insight_row['sold_sq'];
						$estimate_insight_Cr = $insight_row['estimate_cr'];
						$estimate_insight_Amt = $insight_row['estimate_am'];
						$estimate_insight_Sq	= $insight_row['estimate_sq'];
					}	
				}	
			?>
				<div class="microbox">
					<div class="head-box">
						<h6><i class="fa fa-building" aria-hidden="true"></i> Price Insight</h6>
					</div>
					<div class="box">
						<div class="admin-text">
							<span>Price range:</span>
						</div>
						<div class="input-sec">
							<input type="text" class="form-control" value="<?php echo $price_insight_Cr ?>" placeholder="₹ 79.50 L" id="project_insight_price_range">
							<input type="text" class="form-control form-controltwo" value="<?php echo $price_insight_Amt ?>" placeholder="4.50 Cr" id="project_insight_price_range2">
							<select class="form-control form-controltwo" id="project_insight_price_sq">
								<option value="Sq.ft" <?php echo $price_insight_Sq ==  'Sq.ft' ? 'selected="selected"' : ''; ?>>Sq.Ft.</option>
								<option value="Sq.yard" <?php echo $price_insight_Sq ==  'Sq.yard' ? 'selected="selected"' : ''; ?>>Sq.yards.</option>
							</select>
							<!--<i class="fa fa-times" aria-hidden="true"></i>-->
						</div>
					</div><!---------box---------->
					<div class="box">
						<div class="admin-text">
						<span>
						Total Sold:
						</span>
						</div>
						<div class="input-sec">
							<input type="text" class="form-control" value="<?php echo $sold_insight_Cr; ?>" id="Project_insight_total_sold" placeholder="Total Sold:87%">
							<input type="text" class="form-control form-controltwo" value="<?php echo $sold_insight_Amt; ?>" id="project_insight_total_unit" placeholder="Total Units">
							 
							<select class="form-control form-controltwo" id="project_insight_sold_units">
								<option value="Sq.ft" <?php echo $sold_insight_Sq ==  'Sq.ft' ? 'selected="selected"' : ''; ?>>Sq.Ft.</option>
								<option value="Sq.yard" <?php echo $sold_insight_Sq ==  'Sq.yard' ? 'selected="selected"' : ''; ?>>Sq.yards.</option>
							</select>
							<!--<i class="fa fa-times" aria-hidden="true"></i>-->
						</div>
					</div><!---------box---------->
					<div class="box">
						<div class="admin-text">
							<span>Estimated Price:</span>
						</div>
						<div  class="input-sec">
							<input type="text" class="form-control" placeholder="₹ 1.50Cr" value="<?php echo $estimate_insight_Cr ?>" id="project_insight_esi_price">
							<input type="text" class="form-control form-controltwo" value="<?php echo $estimate_insight_Amt ?>" placeholder="1280" id="project_insight_esi_price2">
							<select class="form-control form-controltwo" id="project_insight_esi_sq">
								<option value="Sq.ft" <?php echo $price_insight_Sq ==  'Sq.ft' ? 'selected="selected"' : ''; ?>>Sq.Ft.</option>
								<option value="Sq.yard" <?php echo $price_insight_Sq ==  'Sq.yard' ? 'selected="selected"' : ''; ?>>Sq.yards.</option>
							</select>
							<!--<i class="fa fa-times" aria-hidden="true"></i>-->
						</div>
					</div><!---------box---------->
				</div>
			<div class="btn-save">
				<button class="save-btn" id="insight_submit">Save</button>
			</div>
		</div>
		<div class="right-area">
			<div class="microbox">
				<div class="head-box">
					<h6><i class="fa fa-building" aria-hidden="true"></i> Edit/Delete Price List</h6>
				</div>
				<div class="inner-table">
					<hr>
					<table class="table tabletwo">
						<thead>
							<tr>
								<th>Years</th>
								<th>Quartly</th>
								<th>Price Per Sq.Ft.</th>
								<th class="space-create">Edit</th>
							</tr>
						</thead>
						<tbody id="add_more_price_list">
								<td>
									<div class="custom_input_sec">
										<input type="text" class="form-control" placeholder="2023" id="price_list_years0" name="year[]">
										<span><small class="text-danger" id="price_list_years_err0"></small></span>
									</div>
								</td>	
								<td>
									<div>
										<input type="text" class="form-control" placeholder="Q1" id="price_list_quarlty0" name="quartly[]">
										<span><small class="text-danger" id="price_list_quarlty_err0"></small></span>
									</div>
								</td>
								<td>
									<div>
										<input type="text" class="form-control" placeholder="₹ 17,800" id="price_list_sq0" name="price_sq[]">
										<span><small class="text-danger" id="price_list_sq_err0"></small></span>
									</div>
								</td>
								<td><span onclick="remove_add_price()"><i class="fa fa-times" aria-hidden="true"></i></span></td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="box">
					<div class="input-sec">
						<button id="add_more_price_btn"><i class="fas fa-plus-circle"></i> Add Price List</button>
					</div>
					<div class="input-sec">
						<button id="remove_more_price_btn"><i class="fas fa-plus-circle"></i> Remove Price List</button>
					</div>
					<div class="admin-text"></div>
				</div>
				<div class="btn-save">
					<button class="save-btn" id="list_submit">Save</button>
				</div>
			</div>
		</div>
	</div>
	<div class="microbox">
		<div class="inner-table">
			<table class="table tabletwo">
				<thead>
					<tr>
						<th><input type="checkbox" id="checkAll"/> CheckBox</th>
						<th>Years</th>
						<th>Quartly</th>
						<th>Price Per Sq.Ft.</th>
						<th class="space-create">Delete</th>
					</tr>
				</thead>
				<tbody id="add_more_price_list">
					<?php 
						if(mysqli_num_rows($price_query) > 0){
							while($price_row = mysqli_fetch_array($price_query)){
								$id = $price_row['id'];
								$years = $price_row['years'];
								$quartily = $price_row['quartly'];
								$price = $price_row['price_per_sq'];
					?>				
								<tr>
									<td><input type="checkbox" name="update[]" value="<?php echo $id; ?>" /></td>
									<td>
										<div class="custom_input_sec">
											<input type="text" class="form-control" value="<?php echo $years; ?>" placeholder="2023" id="update_price_list_years_<?php echo $id; ?>">
										</div>
									</td>	
									<td>
										<div>
											<input type="text" class="form-control" value="<?php echo $quartily; ?>" placeholder="Q1" id="update_price_list_quarlty_<?php echo $id; ?>">
										</div>
									</td>
									<td>
										<div>
											<input type="text" class="form-control" value="<?php echo $price; ?>" placeholder="₹ 17,800" id="update_price_list_sq_<?php echo $id; ?>">
										</div>
									</td>
									<td><span onclick="remove_add_price(<?php echo $id; ?>)"><i class="fa fa-times" aria-hidden="true"></i></span></td>
								</tr>
					<?php
							}
						}	
					?>
				</tbody>
			</table>
		</div>
			<div class="btn-save mt-4">
				<button class="save-btn" id="update">Update</button>
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
		
		var years = document.getElementsByName('year[]');
		if(years.length != 0){
			for(var p = 0; p < years.length; p++){
				if(years[p].value == ''){
					$("#price_list_years_err"+p+"").html("This field is required");
					flag = false;
				}else{
					$("#price_list_years_err"+p+"").html("");
				}
			}
		}
		
	
		var quartly = document.getElementsByName('quartly[]');
		if(quartly.length != 0){
			for(var d = 0; d < quartly.length; d++){
				if(quartly[d].value == ''){
					$("#price_list_quarlty_err"+d+"").html("This field is required");
					flag = false;
				}else{
					$("#price_list_quarlty_err"+d+"").html("");
				}
			}
		}

		
		var price_sq = document.getElementsByName('price_sq[]');
		if(price_sq.length != 0){
			for(var a = 0; a < price_sq.length; a++){
				if(price_sq[a].value == ''){
					$("#price_list_sq_err"+a+"").html("This field is required");
					flag = false;
				}else{
					$("#price_list_sq_err"+a+"").html("");			
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
		
		
		$("#add_more_price_btn").on('click', function(){
			if(!validation()){
				return false;
			}else{
				var count = $("#add_more_price_list").children($(".box-table-add")).length;
				var i = count - 1;
				i++;
				$("#add_more_price_list").append('<tr><td><div class="custom_input_sec"><input type="text" class="form-control" placeholder="2023" id="price_list_years'+i+'" name="year[]"><span><small class="text-danger" id="price_list_years_err'+i+'"></small></span></div></td><td><div><input type="text" class="form-control" placeholder="Q1" id="price_list_quarlty'+i+'" name="quartly[]"><span><small class="text-danger" id="price_list_quarlty_err'+i+'"></small></span></div></td><td><div><input type="text" class="form-control" placeholder="₹ 17,800" id="price_list_sq'+i+'" name="price_sq[]"><span><small class="text-danger" id="price_list_sq_err'+i+'"></small></span></div></td><td></td></tr>');
			}
		});
		
		$("#remove_more_price_btn").on("click", function(){
			$("#add_more_price_list tr:last-child").remove();
		})

		 
		
		$("#insight_submit").on('click', function(){
			
			var check_id = <?php echo $_GET['id'] ?>;
			var prince_range1 = $("#project_insight_price_range").val();
			var prince_range2 = $("#project_insight_price_range2").val();
			var prince_range3 = $("#project_insight_price_sq").val();
			
			var sold_price1 = $("#Project_insight_total_sold").val();
			var sold_price2 = $("#project_insight_total_unit").val();
			var sold_price3 = $("#project_insight_sold_units").val();
			
			var estimated_price1 = $("#project_insight_esi_price").val();
			var estimated_price2 = $("#project_insight_esi_price2").val();
			var estimated_price3 = $("#project_insight_esi_sq").val();
			
			var count = $("#add_more_price_list").children($(".box-table-add")).length;


			
			var data = new FormData();
			data.append('length', count);
			data.append('update_id' , check_id);
			data.append('price1' , prince_range1);
			data.append('price2' , prince_range2);
			data.append('price3' , prince_range3);
			data.append('sold1' , sold_price1);
			data.append('sold2' , sold_price2);
			data.append('sold3' , sold_price3);
			data.append('estimate1' , estimated_price1);
			data.append('estimate2' , estimated_price2);
			data.append('estimate3' , estimated_price3);


			$(".loader-icon-head").css('display', 'flex');
			$.ajax({
				url : 'ajax/priceInsight/ajax-insight-insert.php',
				type : 'POST',
				data : data,
				contentType : false,
				processData : false,
				success : function(resp){
					console.log(resp);
					if(resp ==  'success'){
						$(".loader-icon-head").css('display', 'none');
						window.location.reload();
					}
				}
			})
		})



		$("#list_submit").on('click', function(){
			if(!validation()){
				return false;
			}
				
			var check_id = <?php echo $_GET['id'] ?>;
			var count = $("#add_more_price_list").children($(".box-table-add")).length;
			var newdata = new FormData();
			
			newdata.append('length', count);
			newdata.append('update_id' , check_id);
			var year = document.getElementsByName('year[]');
			for(var p = 0; p < year.length; p++){
				newdata.append('year[]', year[p].value);
			}
			
			var quartly = document.getElementsByName('quartly[]');
			for(var d = 0; d < quartly.length; d++){
				newdata.append('quartly[]', quartly[d].value);
			}
			
			var price_sq = document.getElementsByName('price_sq[]');
			for(var a = 0; a < price_sq.length; a++){
				newdata.append('price_sq[]', price_sq[a].value);
			}
			
			$(".loader-icon-head").css('display', 'flex');
			$.ajax({
				url : 'ajax/priceInsight/ajax-price-list-insert.php',
				type : 'POST',
				data : newdata,
				contentType : false,
				processData : false,
				success : function(resp){
					if(resp == 'success'){
						$(".loader-icon-head").css('display', 'none');
						console.log(resp);
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
				var update_project_id = <?php echo $_GET['id'] ?>;
				updateFormData.append('check_id', update_project_id);
				for(var c = 0; c < t_checkboxes_arr.length; c++){
					var update_id = t_checkboxes_arr[c];
					updateFormData.append('update_id[]', t_checkboxes_arr[c]);
					updateFormData.append('update_years[]', $("#update_price_list_years_"+update_id+"").val());
					updateFormData.append('update_quarlty[]', $("#update_price_list_quarlty_"+update_id+"").val());
					updateFormData.append('update_price_sq[]', $("#update_price_list_sq_"+update_id+"").val());
				}
				
				
				$(".loader-icon-head").css('display', 'flex');
				$.ajax({
					url : 'ajax/priceInsight/ajax-priceInsight-update.php',
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



		

	});
</script>
<script>
	function remove_add_price(id){
		var id = id;
		
		$(".loader-icon-head").css('display', 'flex');
		$.ajax({
			url : 'ajax/priceInsight/ajax-priceInsight-solo-dlt.php',
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
