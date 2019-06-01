<?php
include("header.html");
?>
<body class="d-flex flex-column">
	<header>
	</header>
	<main class="container-fluid flex-fill">


		<div class="center">
		<div class="row nuevaReunion"	>
			<div class="col-md-3">
		<form action="nuevaReunion.php" method="POST">
			<div class="form-group">
				<label for="datetime">Fecha y hora </label>
				<input class="form-control" type="text" name="fechaReunion" id="datetime" required>
				<div class="invalid-feedback">
		          Introcusca una fecha
		        </div>
			</div>

</div>
<div class="col-md-3">
			<div class="form-group">
				<label for="tipoReunion">Tipo</label>
				<select class="form-control" name='tipoReunion' id="tipoReunion" required>
					<option selected disabled>Tipo de reunión </option>
					<option value='1'>Ordinaria</option>
					<option value='2'>Extraordinaria</option>
				</select>
				<div class="invalid-feedback">
		          Seleccione un tipo de reuinión.
		        </div>
			</div>
</div>
<div class="col-md-4">
			<div class="form-group">
				<label for="lugarReunion">Lugar</label>
				<select class="form-control" name='lugarReunion'   id="lugarReunion" required>
					<option selected disabled>Lugar de reunión </option>
					<option value='1'>Sala 14 "Eduardo Torrijos"</option>
				</select>
				<div class="invalid-feedback">
		          Escoja un lugar dereunión.
		        </div>
			</div>
</div>
</div>


		<div class="row submit">
			<div class="col-md-2">
			<button type="submit" name='submit' class="btn btn-primary">Agendar</button>
		</diV>
		</form>

	</div>


	</main>
	<footer>
	</footer>
</body>
</html>
<?php
include("footer.html");
?>
