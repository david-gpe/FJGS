<?php 
include "../bd/cn.php";
include "../bd/sesion.php"; 

$m = $_SESSION['matUs'];
	$fecha_actual = date("d-m-Y");

	$query= mysqli_query($conexion,$llam);
	$queryg= mysqli_query($conexion,$llamg);
	$queryts= mysqli_query($conexion,$llamts);
	$queryns= mysqli_query($conexion,$llamns);
	 
	  if(isset($_POST['selTU']))
    {
        $selTU=$_POST['selTU'];
          }

      if(isset($_POST['gen']))
    {
        $gen=$_POST['gen'];
          }

     if(isset($_POST['tis']))
    {
        $tis=$_POST['tis'];
          }
    
     if(isset($_POST['nies']))
    {
        $nies=$_POST['nies'];
          }

	 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
		<?php include "../scrip/scrp.php"; 
		
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
		  					<a class="nav-item nav-link active dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="fas fa-plus-circle"></i> <strong>Registrar</strong></a>
			  					 <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							          <a class="dropdown-item" href="RegistroUsuario.php">Nuevo Usuario</a>
							          <a class="dropdown-item" href="RegistroAsisUs.php">Asistencias</a>
							          <a class="dropdown-item" href="RegistroLlamAteUs.php">Llamadas de atención</a>
							      </div>
		  				</li>
 						<li class="nav-item dropdown">
		  			    	<a class="nav-item nav-link" href="ExpedienteUs.php" id="navbarDropdownMenuLink"><i class="fas fa-search"></i><strong>Historial</strong></a>
		  			    </li>
						<?php include "../menunoti.php"; ?>
		  			    
		  			    <input type="hidden" id="matri" value="<?php echo $m?>">

		  			   
		  			    <li class="nav-item dropdown">
		  			    	<a class="nav-item nav-link active dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><strong>Bienvenido: <?php echo $_SESSION['tpUs']?> <?php echo $_SESSION['usuario'] ?> </strong></a>
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
					<h4><i class="fas fa-user"></i> Gestión de Información</h4>
					<div class="form-row ">
				 		<div class="col-md-12 mb-3">
				 			<label for="tp">Tipo de Usuario:</label>
				 			<select class="form-control" type="cmbox" name="selTU" id="mdp" >
				 				<?php 
                      	  			while($datos = mysqli_fetch_array($query)){
                    			?>
                           			<option value="<?php echo $datos['tipoUsuario']?>"> <?php echo $datos['tipoUsuario']?> </option>
                    			<?php
                        			}
                    			?> 
				 			</select>
				 		</div>
				 	</div>	
				</div>

					<div class="form-row mx-auto">
										
						<div class="col-md-12 mb-3 mx-auto">
							<label for="id">Matricula:</label>
							<input class="form-control" type="text" name="Id" id="id" placeholder="Admin1" required>
						</div>
					</div>
				<input class="botons " type="submit" value="Buscar">
			</form>
     

			            	<!-- tabla de busqueda-->
			<form class="form-register">
			    <div class="title">
					<h4 class=" text-center"> Lista de Usuarios</h4>
				</div>				
			</form>

			<div class="table-responsive-xl">
				<table class="table table-striped table-dordered table-sm table-dark">
					<tr>
						<th>Matricula</th>
						<th>Nombre</th>
						<th>Apellido Paterno</th>
						<th>Apellido Materno</th>
						<th>Celular</th>
						<th>Tipo Usuario</th>
						<th>Acciones</th>				
					</tr>
				<?php 
					$ins="SELECT * FROM Usuario_Tipo_Dato";
					$query=mysqli_query($conexion,$ins);
					$result = mysqli_num_rows($query);
					if ($result > 0) {
						while ($data=mysqli_fetch_array($query)) {
					?>
					<tr>
						<td><?php echo $data["Matricula"]; ?> </td>
						<td><?php echo $data["Nombre"]; ?> </td>
						<td><?php $cadena=utf8_decode($data["ApellidoPaterno"]); echo $cadena; ?> </td>
						<td><?php $cadena2=utf8_decode($data["ApellidoMaterno"]); echo $cadena2; ?> </td>
						<td><?php echo $data["Celular"]; ?> </td>	
						<td><?php echo $data["tipoUsuario"]; ?> </td>
						<td>
							<a class="link_edit" href="editarUsuario.php?matricula=<?php echo $data["Matricula"]; ?>"><i class="fas fa-edit"></i> <strong>Editar</strong></a>
										            	I
							<a class="link_delete" href="eliminarUsuario.php?matricula=<?php echo $data["Matricula"]; ?>"><i class="fas fa-trash"></i> <strong>Eliminar</strong> </a>
						</td>	
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