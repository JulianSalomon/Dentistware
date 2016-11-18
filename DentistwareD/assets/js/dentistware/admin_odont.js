$(function() {
    $('#nuevo_odont_form').submit(function (event) {
        event.preventDefault();
        $('.ac_p_error').fadeOut('slow').remove();
        var postData = new FormData(this);    
        $.ajax({
            type: 'POST',
            url: js_site_url + 'nuevo_odontologo/',
            data: postData,
            processData: false,
            contentType: false,
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
                    	swal("Error", "Se ha presentado un error al ingresar el odontólogo, por favor verifique los datos.", "error");
                    }
                }
            }
        });
    });
    
    $('#edit_odontologo_form').submit(function (event) {
        event.preventDefault();
        $('.ac_p_error').fadeOut('slow').remove();
        var postData = new FormData(this); 
        $.ajax({
            type: 'POST',
            url: js_site_url + 'edit_odontologo/',
            data: postData,
            processData: false,
            contentType: false,
            beforeSend:function(){
            	$('#div_waiting_edit_odontologo').removeClass("hidden");            	
            },
            success: function (msg) { 
                if (isNaN(msg)) {
                	$('#div_waiting_edit_odontologo').addClass("hidden");   
                    $.each(msg, function (i, item) {
                        $('#div_' + i).after('<p class="alert alert-danger text-center ac_p_error">' + item + '</p>');
                    });
                    $("#error-doc").fadeOut('slow').remove();
                } else {
                    if (msg == 1) {    
                    	swal({   
                    		title: "Editado",   
                    		text: "Se actualizó correctamente el odontologo!",   
                    		type: "success"                 
                    	}, 
                    	function(){
                    		location.href = js_site_url; 
                    	});              
                    } else {
                    	$('#div_waiting_edit_odontologo').addClass("hidden");
                    	swal("Error", "Se ha presentado un error al editar éste odontologo, por favor verique los datos!", "error");
                    }
                }
            }
        });
    });
	
    $("#chkEliminarFoto").iCheck({
		"checkboxClass": "icheckbox_square-blue",
    });
    
});
