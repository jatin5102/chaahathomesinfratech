function generateUrl(baseiflds,targetfields){
    const re2 = /[^a-zA-Z0-9 ]/g
    const title =baseiflds; // store the field

    title.addEventListener("input", function() { // on any input 
        document.getElementById(targetfields).value = encodeURIComponent(
        // this.value.replace(/ /g, "-").replace(re1,"") // left out the "-"
        this.value.replace(re2,"").replace(/ /g, "-") // using re 2
        ); // encode after replace
     });
    title.dispatchEvent(new Event('input')); // trigger the change
}



function viewimage(imgsrc){
    debugger;
    $("#viewimage").modal('show');
        $("#view_img").html('<img src="'+imgsrc+'" />');
}

function viewtext(modalheading,text){
    debugger;
    $("#viewtext").modal('show');
    $('#viewtext #modal-heading-append').html(modalheading);
        $("#viewtextdata").html(text);
}


// function deleteFileFromServer(tablename,columnname,compareid){
//     $.ajax({
// 		url : '__delete_record.php?action=deleteFileFromServer',
// 		type : 'POST',
// 		data : {'tablename' : tablename,'columnname':columnname,'compareid':compareid},
// 		success : function(resp){
//             console.log(resp);
// 		}
// 	});


// }


function deleteData(tablename,comparename,id){
    debugger;
	$.ajax({
		url : '__delete_record.php?action=deleteData',
		type : 'POST',
			data : {'tablename' : tablename,'comparename':comparename,'id':id},
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

}

