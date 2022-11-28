<?php include "../bd/cn.php";



	    if (empty($_GET['matricula'])) {
          	header('Location: GestionUsuario.php');
        }
          $iduser = $_GET['matricula'];
          $sql = mysqli_query($conexion,"SELECT * FROM UsuarioTipoDato WHERE Matricula= '$iduser'");
          $result_sql =mysqli_num_rows($sql);
          
          if($result_sql==0){
          	header('Location: GestionUsuario.php');
          }else{
          	while ($data= mysqli_fetch_array($sql)) {
          		$matri = $data['Matricula'];
          		$nombre = $data['Nombre'];
          		$apellidoPaterno = $data['ApellidoPaterno'];
          		$apellidoMaterno = $data['ApellidoMaterno'];
          		$fechaNacimiento = $data['FechaNacimiento'];
          		$curp = $data['CURP'];
          		$rfc = $data['RFC'];
          		$idtipoUsuario = $data['IdTipoUsuario'];
          		$tipoUsuario = $data['tipoUsuario'];
          		$edo = $data['Estado'];

          		if ($idtipoUsuario == 1) {
                    $optiontiusuario = '<option value="'.$idtipoUsuario.'">'.$tipoUsuario.' </option>';
          		}else if($idtipoUsuario == 2){
                    $optiontiusuario = '<option value="'.$idtipoUsuario.'">'.$tipoUsuario.' </option>';
          		}else if($idtipoUsuario == 3){
                    $optiontiusuario = '<option value="'.$idtipoUsuario.'">'.$tipoUsuario.' </option>';
          		}else if($idtipoUsuario == 4){
                    $optiontiusuario = '<option value="'.$idtipoUsuario.'">'.$tipoUsuario.' </option>';
          		}else if($idtipoUsuario == 5){
                    $optiontiusuario = '<option value="'.$idtipoUsuario.'">'.$tipoUsuario.' </option>';
          		}else if($idtipoUsuario == 6){
                    $optiontiusuario = '<option value="'.$idtipoUsuario.'">'.$tipoUsuario.' </option>';
          		}
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

 	<style>
		.form-register{
			width: 900px;
		}
	</style>

	<title></title>
</head>
<script type="text/javascript">
	function ConfirmarEliminacion()
	{
		var respuesta =confirm("Continuar con la Eliminación");
		if (respuesta == true) 
		{
			return true;
		}else{
			return false;
		}
	}
</script>

<body>
		
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
		<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span>
		</button>
		 	<a class="navbar-brand" href="#"><img src="../img/escudo.jpg" width="80" height="80" alt="">Escuela Francisco Jose Gabilondo Soler
		 	</a>
		  		<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
		  			<div class="navbar-nav ml-auto text-center">
		  				<ul class="navbar-nav">
			  				<li class="nav-item active dropdown">
		  						<a class="nav-item nav-link active" href="../redireccion.php" id="navbarDropdownMenuLink"><i class="fas fa-home"></i> <strong>Inicio</strong></a>
			  				</li>
							<li class="nav-item dropdown">
		  			    		<a class="nav-item nav-link" href="GestionUsuario.php" id="navbarDropdownMenuLink" ><i class="fas fa-question"></i> <strong>Gestionar</strong></a>
		  			    	</li>
		  			    <?php include "../menunoti.php"; ?>
		  			    	
							 <input type="hidden" id="matri" value="<?php echo $m?>">

		  			    
			  			    <li class="nav-item dropdown">
			  			    	<a class="nav-item nav-link active dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><strong>Bienvenido: <?php echo $_SESSION['tpUs']?> 
		  			    		<?php echo $_SESSION['usuario'] ?> </strong></a>
	  			    				<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						          		<a class="dropdown-item" href="ExpedienteUs.php">Mi Perfil</a>
						          		<a class="dropdown-item" href="../bd/cerrarsesion.php"><i class="fas fa-sign-in-alt"></i> <strong>Cerrar Sesión</strong></a>
								    </div>
		  			    	</li>
		      			</ul>
		  			</div>
		  		</div>
	</nav>

	<form class="form-register" action="../bd/eliminar.php" method="POST">
		<div class="title" >
			<h4><i class="fas fa-user"></i> Eliminar Usuario</h4>
			<div class="form-row ">
				<div class="col-md-4 mb-3 mx-auto">
					<input type="hidden" name="matriculausurio" value="<?php echo $matri?>">
					<input type="hidden" name="edousurio" value="<?php echo $edo?>">
					<label for="tp">Tipo de Usuario:</label>
					<input type="hidden" name="optiontiusuario" value="<?php echo $idtipoUsuario?>">
					<input class="form-control" type="text" name="optiontiusuari" value="<?php echo $tipoUsuario?>">
				</div>
			</div>
		</div>
			<div class="form-row">
				
				<div class="col-md-4 mb-3">
				 	<label for="name">Nombre(s):</label>
				 	<input class="form-control" type="text" name="nombre" id="name" value="<?php echo $nombre?>" placeholder="Ejemplo: David" >
				</div>
				
				<div class="col-md-4 mb-3">
					<label for="apellidoPaterno">Apellido Paterno:</label>
				 	<input class="form-control" type="text" name="ap" id="apellidoPaterno" value="<?php echo $apellidoPaterno?>" placeholder="Ejemplo: Perez" >
				</div>
				
				<div class="col-md-4 mb-3">
					<label for="apellidoMaterno">Apellido Materno:</label>
				 	<input class="form-control" type="text" name="am" id="apellidoMaterno" value="<?php echo $apellidoMaterno?>" placeholder="Ejemplo: Perez" >
				</div>
				
				<div class="col-md-3 mb-3">
				  	<label for="apellidoMaterno">Fecha de Nacimiento:</label>
				 	<input class="form-control" type="date" name="fec" id="apellidoMaterno" value="<?php echo $fechaNacimiento?>" placeholder="Ejemplo: Perez" >
				</div>
				
				<div class="col-md-5 mb-3">
				 	<label for="curp">Curp:</label>
				 	<input class="form-control" type="text" name="curp" id="curp" value="<?php echo $curp?>" placeholder="Ejemplo: GUMD970721HPLDLV" >
				</div>
				
				<div class="col-md-4 mb-3">
					<label for="rfc">RFC:</label>
				 	<input class="form-control" type="text" name="rfc" id="rfc" value="<?php echo $rfc?>" placeholder="Ejemplo: GUMD970721" >
				</div>

		  	</div>

			<div class="form-row">
				<div class="col-md-6 mb-3 mx-auto">
					  <input class="botons form-control" type="submit" onclick="return ConfirmarEliminacion()" value="Eliminar">
				</div>
				<div class="col-md-6 mb-3 mx-auto">
					  <input class="botons form-control" type="submit" href="GestionUsuario.php" value="Cancelar">
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