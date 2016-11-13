$(function(){
    $('.verRegistro-btn').click(function(e) {
        e.preventDefault();
        $('.ac_p_error').fadeOut('slow').remove();
        var id = $(this).val();
        var postData = { 'reg'   : id, };
        var htmlWrapper = '';
        $.ajax({
            type: 'POST',
            url: js_site_url + 'Registro/',
            data: postData,
            success: function(html) {
                htmlWrapper = html;
            },
            error: function(msg){
                console.log(msg);
            }
        });
        $.ajax({
            type: 'POST',
            url: js_site_url + 'Diente/',
            data: postData,
            success: function(html) {
                htmlWrapper += html;
                $('#verRegistro_html').html(htmlWrapper);
                $('#verRegistro').modal('show');
            },
            error: function(msg){
                console.log(msg);
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
      
    
   /* $(".date-select").datepicker({
        language: "es",
        autoclose: true,
    }).on(
        "show", function() {
            var zIndexModal = $(".modal-add").css("z-index");
            var zIndexFecha = $(".datepicker").css("z-index");
            $(".datepicker").css("z-index",zIndexModal+1);
    });

    $(".tabla-usuario").DataTable({
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": false,
        "autoWidth": false,
    });  */
    
    $('.no-asistir-btn').click(function(e) {
		e.preventDefault();
        var cita = $(this).attr('cita');
        var cliente = $(this).attr('cliente');
        swal({
            title: 'Marcar cita',
            text: '¿Desea marcar como no asistida la cita con ' + cliente + '?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sí, marcar',
            cancelButtonText: 'No, no confirmar',
            showLoaderOnConfirm: true,
        },
        function(isConfirm) {
            if (isConfirm) {
            	$.ajax({
                    type: 'GET',
                    url: js_site_url + 'marcar_no_asistir/' + cita,
                    success: function(msg){
                        console.log(msg);
                        if(msg){                            
                            swal({   
                                title: "Cita marcada",
                                text: "La cita con " + cliente + " ha sido marcada como no asistida por el cliente.",
                                type: "success",
                            }, 
                            function(){   
                                location.reload(); 
                            });
                        } else {
                            swal("Error", "La cita con " + odonto + " no puede ser marcada, vuelva a intentarlo.", "error");
                        }
                    }
                });
            }
        });           
    });
    
    $('.atender-btn').click(function(e) {
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
    
    

	$(".timepicker").timepicker({
          showInputs: false,
          minuteStep: 30,
          defaultTime: false              
    });
          
});