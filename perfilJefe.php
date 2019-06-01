<?php
include("header.html");
?>
<body class="d-flex flex-column">
    <header>
    </header>
    <main class="container-fluid flex-fill">



        <div class="row" id="datePicker">
          <div class="col-auto">
            <form action="agendaReunion.php">
              <input type="text" id="datetime" readonly>
            </form>
          </div>
        </div>

        <div class="row " id="optionsJefe">
          <div class="col-md-1">
            <a href="" class="button btn-info btn-block"> Editar</a>
          </div>
          <div class="col-md-1">
            <a href="agendar.php" class="button btn-success btn-block">Agendar</a>
          </div>
          <div class="col-md-1">
            <a href="" class="button btn-primary btn-block">Ver</a>
          </div>
        </div>


				<?php
				include("sidebar_carrito.php");
				?>
			
    </main>
    <footer>
    </footer>
</body>
	</html>
	<?php
	include("footer.html");
	?>
