$(function() {
    $('.borrar-btn').click(function(e) {
        e.preventDefault();
        var documento = $(this).attr('doc');
        if(documento == "null"){
            swal("Error", "Usted no puede eliminar a este usuario", "error");
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
    
	$(".cancel-btn").click(function (e) {
		$("form")[0].reset();
        $(".modal").modal('hide');
        $(".alert").remove();
        $(".form-group").removeClass('has-error');
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
    
    $.fn.datepicker.defaults.format = "yyyy/mm/dd";
	$.fn.datepicker.dates["es"] = {
		days: ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo"],
		daysShort: ["Dom", "Lun", "Mar", "Mié", "Jue", "Vie", "Sáb", "Dom"],
		daysMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa", "Do"],
		months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
		monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
		today: "Hoy"
	};
	
    
    $(".date-select").datepicker({
        language: "es",
        autoclose: true,
        endDate: "0d",
        todayHighlight: true,
        daysOfWeekHighlighted: "0",
    }).on(
        "show", function() {
            var zIndexModal = $(".modal-add").css("z-index");
            var zIndexFecha = $(".datepicker").css("z-index");
            $(".datepicker").css("z-index",zIndexModal+1);
    });

    $(".tabla-usuario").DataTable({
	    "language":{
		    "info": "Mostrando un total de _TOTAL_ registros",
		    "infoThousands": ",",
		},
		"paging": false,
		"info": true,
		"searching": false,
        "ordering": true,
        "autoWidth": false,
    });
});
