<?php 	include "../bd/cn.php";
	
	$query= mysqli_query($conexion,$llamser);
	 
	if(isset($_POST['selTU']))
    {
    	$selTU=$_POST['selTU']; 
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<?php
	include "../scrip/scrp.php"; 
	include "../bd/sesion.php";
	$m = $_SESSION['matUs'];
	$fecha_actual = date("d-m-Y"); 
	?> 
		<script src="http://code.jquery.com/jquery-2.1.4.min.js"></script> 
	<title></title>
</head>
<body>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
		 	<span class="navbar-toggler-icon"></span></button>
		 		<a class="navbar-brand" href="#">
		 			<img src="../img/escudo.jpg" width="80" height="80" alt="">Escuela Primaria Francisco 
		 			Jose Gabilondo Soler
		 		</a>
		  		<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
			  		<div class="navbar-nav ml-auto text-center">
			  			<ul class="navbar-nav">
			  				<li class="nav-item active dropdown">
		  						<a class="nav-item nav-link active" href="indexfin.php" id="navbarDropdownMenuLink"><i class="fas fa-home"></i> <strong>Inicio</strong></a>
			  				</li>
						<input type="hidden" id="matri" value="<?php echo $m?>">

		  			    

		  			    <li class="nav-item dropdown">
		  			    	<a class="nav-item nav-link active dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><strong>Bienvenido: <?php echo $_SESSION['tpUs']?> 
		  			    		<?php echo $_SESSION['usuario'] ?></strong></a>
		  			    		<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							          <a class="dropdown-item" href="ExpedienteUs.php">Mi Perfil</a>
							          <a class="dropdown-item" href="../bd/cerrarsesion.php"><i class="fas fa-sign-in-alt"></i> <strong>Cerrar Sesión</strong></a>
							    </div>
		  			    </li>
			      	
		   				</ul>
		  			</div>
		 	 	</div>
		</nav>

		<form class="form-register" action="../bd/registrarpagoservicio.php" method="POST">
			<div class="title">
				<h4><i class="fas fa-hands-helping"></i> Pago de Servicios</h4>
				<div class="form-row">
					<div class="col-md-12 mb-3" >
					 	<label for="idalum">Servicio:</label>
					 	<select class="form-control" type="cmbox" name="selTU" id="mdp" >
							<?php 
                     			while($datos = mysqli_fetch_array($query)){
                    		?>
                        		<option value="<?php echo $datos['NombreServicio']?>"> <?php echo $datos['NombreServicio']?> </option>
                    		<?php
                        		}
                    		?> 
					 	</select> 

					</div>
				</div>	
			</div>
			<div class="form-row">
				
				 <div class="col-md-12 mb-3">
				 	<label for="mnt">Monto:</label>
				 	<input class="form-control" type="text" name="monto" id="mnt" placeholder="150">
				 </div>

				 <div class="col-md-12 mb-3">
				 	<label for="fdp">Fecha de Pago:</label>
				 	<input class="form-control" type="date" name="fecha" id="fdp">
				 </div>
			</div>
			<div class="form-row">

				<div class="col-md-6 mb-1">
					  <input class="botons form-control btn-success" type="submit" value="Registrar">
				</div>
				<div class="col-md-6 mb-1">
				 	<div align='center'><a class="botons btn-danger" type="submit" href="indexfin.php" value="Cancelar">Cancelar</a> </div>
				</div>
				<!--
				 <div class="col-md-12 mb-1">
					  <div align='center'><a class="botons" type="submit" href="agregarservicio.php" value="Agregar Servicio">Agregar Servicio</a> </div>
				 </div>-->
 			</div>

 	</form>
 			<form class="form-register">
			    <div class="title">
					<h4 class=" text-center"> Pagos de Servicios Realizados</h4>
				</div>				
			</form>

			<div class="table-responsive-xl">
				<table class="table table-striped table-dordered table-sm table-dark">
					<tr>
						<th>Servicio</th>
						<th>Monto</th>
						<th>Fecha</th>
					</tr>
				<?php 
					$ins="SELECT * FROM RegistroPagoServicios";
					$query=mysqli_query($conexion,$ins);
					$result = mysqli_num_rows($query);
					if ($result > 0) {
						while ($data=mysqli_fetch_array($query)) {
					?>
					<tr>
						<td><?php echo $data["NombreServicio"]; ?> </td>
						<td><?php echo $data["Monto"]; ?> </td>
						<td><?php $vr= date("d-m-Y", strtotime($data["Fecha"])); echo $vr; ?> </td>
							
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