<?php
	include("header.html");
	include("conexion.php");

	//si se cancelo una reuinion
	if(filter_input(INPUT_POST,'eliminaR')){
		$con = conectar();
		if(!$con){
			echo "Error al conectar BD";
		}


		$consulta ="update reunion
					set fk_estatus = 2
					where reunion.id_reunion = ".$_POST['id_reunionE'].";";

		$resultado = mysqli_query($con, $consulta) or die ( "Error de consulta");

		
		$consulta = " select nombre, correo from maestros;";
		$resultado = mysqli_query($con, $consulta) or die ( "Error de consulta");
		
//enviar correos
		if(mysqli_num_rows($resultado) > 0){
			while ($maestros = mysqli_fetch_array( $resultado )){
				$nombreMaestro = $maestros['nombre'];
				$mail = $maestros['correo'];
				//echo $mail;
				$mensage = $nombreMaestro." \n La reunion ".$_POST['id_reunionE']." del día " .$_POST['fechaE']. " que se iba a realizar en " .$_POST['lugarE']. " ha sido cancelada" ; 
				try{
					//echo $mensage;
					mail($mail, 'Reunion cancelada', $mensage, 'From: Academia SC');
				}
				catch(Exception $e){
					echo $e;
				}
			}
		}

		mysqli_close($con);

	}

	//si se edita la reunion
	if(filter_input(INPUT_POST,'editaR')){
		$con = conectar();
		if(!$con){
			//echo "Error al conectar BD";
		}

		//echo $_POST['id_reunion'];

		$consulta = "update reunion
					set fecha = '".$_POST['fechaR']."',
					fk_lugar = '".$_POST['lugarReunion']."'
					where id_reunion = ".$_POST['id_reunion'].";
					";
		//echo gettype($time);

		$resultado = mysqli_query($con, $consulta) or die ( "Error de actualizacion");
		mysqli_close($con);

		$con = conectar();
		if(!$con){
			//echo "Error al conectar BD";
		}

		$consulta = "select lugar_nombre from lugar where lugar_id = ". $_POST['lugarReunion'].";";
		$resultado = mysqli_query($con, $consulta) or die ( "Error de consulta");
		$reunion = mysqli_fetch_array( $resultado );
		
		$consulta = " select nombre, correo from maestros;";
		$resultado = mysqli_query($con, $consulta) or die ( "Error de consulta");
		
		if(mysqli_num_rows($resultado) > 0){
			while ($maestros = mysqli_fetch_array( $resultado )){
				$nombreMaestro = $maestros['nombre'];
				$mail = $maestros['correo'];
				echo $mail;
				$mensage = $nombreMaestro." \n La reunion ".$_POST['id_reunion']." ha sido modificada al día " .$_POST['fechaR']. " se realizara en " .$reunion['lugar_nombre'] ;
				try{
					//echo $mensage;
					mail($mail, 'Actualizacion de reunión', $mensage, 'From: Academia SC');
				}
				catch(Exception $e){
					echo $e;
				}
			}
		}
		mysqli_close($con);

	}

	
?>
<body class="d-flex flex-column">
    <header>
    </header>
    <main class="container-fluid flex-fill">
    	<div class="row h-300 justify-content-center align-items-center">
    		<h3>Informacion de las reuniones</h3>
    	</div>
    	<table class="table">
    		<thead>
			    <tr>
				    <th scope="col">Fecha</th>
				    <th scope="col">Tipo de reunión</th>
				    <th scope="col">Lugar de reunión</th>
			    </tr>
			</thead>
			<tbody>
					<?php
						$con = conectar();
						if(!$con){
							echo "Error de base de datos";
						}
						$consulta = "select r.fecha, t.nombre as tipo, l.lugar_nombre as lugar
									from reunion r 
									left join estatus_reunion e on r.fk_estatus = e.id_estatus_reunion
									left join tipo_reunion t on r.fk_tipo = t.id_tipo_reunion
									left join lugar l on r.fk_lugar = l.lugar_id
									where r.fk_estatus = 1
									order by r.fecha;";

						$resultado = mysqli_query($con, $consulta) or die ( "Error de consulta");

						//mostrar todas las pizzas de la bd
						if(mysqli_num_rows($resultado) > 0){
							$i = 0;
							while ($reunion = mysqli_fetch_array( $resultado )){
								echo "
								 	<tr>
										<td>".$reunion['fecha']."</td>
								        <td>".$reunion['tipo']."</td>
								        <td>".$reunion['lugar']."</td>	
								    </tr>
								";
							}
						}
						else{
							echo "No hay reuniones asignadas";
						}
						mysqli_close($con);
				    ?>
			  </tbody>
    	</table>
    	<div class="row h-300 justify-content-center align-items-center">
    		<a class="btn btn-primary" href="editarreunion.php" role="button">Editar</a>	
    		<a class="btn btn-primary" href="agendar.php" role="button">Agendar</a>	
    		<a class="btn btn-primary" href="verReunion.php" role="button">Ver</a>	
    	</div>
    </main>
    <footer>
    </footer>
</body>
	</html>
	<?php
	include("footer.html");
	?>
