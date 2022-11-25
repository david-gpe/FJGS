<?php
include "cn.php";


	 if(isset($_POST['selTU'])){
    	if($_POST['selTU']=="Administrador"){
    		$selTU = 1;
        }elseif ($_POST['selTU']=="Alumno") {
    		$selTU = 2;
    	}elseif ($_POST['selTU']=="Director") {
    		$selTU = 3;
    	}elseif ($_POST['selTU']=="Docente") {
    		$selTU = 4;
        }elseif ($_POST['selTU']=="Contador") {
    		$selTU = 5;
        }elseif ($_POST['selTU']=="Tutor") {
    		$selTU = 6;
    	}else {
            $selTU= utf8_decode($_POST["optiontiusuario"]);
            }
        }

        

     if(isset($_POST['gen'])){
        if($_POST['gen']=="Hombre"){
            $gen = 1;
        }elseif ($_POST['gen']=="Mujer") {
            $gen = 2;
        }else{
            $gen= utf8_decode($_POST["optiongene"]);
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
        }else{
            $tis= utf8_decode($_POST["optiontiposangre"]);
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
        }else{
            $nies= utf8_decode($_POST["optionnivel"]);
            }
        }

        $matric= utf8_decode($_POST["matriculausurio"]); 
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

        $datosusua = "SELECT * FROM DatosGenerales
                                        WHERE (nombre = '$nombre' AND Matricula != '$matric') OR  
                                        (ApellidoPaterno = '$ap' AND Matricula != '$matric') OR  
                                        (ApellidoMaterno = '$am' AND Matricula != '$matric') OR  
                                        (FechaNacimiento = '$fec' AND Matricula != '$matric') OR  
                                        (CURP = '$curp' AND Matricula != '$matric') OR  
                                        (RFC = '$rfc' AND Matricula != '$matric') OR  
                                        (Correo = '$email' AND Matricula != '$matric') OR  
                                        (Telefono = '$tel' AND Matricula != '$matric') OR  
                                        (Celular = '$cel' AND Matricula != '$matric') OR  
                                        (Entidad = '$edo' AND Matricula != '$matric') OR  
                                        (Municipio = '$mun' AND Matricula != '$matric') OR  
                                        (Localidad = '$loc' AND Matricula != '$matric') OR  
                                        (Domicilio = '$cll' AND Matricula != '$matric') OR  
                                        (Colonia = '$col' AND Matricula != '$matric') OR  
                                        (CP = '$cp' AND Matricula != '$matric')";

        $query = mysqli_query($conexion,$datosusua);
        $result = mysqli_num_rows($query);
        
        if ($result >= 0) {
           
                    $cons =  "UPDATE DatosGenerales
                                SET nombre = '$nombre', ApellidoPaterno = '$ap',  
                                ApellidoMaterno = '$am', FechaNacimiento = '$fec',  
                                CURP = '$curp', RFC = '$rfc', IdGenero ='$gen',  
                                Correo = '$email', IdTipoSangre = '$tis',  
                                Telefono = '$tel', Celular = '$cel',  
                                IdNivEst = '$nies', Entidad = '$edo',  
                                Municipio = '$mun', Localidad = '$loc',  
                                Domicilio = '$cll', Colonia = '$col',  
                                CP = '$cp', IdTipoUsuario = '$selTU'
                                WHERE Matricula = '$matric'";
                    $sql_update = mysqli_query($conexion, $cons);
                        if ($sql_update = true) {
                           header('Location: ../1admin/GestionUsuario.php');
                     }else{
                            header('Location: ../1admin/editarUsuario.php');
                        }
            
        } else{
            echo "llegue al false";
           // header('Location: ../1admin/GestionUsuario.php');
        }

              




 mysqli_close($conexion);

?>


