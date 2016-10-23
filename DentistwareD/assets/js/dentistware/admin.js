$(function() {
    var documento;
    $(".borrarBtn").click(function() {
        documento = $(this).attr("documento");
        console.log(documento);
        $.ajax({
            type: "GET",
            url: js_site_url + "administrador/Cliente/eliminar_usuario/" + documento,
            success: function(message){
                console.log(message);
                if(message==true){
                    console.log("Papu +10");
                } else {
                    console.log("Papu -10000000");
                }
            },
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
    
    $("#datepicker").datepicker({
        language: "es",
        autoclose: true,
    }).on(
        "show", function() {
            var zIndexModal = $("#modal_add_client").css("z-index");
            var zIndexFecha = $(".datepicker").css("z-index");
            $(".datepicker").css("z-index",zIndexModal+1);
    });

    $(".TablaUsuario").DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
});
