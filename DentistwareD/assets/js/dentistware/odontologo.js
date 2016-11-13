$(function() {
    var modal = false;
    
    $('.verRegistro-btn').click(function(e) {
        e.preventDefault();
        $('.ac_p_error').fadeOut('slow').remove();
        var fecha  = new $(this).val(); 
        console.log(fecha);
        $.ajax({
            type: 'POST',
            url: js_site_url + 'Historia_clinica/seleccionarHistoria/' + fecha,
        });
    });
    
    $('.verDiente-btn').click(function(e) {
        e.preventDefault();
        $('.ac_p_error').fadeOut('slow').remove();
        var id = $(this).val();
        if(modal != id){
            $.ajax({
            type: 'POST',
            url: js_site_url + 'Dientes/',
            data: {
                'reg' : id
                  },
            success: function(html) {
                $('#verDientes_html').html(html);
                $('#verDientes').modal('show');
            },
            error: function(msg) {
                alert(msg);
            }
        });  
            modal=id;
        } else {
            $('#verDientes').modal('show');
        }        
    });
    
    $(".date-select").datepicker({
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
    });  
    
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
});