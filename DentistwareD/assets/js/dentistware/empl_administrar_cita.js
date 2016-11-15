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
            confirmButtonText: 'Sí, agendar',
            cancelButtonText: 'No, cancelar',
            showLoaderOnConfirm: true,
        },
        function(isConfirm) {
              if (isConfirm) {
                  $.ajax({
                	type: 'GET',
                    url: js_site_url + 'agendar_cita/' + cita,
                    success: function(msg){
                        if(msg){
                            swal({   
                                title: "Cita agendada",
                                text: "La cita con " + odonto + " ha sido agendada.",
                                type: "success",
                            }, 
                            function(){   
                                location.reload(); 
                            });
                        } else {
                            swal("Error", "La cita con " + odonto + " no puede ser agendada, vuelva a intentarlo.", "error");
                        }
                    }
                });
            }
        });               
    });
	
	$(".editar-btn").click(function (e) {
		e.preventDefault();
		var idCita = $(this).attr("data-id");
		var hora = $(this).attr("data-hora");
		var fecha = $(this).attr("data-fecha");
		var odontologo = $(this).attr("data-odonto");
		var cliente= $(this).attr("data-cliente");
		var consultorio = $(this).attr("data-consultorio");				
		
		$('#idCita').val(idCita);
		$('#inputEditFecha').val(fecha);
		$('#inputHideFecha').val(fecha);
		$('#inputEditHora').val(hora);
		$('#inputHideHora').val(hora);
		
		if(cliente == 1){
			$('#fecha').hide();
			$('#hora').hide();
		} else {
			$('#fecha').show();
			$('#hora').show();
		}		
		
		$('#inputConsultorio').val(consultorio);
		$('#selectEditOdontologo').val(odontologo);
	});	
    
	$('.borrar-btn').click(function(e) {
		e.preventDefault();
        var cita = $(this).attr('data-id');
        swal({
            title: 'Borrar',
            text: '¿Desea borrar esta cita?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sí, Borrar',
            cancelButtonText: 'Cancelar',
            showLoaderOnConfirm: true,
        },
        function(isConfirm) {
            if (isConfirm) {
            	$.ajax({
                    type: 'GET',
                    url: js_site_url + 'borrar_cita/' + cita,
                    success: function(msg){
                        if(msg){                            
                            swal({   
                                title: "Cita Borrada",
                                text: "La cita ha sido borrada.",
                                type: "success",
                            }, 
                            function(){   
                                location.reload(); 
                            });
                        } else {
                            swal("Error", "La cita no ha podido ser borrada.", "error");
                        }
                    }
                });
            }
        });           
    });
	
    $("#edit_cita_form").submit(function (event) {
        event.preventDefault();
        $('.ac_p_error').fadeOut('slow').remove();
        var postData = $(this).serializeArray();
        $.ajax({        	
            type: 'POST',
            url: js_site_url + 'editar_cita/',
            data: postData,      
            beforeSend:function(){
            	$('#div_waiting_edit_cita').removeClass("hidden");            	
            },
            success: function (msg) {  
                if (isNaN(msg)) {    
                	$('#div_waiting_edit_cita').addClass("hidden");   
                    $.each(msg, function (i, item) {
                        $('#div_' + i).after('<p class="alert alert-danger text-center ac_p_error">' + item + '</p>');
                    });
                } else {
                    if (msg == 1) {                       	
                    	swal({   
                    		title: "Editado",   
                    		text: "La cita ha sido editada!",   
                    		type: "success"
                    	}, 
                    	function(){   
                    		location.reload(); 
                    	});                    	
                        $('#modal_edit_cita').modal('hide');
                    } else if (msg == 2){
                    	swal("Error", "No puede editar la cita con este horario, ya que el odontólogo tiene una cita en el mismo horario", "error");
                    	$('#div_waiting_edit_cita').addClass("hidden");  
                    } else {
                    	swal("Error", "Se ha presentado un error al editar los datos de la cita, por favor verifique los datos", "error");
                    	$('#div_waiting_edit_cita').addClass("hidden");  
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
