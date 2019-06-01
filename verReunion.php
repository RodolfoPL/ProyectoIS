<?php
include("header.html");
include("conexion.php");
?>
<body class="d-flex flex-column">
    <header>
    </header>
    <main class="container-fluid flex-fill">
    	<table class="table">
    		<thead>
			    <tr>
			    	<th scope="col">Número de reunión</th>
				    <th scope="col">Fecha</th>
				    <th scope="col">Tipo de Reunión</th>
				    <th scope="col">Lugar</th>
				    <th scope="col">Estado de la reunión</th>
			    </tr>
			</thead>
			<tbody>
					<?php
						$con = conectar();
						if(!$con){
							echo "Error de base de datos";
						}
						$consulta = "select r.id_reunion, r.fecha, t.nombre as tipo, l.lugar_nombre as lugar, e.nombre as estatus 
									from reunion r 
									left join estatus_reunion e on r.fk_estatus = e.id_estatus_reunion
									left join tipo_reunion t on r.fk_tipo = t.id_tipo_reunion
									left join lugar l on r.fk_lugar = l.lugar_id
									order by r.fecha;";

						$resultado = mysqli_query($con, $consulta) or die ( "Error de consulta");
						//mostrar todas las pizzas de la bd
						if(mysqli_num_rows($resultado) > 0){
							$i = 0;
							while ($reunion = mysqli_fetch_array( $resultado )){
								echo "
								 	<tr>
								 		<td>".$reunion['id_reunion']."</td>
										<td>".$reunion['fecha']."</td>
								        <td>".$reunion['tipo']."</td>
								        <td>".$reunion['lugar']."</td>	
								        <td>".$reunion['estatus']."</td>	
								    </tr>
								";
							}
						}
						mysqli_close($con);
				    ?>
			  </tbody>
    	</table>	
  	
    </main>
    <footer>
    </footer>
</body>
	</html>
	<?php
	include("footer.html");
	?>
