$(function() {
    $('.verRegistro-btn').click(function(e) {
        e.preventDefault();
        $('.ac_p_error').fadeOut('slow').remove();
        var fecha  = new $(this).val(); 
        $.ajax({
            type: 'POST',
            url: js_site_url + 'Historia_clinica/seleccionarHistoria/' + $fecha
        });
    });
    
    $('.verDiente-btn').click(function(e) {
        e.preventDefault();
        $('.ac_p_error').fadeOut('slow').remove();
        var id = $(this).val();
        document.location.href =  js_site_url + 'Dientes/seleccionarPaciente/' + id;
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