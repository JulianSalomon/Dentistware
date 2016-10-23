$(function() {
   
    $('#select_depto').change(function () {
        var idDepartamento = $(this).val();
        $("#select_ciudades > option").remove();
        
        if (idDepartamento != -1) {
            $.ajax({
                type: "GET",
                url: js_site_url + "administrador/Cliente/listar_ciudades/" + idDepartamento,
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
    
    
    $('#nuevo_cliente_form').submit(function (event) {
        event.preventDefault();
        $('.ac_p_error').fadeOut('slow').remove();
        var postData = $(this).serializeArray();    
        console.log(postData);
        $.ajax({
            type: 'POST',
            url: js_site_url + 'administrador/Cliente/nuevo_cliente/',
            data: postData,
            beforeSend:function(){
            	$('#div_waiting_new_cliente').removeClass("hidden");            	
            },
            success: function (msg) {
                
                if (isNaN(msg)) {
                	$('#div_waiting_new_cliente').addClass("hidden");  
                    $.each(msg, function (i, item) {
                        $('#div_' + i).after('<p class="alert alert-danger text-center ac_p_error" role="alert">' + item + '</p>');
                    });
                } else {
                    if (msg == 1) {    
                    	swal({   
                    		title: "",   
                    		text: "Se insertó exitosamente el cliente!",   
                    		type: "success"                 
                    	}, 
                    	function(){   
                    		location.reload(); 
                    	});                    	
                        $('#modal_add_client').modal('hide');
                    } else {
                    	$('#div_waiting_new_cliente').addClass("hidden"); 
                    	swal("Error", "Se ha presentado un error al ingresar el cliente!", "error");
                    }
                }
            }
        });
    });        
});