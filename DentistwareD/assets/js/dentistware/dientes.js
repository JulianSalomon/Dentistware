$('#verRegistro').on('shown.bs.modal', function() {
	modalWidth = $("#verRegistroModal").width();
	modalHeight = $("#verRegistroModal").height();
	stateAux = $('input[name="state"]:checked').val();
	setup();
	draw();
});