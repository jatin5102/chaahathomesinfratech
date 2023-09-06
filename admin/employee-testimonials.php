<?php 
	include_once 'config/conn.php';
	include_once 'layout/header/header.php';
	include_once 'layout/side-nav/left-side-nav.php';
?>

<section class="microsite-area">
<div class="inner-micro-structure">
    <div class="left-area">


      <div class="microbox">
        <div class="head-box">
          <h6><i class="fa fa-building" aria-hidden="true"></i> Add Employee Testimonials</h6>
        </div>

          <div class="box-two">
            <div class="admin-text">
              <span>Employee name</span>
            </div>
            <div class="input-sec-multi">
            <input type="text" class="form-control" placeholder="" id="name">
            <div id="name_err" class="text-danger"></div>
            </div>
        </div><!-------------box-2-------->

        <div class="box-two">
            <div class="admin-text">
              <span>Image</span>
              <small>Image Size 800*500 Only</small>
            </div>
            <div class="input-sec-multi">
            <input type="file" class="form-control-file form-control" id="image">
            <div id="image_err" class="text-danger"></div>
            <div class="inner-box">
              <div class="img-box">
                 </div>
            </div>
            </div>
        </div><!-------------box-2-------->
        <div class="box-two">
            <div class="admin-text">
              <span>Designation</span>
            </div>
            <div class="input-sec-multi">
            <input type="text" class="form-control" placeholder="" id="designation">
            <div id="designation_err" class="text-danger"></div>
            </div>
        </div><!-------------box-2-------->
        <div class="box-two">
            <div class="admin-text">
              <span>Paragraph</span>
            </div>
            <div class="input-sec-multi">
            <input type="text" class="form-control" placeholder="" id="description">
            <div id="description_err" class="text-danger"></div>
            </div>
        </div><!-------------box-2-------->
      </div>
      <div class="btn-save">
        <input type="hidden" id="hiddenId">
        <input type="hidden" id="oldImage">
      <button class="save-btn" id="update">Update</button>
      <button class="save-btn" id="submit">Save</button>
    </div>
    <br><br>
    </div>
    <div class="right-area">
            <div class="microbox">
        <div class="head-box">
          <h6><i class="fa fa-building" aria-hidden="true"></i> Edit Employee Testimonials</h6>
        </div>

        <div class="inner-table">
     <table class="table">
            <thead>
              <tr>
                <th>Employee Name</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                $sql = "SELECT * FROM testimonials_emp ORDER BY id desc";
                $result = mysqli_query($conn, $sql);
                if(!$result){
                  die('Query failed '. mysqli_error($conn));
                }

                while($row = mysqli_fetch_assoc($result)){
                  $id = $row['id'];
                  $name = $row['name'];
                  echo "<tr>";
                  echo "<td><h6>".$name."</h6></td>";
                  echo "<td><a href='javascript:void(0)' onclick=editTestimonial($id)><i class='fa fa-pencil' aria-hidden='true'></i></a></td>";
                  echo "<td><a href='javascript:void(0)' onclick=deleteTestimonial($id)><i class='fa fa-times' aria-hidden='true'></i></a></td>";
                  echo "</tr>";
                }
                ?>
            
             
            </tbody>
          </table>
        </div>

    </div>
       <hr>
  </div>

<!-----------------------------------------------edit-------------------------------------------->
<!-- <div class="edit-section-heading">
  <h2>Edit/Delete Project Details : :</h2>
</div>
<div class="edit-inner-micro-structure">
<div class="left-area">
  <div class="edit-microbox"></div>
</div>
<div class="right-area">
  <div class="edit-microbox"></div>
</div>
</div> -->
</section>



<?php 
	include_once 'layout/footer/footer.php';
?>

<script>

