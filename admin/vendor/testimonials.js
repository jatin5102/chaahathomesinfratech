
    $(document).on('submit', "#testimonials_query", function(e){
        e.preventDefault(0);
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