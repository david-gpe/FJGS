<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
		<?php include "../scrip/scrp.php"; 
		include "../bd/sesion.php"; 
		?> 

 
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
		  					<a class="nav-item nav-link active" href="indexadmin.php" id="navbarDropdownMenuLink"><i class="fas fa-home"></i> <strong>Inicio</strong></a>
			  			</li>

		  				<li class="nav-item active dropdown">
		  					<a class="nav-item nav-link active dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-plus-circle"></i> <strong>Registrar</strong></a>
			  					 <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							          <a class="dropdown-item" href="RegistroUsuario.php">Nuevo Usuario</a>
							          <a class="dropdown-item" href="RegistroAsisUs.php">Asistencias</a>
							          <a class="dropdown-item" href="RegistroLlamAteUs.php">Llamadas de atención</a>
							      </div>
		  				</li>

		  			    <li class="nav-item dropdown">
		  			    	<a class="nav-item nav-link" href="GestionUsuario.php" id="navbarDropdownMenuLink">
		  			    	<i class="fas fa-search"></i><strong>Gestionar</strong></a>
		  			    </li>

		  			   <input type="hidden" id="matri" value="<?php echo $m?>">

		  			    <?php
		  			    
						$not = mysqli_query($conexion,"SELECT * FROM Notificaciones WHERE 
							Matricula ='$m' AND Estado = 0 AND Fecha < '$fecha_actual'");
							$cuantas = mysqli_num_rows($not);
						?>

		  			    <li class="nav-item dropdown">
		  			    	<a class="nav-item nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-envelope-open"></i></a>
		  			    	<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							          <li class="dropdown-item">Tienes <?php echo $cuantas; ?> notificaciones</li>
							          <li>
							          	<ul>
							          		<?php
							          			while ($no = mysqli_fetch_array($not)) {
							          			?>
							          			<tr>
							          				<a><i class="fa fa-users"></i><?php echo $no['Matricula'] ?> <?php echo $no['Causa']; ?> el dia <?php echo $no['Fecha'];?>
							          				</a>
							          			</tr>
							          			<?php
							          		}
							          		?>
							          	</ul>

							          </li>
							          <input class="botons form-control" type="submit" id="modificarnotificacion" value="Marcar como leidas">
							        </ul>
							</li>

		  			    <li class="nav-item dropdown">
		  			    	<a class="nav-item nav-link active dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><strong>Bienvenido: <?php echo $_SESSION['tpUs']?>	<?php echo $_SESSION['usuario'] ?> </strong></a>
		  			    		<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							          <a class="dropdown-item" href="ExpedienteUs.php">Mi Perfil</a>
							          <a class="dropdown-item" href="../bd/cerrarsesion.php"><i class="fas fa-sign-in-alt"></i> <strong>Cerrar Sesión</strong></a>
							    </div>
		  			    </li>
		      	
		    </ul>
		  </div>
		  </div>
		</nav>

		<form class="form-register">
			<div class="title">
				<h4><i class="fas fa-user"></i> Perfil de Usuario</h4>
			</div>
			<div class="form-row">
				 <div class="col-md-12 mb-3">
				 	<label for="id">Identificador:</label>
				 	<input class="form-control" type="text" name="Id" id="id" placeholder="Ejemplo: 100015" required>
				 </div>

				 <div class="col-md-12 mb-3">
				 	<label for="name">Nombre(s):</label>
				 	<input class="form-control" type="text" name="Nombre" id="name" placeholder="Ejemplo: David" required>
				 </div>

				 <div class="col-md-12 mb-3">
				 	<label for="apellidoPaterno">Apellido Paterno:</label>
				 	<input class="form-control" type="text" name="Apellido Paterno" id="apellidoPaterno" placeholder="Ejemplo: Perez" required>
				 </div>

				 <div class="col-md-12 mb-3">
				  	<label for="apellidoMaterno">Apellido Materno:</label>
				 	<input class="form-control" type="text" name="Apellido Paterno" id="apellidoMaterno" placeholder="Ejemplo: Perez" required>
				 </div>
	
			</div>
			<input class="botons " type="submit" value="Buscar">

 			</form>

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
					success: function(res){
						
					}
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