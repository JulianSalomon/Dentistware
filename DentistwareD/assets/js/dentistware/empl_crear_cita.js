$(function() {    
	
    $("#crear_citas_form").submit(function (event) {
        event.preventDefault();
        $('.ac_p_error').fadeOut('slow').remove();
        var postData = $(this).serializeArray();
        $.ajax({        	
            type: 'POST',
            url: js_site_url + 'crear_citas/',
            data: postData,      
            beforeSend:function(){
            	$('#div_waiting_edit_cita').removeClass("hidden");            	
            },
            success: function (msg) {  
            	console.log(msg);
                if (isNaN(msg)) {    
                	$('#div_waiting_edit_cita').addClass("hidden");   
                    $.each(msg, function (i, item) {
                        $('#div_' + i).after('<p class="alert alert-danger text-center ac_p_error">' + item + '</p>');
                    });
                } else {
                    if (msg) {                       	
                    	swal({   
                    		title: "Editado",   
                    		text: "Se han creado un total de " + msg + " citas.",   
                    		type: "success"
                    	}, 
                    	function(){   
                    		location.reload(); 
                    	});                    	
                    } else {
                    	swal('Error', "No se han podido crear las citas, verifique los datos o intente con otras opciones", "error");
                    }
                }
            }
        });
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
          startDate: "0d",
          daysOfWeekDisabled: [0],
          todayHighlight: true,
          daysOfWeekHighlighted: "0",
	});
      
	$(".timepicker").timepicker({
          showInputs: false,
          minuteStep: 30,
          defaultTime: false, 
          snapToStep: true,
    });
      
});
