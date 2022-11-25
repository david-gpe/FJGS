<?php
include "cn.php";
		if(isset($_POST['selTU'])){
    	if($_POST['selTU']=="Agua"){
    		$selTU = 1;
        }elseif ($_POST['selTU']=="Internet") {
    		$selTU = 2;
    	}elseif ($_POST['selTU']=="Luz Electrica") {
    		$selTU = 3;
    		}
        }

        $nombre = utf8_decode($_POST["nombre"]);
        $monto = utf8_decode($_POST["monto"]);
        $fecha = utf8_decode($_POST["fecha"]);

        
        $consulta = "INSERT INTO PagoServicios(IdServicio, Monto, Fecha) VALUES ('$selTU','$monto', '$fecha')";
    
        $res = mysqli_query($conexion,$consulta);
        echo $consulta;
        
        if ($res= true) {
            header('Location: ../2fin/RePaServicios.php');
        }

 mysqli_close($conexion);

?>
