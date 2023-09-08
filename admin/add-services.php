<?php 
	include_once 'config/conn.php';
	include_once 'layout/header/header.php';
	include_once 'layout/side-nav/left-side-nav.php';
?>

<section class="microsite-area">
	<div class="inner-micro-structure">
		<form action="" id="infraservices">
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
								<input type="text" class="form-control" name="ServiceMetaTilte" id="ServiceMetaTilte" placeholder="Title Here" >
								<!--<i class="fa fa-times" aria-hidden="true"></i>-->
							</div>
						</div><!---------box---------->
						<div class="box">
							<div class="admin-text">
								<span>Meta Keyword:</span>
							</div>
							<div class="input-sec custom_input_sec">
								<input type="text" class="form-control" name="ServiceMetaKeyword" id="ServiceMetaKeyword" placeholder="Title Here">
								<!--<i class="fa fa-times" aria-hidden="true"></i>-->
							</div>
						</div><!---------box---------->
						<div class="box">
							<div class="admin-text">
								<span>Meta Description:</span>
							</div>
							<div class="input-sec custom_input_sec">
								<input type="text" class="form-control" name="ServiceMetadescription" id="ServiceMetadescription" placeholder="Title Here">
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
											<input type="file" class="form-control-file form-control" name="thumbnail" id="thumbnail">
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
											<input type="text" class="form-control" name="thumbnailAlt" id="thumbnailAlt" placeholder="Enter Alt Text">
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
											<input type="file" class="form-control-file form-control" name="feature" id="feature">
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
											<input type="text" class="form-control" name="featureAlt" id="featureAlt" placeholder="Enter Alt Text">
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
									<input type="text" class="form-control" onkeypress="generateUrl(this, 'pageurl')" name="heading" id="heading" placeholder="Enter Title">
								</div>
							</div><!---------box---------->

							<div class="box">
								<div class="admin-text">
									<span>Page Url:</span>
								</div>
								<div class="input-sec custom_input_sec">
									<input type="text" class="form-control" name="pageurl" id="pageurl" placeholder="Page Url">
								</div>
							</div><!---------box---------->

							<div class="box">
								<div class="admin-text">
									<span>
									Description:
									</span>
								</div>
								<div class="input-sec custom_input_sec">
									<textarea name="ckservices" id="ckservices"></textarea>
								</div>
							</div><!---------box---------->
							<div class="btn-save">
								<button class="save-btn" id="submit">Save</button>
							</div><br><br>
					</div>
				</div>
			</div>
		</form>
	</div>
</section>

<?php 
	include_once 'layout/footer/footer.php';
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" ></script>
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

<script>
	CKEDITOR.replace("ckservices");
	// CKEDITOR.instances["ckplot"].setData("<h1> data to render</h1>");
</script>
<script src="vendor/addservices.js" ></script>
