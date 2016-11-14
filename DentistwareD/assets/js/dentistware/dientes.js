$('#verRegistro').on('hidden.bs.modal', function(){
    try {
        remove();
    }
    catch(err) {
        // Handle error(s) here
    }
    $('#verRegistro_html').html('');
});

$('#verRegistro').on('shown.bs.modal', function () {
    modalWidth = $("#verRegistroModal").width();
    modalHeight = $("#verRegistroModal").height();
    stateAux = $('input[name="state"]:checked').val();
    var editable = 0;
    setup();
    draw();
        /*$("input[name=state]").click(function () {
              stateAux = $(this).val();
        });

        $('#agregarDiente').click(function (event) {
            event.preventDefault();
            $('.ac_p_error').fadeOut('slow').remove();
            var regId = $(this).val();
                $.each( myTeeth.teeth,
                   function( index, value ){
                $.post(
                    js_site_url + 'Odontologo/Diente/nuevoDiente', 
                    {   reg: regId,
                        num: value["n"],
                        aus: value["state"][0],
                        ext: value["state"][1],
                        car: value["state"][2],
                        obt: value["state"][3],
                        cor: value["state"][4],
                        tra: value["state"][5]},
                    function(result) {
                    }
                );
            });
        })*/
});