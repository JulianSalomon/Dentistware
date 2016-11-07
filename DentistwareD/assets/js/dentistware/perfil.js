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
                console.log(msg);
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
                    	swal("Error", "Se ha presentado un error al editar éste perfil!", "error");
                    }
                }
            },
            error: function(){
                console.log("AASDA")
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
