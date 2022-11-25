<?php


$fecha_actual = date("d-m-Y");
echo $fecha_actual ." ";
//sumo 1 mes
$fechaproximomes= date("d-m-Y",strtotime($fecha_actual."+ 1 month")); 
echo "\n". $fechaproximomes ."\n";
//resto 1 mes
echo date("d-m-Y",strtotime($fecha_actual."- 1 month"));