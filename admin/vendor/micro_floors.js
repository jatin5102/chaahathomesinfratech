$(document).ready(function(){
	$(document).on('submit','#addfloorplands', function(e){
		e.preventDefault(0);
		var formData = new FormData(this);
		debugger;
		$.ajax({
			url : '__ajax.php?action=addfloorplands',
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



	
	



$(document).on('click','.editothermicrosites',function(){
	var dataid=$(this).attr('dataid');
debugger;

	$.ajax({
		url : '__ajax.php?action=editfloorplanimages',
		type : 'POST',
		data : {'dataid' : dataid},
		success : function(resp){
			var result=JSON.parse(resp);
				if(result.status==1){
					var record=result.data;
					$('.uploadediimageremovealble').remove();
					var image=record['image'];
			
						$("#floorimagesupdaste").after('<img class="mt-2 uploadediimageremovealble" src="'+image+'" width="100">');
				
					
					
			
					$("#updaemicrobanners").modal('show');
				}else{
						alert(result.message);
				}
		}
	});



	$(document).on('submit','#updateothermicrodata', function(e){
		e.preventDefault(0);
		var formData = new FormData(this);
		formData.append("eid", dataid);

		debugger;
		$.ajax({
			url : '__ajax.php?action=updaremicrofloorplans',
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




$(document).on('click','.deletefloorplands',function(){
		var dataid=$(this).attr('dataid');
		$.ajax({
			url : '__ajax.php?action=deletefloorplands',
			type : 'POST',
			data : {'dataid' : dataid},
			success : function(resp){
					var data=JSON.parse(resp);
					alert(data.message);
					if(data.status==1){
						window.location.reload();

					}
					
			}
		});
})