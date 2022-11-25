<?php 
require 'cn.php';
			$username = $_POST['us'];
		    $password = $_POST['ps'];

    		$_SESSION['usuario']=$username;

		    $usuarios ="SELECT tipoUsuario FROM Usuario_Tipo
					WHERE Usuario= '$username' AND Password = '$password' ";
		    $res = mysqli_query($conexion,$usuarios);
		    $fila = mysqli_fetch_array($res);
		    $tipo = $fila["tipoUsuario"];

		    if ($tipo == "Administrador") {
		    	$tus = $res;
		    	header("location: ../1admin/indexadmin.php");
		    }else  
		    if ($tipo == "Financiero") {
		    	header("location: ../2fin/indexfin.php");
		    }else  
		    if ($tipo == "Alumno") {
		    	header("location: ../3alum/indexalum.php");
		    }else  
		    if ($tipo == "Financiero") {
		    	header("location: ../4Dir/indexdir.php");
		    }else  
		    if ($tipo == "Financiero") {
		    	header("location: ../5Doc/indexdos.php");
		    }else  
		    if ($tipo == "Financiero") {
		    	header("location: ../6Tut/indextut.php");
		    }else{
		    	header("location: ../loginindex.php");
		    	echo '<script language="javascript">';
				echo 'alerty("Usuario o contraseña incorrecto")';
				echo '</script>';
				  exit;
		    }

mysqli_close($conexion);

 ?>