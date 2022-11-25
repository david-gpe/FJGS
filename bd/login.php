<?php 
session_start();
require 'cn.php';
			$username = $_POST['us'];
		    $password = $_POST['ps'];
		    $ps = sha1($password);

    		$_SESSION['usuario']=$username;

		    $usuarios ="SELECT tipoUsuario FROM Usuario_Tipo
					WHERE Usuario= '$username' AND Password = '$ps' ";
		    echo mysqli_query($conexion,$usuarios);

		    $res = mysqli_query($conexion,$usuarios);

		    $matricula = "SELECT Matricula FROM Usuario WHERE Usuario='$username' AND Password ='$ps' ";
		    $resma = mysqli_query($conexion,$matricula);
		    $frm = mysqli_fetch_array($resma);
		    $mat = $frm['Matricula'];

		    $fila = mysqli_fetch_array($res);
		    $tipo = $fila["tipoUsuario"];

		    console.log("Matricula " + $mat + " Tipo usuario" + $tipo);
    		/*$_SESSION['tpUs']=$tipo;
    		$_SESSION['matUs']= $mat;

		    if ($tipo == "Administrador") {
		    	header("location: ../1admin/indexadmin.php");
		    }else  
		    if ($tipo == "Contador") {
		    	header("location: ../2fin/indexfin.php");
		    }else  
		    if ($tipo == "Alumno") {
		    	header("location: ../3alum/indexalum.php");
		    }else  
		    if ($tipo == "Financiero") {
		    	header("location: ../4Dir/indexdir.php");
		    }else  
		    if ($tipo == "Docente") {
		    	header("location: ../5Doc/indexdocen.php");
		    }else  
		    if ($tipo == "Financiero") {
		    	header("location: ../6Tut/indextut.php");
		    }else{
		    	
		    	header("location: ../loginindex.php");
		    	}

mysqli_close($conexion);

 ?>