function validation(){
  var flag = true
  var name = $('#name').val()
  if(name == ''){
    $('#name_err').html('Name is Required')
    flag = false
  }else{
    $('#name_err').html('')
  }

  var image = $('#image')[0].files;

  if(image.length == 0){
    $('#image_err').html('Image is required')
    flag = false
  }
  else if(image.length != 0){
    var validExt = ['jpg','png', 'JPEG', 'jpeg']
    var extension = $('#image')[0].files[0].type.split('/')[1]
    if(validExt.indexOf(extension) == -1){
      $('#image_err').html('Upload jpg, png only')
      flag = false
    }else{
      $('#image_err').html('')
    }
  }
  else{
    $('#image_err').html('')
  }

  var designation = $('#designation').val()
  if(designation == ''){
    $('#designation_err').html('Designation is Required')
    flag = false
  }
  else{
    $('#designation_err').html('')
  }

  var description = $('#description').val()
  if(description == ''){
    $('#description_err').html('Paragraph is Required')
    flag = false
  }
  else{
    $('#description_err').html('')
  }


//on keyup // 
$('#name').on('change',function(){
  var name = $('#name').val()
  if(name == ''){
    $('#name_err').html('Name is Required')
    flag = false
  }else{
    $('#name_err').html('')
  }
})

$('#image').on('change',function(){
  var image = $('#image')[0].files;

  if(image.length == 0){
    $('#image_err').html('Image is required')
    flag = false
  }
  else if(image.length != 0){
    var validExt = ['jpg','png', 'JPEG', 'jpeg']
    var extension = $('#image')[0].files[0].type.split('/')[1]
    if(validExt.indexOf(extension) == -1){
      $('#image_err').html('Upload jpg, png only')
      flag = false
    }else{
      $('#image_err').html('')
    }
  }
  else{
    $('#image_err').html('')
  }
})

$('#designation').on('keyup',function(){
  var designation = $('#designation').val()
  if(designation == ''){
    $('#designation_err').html('Designation is Required')
    flag = false
  }
  else{
    $('#designation_err').html('')
  }
})

$('#description').on('keyup',function(){
  var description = $('#description').val()
  if(description == ''){
    $('#description_err').html('Paragraph is Required')
    flag = false
  }
  else{
    $('#description_err').html('')
  }

})

if(flag){
  return true
}else{
  return false
}

}


$('#update').hide()

function editTestimonial(id){
  $('#update').show()
  $('#submit').hide()
  $('#hiddenId').val(id);
  $(".loader-icon-head").css('display', 'flex');
  $.ajax({
    url:'ajax/testimonials/ajax-testimonials-edit.php',
    type:'post',
    data: {'id':id},
    success:function(data){
      var jsonData = JSON.parse(data)
      $('#name').val(jsonData.name)
      $('.img-box').html('<img src="uploads/testimonials/'+jsonData.image+'">')
      // $('#image').val(jsonData.image)
      $('#designation').val(jsonData.designation)
      $('#description').val(jsonData.description)
      $('#oldImage').val(jsonData.image);
      $(".loader-icon-head").css('display', 'none');
    }
  })
}

function deleteTestimonial(id){
  $(".loader-icon-head").css('display', 'flex');
  $.ajax({
    url:'ajax/testimonials/ajax-testimonials-delete.php',
    type:'post',
    data:{'id':id},
    success:function(data){
      $(".loader-icon-head").css('display', 'none');
      window.location.reload()
    }
  })
}

//INSERT testimonials //

$('#submit').on('click',function(){

  if(!validation()){
  return false;
}

var name = $('#name').val()
var image = $('#image')[0].files[0]
var designation = $('#designation').val()
var description = $('#description').val()

var fd = new FormData()
fd.append('name', name)
fd.append('image', image)
fd.append('designation',designation)
fd.append('description', description)
$(".loader-icon-head").css('display', 'flex');
$.ajax({
  url:'ajax/testimonials/ajax-testimonials-insert.php',
  type:'post',
  data: fd,
  contentType:false,
  processData:false,
  success:function(data){
  // $('#name').val('')
  // $('#image').val('')
  // $('#designation').val('')
  // $('#description').val('')
  // window.location.reload()
  $(".loader-icon-head").css('display', 'none');
  window.location.reload()
  }

})
})

//Update testimonials //
$('#update').on('click',function(){

var id = $('#hiddenId').val()
var oldImage = $('#oldImage').val()
var name = $('#name').val()
var image = $('#image')[0].files[0]
var designation = $('#designation').val()
var description = $('#description').val()

var fd = new FormData()
fd.append('id', id)
fd.append('name', name)
fd.append('image', image)
fd.append('oldImage', oldImage)
fd.append('designation', designation)
fd.append('description', description)
$(".loader-icon-head").css('display', 'flex');
$.ajax({
  url:'ajax/testimonials/ajax-testimonials-update.php',
  type:'post',
  data: fd,
  contentType:false,
  processData:false,
  success:function(data){
  // $('#name').val('')
  // $('#image').val('')
  // $('#oldImage').val('')
  // $('#designation').val('')
  // $('#description').val('')
  // $('#update').hide()
  // $('#submit').show()
  $(".loader-icon-head").css('display', 'none');
  window.location.reload()
  // console.log(data)
  }
})
})


</script>