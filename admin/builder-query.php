<?php 
	include_once 'config/conn.php';
	include_once 'layout/header/header.php';
	include_once 'layout/side-nav/left-side-nav.php';
?>


<section class="state-back other-body-width">
  <div class="project-edit-list-sec project-edit-list-sec-full">
  <div class="list-area box-border full-border-box">
    <div class="head-list-area-other-l">
        <h6><i class="fa fa-building" aria-hidden="true"></i> All Query</h6>

        <div class="input-group mb-4">
        <select style="max-width: 350px;margin-left: auto;" id="selectQueries" class="form-control" onchange=changeQuery()>
        <option value='<?php echo $_GET['id']?>'>Select</option>
        <?php
        $sql = "SELECT DISTINCT developer_id FROM property_query";
        $result = mysqli_query($conn, $sql);

       
        
        while($row = mysqli_fetch_assoc($result)){
          $builderName = "SELECT * FROM developer WHERE id='$row[developer_id]'";
          $result1 = mysqli_query($conn, $builderName);
          $NameRow = mysqli_fetch_assoc($result1);
          $Name = $NameRow['name'];


          echo "<option value='$row[developer_id]'>$Name</option>";
        }
          

          ?>
         </select>
      </div>
      </div>


     <div class="inner-table">
     <table class="table">
            <thead>
              <tr>
                <th>Sr. No.</th>
                <th>Builder/Project Name</th>
                <th>Name</th>
                <th>Type</th>
                <th>E-Mail</th>
                <th>Message</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody id="QueriesbyId">
              <?php
              $id = $_GET['id'];
             

              $sql = "SELECT * FROM property_query WHERE developer_id='$id'";
              $result = mysqli_query($conn, $sql);
              $query = '';
              $num = 1;
              if(mysqli_num_rows($result) > 0){
              while($row = mysqli_fetch_assoc($result)){
                $sqlBuilderName = "SELECT name FROM developer WHERE id='$id'";
                $sqlBuilderName_result = mysqli_query($conn,$sqlBuilderName);
                $row3 = mysqli_fetch_assoc($sqlBuilderName_result);
                $builderName = $row3['name'];
                $Queryid = $row['id'];
                $pname = $row['property_name'];
                $name = $row['name'];
                $project_type = $row['property_type_modal'];
                $email = $row['email'];
                $description = $row['description'];
                $query .= '<tr>
                <td>'.$num.'</td>
                <td><span>'.$builderName.'</span><br><span>'.$pname.'</span></td>
                <td>'.$name.'</td>
                <td>'.$project_type.'</td>
                <td>'.$email.'</td>
                <td>'.$description.'</td>
                <td><a href="javascript:void(0)" onclick=deletQuery('.$Queryid.')><i class="fa fa-times" aria-hidden="true"></i></a></td>
              </tr>';
              $num++;}
              echo $query;
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
function changeQuery(){

var id = $('#selectQueries').val()

  $.ajax({
  url:'ajax/builderQueries/ajax-builder-queries.php',
  type:'post',
  data:{'id':id},
  success:function(data){
    $('#QueriesbyId').html(data)
    // console.log(data)
  }
})
}

function deletQuery(id){
$.ajax({
  url:'ajax/builderQueries/ajax-builder-queries-delete.php',
  type:'post',
  data:{'id':id},
  success:function(data){
    window.location.reload()
  }
})
}


</script>