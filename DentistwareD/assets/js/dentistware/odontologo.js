$(function() {

	//Atender una cita
	$('.atender-btn').click(function(e) {
		e.preventDefault();
		var cliente = $(this).attr('cliente');
		var id = $(this).attr('id');
		var cita = $(this).attr('cita');
		swal({
				title: 'Atender',
				text: '¿Desea atender a ' + cliente + '?',
				type: 'warning',
				showCancelButton: true,
				confirmButtonText: 'Sí, Atender',
				cancelButtonText: 'No, Cancelar',
				showLoaderOnConfirm: true,
			},
			function(isConfirm) {
				if (isConfirm) {
					$.ajax({
						type: 'POST',
						url: js_site_url + 'Historia_Clinica/seleccionar_cita/',
						data: {
							id_cliente: id,
							id_cita: cita
						},
						success: function(msg, result) {
							window.location.href = js_site_url + "Historia_Clinica/";
						}
					});
				}
			});
	});

	var force = false;
	//Sale de la historia clínica del cliente    
	//Marcar cita como Asistió
	$('.asistir-btn').click(function(e) {
		e.preventDefault();
		var id_cita = $(this).attr('cita');
        var id_cliente = $(this).attr('cliente');
        if (force) {
			$.ajax({
				type: 'POST',
				url: js_site_url + 'Cita/marcar_asiste/',
				data: {
					cita: id_cita
				},
				success: function(msg) {
					if (msg == 1) {
						swal({
								title: "Cita finalizada.",
								text: "La cita ha finalizado.",
								type: "success",
							},
							function() {
								window.location.href = js_site_url + "Historia_Clinica/Eliminar_Seleccion";
							}
						);
					} else {
						swal({
							title: "Error",
							text: "La cita no ha podido finalizar, por favor vuelva a intentarlo",
							type: "error"
						});
					}
				}
			});
		} else {
			swal({
					title: 'Terminar cita',
					text: '¿Desea terminar la cita?, recuerde que no podrá volver a acceder a la historia clínica.',
					type: 'warning',
					showCancelButton: true,
					confirmButtonText: 'Sí, terminar',
					cancelButtonText: 'No, cancelar',
					showLoaderOnConfirm: true,
                    closeOnConfirm: false,
				},
				function(isConfirm) {
					if (isConfirm) {
						$.ajax({
							type: 'POST',
							url: js_site_url + 'Cita/marcar_asiste/',
							data: {
								cita: id_cita
							},
							success: function(msg) {
                                console.log(msg);
								if (msg) {
									swal({
											title: "Cita terminada",
											text: "La cita ha finalizado.",
											type: "success",
										},
										function() {
											window.location.href = js_site_url + "Historia_Clinica/Eliminar_Seleccion";
										}
									);
								} else {
									swal({
										title: "Error",
										text: "La cita no ha podido finalizar, por favor vuelva a intentarlo",
										type: "error"
									});
								}
							}
						});
					}
				}
			);
		}
	});

	//Marcar cita como No Asistió
	$('.no-asistir-btn').click(function(e) {
		e.preventDefault();
		var cita = $(this).attr('cita');
		var cliente = $(this).attr('cliente');
		swal({
				title: 'Marcar cita',
				text: '¿Desea marcar la cita con ' + cliente + ' como no asistió?',
				type: 'warning',
				showCancelButton: true,
				confirmButtonText: 'Sí, confirmar',
				cancelButtonText: 'No, cancelar',
				showLoaderOnConfirm: true,
			},
			function(isConfirm) {
				if (isConfirm) {
					$.ajax({
						type: 'POST',
						url: js_site_url + 'Cita/marcar_no_asiste/',
						data: {
							cita: cita
						},
						success: function(msg) {
							if (msg) {
								swal({
										title: "Cita",
										text: "La cita con " + cliente + " ha sido marcada como no asistida por el cliente.",
										type: "success",
									},
									function() {
										location.reload();
									});
							} else {
								swal({
									title: "Error",
									text: "La cita con " + cliente + " no la puede marcar, por favor vuelva a intentarlo.",
									type: "error"
								});
							}
						}
					});
				}
			}
		);
	});

	//Abrir modal generar registro
	$('.agregarRegistro-btn').click(function(e) {
		e.preventDefault();
		$('.ac_p_error').fadeOut('slow').remove();
		editable = true;
		teeth = teethAux;
	})

	//Salir del modal generar registro
	$('.salir-btn').click(function(e) {
		e.preventDefault();
		$('.ac_p_error').fadeOut('slow').remove();
		teethAux = teethOriginal;
	})

	//Mientras el modal de generar registro está abierto
	$('#agregarRegistro').on('shown.bs.modal', function() {
		modalWidth = $("#agregarRegistroModal").width();
		modalHeight = $("#agregarRegistroModal").height();
		stateAux = $('input[name="state"]:checked').val();
		setup();
		mouseClicked();
		draw();

		//Cambio de estado para pintar
		$("input[name=state]").click(function() {
			stateAux = $(this).val();
		});

		//Insertar registro en la base de datos
		$('#nuevoRegistro_form').submit(function(event) {
			event.preventDefault();
			$('.ac_p_error').fadeOut('slow').remove();
			var postData = new FormData(this);
			swal({
					title: 'Guardar registro',
					text: '¿Desea guardar este registro?, al aceptar la cita se finalizará y no podrá volver a ver la historia clínica.',
					type: 'warning',
					showCancelButton: true,
					confirmButtonText: 'Sí, confirmar',
					cancelButtonText: 'No, cancelar',
					showLoaderOnConfirm: true,
					closeOnConfirm: false
				},
				function(isConfirm) {
					if (isConfirm) {
						$.ajax({
							type: 'POST',
							url: js_site_url + 'Registro/nuevo_registro',
							data: postData,
							processData: false,
							contentType: false,
							success: function(result) {
								if (result != 0) {
									var regId = result;
									$.each(myTeeth.teeth,
										function(index, value) {
											postData = {
												reg: regId,
												num: value["n"],
												aus: value["state"][0],
												ext: value["state"][1],
												car: value["state"][2],
												obt: value["state"][3],
												cor: value["state"][4],
												tra: value["state"][5]
											}
											$.post(
												js_site_url + 'Diente/nuevoDiente',
												postData,
												function(result) {
													if (result != 0) {
														swal({
																title: 'Ingreso satisfactorio',
																text: 'El nuevo registro de la historia clínica ha sido generado satisfactoriamente.',
																type: 'success',
																closeOnConfirm: true
															},
															function(isConfirm) {
																if (isConfirm) {
																	force = true;
																	$('.asistir-btn').click();
																}
															});
													} else {
														swal({
															title: 'Error',
															text: 'El registro de la historia clínica no se ha podido insertar',
															type: 'error',
														})
													}
												}
											)
										}
									);
								} else {
									swal({
										title: 'Error',
										text: 'El registro de la historia clínica no se ha podido insertar',
										type: 'error',
									})
								}
							},
							error: function(msg) {
								swal({
									title: 'Error',
									text: 'El registro de la historia clínica no se ha podido insertar',
									type: 'error',
								})
							}
						})
					}
				}
			);
		})
	});

	//Guarda el último registro visto
	var lastRegId;
	//Abrir modal para ver registro
	$('.verRegistro-btn').click(function(e) {
		e.preventDefault();
		$('.ac_p_error').fadeOut('slow').remove();
		var id = $(this).val();
		if (editable) {
			lastRegId = undefined;
			teethAux = teeth;
			editable = false;
		}
		if (id !== lastRegId) {
			lastRegId = id;
			var htmlWrapper = '';
			var postData = {
				'reg': id,
			};
			$.ajax({
				type: 'POST',
				url: js_site_url + 'Registro/',
				data: postData,
				success: function(html) {
					htmlWrapper = html;
					$.ajax({
						type: 'POST',
						url: js_site_url + 'Diente/',
						data: postData,
						success: function(html) {
							htmlWrapper += html;
							$('#verRegistro_html').html(htmlWrapper);
							$('#verRegistro').modal('show');
						},
						error: function(msg) {}
					});
				},
				error: function(msg) {}
			});
		} else {
			$('#verRegistro').modal('show');
		}
        $('#verRegistro').on('shown.bs.modal', function() {
            modalWidth = $("#verRegistroModal").width();
            modalHeight = $("#verRegistroModal").height();
            stateAux = $('input[name="state"]:checked').val();
            setup();
            draw();
        });
	});

	//Abrir ventana de crear historia
	$('.crear-historia-btn').click(function(e) {
		e.preventDefault();
        var time = $( "#runner" ).text();
        time = time.replace('.','');
        time = time.replace(':','');
        time = time.replace(':','');
        time = parseInt(time);
        console.log(time);
		window.location.href = js_site_url + "Historia_Clinica/Crear_Historia_Clinica/" + time ;
   
	});
	$('.cancelar-edit-btn').click(function(e) {
		e.preventDefault();
        var time = $( "#runner2" ).text();
        time = time.replace('.','');
        time = time.replace(':','');
        time = time.replace(':','');
        time = parseInt(time);
        console.log(time);
		window.location.href = js_site_url + "Historia_Clinica/index/" + time ;
   
	});
    
    	$('.cancelar-edit2-btn').click(function(e) {
		e.preventDefault();
        var time = $( "#runner2" ).text();
        time = time.replace('.','');
        time = time.replace(':','');
        time = time.replace(':','');
        time = parseInt(time);
        console.log(time);
		window.location.href = js_site_url + "index/" + time ;
   
	});

	$('.editar-historia-btn').click(function(e) {
		e.preventDefault();
          var time = $( "#runner" ).text();
        time = time.replace('.','');
        time = time.replace(':','');
        time = time.replace(':','');
        time = parseInt(time);
        console.log(time);
		window.location.href = js_site_url + "Historia_Clinica/Editar_Historia_Clinica/" + time ;
	});

    //Inserta historia en la base de datos
	$('#nueva_historia_form').submit(function(event) {
            var time = $( "#runner2" ).text();
        time = time.replace('.','');
        time = time.replace(':','');
        time = time.replace(':','');
        time = parseInt(time);
        console.log(time);
		event.preventDefault();
		$('.ac_p_error').fadeOut('slow').remove();
		var postData = $(this).serializeArray();
		swal({
				title: 'Guardar historia clínica',
				text: '¿Desea guardar esta historia clínica?',
				type: 'warning',
				showCancelButton: true,
				confirmButtonText: 'Sí',
				cancelButtonText: 'No',
				showLoaderOnConfirm: true,
				closeOnConfirm: false
			},
			function(isConfirm) {
				if (isConfirm) {
					$.ajax({
						type: 'POST',
						url: js_site_url + 'historia_clinica/nueva_historia_clinica/' + time,
						data: postData,
						beforeSend: function() {
							$('#div_waiting_new_story').removeClass("hidden");
						},
						success: function(msg) {
							if (isNaN(msg)) {
								$('#div_waiting_new_story').addClass("hidden");
								$.each(msg, function(i, item) {
									$('#div_' + i).after('<p class="alert alert-danger text-center ac_p_error" role="alert">' + item + '</p>');
									swal("Error", "Algunos campos no han sido llenados.", "error");
								});								
							} else {
								if (msg == 1) {
									$('#div_waiting_new_story').addClass("hidden");
									swal({
											title: "Historia clínica generada",
											text: "Se insertó exitosamente la historia clínica",
											type: "success"
										},
										function() {
											window.location.href = js_site_url + "Historia_Clinica/index/" + time;
										}
									)
								} else {
									$('#div_waiting_new_story').addClass("hidden");
									swal("Error", "Se ha presentado un error al ingresar la historia clínica", "error");
								}
							}
						}
					});
				}
			}
		);
	});

	//Formulario para editar historia
	$('#editar_historia_form').submit(function(event) {
		event.preventDefault();
             var time = $( "#runner2" ).text();
        time = time.replace('.','');
        time = time.replace(':','');
        time = time.replace(':','');
        time = parseInt(time);
        console.log(time);
		$('.ac_p_error').fadeOut('slow').remove();
		var cliente = $(this).attr('cliente');
		var postData = $(this).serializeArray();
		$.ajax({
			type: 'POST',
			url: js_site_url + 'historia_clinica_editada/',
			data: postData,
			beforeSend: function() {
				$('#div_waiting_edit_story').removeClass("hidden");
			},
			success: function(msg) {
				if (isNaN(msg)) {
					$('#div_waiting_edit_story').addClass("hidden");
					$.each(msg, function(i, item) {
						$('#div_' + i).after('<p class="alert alert-danger text-center ac_p_error" role="alert">' + item + '</p>');
					});
				} else {
					if (msg == 1) {
						swal({
								title: "",
								text: "Se editó exitosamente la historia clínica",
								type: "success"
							},
							function() {
								window.location.href = js_site_url + '/index/'  + time;
							});
						$('#modal_edit_story').modal('hide');
					} else {
						$('#div_waiting_edit_story').addClass("hidden");
						swal("Error", "Se ha presentado un error al editar la historia clínica.", "error");
					}
				}
			}
		});
	});

	$("#tablaRegistro").DataTable({
		"language": {
			"info": "Mostrando un total de _TOTAL_ registros",
			"infoThousands": ",",
		},
		"paging": false,
		"info": true,
		"searching": false,
		"ordering": true,
		"autoWidth": false,
	});

     if(isNaN(timed)){
        timed = 0
    } 
    var segundos = 0;
    var minutos = 0;
    timed = timed.replace('.','');
        timed = timed.replace(':','');
        timed = timed.replace(':','');
    if(timed.length <= 2){
       segundos = timed;
    }else if(timed.length == 3){
        segundos = timed.substring(1,3);
        minutos = timed.substring(0,1);
    }else if(timed.length >3){
        segundos = timed.substring(2,4);
        minutos = timed.substring(0,3);
    }
  
    segundos = segundos * 1000;
    minutos = minutos * 60 * 1000;
        timed = parseInt((segundos + minutos));
   /*  //timed =
          // 1- Convert to seconds:
    var seconds = timed / 1000;
    // 2- Extract hours:
    var hours = parseInt( seconds / 3600 ); // 3,600 seconds in 1 hour
    seconds = seconds % 3600; // seconds remaining after extracting hours
    // 3- Extract minutes:
    var minutes = parseInt( seconds / 60 ); // 60 seconds in 1 minute
    // 4- Keep only seconds not extracted to minutes:
    seconds = seconds % 60;
    timed = parseInt(hours + minutes + seconds); */
   // console.log(segundos);
   // console.log(minutos);
  //  console.log(timed);
   
    
   // alert(timed);
	$('#runner').runner({
		autostart: true,
		countdown: false,
        startAt : timed,
        milliseconds: false
	});

   
    $('#runner2').runner({
		autostart: true,
		countdown: false,
        startAt: timed,
        milliseconds: false
	});

	$(".timepicker").timepicker({
		showInputs: false,
		minuteStep: 30,
	});
});
