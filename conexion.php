<?php
	function conectar(){
		$user="root";
		$pass="root";
		$server="localhost";
		$db="reunionCS";
		$conn = mysqli_connect($server,$user,$pass,$db)  or die ( "Error al conectar la DB" );
		return $conn;
	}
?>
