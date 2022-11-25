<?php
		include "bd/sesion.php"; 
		$tipo = $_SESSION['tpUs'];
		echo $tipo;
		if ($tipo=="Administrador") {
       header('Location: 1admin/indexadmin.php');
		}else if($_SESSION['tpUs'] == "Diretor"){
       header('Location: 4dir/indexdir.php');
		}else if ($_SESSION['tpUs'] == "Financiero") {
       header('Location: 2fin/indexfin.php');
	   }


?>