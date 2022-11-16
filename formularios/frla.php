<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<style>
		.form-register{
			width: 400px;
		}
	</style>
</head>
<body>
		<form class="form-register">
			<div class="title">
				<h4><i class="fas fa-concierge-bell"></i> Registro de Asistencia</h4>
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
				 	<label for="fecha">Fecha:</label>
				 	<input class="form-control" type="date" name="Nombre" id="fecha" placeholder="Ejemplo: 2020/06/03" required>
				 </div>

				 <div class="col-md-12 mb-3">
				 	<label for="raz">Razón:</label>
				 	<input class="form-control" type="text" name="Hora Entrada" id="raz" placeholder="Ejemplo: Llego tarde" required>
				 </div>
			</div>
			<div class="form-row">

				<div class="col-md-12">
					  <input class="botons form-control" type="submit" value="Registrar Llamada de Atención">
				</div>
				<div class="col-md-12">
				 	<input class="botons" type="submit" value="Cancelar">
				</div>
			</div>

 	</form>

</body>
</html>