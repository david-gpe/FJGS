<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="with=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compaatible" content="ie=edge"> 
	<script src="../jq/jquery.min.js"></script>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
	<script src="../js/bootstrap.min.js"></script>
	<script src="https://kit.fontawesome.com/c45193e88f.js" crossorigin="anonymous"></script>
 
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
		  					<a class="nav-item nav-link active dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-plus-circle"></i> <strong>Registrar</strong></a>
			  					 <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							          <a class="dropdown-item" href="#">Nuevo Usuario</a>
							          <a class="dropdown-item" href="#">Asistencias</a>
							      </div>
		  				</li>

		  			    <li class="nav-item dropdown">
		  			    	<a class="nav-item nav-link" href="#" id="navbarDropdownMenuLink"><i class="fas fa-question"></i> <strong>Gestionar</strong></a>
		  			    </li>

		  			    <li class="nav-item dropdown">
		  			    	<a class="nav-item nav-link active dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-search"></i><strong>Consultar</strong></a>
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

	<content>
		<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
		  <div class="carousel-inner">
		    <div class="carousel-item active">
		      <img class="d-block w-100" src="../img/slda1.jpg" alt="First slide" height="550px">
		    </div>
		    <div class="carousel-item">
		      <img class="d-block w-100" src="../img/slda2.jpg" alt="Second slide" height="550px">
		    </div>
		    <div class="carousel-item">
		      <img class="d-block w-100" src="../img/slda3.png" alt="Third slide" height="550px">
		    </div>
		  </div>
		  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
 		   <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		    <span class="sr-only">Anterior</span>
		  </a>
		  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
		    <span class="carousel-control-next-icon" aria-hidden="true"></span>
		    <span class="sr-only">Siguiente</span>
		  </a>
		</div>
	</content>

	<?php include "../footer.php"; ?>

</body>
</html>