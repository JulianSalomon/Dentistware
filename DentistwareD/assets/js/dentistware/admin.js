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
		$("#foto_img").removeAttr('src');
		$("#foto_img").addClass("hidden");
		$("#i_foto").removeClass("hidden");
		$("form")[0].reset();
        $(".modal").modal('hide');
        $(".alert").remove();
        $(".form-group").removeClass('has-error');        
	});
    
	$("#inputFoto").change(function () {
		var photoFile = document.getElementById("inputFoto").files[0];
		var photoPreview = document.getElementById("foto_img");
		var photoIcon = document.getElementById("i_foto");
		var imageType = /image.*/;
		
		if(photoFile){
			var preload = new Image();
			var reader = new FileReader();
			
	        if (!photoFile.type.match(imageType)) {
	        	swal('','El archivo selecionado no es un archivo de imagen valido.', 'error');
	        	$('#inputFoto').val('');	
				$(photoPreview).addClass("hidden");
				$(photoIcon).removeClass("hidden");
	            return false;
	        }
            if (parseFloat(photoFile.size / 20480).toFixed(2) > 20480) {
	        	swal('','La imagen seleccionada tiene un tamaño mayor a 20 MB', 'error');
	        	$('#inputFoto').val('');	
				$(photoPreview).addClass("hidden");
				$(photoIcon).removeClass("hidden");
	            return false;
	        }
            reader.onload = (function (aImg) {
	            return function (e) {
	                aImg.src = e.target.result;
	            };
	        })(preload);
	        reader.readAsDataURL(photoFile);
	        
	        preload.onload = function () {
	            $(photoPreview).attr('src', this.src);
				$(photoPreview).removeClass("hidden");
				$(photoIcon).addClass("hidden");
	        };
		} else {
			$(photoPreview).addClass("hidden");
			$(photoIcon).removeClass("hidden");
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
