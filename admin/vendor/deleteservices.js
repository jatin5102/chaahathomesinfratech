

	$(document).on('click', '.deleteservices', function(){
		var dataid=$(this).attr('dataid');
		$.ajax({
			url : '__ajax.php?action=deleteservices',
			type : 'POST',
			data : {'dataid' : dataid},
			success : function(resp){
				var data=JSON.parse(resp);
				if(data.status == 1){
					window.location.reload();
					alert(data.message);
				}else if(data.status == 0){
					window.location.reload();
					alert(data.message);
				}
			}
		});
	});