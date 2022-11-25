<?php 
include "cn.php";

	$Folio = utf8_decode($_POST["fl"]);
    $Matricula = utf8_decode($_POST["matrilcula"]);
    $FechadePago =$_POST["fdp"];
    $Salario = utf8_decode($_POST["mnt"]);
       
        $consulta2 = "INSERT INTO Nomina(Folio, Matricula, Fecha, Salario) VALUES ('$Folio','$Matricula','$FechadePago','$Salario')";
    
    $res2 = mysqli_query($conexion,$consulta2);
echo $consulta2;
    if ($res2) {
    	 $connot = "INSERT INTO Notificaciones(Matricula, Causa, Fecha) VALUES('$Matricula','Se registro un pago de nomina', CURDATE())"; 
                    $resconnot = mysqli_query($conexion,$connot);
                    if ($resconnot=true) {
        			header('Location: ../2fin/RePNom.php');
        		}
    }    



 mysqli_close($conexion); 
 ?>