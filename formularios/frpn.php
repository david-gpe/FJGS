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
				<h4><i class="fas fa-coins"></i> Pago de Nomina</h4>
				<div class="form-row">
					<div class="col-md-12 mb-3" >
					 	<label for="idalum">Identificador del Alumno:</label>
					 	<input class="form-control" type="text" name="IdAlumno" id="idalum" placeholder="Ejemplo: 100024" required>
				 	</select> 

					</div>
				</div>	
			</div>
			<div class="form-row">
				
				 <div class="col-md-12 mb-3">
				 	<label for="mnt">Monto:</label>
				 	<input class="form-control" type="text" name="Monto" id="mnt" placeholder="Ejemplo: 100015" required>
				 </div>

				 <div class="col-md-12 mb-3">
				 	<label for="mnt">Tipo Usuario:</label>
				 	<select class="form-control" type="cmbox" name="mdp" id="mdp" required>
				 		<option class="form-control">Docente</option>
				 		<option>Administrador</option>
				 	</select> 
				 </div>

				 <div class="col-md-12 mb-3">
				 	<label for="fdp">Fecha de Pago:</label>
				 	<input class="form-control" type="date" name="Fecha" id="fdp" placeholder="Ejemplo: David" required>
				 </div>
			</div>
			<div class="form-row">

				<div class="col-md-6 mb-1">
					  <input class="botons form-control" type="submit" value="Registrar">
				</div>
				<div class="col-md-6 mb-1">
				 	<input class="botons" type="submit" value="Cancelar">
				</div>
				<div class="col-md-12 mb-1">
					  <input class="botons" type="submit" value="Historial">
				 </div>
				
 			</div>

 	</form>

</body>
</html>