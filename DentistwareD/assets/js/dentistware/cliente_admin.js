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
    
    
    
});