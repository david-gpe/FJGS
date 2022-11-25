<?php 
include "cn.php";
	$id = utf8_decode($_POST["idusuario"]);
    $matricula = utf8_decode($_POST["matriculausuario"]);
    $fec =utf8_decode($_POST["fec"]);
    $he =$_POST["he"];;
    $hs =$_POST["hs"];;
       
        $consulta2 = "SELECT * FROM RegistroAsis WHERE (Matricula = '$matricula' AND id != '$id') OR
                                                        (Fecha = '$fec' AND id != '$id') OR
                                                        (horaEntrada = '$he' AND id != '$id') OR
                                                        (HoraSalida = '$hs' AND id != '$id')";
        $query = mysqli_query($conexion,$consulta2);
         $result = mysqli_num_rows($query);
        
        if ($result >= 0) {
        
        $cons =  "UPDATE RegistroAsis
                                SET Matricula = '$matricula', Fecha = '$fec',  
                                horaEntrada = '$he', HoraSalida = '$hs'
                                WHERE id = '$id'";
                    $sql_update = mysqli_query($conexion, $cons);
                    echo $cons;
                    if ($sql_update = true) {
                              $consultaActulización = "SELECT TIMESTAMPDIFF(SECOND,horaEntrada,HoraSalida) AS HorasLaboradas FROM AsistenciaUsuario WHERE id = '$id'";
                                $resultdoconsulta = mysqli_query($conexion,$consultaActulización);
                                $resultado = mysqli_fetch_array($resultdoconsulta);
                                $segundos = $resultado["HorasLaboradas"];
                                echo $segundos;

                                $consultaRegistroSegundos = "UPDATE RegistroAsis SET HorasLaboradas = '$segundos' WHERE Matricula = '$matricula' AND Fecha = '$fec' AND id = '$id'";
                                $consultainsersionsegundos = mysqli_query($conexion,$consultaRegistroSegundos);

                                if ($consultainsersionsegundos = true) {
                                       header('Location: ../1admin/RegistroAsisUs.php');

           
                                        }
                     }
        }  

 mysqli_close($conexion); ?>