$(function(){
    var lastRegId;
    $('.verRegistro-btn').click(function(e) {
        e.preventDefault();
        $('.ac_p_error').fadeOut('slow').remove();
        var id = $(this).val();
        if( id != lastRegId ){
            var postData = { 'reg'   : id, };
            var htmlWrapper;
            $.ajax({
                type: 'POST',
                url: js_site_url + 'Registro/',
                data: postData,
                success: function(html) {
                    htmlWrapper = html;
                },
                error: function(msg){
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
        }
    });    
    
 
    
    $('.no-asistir-btn').click(function(e) {
		e.preventDefault();
        var cita = $(this).attr('cita');
        var cliente = $(this).attr('cliente');
        swal({
            title: 'Marcar cita',
            text: '¿' + cliente + ' no ha asistido a la cita?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sí, marcar como no asistida',
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
        var cliente = $(this).attr('cliente');
        var id = $(this).attr('id');
        swal({
            title: 'Atender',
            text: '¿Desea atender su cita con ' + cliente + '?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sí, atender cita',
            cancelButtonText: 'No atender la cita',
            showLoaderOnConfirm: true,
        },
        function(isConfirm) {
            if (isConfirm) {
            	window.location.href = js_site_url2 + "index/" + id + "/" + cliente;
                
            }
        });           
    });    

	$(".timepicker").timepicker({
          showInputs: false,
          minuteStep: 30,
          defaultTime: false              
    });          
});