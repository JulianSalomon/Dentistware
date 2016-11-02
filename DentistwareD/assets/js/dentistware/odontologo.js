$(function() {
    $('.verRegistro-btn').click(function(e) {
        e.preventDefault();
        var documento = $(this).attr('doc');
        if(documento == "null"){
            swal("Error", "Usted no puede eliminar a este usuario", "error");
        } else {
            swal("Error", "Usted si puede eliminar a este usuario", "error");
            /*
            swal({
                title: 'Eliminar',
                text: '¿Desea eliminar este ' + tipo_usuario + '?',
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
                        url: js_site_url + 'eliminar_usuario/' + documento,
                        success: function(msg){
                            if(msg == true){
                                swal({   
                                    title: "Eliminado",
                                    text: "El " + tipo_usuario + " ha sido eliminado",
                                    type: "success",
                                }, 
                                function(){   
                                    location.reload(); 
                                });
                            } else {
                                swal("Error", "El " + tipo_usuario + " no puede ser eliminado", "error");
                            }
                        }
                    });
                }
            });     
            */
        }
    });
});