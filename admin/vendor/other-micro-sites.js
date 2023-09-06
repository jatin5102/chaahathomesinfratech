$(document).ready(function(){
	$(document).on('submit','#addothermicrosites', function(e){
		e.preventDefault(0);
		var formData = new FormData(this);
		debugger;
		$.ajax({
			url : '__ajax.php?action=addothermicrosites',
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
		url : '__ajax.php?action=editothermicrosites',
		type : 'POST',
		data : {'dataid' : dataid},
		success : function(resp){
			var result=JSON.parse(resp);
				if(result.status==1){
					var record=result.data;
					$('.removdeelemensts').remove();
					var datavalue=record['other_type_section_type'];
					$('#othertypeupdate option[value='+datavalue+']').attr('selected','selected');
					if(record['heading'] !=null){
						$("#updateheading").val(record['heading']);
					}
			
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
			url : '__ajax.php?action=updateothermicrodata',
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


