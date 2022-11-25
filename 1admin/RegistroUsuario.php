<?php include "../bd/cn.php";
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

 	<style>
		.form-register{
			width: 900px;
		}
	</style>

	<title></title>
</head>
<script type="text/javascript">
	function ConfirmarRegistro()
	{
		var respuesta =confirm("Continuar con el Registro");
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
		  			    	 <li class="nav-item dropdown">
		  			    		<a class="nav-item nav-link" href="ExpedienteUs.php" id="navbarDropdownMenuLink"><i class="fas fa-search"></i><strong>Historial</strong></a>
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

	<form class="form-register" action="../bd/registrar.php" method="POST">
		<div class="title" >
			<h4><i class="fas fa-user-plus"></i> Registro de Información</h4>
			<div class="form-row ">
				<div class="col-md-4 mb-3 mx-auto">
					<label for="tp">Cargo:</label>
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
			<div class="form-row">
				
				<div class="col-md-4 mb-3">
				 	<label for="name">Nombre(s):</label>
				 	<input class="form-control" type="text" name="nombre" id="name" required="true" placeholder="David" >
				</div>
				
				<div class="col-md-4 mb-3">
					<label for="apellidoPaterno">Apellido Paterno:</label>
				 	<input class="form-control" type="text" name="ap" id="apellidoPaterno" required="true" placeholder="Perez" >
				</div>
				
				<div class="col-md-4 mb-3">
					<label for="apellidoMaterno">Apellido Materno:</label>
				 	<input class="form-control" type="text" name="am" id="apellidoMaterno" required="true" placeholder="Perez" >
				</div>
				
				<div class="col-md-3 mb-3">
				  	<label for="apellidoMaterno">Fecha de Nacimiento:</label>
				 	<input class="form-control" type="date" name="fec" id="apellidoMaterno" required="true" placeholder="Perez" >
				</div>
				
				<div class="col-md-5 mb-3">
				 	<label for="curp">Curp:</label>
				 	<input class="form-control" type="text" style="text-transform: uppercase;" name="curp" id="curp" required="true" placeholder="GUMD970721HPLDLV" >
				</div>
				
				<div class="col-md-4 mb-3">
					<label for="rfc">RFC:</label>
				 	<input class="form-control" type="text" style="text-transform: uppercase;" name="rfc" id="rfc" required="true" placeholder="GUMD970721" >
				</div>

				<div class="col-md-2 mb-3">
				  	<label for="gen">Genero:</label>
				 		<select class="form-control" type="cmbox" name="gen" id="mdp" >
				 		 	<?php 
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
				 	<input class="form-control" type="email" name="email" id="Correo" required="true" placeholder="ejemplo@gmail.com" >
				</div>
				 
				<div class="col-md-3 mb-3">
				 	<label for="tis">Tipo Sangre:</label>
				 		<select class="form-control" type="cmbox" name="tis" id="tis" >
				 			<?php 
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
				 	<input class="form-control" type="tel" name="tel" id="tel" required="true" pattern="[1-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="248-131-4567" >
				</div>

				<div class="col-md-6 mb-3">
				 	<label for="cel">Celular:</label>
				 	<input class="form-control" type="tel" name="cel" id="cel" required="true" pattern="[1-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="248-131-4567" >
				</div>

				<div class="col-md-7 mb-3">
				 	<label for="nies">Nivel de Estudios:</label>
					 	<select class="form-control" type="cmbox" name="nies" id="nies" >
				 			<?php 
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
				 	<input class="form-control" type="teext" name="spr" id="spr" required="true" placeholder="14.50" >
				</div>
		  	</div>

		  	<div class="titledom">
					<h4><i class="fas fa-address-book"></i> Domicilio: </h4>
			</div>

		 	<div class="form-row">
			    <div class="col-md-3 mb-3">
			      	<label for="edo">Estado: </label>
			      	<input type="text" class="form-control" name="edo" id="edo" required="true" placeholder="Puebla" >
			    </div>

			    <div class="col-md-5 mb-3">
			      	<label for="mun">Municipio: </label>
			      	<input type="text" class="form-control" name="mun" id="mun" required="true" placeholder="San Salvador el Verde" >
			    </div>
			    
			    <div class="col-md-4 mb-3">
			      	<label for="loc">Localidad: </label>
			      	<input type="text" class="form-control" name="loc" id="loc" required="true" placeholder="San Lucas el Grande" >
			    </div>
			    
			    <div class="col-md-4 mb-3">
			      	<label for="loc">Calle: </label>
			      	<input type="text" class="form-control" name="cll" id="loc" required="true" placeholder="San Lucas el Grande" >
			    </div>

			    <div class="col-md-4 mb-3">
			      	<label for="col">Colonia: </label>
			      	<input type="text" class="form-control" name="col" id="col" required="true" placeholder="Ventanas" >
			    </div>

			    <div class="col-md-4 mb-3">
			      	<label for="cp">Codigo Postal: </label>
			      	<input type="text" class="form-control" name="cp" id="cp" required="true" placeholder="74136" >
			    </div>

		 	 </div>
		 	
			<div class="form-row">
				<div class="col-md-6 mb-3 mx-auto">
					  <input class="botons form-control" type="submit" value="Registrar">
				</div>
			</div>
	</form>

		<?php include "../footer.php"; ?>

</body>
</html>
<script type="text/javascript">

		$(document).ready(function(){
			
			$('#ConfirmarRegistro').click(function(){
				//alertify.confirm('Eliminar datos', '¿Seguro que deseas eliminar?', function(){ alertify.success('Ok') }
                //, function(){ alertify.error('Cancel')});
				alertify.alert("Registrando");
				//alertify.error("fallo el servidor :(");
				//alertify.success("este es un mensaje de exito ");
			});
		})
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
	</script>