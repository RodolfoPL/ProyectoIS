
$(document).ready(function(){
	let id, fecha, lugar;
	$(".EditarReunion").click(function(){
		id = $(this).attr('data-id');
		fecha = $(this).attr('data-fecha');
		lugar = $(this).attr('data-lugar');
		$("#id_reunion").val(id);
		$("#datetime").val(fecha);
		$("#lugarReunion").val("1");
	});

});
