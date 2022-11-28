<?php include "../bd/cn.php";
	

          if (empty($_GET['id'])) {
          	echo $_GET['id'];

          	//header('Location: RegistroAsisUs.php');
          }
          $id = $_GET['id'];
          $sql = mysqli_query($conexion,"SELECT * FROM RegistroAsis WHERE id= '$id'");
          $result_sql =mysqli_num_rows($sql);
          if($result_sql==0){
          	//header('Location: RegistroAsisUs.php');
          }else{
          	while ($data= mysqli_fetch_array($sql)) {
          		$id = $data['id'];
          		$matri = $data['Matricula'];
          		$fecha = $data['Fecha'];
          		$HoraEntrada = $data['horaEntrada'];
          		$HoraSalida = $data['HoraSalida'];
          		
          	}
          }

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
		<?php include "../scrip/scrp.php"; 
		include "../bd/sesion.php";
		$m = $_SESSION['matUs'];
	$fecha_actual = date("d-m-Y"); 
		?> 

 
	<title></title>
</head>
<body>
		
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
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
		  			    	<a class="nav-item nav-link" href="GestionUsuario.php" id="navbarDropdownMenuLink">
		  			    	<i class="fas fa-question"></i> <strong>Gestionar</strong></a>
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
			
			<form class="form-register" action="../bd/editarasis.php" method="POST">
				<div class="title">
					<h4><i class="fas fa-concierge-bell"></i> Edición de Asistencia</h4>
				</div>
				<div class="form-row">
					<div class="col-md-12 mb-3">
						<input type="hidden" name="idusuario" value="<?php echo $id?>">
						<label for="id">Matricula:</label>
						<input class="form-control" type="text" name="matriculausuario" value="<?php echo $matri?>" placeholder="Admin1">
					</div>

					<div class="col-md-12 mb-3">
						<label for="fecha">Fecha:</label>
						<input class="form-control" type="date" name="fec" id="fecha" value="<?php echo $fecha?>">
					</div>

					<div class="col-md-12 mb-3">
						<label for="he">Hora Entrada:</label>
						<input class="form-control" type="time" name="he" value="<?php echo $HoraEntrada?>" required>
					</div>

					<div class="col-md-12 mb-3">
						<label for="hs">Hora Salida:</label>
						<input class="form-control" type="time" name="hs" value="<?php echo $HoraSalida?>" required>
					</div>

				</div>
				<div class="form-row">
					<div class="col-md-6 mb-1 mx-auto">
						<input class="botons form-control" name="ReA" type="submit" value="Actualizar">
					</div>
 				</div>
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