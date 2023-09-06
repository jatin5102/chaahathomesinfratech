<?php 
	include_once 'config/conn.php';
	include_once 'layout/header/header.php';
	include_once 'layout/side-nav/left-side-nav.php';
  include_once 'include/function.php';
?>

<section class="microsite-area">
<div class="inner-micro-structure">
    <div class="left-area">

      <form name="testimonials_query" id="testimonials_query" method="POST">
        <div class="microbox">
          <div class="head-box">
            <h6><i class="fa fa-building" aria-hidden="true"></i> Add Employee Testimonials</h6>
          </div>

            <div class="box-two">
              <div class="admin-text">
                <span>Employee name</span>
              </div>
              <div class="input-sec-multi">
              <input type="text" class="form-control" placeholder="" id="name" name="name">
              <div id="name_err" class="text-danger"></div>
              </div>
          </div><!-------------box-2-------->

          <div class="box-two">
              <div class="admin-text">
                <span>Designation</span>
              </div>
              <div class="input-sec-multi">
              <input type="text" class="form-control" placeholder="" id="designation" name="designation">
              <div id="designation_err" class="text-danger"></div>
              </div>
          </div><!-------------box-2-------->
          <div class="box-two">
              <div class="admin-text">
                <span>Paragraph</span>
              </div>
              <div class="input-sec-multi">
              <input type="text" class="form-control" placeholder="" id="description" name="description">
              <div id="description_err" class="text-danger"></div>
              </div>
          </div><!-------------box-2-------->
        </div>
        <div class="btn-save">
          <input type="hidden" id="hiddenId">
          <input type="hidden" id="oldImage">
          <button class="save-btn d-none">Update</button>
          <button class="save-btn" type="submit" name="submit" id="submit">Save</button>
        </div>
      </form>
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
                  echo "<td><a href='javascript:void(0)' class='editTestimoindals' dataid='".encryptor('encrypt', $id)."' ><i class='fa fa-pencil'  aria-hidden='true'></i></a></td>";
                  echo "<td><a href='javascript:void(0)' class='deleteTestimonials' dataid='".encryptor('encrypt', $id)."'><i class='fa fa-times' aria-hidden='true'></i></a></td>";
                  echo "</tr>";
                }
                ?>
            
             
            </tbody>
          </table>
        </div>

    </div>
       <hr>
  </div>
  <div class="modal fade zoomIn" id="updateTestimonials" tabindex="-1" style="display: none;" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0">
          <div class="modal-header p-3 bg-soft-success">
              <h5 class="modal-title" id="modal-heading-append">Testimonials Update</h5>
              <button type="button" class="fa fa-times" data-dismiss="modal" id="addProjectBtn-close" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="" id="updateTestimonials" method="POST">
                <div class="form-group">
                  <input type="hidden" id="testimonials_update_id"/>
                  <div class="mb-2">
                    <label for="">Employee Name</label>
                    <input type="text" name="testimonials_update_name" id="testimonials_update_name" class="form-control">
                  </div>
                  <div class="mb-2">
                    <label for="">Designation</label>
                    <input type="text" name="testimonials_update_designation" id="testimonials_update_designation" class="form-control">
                  </div>
                  <div class="mb-2">
                    <label for="">Paragraph</label>
                    <input type="text" name="testimonials_update_paragraph" id="testimonials_update_paragraph" class="form-control">
                  </div>
                </div>
              <button class="btn btn-sm btn-info" type="submit">Submit</button>
            </form>
          </div>
        </div>
      </div>
  </div>
</section>



<?php 
	include_once 'layout/footer/footer.php';
?>

<script>

  $(document).on('submit', "#testimonials_query", function(e){
    e.preventDefault(0);
      debugger;
      var formData = new FormData(this);
      $.ajax({
          url : 'ajax/testimonials/ajax-testimonials-insert.php',
          type: "POST",
          data: formData,
          dataType: 'json',
          contentType: false,
          cache: false,
          processData: false,
          success : function(resp){
              var data=JSON.parse(JSON.stringify(resp));
              if(data.status==3){
                  $('.errors').remove();
                  var keys = Object.keys(data.errors);
                  for (let index = 0; index < keys.length; index++) {
                      var keynam=keys[index];
                      $('#'+keynam).after('<p class="errors text-danger">'+data.errors[keynam]+'<p>');
                        if(index==0){
                            $('#'+keynam).focus();
                        }
                  }
                  alert(data.message);
              }else if(data.status==1){
                  window.location.reload();
                  alert(data.message);

              }else{
                      window.location.reload();
                      alert(data.message);
              }
          }
      })
  });

  $(document).on('click','.editTestimoindals',function(){
  // debugger;

    var dataid = $(this).attr('dataid'); 
    $.ajax({
      url:'ajax/testimonials/ajax-testimonials-edit.php',
      type:'post',
      data: {'id':dataid},
      success:function(res){
        var jsonData = JSON.parse(res);
        if(jsonData.status==1){
          row=jsonData['data'];

      
        $('#testimonials_update_name').val(row['name']);
        $('#testimonials_update_designation').val(row['designation']);
        $('#testimonials_update_paragraph').val(row['description']);
      }else{ 
        alert(data.message);
      }
      }
    });


    $("#updateTestimonials").modal('show');


    $(document).on('submit','#updateTestimonials', function(e){
      e.preventDefault(0);
      var formData = new FormData(this);
      formData.append('eid',dataid);

      $.ajax({
      url : 'ajax/testimonials/ajax-testimonials-update.php',
          type: "POST",
          data: formData,
          dataType: 'json',
          contentType: false,
          cache: false,
          processData: false,
          enctype: 'multipart/form-data',
          success : function(resp){
            var data=JSON.parse(JSON.stringify(resp));
            if(data.status==3){
                $('.errors').remove();
                var keys = Object.keys(data.errors);
                for (let index = 0; index < keys.length; index++) {
                  var keynam=keys[index];
                    $('#'+keynam).after('<p class="errors">'+data.errors[keynam]+'<p>');
                        if(index==0){
                            $('#'+keynam).focus();
                        }
                }
                alert(data.message);
                $("#updateTestimonials").modal('show');

            }else if(data.status==1){
                window.location.reload();
                alert(data.message);

            }else if(data.status == 0){
              window.location.reload();
              alert(data.message);
            }else{
                    window.location.reload();
                    alert(data.message);
            }

          }
      })

    });

});

$(document).on('click', '.deleteTestimonials', function(){
  var dataid=$(this).attr('dataid');
		$.ajax({
			url : 'ajax/testimonials/ajax-testimonials-delete.php',
			type : 'POST',
			data : {'dataid' : dataid},
			success : function(resp){
					var data=JSON.parse(resp);
					if(data.status==1){
						window.location.reload();
            alert(data.message);
					}else if(data.status == 0){
            window.location.reload();
            alert(data.message);
          }
					
			}
		});

});
</script>
