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
					    <th scope="col">Fecha</th>
					    <th scope="col">Tipo de reunión</th>
					    <th scope="col">Lugar de reunión</th>
					    <th scope="col"></th>
				    </tr>
				</thead>
				<tbody>
						<?php
							$con = conectar();
							if(!$con){
								echo "Error de base de datos";
							}
							$consulta = "select r.id_reunion, r.fecha, t.nombre as tipo, l.lugar_nombre as lugar
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
									        <td>".$reunion['lugar']."</td>	
									        <td>".$reunion['tipo']."</td>
									        <td><a class='btn btn-primary EditarReunion' href='' role='button' data-toggle='modal'  data-target='#ED' data-id='".$reunion['id_reunion']."' data-fecha='".$reunion['fecha']."' data-lugar='".$reunion['lugar']."'>Actualizar</a></td>	
									        <td><a class='btn btn-primary CancelarReunion' data-toggle='modal'  data-target='#canc' data-id='".$reunion['id_reunion']."' data-fecha='".$reunion['fecha']."' data-lugar='".$reunion['lugar']."' href='' role='button' id='CancelarReunion'>Cancelar reunión</a></td>	
									    </tr>
									";
								}
							}
							mysqli_close($con);
					    ?>
				  </tbody>
	    	</table>	

	    	<!-- Editar reunion -->
	  		<div class='modal fade' id='ED' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
				<div class='modal-dialog' role='document'>
					<div class='modal-content'>
						<div class='modal-header'>
							<h5 class='modal-title' id='exampleModalLabel'>Modificar datos reunión</h5>
							<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
								<span aria-hidden='true'>&times;</span>
							</button>
						</div>
						<div class='modal-body' >
							<form class="was-validated" method='POST' id="modificarReunion" action='index.php'>
								<div class="row justify-content-center">
									<p id='descripcion'>Se puede posponer la fecha o cambiar el lugar de reunion (si no quiere cambiar un dato solo dejelo asi.</p>
								</div>

								<div class="row justify-content-center">
									<div id="lugarReunion" class="form-group">
										<label for="lugar">Nuevo Lugar</label>
										<label for="lugarReunion">Lugar</label>
										<select class="form-control" name='lugarReunion'   id="lugarReunion" required="">
											<option selected disabled>Lugar de reunión </option>
											<option value='1'>Sala 14 "Eduardo Torrijos"</option>
										</select>
										 <div class="invalid-feedback">
									        Seleccione un nuevo lugar o deje el anterior
									      </div>
									</div>
								</div>

								<div class="row justify-content-center">
									<div id='fechaReunion'>
										<div class="form-group">
											<label for="fecha">Nueva Fecha</label>
											<input type="text" id="datetime" name="fechaR" readonly required>
										</div>
									</div>
								</div>

								<div class='modal-footer'>
									<input type='hidden' name='id_reunion' id='id_reunion' value="" />
									<input type='submit' name='editaR' id="editaR" class='editaR btn btn-info' value='Editar reunión'/ >
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>

			<!-- Cancelar reunion -->
			<div class='modal fade' id='canc' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title">ESTA APUNTO DE REALIZAR UN PASO QUE NO PUEDE REVERTIRSE</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			        <p>Esta seguro de que quiere cancelar la reunión. Una vez cancelada se tendrá que agendar una nueva.</p>
			      </div>
			      <div class="modal-footer">
			      	<form class="was-validated" method='POST' id="cancReu" action="index.php">
						<input type='hidden' name='id_reunionE' id='id_reunionE' value="" />
						<input type='hidden' name='fechaE' id='fechaE' value="" />
						<input type='hidden' name='lugarE' id='lugarE' value="" />
			        	<input type="submit" class="btn btn-primary eliminaR" name='eliminaR' id="eliminaR" value="SI"/>
			        	<input type="button" class="btn btn-secondary" data-dismiss="modal" value="NO"/>
			        </form>
			      </div>
			    </div>
			  </div>
			</div>
	    </main>
	    <footer>
	    </footer>
	</body>
</html>
<?php
	include("footer.html");
?>
