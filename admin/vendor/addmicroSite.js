$(document).ready(function(){
    project_property_onload();
    Project_state_onload();
});


$(document).on('submit',"#updatemicrorecord", function(e){
			
    e.preventDefault(0);
    var formData = new FormData(this);
    debugger;
    $.ajax({
		url : 'ajax/microsite/ajax-microsite-project-update.php',
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

        }else if(data.status==1){
            window.location.href="Project-list.php";
            alert(data.message);


        }else{
                window.location.reload();
                alert(data.message);
        }
       
        }
    })
});


$(document).on('submit',"#addnewmicrsite", function(e){
			
    e.preventDefault(0);
    var formData = new FormData(this);
    debugger;
    $.ajax({
        url : 'ajax/microsite/ajax-microsite-project-insert.php',
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

        }else if(data.status==1){
            window.location.href="Project-list.php";
            alert(data.message);


        }else{
                window.location.reload();
                alert(data.message);
        }
       
        }
    })
});


function get_fileExt(filename)
	{
		var parts = filename.split('.');
		return parts[parts.length - 1];
	}


	function isImage(filename)
	{
		var ext = get_fileExt(filename);
		switch (ext.toLowerCase()) {
			case 'jpg':
			case 'png':
			case 'jpeg':
			// etc
		return true;
		}
		return false; 
	}
	
	function isMobile(phoneNumber)
	{
		var filter = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;

		if (filter.test(phoneNumber)) {
			if(phoneNumber.length==10){
				return true;
			} else {
				return false;
			}
		}
		else {
			return false;
		}
	}


	function project_property(val){

		$.ajax({
			url : 'ajax/microsite/ajax-microsite-property-type.php',
			type : 'POST',
			data : {'cat_id' : val},
			success : function(resp){
				var data = JSON.parse(resp);
				$("#project_property_type").html(data);
			}
		})
	}
	
	function Project_state_onload(){
		var val = $("#project_state").val();
		var city_id  = '<?php echo $city ?>';

		$.ajax({
			url : 'ajax/microsite/ajax-microsite-get-city.php',
			type : 'POST',
			data : {'state_id' : val, 'city_id' : city_id},
			success : function(resp){
				var data = JSON.parse(resp);
				$("#project_city").html(data);

				var city_id = $("select#project_city option").filter(":selected").val();
				project_city_onload(city_id);
			}
		})
	}
	
	function Project_state(val){
		$.ajax({
			url : 'ajax/microsite/ajax-microsite-get-city.php',
			type : 'POST',
			data : {'state_id' : val},
			success : function(resp){
				var data = JSON.parse(resp);
				$("#project_city").html(data);

				var city_id = $("select#project_city option").filter(":selected").val();
				project_city_onload(city_id);
			}
		})
	}
	
	function project_city_onload(val){
        debugger;
		var location_id = '<?php echo $location ?>';

		$.ajax({
			url : 'ajax/microsite/ajax-microsite-get-locality.php',
			type : 'POST',
			data : {'city_id' : val, 'location_id' : location_id},
			success : function(resp){
				var data = JSON.parse(resp);
				$("#project_location").html(data);
			}
		})
	}
	

    $(document).on('change','.project_city',function(){
        debugger;
        var val=$(this).val();
        $.ajax({
			url : 'ajax/microsite/ajax-microsite-get-locality.php',
			type : 'POST',
			data : {'city_id' : val},
			success : function(resp){
				var data = JSON.parse(resp);
				$("#project_location").html(data);
			}
		})
    });

