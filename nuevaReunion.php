<?php

$fecha=$_POST['fechaReunion'];
$fecha = date('Y-m-d H:i:s', strtotime($fecha));
$tipo=$_POST['tipoReunion'];
$estatus=1;
$academia=1;
$lugar=$_POST['lugarReunion'];

/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "root", "reunionCS");

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Attempt insert query execution
$sql = "INSERT INTO reunion (fecha, fk_tipo, fk_estatus,fk_academia,fk_lugar ) VALUES ('".$fecha.
		"' ,'".$tipo. "', '".$estatus."' , '".$academia. "' , '".$lugar." ' )";

if(mysqli_query($link, $sql)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}


$consulta = "select nombre from tipo_reunion where id_tipo_reunion =" .$tipo.";";
$resultado = mysqli_query($link, $consulta) or die ( "Error de consulta");
$tipo_reunion = mysqli_fetch_array( $resultado );

$consulta = " select nombre, correo from maestros;";
$resultado = mysqli_query($link, $consulta) or die ( "Error de consulta");
		
//enviar correos
if(mysqli_num_rows($resultado) > 0){
	while ($maestros = mysqli_fetch_array( $resultado )){
		$nombreMaestro = $maestros['nombre'];
		$mail = $maestros['correo'];
		//echo $mail;
		$mensage = $nombreMaestro." \n Se ha acordado una reunion ".$tipo_reunion['nombre']."  para el día " .$fecha. " que se llevara a cabo en " .$lugar; 
		try{
			//echo $mensage;
			mail($mail, 'Nueva reunion', $mensage, 'From: Academia SC');
		}
		catch(Exception $e){
			echo $e;
		}
	}
}

// Close connection
mysqli_close($link);

?>
