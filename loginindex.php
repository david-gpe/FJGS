<DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	

	<title></title>
	<?php include "scrip/scrp2.php"; ?> 
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
		<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
		  	<a class="navbar-brand" href="#"><img src="img/escudo.jpg" width="80" height="80" alt="">
		  	 Escuela Primaria Francisco Jose Gabilondo Soler
		  	</a>
		  		<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
		  			<div class="navbar-nav ml-auto text-center">
		  				<a class="nav-item nav-link active" href="index.php"><i class="fas fa-home"></i> <strong>Inicio</strong></a>
		  				<a class="nav-item nav-link" type="button" data-toggle="modal" data-target="#ModalMis"><i class="fas fa-flag"></i> <strong>Misión</strong></a>
		  				<a class="nav-item nav-link" type="button" data-toggle="modal" data-target="#ModalVis"><i class="fas fa-eye"></i> <strong>Visión</strong></a>
		  				<a class="nav-item nav-link" type="button" data-toggle="modal" data-target="#Loc"><i class="fas fa-map-marker-alt"></i> <strong>Localización</strong></a>
		  			</div>
		  		</div>
	</nav>

	<div class="modal fade" id="ModalMis" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      	<div class="modal-header  mx-auto">
		        	<h2 class="modal-title" id="exampleModalLongTitle" >Misión</h2>
		       	</div>
		      	<div class="modal-body">
		        	<h4 class="text-justify"><small>
		        		Ser una institución que ofrece educación básica, buscando una formación integral en los alumnos y alumnas, para hacerlos hábiles y competentes, incluyendo y respetando las necesidades educativas especiales,
		        		fortaleciendo nuestro proceso de enseñanza en la práctica de valores.</small>
		        	</h4>
		      	</div>
		      	<div class="modal-footer">
		        	<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
		       	</div>
		    </div>
		</div>
	</div>

	<div class="modal fade" id="ModalVis" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header  mx-auto">
				    <h2 class="modal-title" id="exampleModalLongTitle" >Visión</h2>
				</div>
				<div class="modal-body">
				    <h4 class="text-justify"><small>
				        Ser una escuela activa, abierta a la innovación y al cambio haciendo uso de habilidades tecnológicas y nuevas propuestas educativas, formadora de alumnos responsables, respetuosos, lideres analíticos y propositivos en la sociedad.</small>
				    </h4>
				</div>
				<div class="modal-footer">
				    <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="Loc" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content" style="width: 800px; height: 600px">
				<div class="modal-header  mx-auto">
					<h2 class="modal-title" id="exampleModalLongTitle" >Localización</h2>
				</div>
				<div class="modal-body" id="map">
			  	</div>
			  	<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
				</div>
			</div>
		</div>
	</div>
	
	<script >
		$(function(){
			var url = $(form).attr("action");
			$("form").submit(function(e)){
				e.preventDefault();
				alert(url);
			}
		});
	</script>
	<script>
		$('#Loc').on('shown.bs.modal', function () {
 			$('#myInput').trigger('focus')
				initMap();
			})
			var map;
			function initMap() {
				map= new google.maps.Map(document.getElementById('map'),{
					center: {lat: 19.307558, lng: -98.4766433},
					zoom: 17
				});
			}
	</script>		
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCThY_34-UtsQhOOa3LSwNp9Ou3xZsoL5Y"
  								type="text/javascript"></script>
	<style>
		.form-register{
			width: 400px;
			margin-top: 1;
      		}			      		
   	</style>

	<form class="form-register" id="formlogin"  action="bd/login.php" method="POST" >
		<div class="form-row">
			<div class="col-md-12 mb-3">
				<label for="id">Usuario:</label>
				<input class="form-control" type="text" name="us" id="us" placeholder="Ejemplo: User" required>
			</div>
			<div class="col-md-12 mb-3">
				<label for="name">Contraseña:</label>
				<input class="form-control" type="password" name="ps" id="ps" required>
			</div>
		</div>
		<div class="form-row">
			<div class="form-row ml-auto">
				<button type="submit" class="botonlg btn btn-primary" id="loginusuario">Iniciar Sesión</button>
			</div>
		</div>
		<div class="form-row">
			<div class="form-row ml-auto">
				<a class="form-row ml-auto" href="recuperacontraseña.php"> Olvide mi contraseña?</a>
			</div>
		</div>
	</form>

	<?php include "footer.php"; ?>


</body>

</html>
