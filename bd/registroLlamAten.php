<?php 
include "cn.php";

	if (isset($_POST['ReAt'])) {
		
	
    $mat = utf8_decode($_POST["matricula"]);
    $fec =$_POST["fec"];;
    $raz = utf8_decode($_POST["raz"]);
       
        $consulta2 = "INSERT INTO registrollaat(Matricula, fecha, razon) VALUES ('$mat','$fec','$raz')";
    
    $res2 = mysqli_query($conexion,$consulta2);
    echo $consulta2;
    if ($res2) {
         $connot = "INSERT INTO Notificaciones(Matricula, Causa, Fecha) VALUES('$mat','Ha sido registrada una llamada de atencion', CURDATE())"; 
                    $resconnot = mysqli_query($conexion,$connot);
                    if ($resconnot=true) {
                        header('Location: ../1admin/RegistroLlamAteUs.php');
                    }
    }    

}

 mysqli_close($conexion); ?>