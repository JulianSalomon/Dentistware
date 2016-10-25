$(function() {
    $('.borrar-btn').click(function(e) {
        e.preventDefault();
        var documento = $(this).attr('doc');
        if(documento == "null"){
            swal("Error", "Usted no se puede eliminar", "error");
        } else {
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
        }
    });
        
    $('#select_depto').change(function () {
       var idDepartamento = $(this).val();
       $("#select_ciudades > option").remove();
       if (idDepartamento != -1) {
           $.ajax({
               type: "GET",
               url: js_site_url + "listar_ciudades/" + idDepartamento,
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
});
