<?php 
	include_once 'config/conn.php';
	include_once 'include/function.php';
	include_once 'layout/header/header.php';
	include_once 'layout/side-nav/left-side-nav.php';
?>

<br/>
<br/>
<section class="microsite-area">
	<div class="inner-micro-structure">
		<div class="row">
		
			<div class="col-md-12">
				
				<div class="microbox">
					<div class="head-box">
						<h6><i class="fa fa-building" aria-hidden="true"></i> All Services</h6>
					</div>

					<div class="btn-save mb-5">
						<a class="btn save-btn" id="submit" href="add-services.php">Add Service</a>
					</div>

					<div class="inner-table">
						<hr>
						<table class="table tabletwo">
							<thead>
								<tr>
									<th>Title</th>
									<th>Page Url</th>
									<th>Image</th>
									<th class="space-create">Edit</th>
								</tr>
							</thead>
							<tbody id="add_more_price_list">

								<?php 
									$query = mysqli_query($conn, "SELECT * FROM services ORDER BY id DESC");
									if(mysqli_num_rows($query) > 0){
										$count = 0;
										while($row = mysqli_fetch_assoc($query)){
								?>
											<tr>
												<td><?php echo $row['title'] ?></td>
												<td><?php echo $row['page_url'] ?></td>
												<td>
													<img src="<?= BASE_URL ?>admin/<?php echo $row['feature'] ?>" alt="thumbnail" class="thumbnail" />
												</td>
												<td class="edit">
													<span><a href="update-services.php?sid=<?php echo encryptor('encrypt',$row['id']); ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></span>
													<span><a href="javascript:void(0)" dataid="<?php echo encryptor('encrypt',$row['id']); ?>" class="deleteservices"><i class="fa fa-times" aria-hidden="true"></i></a><span>
												</td>
											</tr>
								<?php			
										$count++;}
									}
								?>
							</tbody>
						</table>
					</div>
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
<script src="vendor/deleteservices.php"></script>
