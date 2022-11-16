<?php
$conexion = mysqli_connect("localhost","root", "", "prueba");
if (!$conexion) {
	echo "Error de conexion";
}
else {
	echo "Conectado";
}