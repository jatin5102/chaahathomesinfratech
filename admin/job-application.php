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
                <th>Candidate Name</th>
                <th>E-Mail</th>
                <th>Phone</th>
                <th>Job Title</th>
                <th>Experience</th>
                <th>Message</th>
                <th>CV</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
            <?php
            $sql = "SELECT * FROM jobapplication ORDER BY ID DESC";
            $result = mysqli_query($conn, $sql);

            if(!$result){
              die('Query failed '.mysqli_error($conn));
            }
            $num = 1;
            while($row = mysqli_fetch_assoc($result)){
                $id = $row['id'];
                $name = $row['name'];
                $email = $row['email'];
                $mobile = $row['mobile'];
                $position = $row['position'];
                $description = $row['description'];
                $experience = $row['experience'];
                $resume = $row['resume'];
                ?>
                <tr>
                <td><?php echo $num ?></td>
                <td><?php echo $name ?></td>
                <td><?php echo $email ?></td>
                <td><?php echo $mobile ?></td>
                <td><?php echo $position ?></td>
                <td><?php echo $experience ?></td>
                <td><?php echo $description ?></td>
                <td><a href="uploads/jobapplication/<?php echo $resume ?>" download="" alt=""><i class="fa fa-file"></i></a></td>
                <td><a href="javascript:void(0)" onclick="deletejob(<?php echo $id ?>)"><i class="fa fa-times" aria-hidden="true"></i></a></td>
              </tr>
            <?php

            $num++;}
        

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

function deletejob(id){
  $(".loader-icon-head").css('display', 'flex');
  $.ajax({
    url:'ajax/workwithus/ajax-jobapplication-delete.php',
    type:'post',
    data:{'id':id},
    success:function(data){
      // console.log(data)
      $(".loader-icon-head").css('display', 'none');
      window.location.reload()
    }
  })
}

</script>