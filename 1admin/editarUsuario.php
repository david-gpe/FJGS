<?php include "../bd/cn.php";


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
          		$idgenero = $data['IdGenero'];
          		$genero = $data['Genero'];
          		$correo = $data['Correo'];
          		$idtipoSangre = $data['IdTipoSangre'];
          		$tipoSangre = $data['TipoSangre'];
          		$telefono = $data['Telefono'];
          		$celular = $data['Celular'];
          		$idnivEst = $data['IdNivEst'];
          		$nivEst = $data['NivEst'];
          		$entidad = $data['Entidad'];
          		$municipio = $data['Municipio'];
          		$localidad = $data['Localidad'];
          		$domicilio = $data['Domicilio'];
          		$colonia = $data['Colonia'];
          		$cp = $data['CP'];
          		$idtipoUsuario = $data['IdTipoUsuario'];
          		$tipoUsuario = $data['tipoUsuario'];
          		$spr = $data['Spr'];

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


          		if ($idgenero == 1) {
                    $optiongene = '<option value="'.$idgenero.'">'.$genero.' </option>';
          		}else if($idgenero == 2){
                    $optiongene = '<option value="'.$idgenero.'">'.$genero.' </option>';
          		}

          		if ($idtipoSangre == 1) {
                    $optiontiposangre = '<option value="'.$idtipoSangre.'">'.$tipoSangre.' </option>';
          		}else if($idtipoSangre == 2){
                    $optiontiposangre = '<option value="'.$idtipoSangre.'">'.$tipoSangre.' </option>';
          		}else if($idtipoSangre == 3){
                    $optiontiposangre = '<option value="'.$idtipoSangre.'">'.$tipoSangre.' </option>';
          		}else if($idtipoSangre == 4){
                    $optiontiposangre = '<option value="'.$idtipoSangre.'">'.$tipoSangre.' </option>';
          		}else if($idtipoSangre == 5){
                    $optiontiposangre = '<option value="'.$idtipoSangre.'">'.$tipoSangre.' </option>';
          		}else if($idtipoSangre == 6){
                    $optiontiposangre = '<option value="'.$idtipoSangre.'">'.$tipoSangre.' </option>';
          		}else if($idtipoSangre == 7){
                    $optiontiposangre = '<option value="'.$idtipoSangre.'">'.$tipoSangre.' </option>';
          		}else if($idtipoSangre == 8){
                    $optiontiposangre = '<option value="'.$idtipoSangre.'">'.$tipoSangre.' </option>';
          		}

          		if ($idnivEst == 1) {
                    $optionnivel = '<option value="'.$idnivEst.'">'.$nivEst.' </option>';
          		}else if($idnivEst == 2){
                    $optionnivel = '<option value="'.$idnivEst.'">'.$nivEst.' </option>';
          		}else if($idnivEst == 3){
                    $optionnivel = '<option value="'.$idnivEst.'">'.$nivEst.' </option>';
          		}else if($idnivEst == 4){
                    $optionnivel = '<option value="'.$idnivEst.'">'.$nivEst.' </option>';
          		}else if($idnivEst == 5){
                    $optionnivel = '<option value="'.$idnivEst.'">'.$nivEst.' </option>';
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
		<script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>

	<title></title>
</head>
<script type="text/javascript">
	function ConfirmarEdicion()
	{
		var respuesta =confirm("Actualización en proceso");
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
		  			    	<input type="hidden" id="matri" value="<?php echo $m?>">

		  			    <?php include "../menunoti.php"; ?>
		  			    
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

	<form class="form-register" action="../bd/editar.php" method="POST">
		<div class="title" >
			<h4><i class="fas fa-user"></i> Actualización de Usuario</h4>
			<div class="form-row ">
				<div class="col-md-4 mb-3 mx-auto">
					<input type="hidden" name="matriculausurio" value="<?php echo $matri?>">
					<label for="tp">Tipo de Usuario:</label>
					<input type="hidden" name="optiontiusuario" value="<?php echo $idtipoUsuario?>">
					<select class="form-control notItemOne" type="cmbox" name="selTU" id="mdp" >
						<?php 
							echo $optiontiusuario;
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
			<div class="form-row">
				
				<div class="col-md-4 mb-3">
				 	<label for="name">Nombre(s):</label>
				 	<input class="form-control" type="text" name="nombre" id="name" value="<?php echo $nombre?>" placeholder="David" >
				</div>
				
				<div class="col-md-4 mb-3">
					<label for="apellidoPaterno">Apellido Paterno:</label>
				 	<input class="form-control" type="text" name="ap" id="apellidoPaterno" value="<?php echo $apellidoPaterno?>" placeholder="Perez" >
				</div>
				
				<div class="col-md-4 mb-3">
					<label for="apellidoMaterno">Apellido Materno:</label>
				 	<input class="form-control" type="text" name="am" id="apellidoMaterno" value="<?php echo $apellidoMaterno?>" placeholder="Perez" >
				</div>
				
				<div class="col-md-3 mb-3">
				  	<label for="apellidoMaterno">Fecha de Nacimiento:</label>
				 	<input class="form-control" type="date" name="fec" id="apellidoMaterno" value="<?php echo $fechaNacimiento?>">
				</div>
				
				<div class="col-md-5 mb-3">
				 	<label for="curp">Curp:</label>
				 	<input class="form-control" type="text" style="text-transform: uppercase;" name="curp" id="curp" value="<?php echo $curp?>" placeholder="GUMD970721HPLDLV" >
				</div>
				
				<div class="col-md-4 mb-3">
					<label for="rfc">RFC:</label>
				 	<input class="form-control" type="text" style="text-transform: uppercase;" name="rfc" id="rfc" value="<?php echo $rfc?>" placeholder="GUMD970721" >
				</div>

				<div class="col-md-2 mb-3">
				  	<label for="gen">Genero:</label>
					<input type="hidden" name="optiongene" value="<?php echo $idgenero?>">
				  		<select class="form-control notItemOne" type="cmbox" name="gen" id="mdp" >
				 		 	<?php 
				 		 		echo $optiongene;
                      	  		while($datosg = mysqli_fetch_array($queryg)){
                    		?>
                            	<option value="<?php echo $datosg['Genero']?>"> <?php echo $datosg['Genero']?> </option>
                    		<?php
                        		}
                    		?> 
				 		</select>
				 </div>

				<div class="col-md-7 mb-3">
				 	<label for="Correo">Correo:</label>
				 	<input class="form-control" type="email" name="email" id="Correo" value="<?php echo $correo?>" placeholder="ejemplo@gmail.com" >
				</div>
				 
				<div class="col-md-3 mb-3">
				 	<label for="tis">Tipo Sangre:</label>
					<input type="hidden" name="optiontiposangre" value="<?php echo $idtipoSangre?>">
				 		<select class="form-control notItemOne" type="cmbox" name="tis" id="tis" >
				 			<?php 
				 				echo $optiontiposangre;
                      	  		while($datosts = mysqli_fetch_array($queryts)){
                    		?>
                            	<option value="<?php echo $datosts['TipoSangre']?>"> <?php echo $datosts['TipoSangre']?> </option>
                    		<?php
                        		}
                    		?> 
				 		</select>
				</div>

				<div class="col-md-6 mb-3">
				 	<label for="tel">Telefono:</label>
				 	<input class="form-control" type="text" name="tel" id="tel" pattern="[1-9]{3}-[0-9]{3}-[0-9]{4}" value="<?php echo $telefono?>" placeholder="248-131-4567" >
				</div>

				<div class="col-md-6 mb-3">
				 	<label for="cel">Celular:</label>
				 	<input class="form-control" type="text" name="cel" id="cel" pattern="[1-9]{3}-[0-9]{3}-[0-9]{4}" value="<?php echo $celular?>" placeholder="248-131-4567" >
				</div>

				<div class="col-md-7 mb-3">
				 	<label for="nies">Nivel de Estudios:</label>
					<input type="hidden" name="optionnivel" value="<?php echo $idnivEst?>">
					 	<select class="form-control notItemOne" type="cmbox" name="nies" id="nies" >
				 			<?php 
				 				echo $optionnivel;
                      	  		while($datosns = mysqli_fetch_array($queryns)){
                    		?>
                            	<option value="<?php echo $datosns['NivEst']?>"> <?php echo $datosns['NivEst']?> </option>
                    		<?php
                        		}
                    		?> 
				 		</select>
				</div>
				<div class="col-md-5 mb-3">
				 	<label for="spr">Salario por hora:</label>
				 	<input class="form-control" type="teext" name="spr" id="spr" required="true" placeholder="14.50" value="<?php echo $spr?>">
				</div>
		  	</div>

		  	<div class="titledom">
					<h4><i class="fas fa-address-book"></i> Domicilio: </h4>
			</div>

		 	<div class="form-row">
			    <div class="col-md-3 mb-3">
			      	<label for="edo">Estado: </label>
			      	<input type="text" class="form-control" name="edo" id="edo" value="<?php echo $entidad?>" placeholder="Puebla" >
			    </div>

			    <div class="col-md-5 mb-3">
			      	<label for="mun">Municipio: </label>
			      	<input type="text" class="form-control" name="mun" id="mun" value="<?php echo $municipio?>" placeholder="San Salvador el Verde" >
			    </div>
			    
			    <div class="col-md-4 mb-3">
			      	<label for="loc">Localidad: </label>
			      	<input type="text" class="form-control" name="loc" id="loc" value="<?php echo $localidad?>" placeholder="San Lucas el Grande" >
			    </div>
			    
			    <div class="col-md-4 mb-3">
			      	<label for="loc">Calle: </label>
			      	<input type="text" class="form-control" name="cll" id="loc" value="<?php echo $domicilio?>" placeholder="San Lucas el Grande" >
			    </div>

			    <div class="col-md-4 mb-3">
			      	<label for="col">Colonia: </label>
			      	<input type="text" class="form-control" name="col" id="col" value="<?php echo $colonia?>" placeholder="Ventanas" >
			    </div>

			    <div class="col-md-4 mb-3">
			      	<label for="cp">Codigo Postal: </label>
			      	<input type="text" class="form-control" name="cp" id="cp" value="<?php echo $cp?>" placeholder="74136" >
			    </div>

		 	 </div>
		 	
			<div class="form-row">
				<div class="col-md-6 mb-3 mx-auto">
					  <input class="botons form-control" type="submit" onclick="return ConfirmarEdicion()" value="Actualizar">
				</div>
				<div class="col-md-6 mb-3 mx-auto">
					  <div align='center'><a class="botons form-control" type="submit" href="GestionUsuario.php" value="Cancelar">Cancelar</a></div>
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