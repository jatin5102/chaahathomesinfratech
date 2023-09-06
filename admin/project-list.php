<?php 
	include_once 'include/function.php';
	include_once 'config/conn.php';
	include_once 'layout/header/header.php';
	include_once 'layout/side-nav/left-side-nav.php';
	
	
?>

<section class="state-back other-body-width">
	<div class="project-edit-list-sec">
		<div class="list-area box-border">
			<h6><i class="fa fa-building" aria-hidden="true"></i> Residential Projects</h6>
			<div class="inner-table">
				<table class="table">
					<thead>
						<tr>
							<th>Sr. No.</th>
							<th>Project Name</th>
							<th>View</th>
							<th>Edit</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$sql_res = "SELECT * FROM micro_site WHERE cat_id = 1 ORDER BY id DESC";
							$query_res = mysqli_query($conn, $sql_res);
							if(mysqli_num_rows($query_res) > 0){
								$count = 1;
								while($row_res = mysqli_fetch_array($query_res)){
						?>
						
								<tr>
									<td><?php echo $count;?></td>
									<td><?php echo $row_res['name']; ?></td>
									<td><span><i class="fa fa-eye"></i></span></td>
									<td><span><a href="micro-site-update.php?id=<?php echo encryptor('encrypt',$row_res['id']); ?>"><i class="fa fa-pencil" aria-hidden="true"></i><a></span></td>
									<td><span onclick="dlt_property_project(<?php echo $row_res['id'] ?>)"><i class="fa fa-times" aria-hidden="true"></i></span></td>
								</tr>
						
						<?php	
								$count++;}
							}
						?>
					</tbody>
				</table>
			</div>

		</div>

		<div class="list-area box-border">
			<h6><i class="fa fa-building" aria-hidden="true"></i> Commercial Projects</h6>
			<div class="inner-table">
				<table class="table">
					<thead>
						<tr>
							<th>Sr. No.</th>
							<th>Project Name</th>
							<th>View</th>
							<th>Edit</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$sql_res = "SELECT * FROM micro_site WHERE cat_id = 2 ORDER BY id DESC";
							$query_res = mysqli_query($conn, $sql_res);
							if(mysqli_num_rows($query_res) > 0){
								$count = 1;
								while($row_res = mysqli_fetch_array($query_res)){
						?>
						
								<tr>
									<td><?php echo $count;?></td>
									<td><?php echo $row_res['name']; ?></td>
									<td><span><i class="fa fa-eye"></i></span></td>
									<td><span><a href="micro-site-update.php?id=<?php echo encryptor('encrypt',$row_res['id']) ?>"><i class="fa fa-pencil" aria-hidden="true"></i><a></span></td>
									<td><span onclick="dlt_property_project(<?php echo $row_res['id'] ?>)"><i class="fa fa-times" aria-hidden="true"></i></span></td>
								</tr>
						
						<?php	
								$count++;}
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div><!------------list-sec---------->

	<!--<div class="container pagination-area">         
		<ul class="pagination">
			<li class="page-item"><a class="page-link" href="#">Previous</a></li>
			<li class="page-item"><a class="page-link" href="#">1</a></li>
			<li class="page-item"><a class="page-link" href="#">2</a></li>
			<li class="page-item"><a class="page-link" href="#">3</a></li>
			<li class="page-item"><a class="page-link" href="#">Next</a></li>
		</ul>
	</div>-->
</section>	

<?php 
	include_once 'layout/footer/footer.php';
?>

<script>
	function dlt_property_project(id){
		
		$(".loader-icon-head").css('display', 'flex');
		$.ajax({
			url : 'ajax/microsite/ajax-microsite-property-dlt.php',
			type : 'POST',
			data : {id},
			success : function(resp){
				if(resp == 'success'){
					$(".loader-icon-head").css('display', 'none');
					window.location.reload();
				}
			}
		})
	}
</script>