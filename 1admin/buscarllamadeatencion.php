<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
		<?php include "../scrip/scrp.php"; 
		include "../bd/cn.php";
include "../bd/sesion.php"; 

$m = $_SESSION['matUs'];
	$fecha_actual = date("d-m-Y");
		
		$busqueda = $_REQUEST['busqueda'];
		if (empty($busqueda)) {
			header("location:ExpedienteUs.php");
		}
		?> 
		<script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>

		<title></title>
		<style>

			.form-register{
				margin-left: auto;
				width: 400px;
			}
		</style>
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

		  			    	<?php include "../menunoti.php"; ?>
		  			    	
			  			   <input type="hidden" id="matri" value="<?php echo $m?>">

		  			    
			  			    <li class="nav-item dropdown">
		  			    	<a class="nav-item nav-link active dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><strong>Bienvenido: <?php echo $_SESSION['tpUs']?> <?php echo $_SESSION['usuario'] ?> </strong></a>
		  			    		<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							          <a class="dropdown-item" href="...php">Mi Perfil</a>
							          <a class="dropdown-item" href="../bd/cerrarsesion.php"><i class="fas fa-sign-in-alt"></i> <strong>Cerrar Sesión</strong></a>
							    </div>
		  			    	</li>
			      	
			    		</ul>
			  		</div>
			 	</div>
		</nav>

		
				           	<!-- formulario de busqueday-->
			            	<form class="form-register form_search" action="buscarllamadeatencion.php" method="GET">
								<input class="form-control" type="text" name="busqueda"  placeholder="Matricula: Fin1" value="<?php echo $busqueda; ?>"> 	
								<input class="botons form-control btn_search" type="submit" value="Buscar">
			 				</form>

			 				<form class="form-register">
			   					<div class="title">
									<h4 class=" text-center">Llamadas de atención</h4>
								</div>				
							</form>
							<div class="table-responsive-xl">
								<table class="table table-striped table-dordered table-sm table-dark">
									<tr>
										<th>Matricula</th>
										<th>Nombre</th>
										<th>Fecha</th>
										<th>Razon</th>
									</tr>
									<?php 
										$ins="SELECT * FROM llamaUsuario WHERE (Matricula LIKE '%$busqueda%' OR 
											 							Nombre LIKE '%$busqueda%')";
										$query=mysqli_query($conexion,$ins);
										$result = mysqli_num_rows($query);
										if ($result > 0) {
											while ($data=mysqli_fetch_array($query)) {
									?>
									<tr>
										<td><?php echo $data["Matricula"]; ?> </td>
										<td><?php echo $data["Nombre"]; ?> </td>
										<td><?php $vr= date("d-m-Y", strtotime($data["Fecha"])); echo $vr; ?> </td>
										<td><?php echo $data["Razon"]; ?> </td>
									</tr>
									<?php
										}
									}

									?>
								</table>
							</div>
						
							<form class="form-register">
			   					<div class="title">
									<h4 class=" text-center"> Asistencias</h4>
								</div>				
							</form>
							<div class="table-responsive-xl">
								<table class="table table-striped table-dordered table-sm table-dark">
									<tr>
										<th>Número de registro</th>
										<th>Matricula</th>
										<th>Nombre</th>
										<th>Fecha</th>
										<th>Hora de entrada</th>
										<th>Hora de salida</th>
									</tr>
									<?php 
										$ins="SELECT * FROM AsistenciaUsuario 
														WHERE (Matricula LIKE '%$busqueda%' OR 
											 			Nombre LIKE '%$busqueda%')";
										$query=mysqli_query($conexion,$ins);
										$result = mysqli_num_rows($query);
										if ($result > 0) {
											while ($data=mysqli_fetch_array($query)) {
									?>
									<tr>
										<td><?php echo $data["id"]; ?> </td>
										<td><?php echo $data["Matricula"]; ?> </td>
										<td><?php echo $data["Nombre"]; ?> </td>
										<td><?php $vr= date("d-m-Y", strtotime($data["Fecha"])); echo $vr; ?> </td>
										<td><?php echo $data["horaEntrada"]; ?> </td>
										<td><?php echo $data["HoraSalida"]; ?> </td>
									</tr>
									<?php
										}
									}

									?>
								</table>
							</div>
			           
		

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