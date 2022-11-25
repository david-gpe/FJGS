<?php
	include "../bd/cn.php"; 
	include "../scrip/scrp.php"; 
	include "../bd/sesion.php"; 
	$m = $_SESSION['matUs'];
	$fecha_actual = date("d-m-Y");
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	
 
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
		  			    	<a class="nav-item nav-link active dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user"></i> <strong>Usuario</strong></a>
			  					 <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
				  			    	<a class="dropdown-item" href="bususer.php">Buscar </a>
			    		          <a class="dropdown-item" href="RegistroUsuario.php">Registrar</a>
							      </div>


		  			    </li>

		  			    <li class="nav-item active dropdown">
		  					<a class="nav-item nav-link active dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-briefcase"></i> <strong>Areas</strong></a>
			  					 <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							          <a class="dropdown-item" href="">Control Escolar</a>
							          <a class="dropdown-item" href="">Administrativo</a>
							          <a class="dropdown-item" href="">Finanzas</a>
							      </div>
		  				</li>

		  			    						<input type="hidden" id="matri" value="<?php echo $m?>">

		  			    <?php
		  			    
						$not = mysqli_query($conexion,"SELECT * FROM Notificaciones WHERE 
							Matricula ='$m' AND Estado = 0 AND Fecha < '$fecha_actual'");
							$cuantas = mysqli_num_rows($not);
						?>
						<input type="hidden" id="num" value="<?php echo $cuantas?>">


		  			    <li class="nav-item dropdown">
		  			    	<a class="nav-item nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-envelope-open"></i></a>
		  			    	<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							          <li class="dropdown-item">Tienes <?php echo $cuantas; ?> notificaciones</li>
							          <li>
							          	<ul>
							          		<?php
							          			while ($no = mysqli_fetch_array($not)) {
							          			?>
							          			<li>
							          				<a><i class="fa fa-users"></i><?php echo $no['Matricula'] ?> <?php echo $no['Causa']; ?> el dia <?php echo $no['Fecha'];?>
							          				</a>
							          			</li>
							          			<?php
							          		}
							          		?>
							          	</ul>

							          </li>
							          <input class="botons form-control" type="submit" id="modificarnotificacion" value="Marcar como leidas">
							        </ul>
							</li>
		  			    <li class="nav-item dropdown">
		  			    	<a class="nav-item nav-link active dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><strong>Bienvenido: <?php echo $_SESSION['tpUs']; ?> <?php echo $_SESSION['usuario'] ?> </strong></a>
		  			    		<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							          <a class="dropdown-item" href="miperfil.php">Mi Perfil</a>
							          <a class="dropdown-item" href="../bd/cerrarsesion.php"><i class="fas fa-sign-in-alt"></i> <strong>Cerrar Sesión</strong></a>
							    </div>
		  			    </li>

		  			    
		    </ul>
		  </div>
		  </div>
		</nav>

	<content class="format">
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