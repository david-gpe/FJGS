<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
		<form class="form-register">
			<div class="title">
				<h4><i class="fas fa-user"></i> Gestión de Información</h4>
				<div class="form-row">
					<div class="col-md-5 mb-3 mx-auto" align="center">
					 	<label for="tipous">Tipo Usuario:</label>
					 	<input class="form-control" type="text" name="TipUsu" id="tipous" placeholder="Ejemplo: Docente" required>
					</div>
				</div>	
			</div>
			<div class="form-row">
				
				 <div class="col-md-4 mb-3">
				 	<label for="id">Identificador:</label>
				 	<input class="form-control" type="text" name="Id" id="id" placeholder="Ejemplo: 100015" required>
				 </div>

				 <div class="col-md-4 mb-3">
				 	<label for="name">Nombre(s):</label>
				 	<input class="form-control" type="text" name="Nombre" id="name" placeholder="Ejemplo: David" required>
				 </div>

				 <div class="col-md-4 mb-3">
				 	<label for="apellidoPaterno">Apellido Paterno:</label>
				 	<input class="form-control" type="text" name="Apellido Paterno" id="apellidoPaterno" placeholder="Ejemplo: Perez" required>
				 </div>

			</div>
			<input class="botons " type="submit" value="Registrar">

 	</form>

</body>
</html>