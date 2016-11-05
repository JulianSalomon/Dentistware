$(function() {
	$("#inputFoto").change(function () {
		var photoFile = document.getElementById("inputFoto").files[0];
		var photoPreview = document.getElementById("foto_img");
		var photoIcon = document.getElementById("i_foto");
		var imageType = /image.*/;
		
		if(photoFile){
			var preload = new Image();
			var reader = new FileReader();
			
	        if (!photoFile.type.match(imageType)) {
	        	swal('','El archivo selecionado no es un archivo de imagen valido.', 'error');
	        	$('#inputFoto').val('');	
				$(photoPreview).addClass("hidden");
				$(photoIcon).removeClass("hidden");
	            return false;
	        }

	        if (parseFloat(photoFile.size / 1024).toFixed(2) > 1024) {
	        	swal('','La imagen seleccionada tiene un tamaño mayor a 1 MB', 'error');
	        	$('#inputFoto').val('');	
				$(photoPreview).addClass("hidden");
				$(photoIcon).removeClass("hidden");
	            return false;
	        }
	        reader.onload = (function (aImg) {
	            return function (e) {
	                aImg.src = e.target.result;
	            };
	        })(preload);
	        reader.readAsDataURL(photoFile);
	        
	        preload.onload = function () {
	            if (this.width > 256 || this.height > 256) {
	            	swal('','La imagen seleccionada excede dimensiones de 256x256 píxeles', 'error');
					$(photoPreview).addClass("hidden");
					$(photoIcon).removeClass("hidden");
					$('#inputFoto').val('');		
	                return false;
	            } else {
	            	$(photoPreview).attr('src', this.src);
					$(photoPreview).removeClass("hidden");
					$(photoIcon).addClass("hidden");
	            }
	        };
		} else {
			$(photoPreview).addClass("hidden");
			$(photoIcon).removeClass("hidden");
		}
	});
	
	
    $('#nuevo_admin_form').submit(function (event) {
        event.preventDefault();
        $('.ac_p_error').fadeOut('slow').remove();
        var postData = new FormData(this); 
        $.ajax({
            type: 'POST',
            url: js_site_url + 'nuevo_admin/',
            data: postData,
            processData: false,
            contentType: false,
            beforeSend:function(){
            	$('#div_waiting_new_admin').removeClass("hidden");            	
            },
            success: function (msg){
            	console.log(msg);
                if (isNaN(msg)) {
                	$('#div_waiting_new_admin').addClass("hidden");  
                    $.each(msg, function (i, item) {
                        $('#div_' + i).after('<p class="alert alert-danger text-center ac_p_error" role="alert">' + item + '</p>');
                    });
                } else {
                    if (msg == 1) {    
                    	swal({   
                    		title: "",   
                    		text: "Se insertó exitosamente el administrador",   
                    		type: "success"                 
                    	}, 
                    	function(){   
                    		location.reload(); 
                    	});                    	
                        $('#modal_add_admin').modal('hide');
                    } else {
                    	$('#div_waiting_new_admin').addClass("hidden"); 
                    	swal("Error", "Se ha presentado un error al ingresar el administrador", "error");
                    }
                }
            }
        });
    });
});
