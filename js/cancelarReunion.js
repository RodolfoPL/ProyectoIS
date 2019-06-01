
$(document).ready(function(){
	let id, fecha, lugar;
	$(".CancelarReunion").click(function(){
		id = $(this).attr('data-id');
		fecha = $(this).attr('data-fecha');
		lugar = $(this).attr('data-lugar');
		//console.log("id = "+ id);
		$("#id_reunionE").val(id);
		$("#fechaE").val(fecha);
		$("#lugarE").val(lugar);
	});

});

