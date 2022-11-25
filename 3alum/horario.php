<?php include "../bd/cn.php";

	$query= mysqli_query($conexion,$llamT);
	$queryg= mysqli_query($conexion,$llamg);
	$queryts= mysqli_query($conexion,$llamts);
	$queryns= mysqli_query($conexion,$llamns);
	$querynse= mysqli_query($conexion,$llamnse);
	 
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
		<meta charset="utf-8">
		<?php include "../scrip/scrp.php"; 
		include "../bd/sesion.php"; 
		?> 
  <style>
		.form-register{
			width: 600px;
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
		  				
		  			    <li class="nav-item">
		  			    	<a class="nav-item nav-link" href="indexalum"><i class="fas fa-home"></i><strong>Inicio</strong></a>
		  			    </li>
		  			    <li class="nav-item">
		  			    	<a class="nav-item nav-link" href="calificaciones.php"><i class="fas fa-bookmark"></i><strong>Calificaciones</strong></a>
		  			    </li>
		  			    <li class="nav-item">
		  			    	<a class="nav-item nav-link" href="kardex.php"><strong>Kardex</strong></a>
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
				<h4><i class="fas fa-clock"></i> Horario</h4>
				
			</div>	
			<div class="form-row ">
				 <div class="col-md-6 mb-3"> nies
				 	<label for="nies">Nivel de Estudios:</label>
				 	<select class="form-control" type="cmbox" name="nies" id="nies" >
				 		 <?php 
                      	  while($datosnse = mysqli_fetch_array($querynse)){
                    		?>
                            <option value="<?php echo $datosnse['NivEst']?>"> <?php echo $datosnse['NivEst']?> </option>
                    <?php
                        }
                    ?> 
				 	</select>
				 </div>	

				 <div class="col-md-6 mb-3">
					 	<label for="tp">Grado:</label>
					 	<select class="form-control" type="cmbox" name="selTU" id="mdp" >
					 		 <?php 
	                      	  while($datos = mysqli_fetch_array($query)){
	                    		?>
	                            <option value="<?php echo $datos['tipoUsuario']?>"> <?php echo $datos['tipoUsuario']?> 
	                        	</option>
	                    <?php
	                        }
	                    ?> 
					 	</select>
				</div>
<!--				<div class="col-md-4 mb-3">
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

				 <div class="col-md-4 mb-3">
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
-->
			</div>
				 
			<div class="form-row">

					<div class="col-md-6 mb-3 mx-auto">
						  <input class="botons form-control" type="submit" value="Buscar">
					</div>
			</div>
		</form>						

						<?php include "../footer.php"; ?>

</body>
</html>