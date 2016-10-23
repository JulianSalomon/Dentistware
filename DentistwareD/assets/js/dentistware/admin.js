$(function() {
    $('.borrarBtn').click(function(e) {
        e.preventDefault();
        var documento = $(this).attr('doc-cliente');       
        swal({
            title: 'Eliminar',
            text: '¿Desea eliminar este cliente?',
            type: 'warning',
    		showCancelButton: true,
			confirmButtonClass: "btn-primary",
			cancelButtonClass: "btn-danger",
            confirmButtonText: 'Si, eliminar',
            cancelButtonText: 'No, cancelar',
            showLoaderOnConfirm: true,
        },
    	function(isConfirm) {
    		  if (isConfirm) { 
                $.ajax({
                    type: 'GET',
                    url: js_site_url + 'administrador/Cliente/eliminar_usuario/' + documento,
                    success: function(msg){   
                        console.log(msg);
                        if(msg == true){
                            swal({   
                                title: "Eliminado",
                                text: "El cliente ha sido eliminado",
                                type: "success",             
                            }, 
                            function(){   
                                location.reload(); 
                            });
                        } else {
                            swal("Error", "El cliente no puede ser eliminado", "error");
                        }
                    },
                    error: function(){
                        alert("ADAd");
                    }
                });
            }
        });       
    });
        
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
    
    $(".date-select").datepicker({
        language: "es",
        autoclose: true,
    }).on(
        "show", function() {
            var zIndexModal = $("#modal_add_client").css("z-index");
            var zIndexFecha = $(".datepicker").css("z-index");
            $(".datepicker").css("z-index",zIndexModal+1);
    });

    $(".tabla-usuario").DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false
    });
});
