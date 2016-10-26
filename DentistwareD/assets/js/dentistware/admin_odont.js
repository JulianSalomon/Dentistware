$(function() {
    $('#nuevo_odont_form').submit(function (event) {
        event.preventDefault();
        $('.ac_p_error').fadeOut('slow').remove();
        var postData = $(this).serializeArray();    
        $.ajax({
            type: 'POST',
            url: js_site_url + 'nuevo_odontologo/',
            data: postData,
            beforeSend:function(){
            	$('#div_waiting_new_odont').removeClass("hidden");            	
            },
            success: function (msg) {
                
                if (isNaN(msg)) {
                	$('#div_waiting_new_odont').addClass("hidden");  
                    $.each(msg, function (i, item) {
                        $('#div_' + i).after('<p class="alert alert-danger text-center ac_p_error" role="alert">' + item + '</p>');
                    });
                } else {
                    if (msg == 1) {    
                    	swal({   
                    		title: "",   
                    		text: "Se insertó exitosamente el odontólogo",   
                    		type: "success"                 
                    	}, 
                    	function(){   
                    		location.reload(); 
                    	});                    	
                        $('#modal_add_odont').modal('hide');
                    } else {
                    	$('#div_waiting_new_odont').addClass("hidden"); 
                    	swal("Error", "Se ha presentado un error al ingresar el odontólogo", "error");
                    }
                }
            }
        });
    });
});
