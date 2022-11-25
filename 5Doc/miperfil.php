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
		  			    	<a class="nav-item nav-link active dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><strong>Bienvenido: <?php echo $_SESSION['tpUs']?> <?php echo $_SESSION['usuario']?></strong></a>
		  			    		<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							          <a class="dropdown-item" href="ExpedienteUs.php">Mi Perfil</a>
							          <a class="dropdown-item" href="../bd/cerrarsesion.php"><i class="fas fa-sign-in-alt"></i> <strong>Cerrar Sesión</strong></a>
							    </div>
		  			   
		  			    
		    </ul>
		  </div>
		  </div>
		</nav>

	<form class="form-register">
			    <div class="title">
					<h4 class=" text-center"> Información Personal</h4>
				</div>				
			</form>

			<div class="table-responsive-xl">
				<table class="table table-striped table-bordered table-hover table-dordered  table-dark">
					<?php 
					$ins="SELECT * FROM UsuarioTipoDato WHERE Matricula='$m'";
					$query=mysqli_query($conexion,$ins);
					$result = mysqli_num_rows($query);
					if ($result > 0) {
						while ($data=mysqli_fetch_array($query)) {
					?>
					<!--primer bloque-->
					<tr>
						<th>Matricula:</th> <td><?php echo $data["Matricula"]; ?> </td>
						<th>Celular</th> <td><?php echo $data["Celular"]; ?> </td>
					</tr>
					
					<tr>
						<th>Nombre</th> <td><?php echo $data["Nombre"]; ?> </td>
						<th>Nivel de estudio</th> <td><?php echo $data["NivEst"]; ?> </td>
					</tr>
					<tr>
						<th>Apellido paterno</th>
						<td><?php echo $data["ApellidoPaterno"]; ?> </td>
						<th>Entidad</th> <td><?php echo $data["Entidad"]; ?> </td>
					</tr>
					<tr>
						<th>Apellido materno</th> <td><?php echo $data["ApellidoMaterno"]; ?> </td>
						<th>Municipio</th> <td><?php echo $data["Municipio"]; ?> </td>	
					</tr>
					<tr>
						<th>Fecha de nacimiento</th> <td><?php echo $data["FechaNacimiento"]; ?> </td>
						<th>Localidad</th> <td><?php echo $data["Localidad"]; ?> </td>
					</tr>
					<tr>
						<th>CURP</th> <td><?php echo $data["CURP"]; ?> </td>
						<th>Domicilio</th> <td><?php echo $data["Domicilio"]; ?> </td>
					</tr>
					<tr>
						<th>RFC</th> <td><?php echo $data["RFC"]; ?> </td>
						<th>Colonia</th> <td><?php echo $data["Colonia"]; ?> </td>
					</tr>
					<tr>
						<th>Genero</th> <td><?php echo $data["Genero"]; ?> </td>
						<th>Codigo Postal</th> <td><?php echo $data["CP"]; ?> </td>
					</tr>
					<tr>
						<th>Correo</th>
						<td><?php echo $data["Correo"]; ?> </td>
						<th>Tipo de usuario</th> <td><?php echo $data["tipoUsuario"]; ?> </td>
					</tr>
					<!--primer bloque-->
					<tr>
						<th>Tipo de sangre</th>
						<td><?php echo $data["TipoSangre"]; ?> </td>
					</tr>
					<tr>
						<th>Telefono</th>
						<td><?php echo $data["Telefono"]; ?> </td>
					</tr>
					
					
				<?php
					}
				}

				?>

			</table>
		</div>

					<form class="form-register">
			    <div class="title">
					<h4 class=" text-center"> Lista de Llamadas de Atención</h4>
				</div>				
			</form>

			<div class="table-responsive-xl">
				<table class="table table-striped table-dordered table-sm table-dark">
					<tr>
						<th>Matricula</th>
						<th>Nombre</th>
						<th>Fecha</th>
						<th>Razón</th>
						<!--<th>Acciones</th>-->				
					</tr>
					<?php 
					$ins="SELECT * FROM LlamaUsuario WHERE Matricula='$m'";
					$query=mysqli_query($conexion,$ins);
					$result = mysqli_num_rows($query);
					if ($result > 0) {
						while ($data=mysqli_fetch_array($query)) {
				?>
					<tr>
						<td><?php echo $data["Matricula"]; ?> </td>
						<td><?php echo $data["Nombre"]; ?> </td>
						<td><?php echo $data["Fecha"]; ?> </td>
						<td><?php echo $data["Razon"]; ?> </td>
						<!--<td>
							<a class="link_edit" href="" data-toggle="modal" data-target="#Editar"><i class="fas fa-edit"></i> <strong>Editar</strong></a>
						</td>	-->
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