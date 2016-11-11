$(function() {    
	$('.asignar-btn').click(function(e) {
		e.preventDefault();
        var cita = $(this).attr('cita');
        var odonto = $(this).attr('odonto');
  	  	swal({
			title: "Documento",
			text: "Por favor ingrese el documento del cliente a quien se le agendará la cita.",
			type: "input",
			showCancelButton: true,
			closeOnConfirm: false,
			animation: "slide-from-top",
			inputPlaceholder: "Documento"
		},
		function(inputValue){
			if (inputValue === false) 
				return false;
			  
			if (inputValue === "") {
				swal.showInputError("Debes escribir un documento!");
			    return false;
			}			 
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
						url: js_site_url + 'agendar_cita/' + cita + '/' + inputValue ,
						success: function(msg){
							if(msg == 1){								
						        swal({   
						            title: "Cita agendada",
						            text: "La cita con " + odonto + " ha sido agendada.",
						            type: "success",
									showConfirmButton: true
						        }, 
							    function(){   
							        location.reload(); 
							    });
							} else {
							    swal("Error", "La cita con no se ha podido agendar. Verifique el documento ingresado y vuelva a intentarlo", "error");
							}
						}
					});					
				}
			});
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
          showMeridian: true,              
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
