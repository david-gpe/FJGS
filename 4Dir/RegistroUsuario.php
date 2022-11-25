<?php include "../bd/cn.php";

	$query= mysqli_query($conexion,$llamT);
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
		include "../bd/sesion.php"; 
		?> 

 <style>
		.form-register{
			width: 900px;
		}
	</style>

	<title></title>
</head>
<body>
		
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
		 	<span class="navbar-toggler-icon"></span></button>
		 		<a class="navbar-brand" href="#">
		 			<img src="../img/escudo.jpg" width="80" height="80" alt="">Escuela Primaria Francisco Jose Gabilondo Soler
		 		</a>
		  	<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
		  		<div class="navbar-nav ml-auto text-center">
		  			<ul class="navbar-nav">
		  				
		  				<li class="nav-item active dropdown">
		  					<a class="nav-item nav-link active" href="indexdir.php" id="navbarDropdownMenuLink"><i class="fas fa-home"></i> <strong>Inicio</strong></a>
			  			</li>

		  			    <li class="nav-item active dropdown">
		  					<a class="nav-item nav-link active dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-briefcase"></i> <strong>Areas</strong></a>
			  					 <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							          <a class="dropdown-item" href="">Control Escolar</a>
							          <a class="dropdown-item" href="">Administrativo</a>
							          <a class="dropdown-item" href="">Finanzas</a>
							      </div>
		  				</li>

		  			    <li class="nav-item">
		  			    	<a class="nav-item nav-link" href="#"><i class="fas fa-envelope-open"></i></a>
		  			    </li>

		  			    <li class="nav-item dropdown">
		  			    	<a class="nav-item nav-link active dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><strong>Bienvenido:  <?php echo $_SESSION['tpUs']?> <?php echo $_SESSION['usuario'] ?> </strong></a>
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
				<h4><i class="fas fa-user-plus"></i> Registro de Usuario</h4>
				<div class="form-row ">
				 <div class="col-md-4 mb-3 mx-auto">
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
			<div class="form-row">
				 <div class="col-md-4 mb-3">
				 	<label for="name">Nombre(s):</label>
				 	<input class="form-control" type="text" name="nombre" id="name" placeholder="Ejemplo: David" >
				 </div>

				 <div class="col-md-4 mb-3">
				 	<label for="apellidoPaterno">Apellido Paterno:</label>
				 	<input class="form-control" type="text" name="ap" id="apellidoPaterno" placeholder="Ejemplo: Perez" >
				 </div>

				 <div class="col-md-4 mb-3">
				  	<label for="apellidoMaterno">Apellido Materno:</label>
				 	<input class="form-control" type="text" name="am" id="apellidoMaterno" placeholder="Ejemplo: Perez" >
				 </div>

				 <div class="col-md-3 mb-3">
				  	<label for="apellidoMaterno">Fecha de Nacimiento:</label>
				 	<input class="form-control" type="date" name="fec" id="apellidoMaterno" placeholder="Ejemplo: Perez" >
				 </div>

				 <div class="col-md-5 mb-3">
				 	<label for="curp">Curp:</label>
				 	<input class="form-control" type="text" name="curp" id="curp" placeholder="Ejemplo: GUMD970721HPLDLV" >
				 </div>

				 <div class="col-md-4 mb-3">
				 	<label for="rfc">RFC:</label>
				 	<input class="form-control" type="text" name="rfc" id="rfc" placeholder="Ejemplo: GUMD970721" >
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
				 	<input class="form-control" type="email" name="email" id="Correo" placeholder="Ejemplo: ejemplo@gmail.com" >
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
				 	<input class="form-control" type="text" name="tel" id="tel" placeholder="Ejemplo:(248)1314567" >
				 </div>

				 <div class="col-md-6 mb-3">
				 	<label for="cel">Celular:</label>
				 	<input class="form-control" type="text" name="cel" id="cel" placeholder="Ejemplo:(248)1314567" >
				 </div>

				 <div class="col-md-6 mb-3 mx-auto"> nies
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


				 
		  	</div>

		  	<div class="titledom">
					<h4><i class="fas fa-address-book"></i> Domicilio: </h4>
			</div>
		 	<div class="form-row">
			    <div class="col-md-3 mb-3">
			      <label for="edo">Estado: </label>
			      <input type="text" class="form-control" name="edo" id="edo" placeholder="Ejemplo: Puebla" >
			    </div>
			    <div class="col-md-5 mb-3">
			      <label for="mun">Municipio: </label>
			      <input type="text" class="form-control" name="mun" id="mun" placeholder="Ejemplo: San Salvador el Verde" >
			    </div>
			    <div class="col-md-4 mb-3">
			      <label for="loc">Localidad: </label>
			      <input type="text" class="form-control" name="loc" id="loc" placeholder="Ejemplo: San Lucas el Grande" >
			    </div>
			     <div class="col-md-4 mb-3">
			      <label for="loc">Calle: </label>
			      <input type="text" class="form-control" name="cll" id="loc" placeholder="Ejemplo: San Lucas el Grande" >
			    </div>
			    <div class="col-md-4 mb-3">
			      <label for="col">Colonia: </label>
			      <input type="text" class="form-control" name="col" id="col" placeholder="Ejemplo: Ventanas" >
			    </div>
			    <div class="col-md-4 mb-3">
			      <label for="cp">Codigo Postal: </label>
			      <input type="text" class="form-control" name="cp" id="cp" placeholder="Ejemplo: 74136" >
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