<?php 
	include_once 'layout/header/header.php';
	include_once 'layout/side-nav/left-side-nav.php';
	include_once 'config/conn.php';
	include_once 'include/function.php';
	$update_id = '';
	$win_images = '';
	$win_video = '';
	$win_video_url = '';
	
	$small_images = '';
	$small_video = '';
	$small_video_url = '';
	
	if(isset($_GET['id'])){
		$update_id = $_GET['id'];
		$eid = encryptor('decrypt',$_GET['id']);
		include_once 'layout/side-nav/right-side-nav.php';
		
		
	}
?>
<section class="microsite-area">
<div class="row">
<div class="col-md-12">
		<form action="" id="addothermicrosites">
			<input type="hidden" name="eid" value="<?=  encryptor('encrypt',$eid) ?>" id="">
		<div class="">
			<div class="microbox">
				<div class="head-box">
					<h6><i class="fa fa-building" aria-hidden="true"></i> Add Items</h6>
				</div>
			
			
				<div class="box-two">
					<div class="admin-text">
						<span>Descriptions </span>
						
					</div>
					<div class="input-sec-multi">
					<input type="text" class="form-control" name="heading" placeholder="Heading" id="heading"  >

					</div>
				</div><!-------------box-2-------->
				<div class="box-two">
					<div class="admin-text">
						<span> Descriptions</span>
					</div>
					<div class="input-sec custom_input_sec">
						<textarea class="form-control" name="descriptions"id="descriptions" placeholder="Descriptions" ></textarea>

					
					</div>
				</div><!-------------box-2-------->
				<div class="btn-save">
			 <button class="save-btn" id="submit">Add Data</button>  
			</div>
			</div>
			
		
		</div>
		</form>
	
	</div>


	<div class="col-md-12 list-area box-border">
			<h6><i class="fa fa-building" aria-hidden="true"></i> All Items</h6>
			<div class="inner-table">
				<table class="table">
					<thead>
						<tr>
							<th>Sr. No.</th>
							<th>heading</th>
							<th>Descriptions</th>
							<th>Edit</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tbody>
								
					<?php  
						$allbanenrq = mysqli_query($conn, "SELECT * FROM `micro_specifications` WHERE project_id=".$eid."");
							if($allbanenrq->num_rows >0){
								$sno=1;
								while ($data=mysqli_fetch_assoc($allbanenrq)) {
										echo  '<tr>
										<td>'.$sno.'</td>
										<td><span>'.$data['heading'].'</span></td>
										<td><span  onclick="viewtext(`Descriptions`,`'.$data['descriptions'].'`)"><i class="fa fa-eye"></i></span></td>
										<td><span><a href="javascript:void(0);" class="editothermicrosites" dataid="'.encryptor('encrypt',$data['id']).'"><i class="fa fa-pencil" aria-hidden="true"></i></a><a></a></span></td>
										<td><span  class="" onclick="deleteData(`micro_specifications`,`id`,`'.encryptor('encrypt',$data['id']).'`)" ><i class="fa fa-times" aria-hidden="true"></i></span></td>
									</tr>';
									$sno++;
								}
							}


					
					?>
								
						
											</tbody>
				</table>
			</div>
		</div>
</div>

</section>

<?php 
	include_once 'layout/footer/footer.php';
	include_once 'include/modal.php';
?>


<div class="modal fade zoomIn" id="updaemicrobanners" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content border-0">
                        <div class="modal-header p-3 bg-soft-success">
                                <h5 class="modal-title" id="modal-heading-append">Title</h5>
                                <button type="button" class="fa fa-times" data-dismiss="modal" id="addProjectBtn-close" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
							<form action="" id="updateothermicrodata">
								<div class="form-group">
									<label for="">Heading</label>
									<input type="text" name="updateheading" id="updateheading" class="form-control">
								</div>

								<div class="form-group">
									<label for="">Descriptions</label>
									<textarea name="updatedescriptions" class="form-control" id="updatedescriptions" cols="30" rows="10"></textarea>
								</div>

								<button class="btn btn-sm btn-info">Submit</button>
							</form>
                        </div>
                </div>
        </div>
</div>
<script src="vendor/specifications.js"></script>

