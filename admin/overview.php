<?php 
	include_once 'config/conn.php';
	include_once 'include/function.php';
	include_once 'layout/header/header.php';
	include_once 'layout/side-nav/left-side-nav.php';
	
	$update_id = '';
	
	$recent_sold = '';
	$overview = '';
	$total_units = '';
	$avaliable_units = '';
	$sold_units = '';
	
	if(isset($_GET['id'])){
		$update_id = $_GET['id'];
		$eid = encryptor('decrypt',$_GET['id']);
		include_once 'layout/side-nav/right-side-nav.php';
		$fet_sql = "SELECT * FROM micro_site_overview WHERE project_id = '$eid'";
		$fet_query = mysqli_query($conn, $fet_sql);
		if(mysqli_num_rows($fet_query) > 0){
			$fet_row = mysqli_fetch_assoc($fet_query);
			
			
			$overview = $fet_row['description'];
			
		}
	}
?>

<section class="microsite-area">
	<div class="">
		<form action="" id="updatemicrooveroverview">
			<input type="hidden" name="eid" value="<?= encryptor('encrypt',$eid) ?>" id="">
			<div class="">
				<div class="microbox">
					<div class="head-box">
						<h6><i class="fa fa-building" aria-hidden="true"></i> Overview</h6>
					</div>
					<div class="box">
						<div class="admin-text">
							<span>Project Overiew:</span>
						</div>
						<div class="input-sec custom_input_sec">
							<textarea class="form-control" name="project_desc"  id="project_desc" placeholder="Project Description" rows="5"><?php echo $overview ?></textarea>
							<!--<i class="fa fa-times" aria-hidden="true"></i>-->
							
						</div>
					</div><!---------box---------->
	
					
	
				</div>
				<div class="btn-save">
					<button class="save-btn" id="submit">Save</button>
				</div>
			</div>
		</form>
	</div>
</section>

<?php 
	include_once 'layout/footer/footer.php';
?>

<script src="vendor/overview.js"></script>
