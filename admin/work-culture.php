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
          <h6><i class="fa fa-building" aria-hidden="true"></i> Add Work Culture gallery</h6>
        </div>
        <div class="box-two">
            <div class="admin-text">
              <span>Heading</span>
            </div>
            <div class="input-sec-multi">
            <input type="text" class="form-control" placeholder="some text here" id="heading">
            <div class="text-danger" id="heading_err"></div>
            </div>
        </div><!-------------box-2-------->
        <div class="box-two">
            <div class="admin-text">
              <span>Select Date</span>
            </div>
            <div class="input-sec" style="display:block">
              <input type="date" class="form-control" placeholder="" id="date">
              <div class="text-danger" id="date_err"></div>
            </div>
        </div><!-------------box-2-------->
        <div class="box-two">
            <div class="admin-text">
              <span>Images</span>
              <small>Images Size 800*500 Only</small>
            </div>
            <div class="input-sec-multi">
            <input type="file" class="form-control-file form-control" id="images" multiple>
            <div class="text-danger" id="images_err"></div>
            <div class="inner-box" id="multiImages">
            
              </div>
            </div>
        </div><!-------------box-2-------->

        <div class="box-two">
            <div class="admin-text">
              <span>Videos</span>
              <small>Video Size Maximum 5mb Only</small>
            </div>
            <div class="input-sec-multi">
            <input type="file" class="form-control-file form-control" id="videos" multiple>
            <div class="text-danger" id="videos_err"></div>
            <div class="inner-box" id="multiVideos">
             </div>
            </div>
        </div>

      </div>
      <div class="btn-save">
        <input type="hidden" id="hiddenId">
        <input type="hidden" id="oldImages">
        <input type="hidden" id="oldVideos">
      <button class="save-btn" id="update">Update</button>
      <button class="save-btn" id="submit">Save</button>
    </div>
    <br><br>
    </div>
    <div class="right-area">
            <div class="microbox">
        <div class="head-box">
          <h6><i class="fa fa-building" aria-hidden="true"></i> Edit Work Culture Gallery</h6>
        </div>

        <div class="inner-table">
     <table class="table">
            <thead>
              <tr>
                <th>Gallery Name</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody id="showDetails">
          
            </tbody>
          </table>
        </div>

    </div>
  </div>

  <?php 
	include_once 'layout/footer/footer.php';
?>

<script>
showDetails()
$('#update').hide()

function showDetails(){
  $(".loader-icon-head").css('display', 'flex');
  $.ajax({
    url:'ajax/work-culture/ajax-work-culture-show.php',
    type:'post',
    success:function(data){
      var jsonData = JSON.parse(data)
      $('#showDetails').html(jsonData)
      $(".loader-icon-head").css('display', 'none');
    }
  })
}

function editworkculture(id){
  $('#update').show()
  $('#submit').hide()
  $(".loader-icon-head").css('display', 'flex');
  $.ajax({
    url:'ajax/work-culture/ajax-work-culture-edit.php',
    type:'post',
    data:{'id':id},
    success:function(data){
      var jsonData = JSON.parse(data)
      // console.log(jsonData)
      $('#hiddenId').val(jsonData.id)
      $('#heading').val(jsonData.heading)
      $('#date').val(jsonData.date)
      $('#multiImages').html(jsonData.images)
      $('#multiVideos').html(jsonData.videos)
      $('#oldImages').val(jsonData.oldImages)
      $('#oldVideos').val(jsonData.oldVideos)
      // console.log(data)
      $(".loader-icon-head").css('display', 'none');
    }
  })
}

function deleteworkculture(id){
  $(".loader-icon-head").css('display', 'flex');
  $.ajax({
    url:'ajax/work-culture/ajax-work-culture-delete.php',
    type:'post',
    data:{'id':id},
    success:function(data){
      $('#heading').val('')
      $('#date').val('')
      $('#images').val('')
      $('#videos').val('')
      showDetails()
      $(".loader-icon-head").css('display', 'none');
    }
  })
}


function deleteImageName(name,id){
  $(".loader-icon-head").css('display', 'flex');
  $.ajax({
    url:'ajax/work-culture/ajax-work-culture-singleImg-delete.php',
    type:'POST',
    data:{'id':id, 'name':name},
     success:function(data){
      $(".loader-icon-head").css('display', 'none');
      window.location.reload()
    }
  })
}


function deleteVideoName(name,id){
  $(".loader-icon-head").css('display', 'flex');
  $.ajax({
    url:'ajax/work-culture/ajax-work-culture-singleVdo-delete.php',
    type:'POST',
    data:{'id':id, 'vdoname':name},
     success:function(data){
      $(".loader-icon-head").css('display', 'none');
      window.location.reload()
    }
  })
}


