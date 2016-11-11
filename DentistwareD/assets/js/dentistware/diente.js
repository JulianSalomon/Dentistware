$(function(){
    $("#cancel_diente").click(function (e) {
	});
    
    $('#agregar_diente').click(function (event) {
        event.preventDefault();
        $('.ac_p_error').fadeOut('slow').remove();
        
        $.each( myTeeth.teeth,
               function( index, value ){
            $.post(
                js_site_url + 'Odontologo/Dientes/nuevoDiente', 
                {   num: value["n"],
                    aus: value["state"][0],
                    ext: value["state"][1],
                    car: value["state"][2],
                    obt: value["state"][3],
                    cor: value["state"][4],
                    tra: value["state"][5]},
                function(result) {
                    console.log(result);
                }
            );
        });
    });
});