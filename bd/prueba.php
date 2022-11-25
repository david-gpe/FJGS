<?php
include 'cn.php';
	$diasactuales = 0;
	$diaspasados = 0;

	$conusuriosentrehoras = "SELECT DISTINCT Matricula FROM RegistroAsis WHERE Fecha LIKE '%06%' AND horaEntrada = '08:00:00'";
	$instruc = mysqli_query($conexion,$conusuriosentrehoras);
	while($row = $instruc->fetch_array()){
		$rows[] = $row;
	}
	foreach($rows as $row)
	{ $vr=$row['Matricula'];
		
		$consultacuentadias = "SELECT COUNT(Matricula) AS DiasLaborados FROM RegistroAsis WHERE Fecha LIKE '%06%' AND Matricula = '$vr' AND horaEntrada = '08:00:00'";
		$instrucdiss = mysqli_query($conexion,$consultacuentadias);
		echo "\n". $row['Matricula'];

		while($row2 = $instrucdiss->fetch_array()){
		$rows2[] = $row2;
		}
		foreach($rows2 as $row2)
		{

		if ($diasactuales==0 AND $diaspasados== 0) {
			$diasactuales= $row2['DiasLaborados'];
			echo $diasactuales;
		}else if($diasactuales >0 AND $diaspasados == 0){
			$diaspasados = $diasactuales;
			$diasactuales = $row2['DiasLaborados'];
			echo "llegue al vaacio de ambas variables";
			echo $row2['DiasLaborados'];
		}else if ($diaspasados >= $diasactuales) {
			//echo $diaspasados;
		} else if($diasactuales >= $diaspasados){
			//echo $diasactuales;
		}else{
			//echo "Son igules";
		}
		//echo "\n". $row2['DiasLaborados'];
		}
	
	}

	$instruc->close();
	$conexion->close();
?>