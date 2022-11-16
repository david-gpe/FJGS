<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<style>
		.form-register{
			width: 400px;
		}
	</style>
	<title></title>
</head>
<body>
		<form class="form-register">
			<div class="title">
				<h4><i class="fas fa-history"></i> Expediente de Usuario</h4>
			</div>
			<div class="form-row">
				 <div class="col-md-12 mb-3">
				 	<label for="id">Identificador:</label>
				 	<input class="form-control" type="text" name="Id" id="id" placeholder="Ejemplo: 100015" required>
				 </div>

				 <div class="col-md-12 mb-3">
				 	<label for="name">Nombre(s):</label>
				 	<input class="form-control" type="text" name="Nombre" id="name" placeholder="Ejemplo: David" required>
				 </div>

				 <div class="col-md-12 mb-3">
				 	<label for="apellidoPaterno">Apellido Paterno:</label>
				 	<input class="form-control" type="text" name="Apellido Paterno" id="apellidoPaterno" placeholder="Ejemplo: Perez" required>
				 </div>

				 <div class="col-md-12 mb-3">
				  	<label for="apellidoMaterno">Apellido Materno:</label>
				 	<input class="form-control" type="text" name="Apellido Paterno" id="apellidoMaterno" placeholder="Ejemplo: Perez" required>
				 </div>
	
			</div>
			<input class="botons " type="submit" value="Buscar">

 	</form>

</body>
</html>