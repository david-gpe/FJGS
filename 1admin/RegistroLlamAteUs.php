<?php include "../bd/cn.php";
include "../bd/sesion.php"; 

$m = $_SESSION['matUs'];
	$fecha_actual = date("d-m-Y");
	
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

		  			    <li class="nav-item dropdown">
		  			    	<a class="nav-item nav-link" href="GestionUsuario.php" id="navbarDropdownMenuLink" ><i class="fas fa-question"></i> <strong>Gestionar</strong></a>
		  			    		
		  			    </li>
 						<li class="nav-item dropdown">
		  			    	<a class="nav-item nav-link" href="ExpedienteUs.php" id="navbarDropdownMenuLink"><i class="fas fa-search"></i><strong>Historial</strong></a>
		  			    </li>	
						<?php include "../menunoti.php"; ?>
		  			    
		  			    <input type="hidden" id="matri" value="<?php echo $m?>">

		  			    
		  			    <li class="nav-item dropdown">
		  			    	<a class="nav-item nav-link active dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><strong>Bienvenido: <?php echo $_SESSION['tpUs']?> <?php echo $_SESSION['usuario'] ?></strong></a>
		  			    		<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							          <a class="dropdown-item" href="ExpedienteUs.php">Mi Perfil</a>
							          <a class="dropdown-item" href="../bd/cerrarsesion.php"><i class="fas fa-sign-in-alt"></i> <strong>Cerrar Sesión</strong></a>
							    </div>
		  			    </li>
		      	
		    </ul>
		  </div>
		  </div>
		</nav>

	<form class="form-register" action="../bd/registroLlamAten.php" method="POST">
			<div class="title">
				<h4><i class="fas fa-concierge-bell"></i> Registro de Llamadas de Atención</h4>
			</div>
			<div class="form-row">
				 <div class="col-md-12 mb-3">
				 	<label for="id">Matricula:</label>
				 	<input class="form-control" type="text" name="matricula" id="matricula" placeholder="Admin1" required>
				 </div>

				 <div class="col-md-12 mb-3">
				 	<label for="fecha">Fecha:</label>
				 	<input class="form-control" type="date" name="fec" id="fecha" placeholder="Ejemplo: 2020/06/03" required>
				 </div>

				 <div class="col-md-12 mb-3">
				 	<label for="raz">Razón:</label>
				 	<input class="form-control" type="text" name="raz" id="raz" placeholder="Llego tarde" required>
				 </div>
			</div>
			<div class="form-row">

				<div class="col-md-12">
					  <input class="botons form-control" type="submit" name="ReAt" value="Registrar Llamada de Atención">
				</div>
			</div>

 	</form>
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
						<th>Acciones</th>			
					</tr>
					<?php 
					$ins="SELECT * FROM LlamaUsuario";
					$query=mysqli_query($conexion,$ins);

					$result = mysqli_num_rows($query);
					if ($result > 0) {
						while ($data=mysqli_fetch_array($query)) {
				?>
					<tr>
						<td><?php echo $data["Matricula"]; ?> </td>
						<td><?php echo $data["Nombre"]; ?> </td>
						<td><?php $vr= date("d-m-Y", strtotime($data["fecha"])); echo $vr; ?> </td>
						<td><?php echo $data["razon"]; ?> </td>
						<td>
							<a class="link_edit" href="" data-toggle="modal" data-target="#Editar"><i class="fas fa-edit"></i> <strong>Editar</strong></a>
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