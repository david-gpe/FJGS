<?php
	include "../scrip/scrp.php"; 
	include "../bd/sesion.php"; 
	include "../bd/cn.php"; 
	$m = $_SESSION['matUs'];
	$fecha_actual = date("d-m-Y");

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
		<script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
 
	<title></title>
</head>
<body>

		<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
		 	<span class="navbar-toggler-icon"></span></button>
		 		<a class="navbar-brand" href="#">
		 			<img src="../img/escudo.jpg" width="80" height="80" alt="">Escuela Francisco Jose Gabilondo Soler
		 		</a>
		  	<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
		  		<div class="navbar-nav ml-auto text-center">
		  			<ul class="navbar-nav">
		  				<li class="nav-item active dropdown">
		  					<a class="nav-item nav-link active dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-plus-circle"></i> <strong>Registrar</strong></a>
			  					 <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							          <a class="dropdown-item" href="RegistroUsuario.php">Nuevo Empleado</a>
							          <a class="dropdown-item" href="RegistroAsisUs.php">Asistencias</a>
							          <a class="dropdown-item" href="RegistroLlamAteUs.php">Llamadas de atención</a>
							      </div>
		  				</li>

		  			    <li class="nav-item dropdown">
		  			    	<a class="nav-item nav-link" href="GestionUsuario.php" id="navbarDropdownMenuLink"><i class="fas fa-question"></i> <strong>Gestionar</strong></a>
		  			    </li>

		  			    <li class="nav-item dropdown">
		  			    	<a class="nav-item nav-link" href="ExpedienteUs.php" id="navbarDropdownMenuLink"><i class="fas fa-search"></i><strong>Historial</strong></a>
		  			    </li>
						<?php include "../menunoti.php"; ?>
		  			    
		  			    <input type="hidden" id="matri" value="<?php echo $m?>">
		  			    <li class="nav-item dropdown">
		  			    	<a class="nav-item nav-link active dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><strong>Bienvenido: <?php echo $_SESSION['tpUs']?> <?php echo $_SESSION['usuario']?></strong></a>
		  			    		<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							          <a class="dropdown-item" href="miperfil.php">Mi Perfil</a>
							          <a class="dropdown-item" href="../bd/cerrarsesion.php"><i class="fas fa-sign-in-alt"></i> <strong>Cerrar Sesión</strong></a>
							    </div>
		  			   
		  			    
		    </ul>
		  </div>
		  </div>
		</nav>

	<content>
		<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
		  <div class="carousel-inner">
		    <div class="carousel-item active">
		      <img class="d-block w-100" src="../img/slda1.jpg" alt="First slide">
		    </div>
		    <div class="carousel-item">
		      <img class="d-block w-100" src="../img/slda2.jpg" alt="Second slide">
		    </div>
		    <div class="carousel-item">
		      <img class="d-block w-100" src="../img/slda3.png" alt="Third slide">
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
<script type="text/javascript">
		
			$('#modificarnotificacion').click(function(){
				var Matricula =  document.getElementById('matri').value;
				if (Matricula=="") {
					alertify.alert("Debes ingresar la matricula");
					return false;
				}else{
					$.ajax({
					url: '../bd/ModificarNotificaciones.php',
					type: 'POST',
					data:{ "Matricula":Matricula} ,
					
				})
				.done(function(res){
					alertify.alert("Notificaciones marcadas como leido");
				})
				.fail(function(){
					console.log("error");
				})
				.always(function(){
					console.log("complete");
				});	
				}
				
			});


	</script>