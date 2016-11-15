$(function() {    
	$('.asignar-btn').click(function(e) {
		e.preventDefault();
        var cita = $(this).attr('cita');
        var odonto = $(this).attr('odonto');
    	swal({
    		title: 'Asignar',        
            text: '¿Desea agendar esta cita con ' + odonto + '?',
            type: 'warning',
            showCancelButton: true,
            closeOnConfirm: false,
            confirmButtonText: 'Sí, agendar',
            cancelButtonText: 'No, cancelar',
            showLoaderOnConfirm: true,
        },
        function(isConfirm) {
              if (isConfirm) {
                  $.ajax({
                	type: 'GET',
                    url: js_site_url + '/agendar_cita/' + cita,
                    success: function(msg){
                    	console.log(msg);
                        if(msg == 1){                        	
                            swal({   
                                title: "Cita agendada",
                                text: "La cita con " + odonto + " ha sido agendada.",
                                type: "success",
                            }, 
                            function(){   
                                location.reload(); 
                            });
                        } else if (msg == 2){
                            swal("Error", "Usted ya tiene una cita en el mismo horario, por favor seleccione otro horario.", "error");
                        } else {
                        	swal("Error", "La cita con " + odonto + " no puede ser agendada, vuelva a intentarlo.", "error");
                        }
                    }
                });
            }
        });               
    });
    
    
   $('.informacion-btn').click(function(e) {
		e.preventDefault();
        var odonto = $(this).attr('odonto');
      
        var opciones = "width=500,height=500,scrollbars=NO";
    	var url = js_site_url + "/informacion_odontologo/" + odonto;
    	window.open(url, "Información Odontólogo", opciones);     
    });
    
	$('.cancelar-btn').click(function(e) {
		e.preventDefault();
        var cita = $(this).attr('cita');
        var odonto = $(this).attr('odonto');
        swal({
            title: 'Cancelar',
            text: '¿Desea cancelar su cita con ' + odonto + '?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sí, cancelar cita',
            cancelButtonText: 'No, mantener cita',
            showLoaderOnConfirm: true,
        },
        function(isConfirm) {
            if (isConfirm) {
            	$.ajax({
                    type: 'GET',
                    url: js_site_url + 'cancelar_cita/' + cita,
                    success: function(msg){
                        console.log(msg);
                        if(msg){                            
                            swal({   
                                title: "Cita cancelada",
                                text: "La cita con " + odonto + " ha sido cancelada.",
                                type: "success",
                            }, 
                            function(){   
                                location.reload(); 
                            });
                        } else {
                            swal("Error", "La cita con " + odonto + " no puede ser cancelada, vuelva a intentarlo.", "error");
                        }
                    }
                });
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
          defaultTime: false              
    });
          
    $(".tabla-citas").DataTable({
  	    "language":{
  		    "info": "Mostrando un total de _TOTAL_ registros",
  		    "infoThousands": ",",
  		},
  		"paging": false,
  		"info": true,
  		"searching": false,
          "ordering": true,
          "autoWidth": false,
    });      
});