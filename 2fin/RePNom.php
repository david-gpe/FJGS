<?php include "../bd/cn.php";
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
		  			    <?php include "../menunoti.php"; ?>
			  				
			  				  <input type="hidden" id="matri" value="<?php echo $m?>">

		  			  
		  			   

		  			    <li class="nav-item dropdown">
		  			    	<a class="nav-item nav-link active dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><strong>Bienvenido: <?php echo $_SESSION['usuario'] ?> </strong></a>
		  			    		<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							          <a class="dropdown-item" href="ExpedienteUs.php">Mi Perfil</a>
							          <a class="dropdown-item" href="../bd/cerrarsesion.php"><i class="fas fa-sign-in-alt"></i> <strong>Cerrar Sesión</strong></a>
							    </div>
		  			    </li>
			      	
		   				</ul>
		  			</div>
		 	 	</div>
		</nav>
			<input class="botons form-control btn-search sticky-top" type="submit" id="calcularNomina" value="Calcular">
				

			<form class="form-register" id="formulariopagonomina" action="../bd/registronomina.php" method="POST">
				<div class="title">
					<h4><i class="fas fa-coins"></i> Pago de Nomina</h4>
				</div>
				<div class="form-row">
					<div class="col-md-12 mb-3">
					 		<label for="mnt">Folio:</label>
					 		<input class="form-control" type="text" name="fl" id="fl" placeholder="Ejemplo: 100015" required>
					</div>
					<div class="col-md-12 mb-3">
					 		<label for="mnt">Matricula:</label>
					 		<input class="form-control" type="text" name="matrilcula" id="matricula" placeholder="Ejemplo: Admin1" required>
					</div>
					 <div class="col-md-12 mb-3">
					 	<label for="fdp">Fecha de Pago:</label>
					 	<input class="form-control" type="date" name="fdp" id="fdp" required>
					 </div>
					 
					 <div class="col-md-12 mb-3">
					 	<label for="mnt">Monto:</label>
					 	<input class="form-control" type="text" name="mnt" id="mnt" placeholder="Ejemplo: 100015">
					 </div>
				</div>
				<div class="form-row">
					<div class="col-md-6 mb-1 mx-auto">
						  <input class="botons form-control" type="submit" value="Registrar">
					</div>				
	 			</div>

	 		</form>

	 					<form class="form-register">
			    <div class="title">
					<h4 class=" text-center"> Nomina reaalizada</h4>
				</div>				
			</form>

			<div class="table-responsive-xl">
				<table class="table table-striped table-dordered table-sm table-dark">
					<tr>
						<th>Matricula</th>
						<th>Nombre</th>
						<th>Folio</th>
						<th>Fecha</th>
						<th>Monto</th>
						<th>Acciones</th>				
					</tr>
					<?php 
					$ins="SELECT * FROM RegistroPagoNomina";
					$query=mysqli_query($conexion,$ins);
					$result = mysqli_num_rows($query);
					if ($result > 0) {
						while ($data=mysqli_fetch_array($query)) {
				?>
					<tr>
						<td><?php echo $data["Matricula"]; ?> </td>
						<td><?php echo $data["Nombre"]; ?> </td>
						<td><?php echo $data["Folio"]; ?> </td>
						<td><?php $vr= date("d-m-Y", strtotime($data["fecha"])); echo $vr; ?> </td>
						<td><?php echo $data["Salario"]; ?> </td>
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
		
			$('#calcularNomina').click(function(){
				var Matricula = document.getElementById('matricula').value;
				if (Matricula=="") {
					alertify.alert("Debes ingresar la matricula");
					return false;
				}else{
					$.ajax({
					url: '../bd/calcularNomina.php',
					type: 'POST',
					data:{ "Matricula":Matricula} ,
					success: function(res){
						$('#mnt').html(res);
					}
				})
				.done(function(res){
					alertify.alert(res);
				})
				.fail(function(){
					console.log("error");
				})
				.always(function(){
					console.log("complete");
				});	
				}
				
			});



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