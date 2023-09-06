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
          <h6><i class="fa fa-building" aria-hidden="true"></i> Add Blogs</h6>
        </div>
        <div class="box-two">
            <div class="admin-text">
              <span>Select Date</span>
            </div>
            <div class="input-sec" style="display:block">
              <input type="date" class="form-control" id="date">
              <div id="date_err" class="text-danger"></div>
            </div>
        </div><!-------------box-2-------->
        <div class="box-two">
            <div class="admin-text">
              <span>Image</span>
              <small>Image Size 800*500 Only</small>
            </div>
            <div class="input-sec-multi">
            <input type="file" class="form-control-file form-control" id="blogimage">
            <div id="blogimage_err" class="text-danger"></div>
            <div class="inner-box">
              <div class="img-box">
                <div id="img_thumbnail"></div>
                 </div>
            </div>
            </div>
        </div><!-------------box-2-------->

        <div class="box-two">
            <div class="admin-text">
              <span>Heading</span>
            </div>
            <div class="input-sec-multi">
            <input type="text" class="form-control" placeholder="" id="blogHeading">
            <div id="blogHeading_err" class="text-danger"></div>
            </div>
        </div><!-------------box-2-------->
        <div class="box-two">
            <div class="admin-text">
              <span>Sub Heading</span>
            </div>
            <div class="input-sec-multi">
            <input type="text" class="form-control" placeholder="" id="subHeading">
            <div id="subHeading_err" class="text-danger"></div>
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
      <input type="hidden" id="hiddenId">
      <input type="hidden" id="oldImage">
      <div class="btn-save">
      <button class="save-btn" id="submit">Save</button>
      <button class="save-btn" id="update">Update</button>
    </div>
    <br><br>
    </div>
    <div class="right-area">
            <div class="microbox">
        <div class="head-box">
          <h6><i class="fa fa-building" aria-hidden="true"></i> Edit Blogs</h6>
        </div>

        <div class="inner-table">
     <table class="table">
            <thead>
              <tr>
                <th>State Name</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody id="blogDetails">
            
            </tbody>
          </table>
        </div>


      
    </div>
    <hr>
  </div>

</section>


<?php 
	include_once 'layout/footer/footer.php';
?>

<script>

