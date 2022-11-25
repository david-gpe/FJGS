<?php
	include "../scrip/scrp.php"; 
	include "../bd/sesion.php"; 
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
 <style>
		.form-register{
			width: 550px;
			height: 550px;
		}
		.carousel-item{
			width: 500px;
		}
		.carousel-inner{
			width: 500px;
		}
	</style>	
 
	<title></title>
</head>
<body>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
		 	<span class="navbar-toggler-icon"></span></button>
		 		<a class="navbar-brand" href="#">
		 			<img src="../img/escudo.jpg" width="80" height="80" alt="">Escuela Primaria Francisco Jose Gabilondo Soler
		 		</a>
		  	<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
		  		<div class="navbar-nav ml-auto text-center">
		  			<ul class="navbar-nav">
		  				
		  				<li class="nav-item active dropdown">
		  					<a class="nav-item nav-link active" href="indexdir.php" id="navbarDropdownMenuLink"><i class="fas fa-home"></i> <strong>Inicio</strong></a>
			  			</li>

			  			<li class="nav-item active dropdown">
		  					<a class="nav-item nav-link active dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-briefcase"></i> <strong>Areas</strong></a>
			  					 <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							          <a class="dropdown-item" href="">Control Escolar</a>
							          <a class="dropdown-item" href="">Administrativo</a>
							          <a class="dropdown-item" href="">Finanzas</a>
							      </div>
		  				</li>

		  			    <li class="nav-item">
		  			    	<a class="nav-item nav-link" href="#"><i class="fas fa-envelope-open"></i></a>
		  			    </li>

		  			    <li class="nav-item dropdown">
		  			    	<a class="nav-item nav-link active dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><strong>Bienvenido:  <?php echo $_SESSION['tpUs']?> <?php echo $_SESSION['usuario'] ?> </strong></a>
		  			    		<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							          <a class="dropdown-item" href="ExpedienteUs.php">Mi Perfil</a>
							          <a class="dropdown-item" href="../bd/cerrarsesion.php"><i class="fas fa-sign-in-alt"></i> <strong>Cerrar Sesión</strong></a>
							    </div>
		  			    </li>

		  			    
		    </ul>
		  </div>
		  </div>
		</nav>
		
		<div class="table-responsive">
			<table class="table table-striped table-sm table-bordered">
			    <thead>
			        <tr>
			            <th>
			            	<content class="format">
								<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
								  <div class="carousel-inner">
								    <div class="carousel-item active">
								      <img class="d-block w-100" src="../img/slda1.jpg" alt="First slide" height="550px" width="450px">
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
			            </th>
			            <th>
			            	<form class="form-register" action="../bd/registrar.php" method="POST">
								<div class="title" >
									<h4><i class="fas fa-user"></i>Usuario</h4>
									
								</div>
								<div class="form-row" action="../bd/bsusuario.php" method="get" class="form_search" >
									 <div class="col-md-12 mb-3">
									 	<label for="buscar">Nombre o matricula del usuario:</label>
									 	<input type="text" name="busqueda" placeholder="Buscar">
										<input class="botons form-control btn-search" type="submit" value="Buscar">

									 </div>
							  	</div>
							  	<h4>Aqui haces tu tabla de usuarios con el buscador que esta arriba 
							  	</h4>				  			 	
							
							</form>
			            </th>
			        </tr>
			    </thead>
			 </table>
		</div>
 
	<?php include "../footer.php"; ?>

</body>
</html>