function validation(){
  flag = true
  var heading = $('#heading').val()

  if(heading == ''){
    $('#heading_err').html('Field Required')
    flag = false
  }else{
    $('#heading_err').html('')
  }

  var date = $('#date').val();
  if(date == ''){
    $('#date_err').html('Field Required')
    flag = false
  }else{
    $('#date_err').html('')
  }

  var images = $('#images')[0].files;
  if(images.length == 0){
    $('#images_err').html('Uploads Images')
    flag = false
  }else if(images.length != 0){
     validExt = ['jpg','png','jpeg']
    var extension = images[0].type.split('/')[1]
      if(validExt.indexOf(extension) == -1){
        $('#images_err').html('Uploads JPG, PNG, JPEG Image only')
      }else{
        $('#images_err').html('')
      }
  }
  else{
    $('#images_err').html('')
  }

  var videos = $('#videos')[0].files;
  if(videos.length == 0){
     $('#videos_err').html('Uploads Video')
    flag = false
  }else if(videos.length != 0){
      validExt = ['avi','mp4']
    var extension = videos[0].type.split('/')[1]
      if(validExt.indexOf(extension) == -1){
        $('#videos_err').html('Uploads AVI, MP4 video only')
      }else{
        $('#videos_err').html('')
      }
  }
  else{
    $('#videos_err').html('')
  }


$('#heading').on('keyup', function(){
  var heading = $('#heading').val()
  if(heading == ''){
    $('#heading_err').html('Field Required')
    flag = false
  }else{
    $('#heading_err').html('')
  }
})

$('#date').on('change',function(){
  var date = $('#date').val();
  if(date == ''){
    $('#date_err').html('Field Required')
    flag = false
  }else{
    $('#date_err').html('')
  }
})

$('#images').on('change',function(){
  var images = $('#images')[0].files;
  if(images.length == 0){
    $('#images_err').html('Uploads Images')
    flag = false
  }else if(images.length != 0){
      validExt = ['jpg','png','jpeg']
    var extension = images[0].type.split('/')[1]
      if(validExt.indexOf(extension) == -1){
        $('#images_err').html('Uploads JPG, PNG, JPEG Image only')
      }else{
        $('#images_err').html('')
      }
  }
  else{
    $('#images_err').html('')
  }
})

$('#videos').on('change',function(){
  var videos = $('#videos')[0].files;
  if(videos.length == 0){
    $('#videos_err').html('Uploads Video')
    flag = false
  }else if(videos.length != 0){
     validExt = ['avi','mp4']
    var extension = videos[0].type.split('/')[1]
      if(validExt.indexOf(extension) == -1){
        $('#videos_err').html('Uploads AVI, MP4 video only')
      }else{
        $('#videos_err').html('')
      }
  }
  else{
    $('#videos_err').html('')
  }
 
})


if(flag){
  return true
}else{
  return false
}
}


$('#submit').on('click',function(){

if(!validation()){
  return false
}

var heading = $('#heading').val();
var date = $('#date').val();
var images = $('#images')[0].files
var videos = $('#videos')[0].files

var fd = new FormData();

fd.append('heading', heading)
fd.append('date', date)

for(i = 0; i < images.length; i++){
  var allImages = $('#images')[0].files[i]
  fd.append('images[]', allImages)
}

for(j = 0; j < videos.length; j++){
  var allVideos = $('#videos')[0].files[j]
  fd.append('videos[]', allVideos)
}
$(".loader-icon-head").css('display', 'flex');
$.ajax({
  url:'ajax/work-culture/ajax-work-culture-insert.php',
  type:'post',
  data:fd,
  contentType:false,
  processData:false,
  success:function(data){
  $('#heading').val('')
  $('#date').val('')
  $('#images').val('')
  $('#videos').val('')
  $(".loader-icon-head").css('display', 'none');
     showDetails()
  
  }
})

})


$('#update').on('click',function(){
  $('#update').hide()
  $('#submit').show()

var id = $('#hiddenId').val()

var heading = $('#heading').val();
var date = $('#date').val();
var images = $('#images')[0].files
var oldImages = $('#oldImages').val()
var videos = $('#videos')[0].files
var oldVideos = $('#oldVideos').val()

var fd = new FormData();
fd.append('id', id)
fd.append('heading', heading)
fd.append('date', date)
fd.append('oldImages', oldImages)
fd.append('oldVideos', oldVideos)

for(i = 0; i < images.length; i++){
  var allImages = $('#images')[0].files[i]
  fd.append('images[]', allImages)
}

for(j = 0; j < videos.length; j++){
  var allVideos = $('#videos')[0].files[j]
  fd.append('videos[]', allVideos)
}
$(".loader-icon-head").css('display', 'flex');
$.ajax({
  url:'ajax/work-culture/ajax-work-culture-update.php',
  type:'post',
  data:fd,
  contentType:false,
  processData:false,
  success:function(data){
  $('#heading').val('')
  $('#date').val('')
  $('#images').val('')
  $('#videos').val('')
  $('#multiImages').html('')
  $('#multiVideos').html('')
  $(".loader-icon-head").css('display', 'none');
     showDetails()
  }
})

})

</script>