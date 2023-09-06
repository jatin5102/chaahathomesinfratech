<?php 
	include_once 'layout/header/header.php';
	include_once 'layout/side-nav/left-side-nav.php';
	include_once 'config/conn.php';
	$update_id = '';
	$multi_check = '';
	if(isset($_GET['id'])){
		$update_id = $_GET['id'];
		include_once 'layout/side-nav/right-side-nav.php';
		
		$ame_sql = "SELECT * FROM micro_site_amenities WHERE project_id = '$update_id'";
		$ame_query = mysqli_query($conn, $ame_sql);
		if(mysqli_num_rows($ame_query) > 0){
			$ame_row = mysqli_fetch_assoc($ame_query);
			$multi_check = $ame_row['amenities_logo_id'];
			$exp_multi_check = explode(',', $multi_check);
			
		}
	}
?>
<section class="microsite-area">
	<div class="inner-micro-structure">
		<!--<div class="left-area">
			<div class="microbox">
				<div class="head-box">
					<h6><i class="fa fa-building" aria-hidden="true"></i> Add More Project AMenities</h6>
				</div>
				<div class="box">
					<div class="admin-text">
						<span>Amenities Image</span>
					</div>
					<div class="input-sec-multi">
						<input type="file" class="form-control-file form-control">
					</div>
				</div>
				<div class="box">
					<div class="admin-text">
						<span>Amenities Name</span>
					</div>
					<div class="input-sec">
						<input type="text" class="form-control" placeholder="some Url Here">
					</div>
				</div>
				<div class="box">
					<div class="admin-text"></div>
					<div class="input-sec">
						<button>Add More Amenities</button>
					</div>
				</div>
			</div>
		</div>-->
		<div class="right-area">
			<div class="microbox">
				<div class="head-box">
					<h6><i class="fa fa-building" aria-hidden="true"></i> Select Amenities</h6>
				</div>
				<div class="amenities-box">
					<?php
						$sql = "SELECT * FROM amenities_logo ORDER BY id DESC";
						$query = mysqli_query($conn, $sql);
						if(mysqli_num_rows($query) > 0){
							while($row = mysqli_fetch_array($query)){
								$check_amenities_val = '';
								$cus = '';
								if($multi_check != ''){
									foreach($exp_multi_check as $chk_multi_val){
										$check_amenities_val = $chk_multi_val;
										if($row['id'] == $check_amenities_val){
											$cus = 'checked';
										}
									}
								}
					?>
							<div class="inner-amenities-box">
								<span class="amen-img"><img src="uploads/amenities_logo/<?php echo $row['logo']; ?>" ></span>
								<h4><?php echo $row['name']; ?></h4>
								<div class="form-check">
									<input type="checkbox" class="form-check-input" name="amenities_slct[]" value="<?php echo $row['id'];?>" <?php echo $cus; ?>>
								</div>
							</div>
					<?php
							}
						}
					?>

				</div>
			</div>
			<div class="btn-save">
				<button class="save-btn" id="submit">Save</button>
			</div><br><br>
			<hr>
		</div>

	</div>
</section>
<?php 
	include_once 'layout/footer/footer.php';
?>


<script>
	$(document).ready(function(){
		$("#submit").on('click', function(){
			var	check_id = <?php echo $_GET['id'] ?>; 
			var slct_itmem = [];
			if($('input[name="amenities_slct[]"]').is(":checked")){
				$('input[name="amenities_slct[]"]:checked').each(function(i){
					slct_itmem[i] = $(this).val();
				})
			}
			// else{
				// alert("sad");
				// return false;
			// }

			$(".loader-icon-head").css('display', 'flex');
			$.ajax({
				url : 'ajax/amenities/amenities-insert.php',
				type : 'POST',
				data : {'val' : slct_itmem, 'update_id' : check_id},
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