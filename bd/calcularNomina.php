<?php 
include "cn.php";


 	$matricula = utf8_decode($_POST["Matricula"]);
	$consultasegunos = "SELECT SUM(HorasLaboradas) AS TotalSegundosNomina FROM RegistroAsis WHERE Matricula= '$matricula' AND Status= 'Adeudo'";
    $resultadosegundostotales = mysqli_query($conexion,$consultasegunos);
	$ressegtotles = mysqli_fetch_array($resultadosegundostotales);
	$seg = $ressegtotles["TotalSegundosNomina"];
	if ($seg == 0) {
		echo $seg;
		echo "No se le debe a el empleado";
	}else{
			

				$consultasalariousuario = "SELECT Spr FROM DatosGenerales WHERE Matricula= '$matricula'";
			    $resultadosconsalus = mysqli_query($conexion,$consultasalariousuario);
				$resconsultasal = mysqli_fetch_array($resultadosconsalus);
				$salarioUsuario = $resconsultasal["Spr"];
					$resultadonomina= ($seg * $salarioUsuario)/3600;

					$consultapagohoras = "UPDATE RegistroAsis SET Status='Pagado' WHERE Matricula='$matricula' AND Status= 'Adeudo'";
					$resultadostatuspaago = mysqli_query($conexion,$consultapagohoras);
					if ($resultadostatuspaago= true) {
					echo ($resultadonomina); 
					}

	}
 ?>	
