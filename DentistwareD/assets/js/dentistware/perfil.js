$(function() {    
	$('#edit_perfil_form').submit(function (event) {
        event.preventDefault();
        $('.ac_p_error').fadeOut('slow').remove();
        var postData = new FormData(this); 
        $.ajax({
            type: 'POST',
            url: js_site_url + 'edit_perfil/',
            data: postData,
            processData: false,
            contentType: false,
            beforeSend:function(){
            	$('#div_waiting_edit_perfil').removeClass("hidden");            	
            },
            success: function (msg) {
                if (isNaN(msg)) {
                	$('#div_waiting_edit_perfil').addClass("hidden");   
                    $.each(msg, function (i, item) {
                        $('#div_' + i).after('<p class="alert alert-danger text-center ac_p_error">' + item + '</p>');
                    });
                } else {
                    if (msg == 1) {    
                    	swal({   
                    		title: "Editado",   
                    		text: "Se actualizó correctamente el perfil!",   
                    		type: "success"                 
                    	}, 
                    	function(){
                    		location.href = js_site_url; 
                    	});              
                    } else {
                    	$('#div_waiting_edit_perfil').addClass("hidden");
                    	swal("Error", "Se ha presentado un error al editar su perfil!", "error");
                    }
                }
            }
        });
    });
	
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
            if (parseFloat(photoFile.size / 20480).toFixed(2) > 20480) {
	        	swal('','La imagen seleccionada tiene un tamaño mayor a 20 MB', 'error');
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
	            $(photoPreview).attr('src', this.src);
				$(photoPreview).removeClass("hidden");
				$(photoIcon).addClass("hidden");
	        };
		} else {
			$(photoPreview).addClass("hidden");
			$(photoIcon).removeClass("hidden");
		}
	});
	
    $('#select_depto').change(function () {
        var idDepartamento = $(this).val();
        $("#select_ciudades > option").remove();
        if (idDepartamento != -1) {
            $.ajax({
                type: "GET",
                url: js_site_url + "listar_ciudades/" + idDepartamento,
                success: function (ciudades){
                    $.each(ciudades, function (id_ciudad, nombre_ciudad){
                        var opt = $('<option />');
                        opt.val(id_ciudad);
                        opt.text(nombre_ciudad);
                        $('#select_ciudades').append(opt);
                    });
                    $('#select_ciudades').prop('disabled', false);
                }
            });
        } else {
            var opt = $('<option />').val('-1').text('Seleccione un departamento');
            $('#select_ciudades').append(opt);
            $('#select_ciudades').prop('disabled', true);
            return false;
        }
    });
    
    $('#edit_password_form').submit(function (event) {
        event.preventDefault();
        $('.ac_p_error').fadeOut('slow').remove();
        var postData = $(this).serializeArray(); 
        $.ajax({
            type: 'POST',
            url: js_site_url + 'edit_password/',
            data: postData,
            beforeSend:function(){
            	$('#div_waiting_edit_pass').removeClass("hidden");            	
            },
            success: function (msg) {
                if (isNaN(msg)) {
                	$('#div_waiting_edit_pass').addClass("hidden");   
                    $.each(msg, function (i, item) {
                        $('#div_' + i).after('<p class="alert alert-danger text-center ac_p_error">' + item + '</p>');
                    });
                } else {
                    if (msg == 1) {    
                    	swal({   
                    		title: "Editado",   
                    		text: "Se actualizó correctamente la contraseña!",   
                    		type: "success"                 
                    	}, 
                    	function(){
                    		location.href = js_site_url;
                    	});              
                    } else if (msg == 0) {
                    	$('#div_waiting_edit_pass').addClass("hidden");
                    	swal("Error", "Se ha presentado un error al cambiar la contraseña!", "error");
                    } else {
                        $('#div_waiting_edit_pass').addClass("hidden");
                    	swal("Error", "La contraseña actual no coincide, por favor vuelva a ingresar la contraseña actual!", "error");
                    }
                }
            }
        });
    });
	
	
    $("#chkEliminarFoto").iCheck({
		"checkboxClass": "icheckbox_square-blue",
    });
    
    $.fn.datepicker.defaults.format = "yyyy/mm/dd";
	$.fn.datepicker.dates["es"] = {
		days: ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo"],
		daysShort: ["Dom", "Lun", "Mar", "Mié", "Jue", "Vie", "Sáb", "Dom"],
		daysMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa", "Do"],
		months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
		monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
		today: "Hoy"
	};
    
    $(".date-select").datepicker({
        language: "es",
        autoclose: true,
        endDate: "0d",
        todayHighlight: true,
        daysOfWeekHighlighted: "0",
    });
});
