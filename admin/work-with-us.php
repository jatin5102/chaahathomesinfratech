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
          <h6><i class="fa fa-building" aria-hidden="true"></i> Add Work with us Details</h6>
        </div>
        <div class="box-two">
            <div class="admin-text">
              <span>Job Title</span>
            </div>
            <div class="input-sec-multi">
            <input type="text" class="form-control" placeholder="Some Title Here" id="title">
            <div class="text-danger" id="title_err"></div>
            </div>
        </div><!-------------box-2-------->
        <div class="box-two">
            <div class="admin-text">
              <span>Description</span>
            </div>
            <div class="input-sec" style="display:block">
              <input type="text" class="form-control" placeholder="Some Text Here" id="description">
              <div class="text-danger" id="description_err"></div>
            </div>
        </div><!-------------box-2-------->

        <div class="box-two">
            <div class="admin-text">
              <span>Experience</span>
            </div>
            <div class="input-sec" style="display:block">
              <input type="text" class="form-control" placeholder="Experience here" id="experience">
              <div class="text-danger" id="experience_err"></div>
            </div>
        </div><!-------------box-2-------->

        <div class="box-two">
            <div class="admin-text">
              <span>Location</span>
            </div>
            <div class="input-sec" style="display:block">
              <input type="text" class="form-control" placeholder="job Location" id="location">
              <div class="text-danger" id="location_err"></div>
            </div>
        </div><!-------------box-2-------->

        <div class="box-two">
            <div class="admin-text">
              <span>Skills</span>
            </div>
            <div class="input-sec" style="display:block" id="mainDiv">
            <div>
            <input type="text" class="form-control" placeholder="Skills Point" id="skills0" name="skillsName[]" style="margin-bottom:20px">
            <div class="text-danger" id="skills_err0"></div></div>
           </div>
        </div><!-------------box-2-------->

        <div class="box">
          <div class="admin-text"></div>
          <div class="input-sec" style="justify-content: right;"><button id="addMore" style="margin-right:20px;"><i class="fas fa-plus-circle"></i> Add More skill</button>
         <button id="removeMore"><i class="fas fa-minus-circle"></i> Remove skill</button>  
         </div>
       </div>

      </div>
      <div class="btn-save">
        <input type="hidden" id="hiddenId">
        <input type="hidden" id="oldSkills">
      <button class="save-btn" id="update">Update</button>
      <button class="save-btn" id="submit">Save</button>
    </div>
    <br><br>
    </div>
    <div class="right-area">
            <div class="microbox">
        <div class="head-box">
          <h6><i class="fa fa-building" aria-hidden="true"></i> Edit Work with us Details</h6>
        </div>

        <div class="inner-table">
     <table class="table">
            <thead>
              <tr>
                <th>Job Title</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody id="workwithus_Details">
       
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
$('#update').hide()

showDetails()

function showDetails(){
  $(".loader-icon-head").css('display', 'flex');
$.ajax({
  url:'ajax/workwithus/ajax-workwithus-show.php',
  type:'post',
 success:function(data){
 var jsonData = JSON.parse(data)
 $('#workwithus_Details').html(jsonData)
 $(".loader-icon-head").css('display', 'none');
//  console.log(jsonData)
}
})
}


// edit workwithus //

function editworkwithus(id){
 
$('#mainDiv').children().remove()
$(".loader-icon-head").css('display', 'flex');
$.ajax({
  url:'ajax/workwithus/ajax-workwithus-edit.php',
  type:'post',
  data: {'id':id},
  success:function(data){
   var jsonData = JSON.parse(data)
   $('#hiddenId').val(jsonData.id)
   $('#oldSkills').val(jsonData.skills)
   $('#title').val(jsonData.title)
   $('#description').val(jsonData.description)
   $('#experience').val(jsonData.experience)
   $('#location').val(jsonData.location)

  //  console.log(jsonData);
  
   var newskills = jsonData.skills.split(',');
    for(i = 0; i < newskills.length; i++){
    var v = newskills[i];
      $('#mainDiv').append('<div><input type="text" class="form-control" placeholder="Skills Point" id="skills'+i+'" value="'+v+'" name="skillsName[]" style="margin-bottom:20px"><div class="text-danger" id="skills_err'+i+'"></div></div>');
   }
   $(".loader-icon-head").css('display', 'none');
  }
})
$('#submit').hide()
  $('#update').show()
}

// delete workwithhus //

function deleteworkwithus(id){
  $(".loader-icon-head").css('display', 'flex');
$.ajax({
  url:'ajax/workwithus/ajax-workwithus-delete.php',
  type:'post',
  data: {'id':id},
 success:function(data){
  $(".loader-icon-head").css('display', 'none');
  showDetails()
  window.location.reload();
}
})
}