function validation(){
  var flag = true
  var date = $('#date').val()
  if(date == ''){
    $('#date_err').html('Date is Required')
    flag = false
  }else{
    $('#date_err').html('')
  }

  var image = $('#blogimage')[0].files;

  if(image.length == 0){
    $('#blogimage_err').html('Image is required')
    flag = false
  }
  else if(image.length != 0){
    var validExt = ['jpg','png', 'JPEG', 'jpeg']
    var extension = $('#blogimage')[0].files[0].type.split('/')[1]
    if(validExt.indexOf(extension) == -1){
      $('#blogimage_err').html('Upload jpg, png only')
      flag = false
    }else{
      $('#blogimage_err').html('')
    }
  }
  else{
    $('#blogimage_err').html('')
  }

  var heading = $('#blogHeading').val()
  if(heading == ''){
    $('#blogHeading_err').html('Heading is Required')
    flag = false
  }
  else{
    $('#blogHeading_err').html('')
  }

  // var subHeading = $('#subHeading').val()
  // if(subHeading == ''){
  //   $('#subHeading_err').html('Sub Heading is Required')
  // }

  var paragraph = $('#description').val()
  if(paragraph == ''){
    $('#description_err').html('Paragraph is Required')
    flag = false
  }
  else{
    $('#description_err').html('')
  }


//on keyup // 
$('#date').on('change',function(){
var date = $('#date').val()
  if(date == ''){
    $('#date_err').html('Date is Required')
  }else{
    $('#date_err').html('')
  }
})

$('#blogimage').on('change',function(){
  var image = $('#blogimage')[0].files;

  if(image.length == 0){
    $('#blogimage_err').html('Image is required')
  }
  else if(image.length != 0){
    var validExt = ['jpg','png', 'JPEG', 'jpeg']
    var extension = $('#blogimage')[0].files[0].type.split('/')[1]
    if(validExt.indexOf(extension) == -1){
      $('#blogimage_err').html('Upload jpg, png only')
    }else{
      $('#blogimage_err').html('')
    }
  }
  else{
    $('#blogimage_err').html('')
  }
})

$('#blogHeading').on('keyup',function(){
  var heading = $('#blogHeading').val()
  if(heading == ''){
    $('#blogHeading_err').html('Heading is Required')
  }
  else{
    $('#blogHeading_err').html('')
  }
})

$('#description').on('keyup',function(){
var paragraph = $('#description').val()
  if(paragraph == ''){
    $('#description_err').html('Paragraph is Required')
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
blogDetails()
//editing mode //
function blogDetails(){
  $(".loader-icon-head").css('display', 'flex');
$.ajax({
  url:'ajax/blogs/ajax-blog-edit.php',
  type:'post',
  success:function(data){
    var jsonData = JSON.parse(data)
    $('#blogDetails').html(jsonData)
    $(".loader-icon-head").css('display', 'none');
  }
  })
}


function editBlog(id){
  $('#submit').hide()
  $('#update').show()
  $(".loader-icon-head").css('display', 'flex');
  $.ajax({
    url:'ajax/blogs/ajax-edit-show-blog.php',
    type:'post',
    data:{'id':id},
    success:function(data){
      var jsonData = JSON.parse(data)
      // console.log(jsonData)
      $('#hiddenId').val(jsonData.id)
      $('#oldImage').val(jsonData.image)
      $('#date').val(jsonData.blogDate)
      // $('#img_thumbnail').html('<img src="../admin/uploads/blogs/'+jsonData.image+'"><i class="fa fa-times" aria-hidden="true"></i>')
      $('#img_thumbnail').html('<img src="../admin/uploads/blogs/'+jsonData.image+'">')
      $('#blogHeading').val(jsonData.heading)
      $('#subHeading').val(jsonData.subHeading)
      $('#description').val(jsonData.description)
      $(".loader-icon-head").css('display', 'none');
    }
  })
}

function deleteBlog(id){
  $(".loader-icon-head").css('display', 'flex');
  $.ajax({
    url:'ajax/blogs/ajax-blog-delete.php',
    type:'post',
    data: {'id':id},
    success:function(data){
      console.log(data)
      $(".loader-icon-head").css('display', 'none');
      blogDetails()
     
    }
  })

}


$('#submit').on('click',function(){

if(!validation()){
  return false;
}

var date = $('#date').val();

var image = $('#blogimage')[0].files[0];
var blogHeading = $('#blogHeading').val();
var blogSubHeading = $('#subHeading').val();
var description = $('#description').val();

var fd = new FormData();
fd.append('date', date)
fd.append('image', image)
fd.append('heading', blogHeading)
fd.append('subHeading', blogSubHeading)
fd.append('description', description)

$(".loader-icon-head").css('display', 'flex');
$.ajax({
  url:'ajax/blogs/ajax-blog-insert.php',
  type:'post',
  data:fd,
  contentType:false,
  processData:false,
  success:function(data){
  $('#blogimage').val('');
  $('#blogHeading').val('');
  $('#subHeading').val('');
  $('#description').val('');
  $(".loader-icon-head").css('display', 'none');
    blogDetails()
   
  }
})
})


$('#update').on('click',function(){
var id = $('#hiddenId').val()
var oldImage = $('#oldImage').val()
var date = $('#date').val()

var image = $('#blogimage')[0].files[0]
var blogHeading = $('#blogHeading').val()
var blogSubHeading = $('#subHeading').val()
var description = $('#description').val()

var fd = new FormData()
fd.append('hiddenId', id)
fd.append('date', date)
fd.append('image', image)
fd.append('oldImage', oldImage)
fd.append('heading', blogHeading)
fd.append('subHeading', blogSubHeading)
fd.append('description', description)
$(".loader-icon-head").css('display', 'flex');
$.ajax({
  url:'ajax/blogs/ajax-blog-update.php',
  type:'post',
  data:fd,
  contentType:false,
  processData:false,
  success:function(data){
    console.log(data)
  $('#oldImage').val('')
  $('#hiddenId').val('')
  $('#img_thumbnail').html('')
  $('#date').val('');
  $('#blogimage').val('');
  $('#blogHeading').val('');
  $('#subHeading').val('');
  $('#description').val('');
  $('#update').hide()
  $('#submit').show()
  $(".loader-icon-head").css('display', 'none');
    blogDetails()
   
  }
})
})

</script>