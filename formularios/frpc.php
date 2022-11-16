<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
		</style>
</head>
<body>
		<form class="form-register">
			<div class="title">
				<h4><i class="fas fa-user-graduate"></i> Información del Alumno</h4>
				<div class="form-row">
					<div class="col-md-12 mb-3" >
					 	<label for="idalum">Identificador del Alumno:</label>
					 	<input class="form-control" type="text" name="IdAlumno" id="idalum" placeholder="Ejemplo: 100024" required>
					</div>
				</div>	
			</div>
			<div class="form-row">
				
				 <div class="col-md-12 mb-3">
				 	<label for="mnt">Monto:</label>
				 	<input class="form-control" type="text" name="Monto" id="mnt" placeholder="Ejemplo: 100015" required>
				 </div>

				 <div class="col-md-12 mb-3">
				 	<label for="fdp">Fecha de Pago:</label>
				 	<input class="form-control" type="date" name="Fecha" id="fdp" placeholder="Ejemplo: David" required>
				 </div>

				 <div class="col-md-12 mb-3">
				 	<label for="mdp">Mes de Pago:</label>
				 	<select class="form-control" type="cmbox" name="mdp" id="mdp" required>
				 		<option class="form-control">Septiembre</option>
				 		<option>Octubre</option>
				 		<option>Noviembre</option>
				 		<option>Diciembre</option>
				 		<option>Febrero</option>
				 		<option>Marzo</option>
				 		<option>Abril</option>
				 		<option>Mayo</option>
				 		<option>Junio</option>
				 	</select> 
				 </div>

			</div>
			<div class="form-row">

				<div class="col-md-6 mb-1">
					  <input class="botons form-control" type="submit" value="Registrar pago">
				</div>
				<div class="col-md-6 mb-1">
				 	<input class="botons" type="submit" value="Cancelar">
				</div>
				<div class="col-md-12 mb-1">
					  <input class="botons" type="submit" value="Historial de Colegiaatura">
				 </div>

 			</div>

 	</form>

</body>
</html>