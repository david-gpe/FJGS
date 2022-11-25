<?php
session_start();
	$varsesion = $_SESSION['usuario'];

	if ($varsesion == null || $varsesion = '') {
		echo "Se requiere un acceso confirmado";
		    	header("location: ../loginindex.php");
	}

?>