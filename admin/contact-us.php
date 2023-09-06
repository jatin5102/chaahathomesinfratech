<?php 
	include_once 'config/conn.php';
	include_once 'layout/header/header.php';
	include_once 'layout/side-nav/left-side-nav.php';
?>


<section class="state-back other-body-width">
  <div class="project-edit-list-sec project-edit-list-sec-full">
  <div class="list-area box-border full-border-box">
    <h6><i class="fa fa-building" aria-hidden="true"></i> Job Application</h6>
     <div class="inner-table">
     <table class="table">
            <thead>
              <tr>
                <th>Sr. No.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Message</th>
				<th>Delete</th>
              </tr>
            </thead>
            <tbody>
            <?php
            $sql = "SELECT * FROM contact_us ORDER BY ID DESC";
            $result = mysqli_query($conn, $sql);
			if(mysqli_num_rows($result) > 0){
				$num = 1;
				while($row = mysqli_fetch_assoc($result)){
					$id = $row['id'];
					$name = $row['name'];
					$email = $row['email'];
					$mobile = $row['phone'];
					$msg = $row['message'];
					?>
					<tr>
						<td><?php echo $num ?></td>
						<td><?php echo $name ?></td>
						<td><?php echo $email ?></td>
						<td><?php echo $mobile ?></td>
						<td><?php echo $msg ?></td>
						<td><a href="javascript:void(0)" onclick="dlt_contact(<?php echo $id ?>)"><i class="fa fa-times" aria-hidden="true"></i></a></td>
					</tr>
            <?php

				$num++;}
        
			}	
            ?>

              
              
            </tbody>
          </table>
        </div>
  </div>

  </div><!------------list-sec---------->
</section>

<?php 
	include_once 'layout/footer/footer.php';
?>

<script>
	function dlt_contact(id){
		$(".loader-icon-head").css('display', 'flex');
		
		$.ajax({
			url : 'ajax/contact/ajax-contact-dlt.php',
			type : 'POST',
			data : {'id' : id},
			success : function(data){
				if(data == 'success'){
					$(".loader-icon-head").css('display', 'none');
					window.location.reload();
				}
			}
		})
	}
</script>