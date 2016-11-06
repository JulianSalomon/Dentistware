$(function() {
    $('#nuevo_empl_form').submit(function (event) {
        event.preventDefault();
        $('.ac_p_error').fadeOut('slow').remove();
        var postData = new FormData(this);     
        $.ajax({
            type: 'POST',
            url: js_site_url + 'nuevo_empleado/',
            data: postData,
            processData: false,
            contentType: false,            
            beforeSend:function(){
            	$('#div_waiting_new_empl').removeClass("hidden");            	
            },
            success: function (msg) {
                if (isNaN(msg)) {
                	$('#div_waiting_new_empl').addClass("hidden");  
                    $.each(msg, function (i, item) {
                        $('#div_' + i).after('<p class="alert alert-danger text-center ac_p_error" role="alert">' + item + '</p>');
                    });
                } else {
                    if (msg == 1) {    
                    	swal({   
                    		title: "",   
                    		text: "Se insertó exitosamente el empleado",
                    		type: "success"                 
                    	}, 
                    	function(){   
                    		location.reload(); 
                    	});                    	
                        $('#modal_add_empl').modal('hide');
                    } else {
                    	$('#div_waiting_new_empl').addClass("hidden"); 
                    	swal("Error", "Se ha presentado un error al ingresar el empleado", "error");
                    }
                }
            }
        });
    });
});
