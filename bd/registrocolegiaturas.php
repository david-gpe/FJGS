<?php 
include "cn.php";
    
    $id = utf8_decode($_POST["idalum"]);
    $mnt = utf8_decode($_POST["mnt"]);
    $fdp =$_POST["fec"];

	if(isset($_POST['selTU'])){
        if($_POST['selTU']=="Septiembre/Octubre"){
            $selTU = 1;
            $fechaproximomes= date("Y-m-d",strtotime($fdp."+ 1 month")); 

        }elseif ($_POST['selTU']=="Octube/Noviembre") {
            $selTU = 2;
            $fechaproximomes= date("Y-m-d",strtotime($fdp."+ 1 month")); 
        }elseif ($_POST['selTU']=="Noviembre/Diciembre") {
            $selTU = 3;
            $fechaproximomes= date("Y-m-d",strtotime($fdp."+ 1 month")); 
        }elseif ($_POST['selTU']=="Diciembre/Febrero") {
            $selTU = 4;
            $fechaproximomes= date("Y-m-d",strtotime($fdp."+ 2 month")); 

        }elseif ($_POST['selTU']=="Febrero/Marzo") {
            $selTU = 5;
            $fechaproximomes= date("Y-m-d",strtotime($fdp."+ 1 month")); 

        }elseif ($_POST['selTU']=="Marzo/Abril") {
            $selTU = 6;
            $fechaproximomes= date("Y-m-d",strtotime($fdp."+ 1 month")); 

        }elseif ($_POST['selTU']=="Abril/Mayo") {
            $selTU=7;
            $fechaproximomes= date("Y-m-d",strtotime($fdp."+ 1 month")); 

        }elseif ($_POST['selTU']=="Mayo/Junio") {
            $selTU=8;            
            $fechaproximomes= date("Y-m-d",strtotime($fdp."+ 1 month")); 

        }
        }

        $consultapagorealizado = "SELECT IdColegiatura FROM Colegiatura WHERE MatriculAlumno='$id' AND IdMensualidad='$selTU'";


        $query = mysqli_query($conexion,$consultapagorealizado);
            $filas = mysqli_num_rows($query);
        if ($filas == 0) {
            $consulta2 = "INSERT INTO Colegiatura(MatriculAlumno, IdMensualidad, Monto, FechedePago, FechadeProximoPago) VALUES ('$id','$selTU','$mnt','$fdp','$fechaproximomes')";
            $res2 = mysqli_query($conexion,$consulta2);

            echo $consulta2;

            if ($res2=true) {

                    header('Location: ../2fin/RePaCol.php');
                
               }   
        }else{

             //header('Location: ../2fin/RePaCol.php');

        }
       


 mysqli_close($conexion); ?>