function validation(){
  var flag = true;
  
  var title = $('#title').val()
  if(title == ''){
    $('#title_err').html('Required Field')
    flag = false;
  }
  else{
    $('#title_err').html('')
  }

  var description = $('#description').val()
  if(description == ''){
    $('#description_err').html('Required Field')
    flag = false;
  }
  else{
    $('#description_err').html('')
  }

  var experience = $('#experience').val()
  if(experience == ''){
    $('#experience_err').html('Required Field')
    flag = false;
  }
  else{
    $('#experience_err').html('')
  }

  var location = $('#location').val()
  if(location == ''){
    $('#location_err').html('Required Field')
    flag = false;
  }
  else{
    $('#location_err').html('')
  }


$('#title').on('keyup',function(){
  var title = $('#title').val()
  if(title == ''){
    $('#title_err').html('Required Field')
    flag = false;
  }
  else{
    $('#title_err').html('')
  }
})

$('#description').on('keyup',function(){
  var description = $('#description').val()
  if(description == ''){
    $('#description_err').html('Required Field')
    flag = false;
  }
  else{
    $('#description_err').html('')
  }
})

$('#experience').on('keyup',function(){
  var experience = $('#experience').val()
  if(experience == ''){
    $('#experience_err').html('Required Field')
    flag = false;
  }
  else{
    $('#experience_err').html('')
  }
})

  $('#location').on('keyup',function(){
  var location = $('#location').val()
  if(location == ''){
    $('#location_err').html('Required Field')
    flag = false;
  }
  else{
    $('#location_err').html('')
  }
})

 if(flag){
    return true
  }else{
    return false
  }
}

function addMoreSkills(){
flag = true;
var skills = $("input[name='skillsName[]']");
// console.log(length.length)

for(var i = 0; i < skills.length; i++){

if(skills[i].value == ''){
    $("#skills_err"+i+"").html('Required Field');
    flag = false
  }
  else{
  $("#skills_err"+i+"").html('');
}
}

if(flag){
    return true
  }else{
    return false
  }
}

var i = 1;
$('#addMore').on('click',function(){
  if(!addMoreSkills()){
    return false
  }
  var length = $('#mainDiv').children().length;
  var i = length;
  // console.log(i)
  $('#mainDiv').append('<div><input type="text" class="form-control" placeholder="Skills Point" id="skills'+i+'" name="skillsName[]" style="margin-bottom:20px"><div class="text-danger" id="skills_err'+i+'"></div></div>');
  i++
})

$('#removeMore').on('click',function(){
$('#mainDiv').children().last().remove()
})

$('#submit').on('click',function(){
  
  if(!validation()){
    return false
  }

var title = $('#title').val()
var description = $('#description').val()
var experience = $('#experience').val()
var location = $('#location').val()

var fd = new FormData()

fd.append('title', title)
fd.append('description', description)
fd.append('experience', experience)
fd.append('location', location)

var skills = $('input[name="skillsName[]"]');

for(var k = 0; k < skills.length; k++){
var skillValues = $("#skills"+k+"").val()
fd.append('skills[]', skillValues)
}
$(".loader-icon-head").css('display', 'flex');
$.ajax({
  url:'ajax/workwithus/ajax-workwithus-insert.php',
  type:'post',
  data: fd,
  contentType:false,
  processData:false,
  success:function(data){
    $('#title').val('')
    $('#description').val('')
    $('#experience').val('')
    $('#location').val('')
    $('#skills0').val('')
    $('#mainDiv').children().remove()
    $(".loader-icon-head").css('display', 'none');
      showDetails()
  }
})
})



//update work with us//

$('#update').on('click',function(){

        if(!addMoreSkills()){
          return false
        }

        if(!validation()){
          return false
        }

      var id = $('#hiddenId').val()
      var oldSkills = $('#oldSkills').val()
      var title = $('#title').val()
      var description = $('#description').val()
      var experience = $('#experience').val()
      var location = $('#location').val()

      var fd = new FormData()
      fd.append('id', id)
      fd.append('title', title)
      fd.append('description', description)
      fd.append('experience', experience)
      fd.append('location', location)
      fd.append('oldSkills', oldSkills)

      var skills = $('input[name="skillsName[]"]');

      for(var k = 0; k < skills.length; k++){
      var skillValues = $("#skills"+k+"").val()
      fd.append('skills[]', skillValues)
      }
      $(".loader-icon-head").css('display', 'flex');
      $.ajax({
        url:'ajax/workwithus/ajax-workwithus-update.php',
        type:'post',
        data: fd,
        contentType:false,
        processData:false,
        success:function(data){
          $('#title').val('')
          $('#description').val('')
          $('#experience').val('')
          $('#location').val('')
          $('#skills0').val('')
          $('#mainDiv').children().remove()
          $(".loader-icon-head").css('display', 'none');
          showDetails()
          
        }
      })

})



</script>