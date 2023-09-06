$(document).ready(function(){
	$(document).on('submit','#addbanner', function(e){
		e.preventDefault(0);
		var formData = new FormData(this);
		debugger;
		$.ajax({
			url : 'ajax/banner/ajax-banner-insert.php',
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
				
					alert(data.message);
					window.location.reload();

		
				}else{
						window.location.reload();
						alert(data.message);
				}

			}
		});
		
	});
});


function dlt_solo_banner_img(id, name){
	var id = id;
	var name = name;
	
	$(".loader-icon-head").css('display', 'flex');
	$.ajax({
		url : 'ajax/banner/ajax-banner-dlt.php',
		type : 'POST',
		data : {'id' : id, 'name' : name},
		success : function(resp){
			$(".loader-icon-head").css('display', 'none');
			window.location.reload();
		}
	})
}

function dlt_small_banner_img(id, name){
	var id = id;
	var name = name;
	
	$(".loader-icon-head").css('display', 'flex');
	$.ajax({
		url : 'ajax/banner/ajax-small-banner-dlt.php',
		type : 'POST',
		data : {'id' : id, 'small_name' : name},
		success : function(resp){
			$(".loader-icon-head").css('display', 'none');
			window.location.reload();
		}
	})
}


function dlt_solo_banner_video(id, video){
	var id = id;
	var video = video;

	$(".loader-icon-head").css('display', 'flex');
	$.ajax({
		url : 'ajax/banner/ajax-banner-dlt.php',
		type : 'POST',
		data : {'id' : id, 'video' : video},
		success : function(resp){
			$(".loader-icon-head").css('display', 'none');
			window.location.reload();
		}
	})
}


function dlt_solo_small_banner_video(id, video){
	var id = id;
	var video = video;

	$(".loader-icon-head").css('display', 'flex');
	$.ajax({
		url : 'ajax/banner/ajax-small-banner-dlt.php',
		type : 'POST',
		data : {'id' : id, 'small_video' : video},
		success : function(resp){
			if(resp == 1){
				$(".loader-icon-head").css('display', 'none');
				window.location.reload();
			}
		}
	})
}

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
	
	function isVideo(filename) 
	{
		var ext = get_fileExt(filename);
		switch (ext.toLowerCase()) {
		  case 'm4v':
		  case 'avi':
		  case 'mpg':
		  case 'mp4':
			// etc
			return true;
		}
		return false;
	}
	
	function isSize(size)
	{
		if(size <= 15728640){
		  return true;
		}
		return false;
	}
	
	function check_valid(val){
		if(val == 1){
			$("#banner_video").prop('disabled', false);
			$("#banner_video_url").prop('disabled', true);
			$("#banner_video_url").val("");
			$("#banner_video_url_err").html("");
		}else{
			$("#banner_video_url").prop('disabled', false);
			$("#banner_video").prop('disabled', true);
			$("#banner_video").val("");
			$("#banner_video_err").html("");
		}
	}
	
	function small_check_valid(val){
		if(val == 1){
			$("#small_banner_video").prop('disabled', false);
			$("#small_banner_video_url").prop('disabled', true);
			$("#small_banner_video_url").val("");
			$("#banner_video_url_err").html("");
		}else{
			$("#small_banner_video_url").prop('disabled', false);
			$("#small_banner_video").prop('disabled', true);
			$("#small_banner_video").val("");
			$("#banner_video_err").html("");
		}
	}
	
	



$(document).on('click','.editmicrrobanenrs',function(){
	var dataid=$(this).attr('dataid');
debugger;

	$.ajax({
		url : '__ajax.php?action=editmicrrobanenrs',
		type : 'POST',
		data : {'dataid' : dataid},
		success : function(resp){
			var result=JSON.parse(resp);
				if(result.status==1){
					var record=result.data;
					$('.removdeelemensts').remove();
					$("#upddatefile").after('<a href="'+ADMIN_ASSETS+'microsite/banners/'+record['win_images']+'" class="removdeelemensts" ><i class="fa fa-eye"></i></a>');
					if(record['win_images'] !=null){
						$("#video_url_update").val(record['win_video_url']);
					}
			
					$("#updaemicrobanners").modal('show');
				}else{
						alert(result.message);
				}
		}
	});



	$(document).on('submit','#updatebanenrform', function(e){
		e.preventDefault(0);
		var formData = new FormData(this);
		formData.append("eid", dataid);

		debugger;
		$.ajax({
			url : '__ajax.php?action=updatemicromannersrecord',
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
				
					alert(data.message);
					window.location.reload();

		
				}else{
						window.location.reload();
						alert(data.message);
				}

			}
		});
	
	});
});



$(document).on('click','.deletebannersmicrosw',function(){
	var dataid=$(this).attr('dataid');
debugger;

	$.ajax({
		url : '__ajax.php?action=deletebannersmicrosw',
		type : 'POST',
		data : {'dataid' : dataid},
		success : function(resp){
			var data=JSON.parse(resp);
			if(data.status==1){
				alert(data.message);
				window.location.reload();
		
			}else{
				alert(data.message);
			}
		}
	});
});