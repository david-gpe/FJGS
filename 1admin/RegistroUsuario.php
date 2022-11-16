<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
		<?php include "../scrip/scrp.php"; ?> 

 
	<title></title>
</head>
<body>
		
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
		 	<span class="navbar-toggler-icon"></span></button>
		 		<a class="navbar-brand" href="#">
		 			<img src="../img/escudo.jpg" width="60" height="60" alt="">Escuela Primaria Francisco Jose Gabilondo Soler
		 		</a>
		  	<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
		  		<div class="navbar-nav ml-auto text-center">
		  			<ul class="navbar-nav">
		  				
		  				<li class="nav-item active dropdown">
		  					<a class="nav-item nav-link active" href="#" id="navbarDropdownMenuLink"><i class="fas fa-home"></i> <strong>Inicio</strong></a>
			  			</li>

		  			    <li class="nav-item dropdown">
		  			    	<a class="nav-item nav-link" href="#" id="navbarDropdownMenuLink" ><i class="fas fa-question"></i> <strong>Gestionar</strong></a>
		  			    		
		  			    </li>

		  			    <li class="nav-item dropdown">
		  			    	<a class="nav-item nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-search"></i><strong>Consultar</strong></a>
		  			    		<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							          <a class="dropdown-item" href="#">Historial</a>
							          <a class="dropdown-item" href="#">Perfil</a>
							    </div>
		  			    </li>

		  			    <li class="nav-item">
		  			    	<a class="nav-item nav-link" href="#"><i class="fas fa-envelope-open"></i></a>
		  			    </li>

		  			    <li class="nav-item dropdown">
		  			    	<a class="nav-item nav-link " href="#"><i class="fas fa-sign-in-alt"></i> <strong>Cerrar Sesión</strong></a>
		  			    </li>
		      	
		    </ul>
		  </div>
		  </div>
		</nav>

		<?php include "../formularios/formularioemplados.php"; ?>

		<?php include "../footer.php"; ?>

</body>
</html>