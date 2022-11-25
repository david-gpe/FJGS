<?php
	$conexion = mysqli_connect("localhost","root", "", "fgjs3");


	$llam = "SELECT tipoUsuario FROM tipousuario WHERE NOT (tipoUsuario ='Alumno') XOR (tipoUsuario='Director') XOR (tipousuario='Tutor')";
	$llamT = "SELECT tipoUsuario FROM tipousuario";
	$llamg = "SELECT Genero FROM Genero";
	$llamts = "SELECT TipoSangre FROM TipoSangre";
	$llamns = "SELECT NivEst FROM NivEst";
	$llamnse = "SELECT NivEst FROM NivEst WHERE NOT (NivEst ='Secundaria') XOR (NivEst ='Media Superior') XOR (NivEst ='Superior')";
	$llamser = "SELECT * FROM Servicios";
	$periodo = "SELECT Mensualidad FROM Mensualidad";





?>
	
