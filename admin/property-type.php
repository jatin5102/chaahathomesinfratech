<?php 
	include_once 'layout/header/header.php';
	include_once 'layout/side-nav/left-side-nav.php';
	include_once 'config/conn.php';
?>

<section class="state-back other-body-width">
  <div class="list-sec-other-b">
  <div class="list-area-other-l">
    <div class="box-border">
      <div class="head-list-area-other-l">
        <h6><i class="fa fa-building" aria-hidden="true"></i> Property Name</h6>

        <div class="input-group mb-4">
        <input type="text" class="form-control" onkeyup="search(this.value)" placeholder="Search Property" aria-label="Recipient's username" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <span class="input-group-text" id="basic-addon2"><i class="fa fa-search"></i></span>
        </div>
      </div>
      </div>
    
     <div class="inner-table">
     <table class="table">
            <thead>
              <tr>
                <th>Property Name</th>
                <th>Property Type</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody id="searchData">
            <?php
              // $sql = "SELECT * FROM property ORDER BY id DESC";
              // $result = mysqli_query($conn, $sql);
              // if(!$result){
                // die('Query failed '.mysqli_error($conn));
              // }
              // while($row = mysqli_fetch_assoc($result)){
                    // $id = $row['id'];
                    // $type = ucfirst($row['cat_id']);
                    // $property = $row['name'];

				  // echo "<tr>";
				  // echo "<td>$type</td>";
				  // echo "<td>$property</td>";
				  // echo "<td><i class='fa fa-pencil' aria-hidden='true' onclick=editProperty($id)></i></td>";
				  // echo "<td><i class='fa fa-times' aria-hidden='true' onclick=deleteProperty($id)></i></td>";
				  // echo "</tr>";

              // }
      
              ?>

     

            </tbody>
          </table>
        </div>

  </div>
  <!-- <div class="btn-save">
      <button class="save-btn">Save</button>
    </div> -->
  </div>
  <div class="edit-list-area list-area-other-r">
    <div class="box-border">
    <h6><i class="fa fa-building" aria-hidden="true"></i> Add Property Name</h6>

    <div class="box">
          <div class="admin-text">
            <span>
              Property Type:
            </span>
          </div>
          <div class="input-sec">
            <select class="form-control" id="type">
				<?php 
					$sql = "SELECT * FROM category ORDER BY name ASC";
					$query = mysqli_query($conn, $sql);
					if(mysqli_num_rows($query) > 0){
						while($row = mysqli_fetch_array($query)){
				?>
							<option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
				<?php
						}
					}
				?>
          </select>
         </div>
        </div>
    <div class="box">
          <div class="admin-text">
            <span>
             Add Property:
            </span>
          </div>
          <div class="input-sec">
            <input type="text" class="form-control" placeholder="Title Here" name="" id="property">
            <div class= "text-danger" id="property_err"></div>
          </div>
    </div>
    
  </div>
  <div class="btn-save">
    <input type="hidden" id="hiddenId">
    <button class="save-btn" id="update">Update</button>
          <button class="save-btn" id="submit">Save</button>
    </div>
  </div>
  </div><!------------list-sec---------->

</section>


<?php 
	include_once 'layout/footer/footer.php';
?>

<script>

function showData(){
	$.ajax({
	  url: 'ajax/propertyType/propertyType-show.php',
	  type:'post',
	  success:function(data){
		var jsonData = JSON.parse(data)
	  console.log(jsonData);
	  $('#searchData').html(jsonData)
	  }
	})
}


function search(value){
	var search = value;
	//  console.log(search)

	$.ajax({
	  url: 'ajax/propertyType/propertyType-search.php',
	  type:'post',
	  data: {'searchValue' : search},
	  success:function(data){
		var jsonData = JSON.parse(data)
	  // console.log(jsonData);
	  $('#searchData').html(jsonData)
	  }
	})
}

function editProperty(id){
  $(".loader-icon").css('display', 'block');
  $('#submit').hide();
  $('#update').show();

  $.ajax({
    url: 'ajax/propertyType/propertyType-edit.php',
    type: 'GET',
    data:{'id':id},
    success:function(data){
      var jsonData = JSON.parse(data)
      // console.log(jsonData)
      $('#hiddenId').val(jsonData.id);
      $('#type').val(jsonData.cat_id);
      $('#property').val(jsonData.name);
      $(".loader-icon").css('display', 'none');
    }
  })
}

function deleteProperty(id){
  $(".loader-icon-head").css('display', 'flex');
  $.ajax({
    url:'ajax/propertyType/propertyType-delete.php',
    type:'post',
    data: {'id':id},
    success:function(data){
      console.log(data)
     $(".loader-icon-head").css('display', 'none');
      window.location.reload()
      // showData()
    }
  })
}

function validation(){
  var flag = true
  var property = $('#property').val()
  if(property == ''){
    $('#property_err').html('Please add property')
    flag = false
  }else{
    $('#property_err').html('')
  }


// on changeKeyup ///
$('#property').on('keyup',function(){
  var property = $('#property').val()
  if(property == ''){
    $('#property_err').html('Please select property type')
  }else{
    $('#property_err').html('')
  }
})

if(flag){
  return true
}else{
  return false
}
}


function addProperty(){
  $('#update').hide();
  $('#submit').on('click',function(e){
    e.preventDefault();
  
  if(!validation()){
    return false
  }
  var type = $('#type').val()
  var property = $('#property').val()
  $(".loader-icon-head").css('display', 'flex');

  $.ajax({
    url: 'ajax/propertyType/propertyType-insert.php',
    type: 'post',
    data: {'property':property, 'type':type},
    success: function(data){
      // console.log(data);
      $(".loader-icon-head").css('display', 'none');
      window.location.reload()
      // showData()
    }
  })
  })
}

function updateProperty(){
  $('#update').on('click',function(){
    $(".loader-icon-head").css('display', 'flex');
   
   if(!validation()){
    return false;
   }
  
   var type = $('#type').val();
   var property = $('#property').val();
   var hiddenId = $('#hiddenId').val();
  
  
  $.ajax({
    url: 'ajax/propertyType/propertyType-update.php',
    type: 'post',
    data: {'property':property, 'type':type, 'id':hiddenId},
    success: function(data){
      // console.log(data)
     $(".loader-icon-head").css('display', 'none');
      window.location.reload()
      // showData()
    }
  })
  })
}

$(document).ready(function(){
showData()
addProperty()
updateProperty()
})


</script>