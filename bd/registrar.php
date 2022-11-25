<?php
include "cn.php";


	 if(isset($_POST['selTU'])){
    	if($_POST['selTU']=="Administrador"){
    		$selTU = 1;
                $inad = "INSERT INTO Admin(valor) VALUES (1)";
                $res = mysqli_query($conexion,$inad);
                $cont = "SELECT * FROM Admin";
                $contm=mysqli_query($conexion,$cont);
                $valmar = mysqli_num_rows($contm);
                $mt="Admin";
                $matri = $mt.$valmar;


    	}elseif ($_POST['selTU']=="Alumno") {
    		$selTU = 2;
    	}elseif ($_POST['selTU']=="Director") {
    		$selTU = 3;
    	}elseif ($_POST['selTU']=="Docente") {
    		$selTU = 4;
                    $inad = "INSERT INTO Docente(valor) VALUES (1)";
                    $res = mysqli_query($conexion,$inad);
                    $cont = "SELECT * FROM Docente";
                    $contm=mysqli_query($conexion,$cont);
                    $valmar = mysqli_num_rows($contm);
                    $mt="Doc";
                    $matri = $mt.$valmar;
    	}elseif ($_POST['selTU']=="Contador") {
    		$selTU = 5;
                    $inad = "INSERT INTO Contador(valor) VALUES (1)";
                    $res = mysqli_query($conexion,$inad);
                    $cont = "SELECT * FROM Contador";
                    $contm=mysqli_query($conexion,$cont);
                    $valmar =mysqli_num_rows($contm);
                    $mt="Fin";
                    $matri = $mt.$valmar;
    	}elseif ($_POST['selTU']=="Tutor") {
    		$selTU = 6;
    	}
        }

     if(isset($_POST['gen'])){
        if($_POST['gen']=="Hombre"){
            $gen = 1;
        }elseif ($_POST['gen']=="Mujer") {
            $gen = 2;
        }
        }

         if(isset($_POST['tis'])){
        if($_POST['tis']=="A Positiva"){
            $tis = 1;
        }elseif ($_POST['tis']=="A Negativo") {
            $tis = 2;
        }elseif ($_POST['tis']=="AB Positivo") {
            $tis = 3;
        }elseif ($_POST['tis']=="AB Negativo") {
            $tis = 4;
        }elseif ($_POST['tis']=="B Positivo") {
            $tis = 5;
        }elseif ($_POST['tis']=="B Negativo") {
            $tis = 6;
        }elseif ($_POST['tis']=="O Positivo") {
            $tis = 7;
        }elseif ($_POST['tis']=="O Negativo") {
            $tis = 8;
        }
        }

        if(isset($_POST['nies'])){
        if($_POST['nies']=="Preescolar"){
            $nies = 1;
        }elseif ($_POST['nies']=="Primaria") {
            $nies = 2;
        }elseif ($_POST['nies']=="Secundaria") {
            $nies = 3;
        }elseif ($_POST['nies']=="Media Superior") {
            $nies = 4;
        }elseif ($_POST['nies']=="Superior") {
            $nies = 5;
        }
        }

        $nombre = utf8_decode($_POST["nombre"]);
        $ap = utf8_decode($_POST["ap"]);
        $am = utf8_decode($_POST["am"]);
        $fec = $_POST["fec"];
        $curp =utf8_decode($_POST["curp"]);
        $rfc =utf8_decode($_POST["rfc"]);
        $email =utf8_decode($_POST["email"]);
        $tel =utf8_decode($_POST["tel"]);
        $cel =utf8_decode($_POST["cel"]);
        $edo =utf8_decode($_POST["edo"]);
        $mun =utf8_decode($_POST["mun"]);
        $loc =utf8_decode($_POST["loc"]);
        $cll =utf8_decode($_POST["cll"]);
        $col =utf8_decode($_POST["col"]);
        $cp =utf8_decode($_POST["cp"]);
        $spr =utf8_decode($_POST["spr"]);


        $consulta = "INSERT INTO datosgenerales(Matricula,nombre, ApellidoPaterno, ApellidoMaterno, FechaNacimiento, CURP, RFC, IdGenero, Correo, IdTipoSangre, Telefono, Celular, IdNivEst, Entidad, Municipio, Localidad, Domicilio, Colonia, CP, IdTipoUsuario, Estado, Spr) VALUES ('$matri','$nombre','$ap','$am','$fec','$curp','$rfc','$gen','$email','$tis','$tel','$cel','$nies','$edo','$mun','$loc','$cll','$col','$cp','$selTU','Habilitado','$spr')";
    
        $res = mysqli_query($conexion,$consulta);
       // echo $consulta;
        $fecus = sha1($fec);
        if ($res= true) {
            $consultaus = "INSERT INTO Usuario(Usuario, Password, Matricula) VALUES ('$nombre','$fecus','$matri')";  
            $resus= mysqli_query($conexion,$consultaus);

                    $connot = "INSERT INTO Notificaciones(Matricula, Causa, Fecha) VALUES('$matri','Has sido dado de alta', CURDATE())"; 
                    $resconnot = mysqli_query($conexion,$connot);
                    if ($resconnot=true) {
                    echo $connot;       
            //echo $consultaus;
            if ($resus=true) {
               header('Location: ../1admin/GestionUsuario.php');
                
            }else{
              header('Location: ../1admin/RegistroUsuario.php');

            }
            }



        }
 mysqli_close($conexion);

?>


