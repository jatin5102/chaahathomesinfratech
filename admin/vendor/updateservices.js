	$(document).on('submit', '#updateinfraservices', function(e) {
		e.preventDefault(0);
		var formData = new FormData(this);
        $.ajax({
            url : '__ajax.php?action=updateservices',
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
