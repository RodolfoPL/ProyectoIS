<?php
	//verificar si se modifico la fecha si se quiere actualizar
	/*echo($POST['datetime']);
	if(isset($POST['datetime'])){
		$destino = 'rodolpotter@hotmail.com';
		$desde = 'Academia Sociales';
		$asunto = 'Reunion';
		$mensaje = $POST['datetime'];
		mail($destino, $asunto, $mensaje);
		echo 'correo Enviado';
	}
	else{
		echo 'Error';
	}*/

 	if(mail('rodolpotter@hotmail.com', 'test', 'Prueba')){
 		echo "correo Enviado";
 	}
 	else{
 		echo 'fallo';
 	}

?>
