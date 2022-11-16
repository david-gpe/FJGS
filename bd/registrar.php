<?php
include 'cn.php';
$nombre = $_POST["Nombre"];
$apellidos = $_POST["Apellidos"];
$correo = $_POST["Email"];
$pasd = $_POST["pasd"];

$insertar = "INSERT INTO registro(nombre, apellido, correo, password) VALUES ('$nombre','$apellidos','$correo','$pasd')";

$resultado = mysqli_query($conexion, $insertar);
if (!resultado) {
	echo "Error al registrar";
}else{
	echo "Usuario Registrado";
}

mysqli_close($conexion);