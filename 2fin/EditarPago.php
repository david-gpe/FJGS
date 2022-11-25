<?php include "../bd/cn.php";

	$query= mysqli_query($conexion,$periodo);
 
	if(isset($_POST['selTU']))
    {
       $selTU=$_POST['selTU'];
    }

     if (empty($_GET['idcol'])) {
          	header('Location: RePaCol.php');
          }
          $idcol = $_GET['idcol'];
          $sql = mysqli_query($conexion,"SELECT * FROM ColegiaturaAlumnosTodo WHERE IdColegiatura='$idcol'");
          $result_sql =mysqli_num_rows($sql);
          if($result_sql==0){
          	header('Location: GestionUsuario.php');
          }else{
          	while ($data= mysqli_fetch_array($sql)) {
          		$colegitura = $data['IdColegiatura'];
          		$matricuT = $data['MatriculaTutor'];
          		$matriculA = $data['MatriculAlumno'];
          		$mensulidad = $data['Mensualidad'];
          		$Monto = $data['Monto'];
          		$fecdepag = $data['FechedePago'];

                    $optionMensualidad = '<option value="'.$mensulidad.'">'.$mensulidad.' </option>';

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

		<form class="form-register" action="../bd/actualizarregistropago.php" method="POST">
			<div class="title">
				<h4><i class="fas fa-user-graduate"></i> Información del Alumno</h4>
				<div class="form-row">
					<div class="col-md-12 mb-3" >
					<input type="hidden" name="colegitura" value="<?php echo $colegitura?>">
						<label for="idalum">Matricula del Alumno:</label>
					 	<input class="form-control" type="text" name="idalum" id="idalum" placeholder="ALUMPRI3" value="<?php echo $matriculA?>">
					</div>
					<div class="col-md-12 mb-3" >
					 	<label for="idalum">Matricula del Tutor:</label>
					 	<input class="form-control" type="text" name="idt" id="idt" placeholder="TUTPRI1" value="<?php echo $matricuT?>">
					</div>
				</div>	
			</div>
			<div class="form-row">
				
				 <div class="col-md-12 mb-3">
				 	<label for="mnt">Monto:</label>
				 	<input class="form-control" type="text" name="mnt" id="mnt" placeholder="100015" value="<?php echo $Monto?>">
				 </div>

				 <div class="col-md-12 mb-3">
				 	<label for="fdp">Fecha de Pago:</label>
				 	<input class="form-control" type="date" name="fec" id="fec" value="<?php echo $fecdepag?>">
				 </div>
				 <div class="col-md-12 mb-3">
				 	<label for="tp">Mensualidad:</label>
					<select class="form-control" type="cmbox" name="selTU" id="selTU" >
						<?php 
						echo $optionMensualidad;
                     		while($datos = mysqli_fetch_array($query)){
                    	?>
                        	<option value="<?php echo $datos['Mensualidad']?>"> <?php echo $datos['Mensualidad']?> </option>
                    	<?php
                        	}
                    	?> 
					 </select> 
				 </div>

			</div>
			<div class="form-row">

				<div class="col-md-6 mb-1 mx-auto">
					  <input class="botons form-control" type="submit" ame="ReC" value="Actulizar pago">
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