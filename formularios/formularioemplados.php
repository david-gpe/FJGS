<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<style>
		.form-register{
			width: 900px;
		}
	</style>
</head>
<body>
		<form class="form-register">
			<div class="title" >
				<h4><i class="fas fa-user-plus"></i> Registro de Usuario</h4>
				<div class="form-row ">
				 <div class="col-md-4 mb-3 mx-auto">
				 	<label for="tp">Tipo de Usuario:</label>
				 	<input class="form-control" type="text" name="Nombre" id="tp" placeholder="Ejemplo: Docente" required>
				 </div>
				 </div>

			</div>
			<div class="form-row">
				 <div class="col-md-4 mb-3">
				 	<label for="name">Nombre(s):</label>
				 	<input class="form-control" type="text" name="Nombre" id="name" placeholder="Ejemplo: David" required>
				 </div>

				 <div class="col-md-4 mb-3">
				 	<label for="apellidoPaterno">Apellido Paterno:</label>
				 	<input class="form-control" type="text" name="Apellido Paterno" id="apellidoPaterno" placeholder="Ejemplo: Perez" required>
				 </div>

				 <div class="col-md-4 mb-3">
				  	<label for="apellidoMaterno">Apellido Materno:</label>
				 	<input class="form-control" type="text" name="Apellido Paterno" id="apellidoMaterno" placeholder="Ejemplo: Perez" required>
				 </div>

				 <div class="col-md-5 mb-3">
				 	<label for="curp">Curp:</label>
				 	<input class="form-control" type="text" name="Apellido Paterno" id="curp" placeholder="Ejemplo: GUMD970721HPLDLV" required>
				 </div>

				 <div class="col-md-3 mb-3">
				 	<label for="rfc">RFC:</label>
				 	<input class="form-control" type="text" name="Apellido Paterno" id="rfc" placeholder="Ejemplo: GUMD970721" required>
				 </div>

				 <div class="col-md-4 mb-3">
				 	<label for="curp">Estado Civil:</label>
				 	<input class="form-control" type="text" name="Apellido Paterno" id="curp" placeholder="Ejemplo: Soltero" required>
				 </div>

				 <div class="col-md-5 mb-3">
				 	<label for="curp">Telefono:</label>
				 	<input class="form-control" type="text" name="Apellido Paterno" id="curp" placeholder="Ejemplo:(248)1314567" required>
				 </div>

				 <div class="col-md-7 mb-3">
				 	<label for="curp">Correo:</label>
				 	<input class="form-control" type="email" name="Email" id="Correo" placeholder="Ejemplo: ejemplo@gmail.com" required>
				 </div>
		  	</div>

		  	<div class="titledom">
					<h4><i class="fas fa-address-book"></i> Domicilio: </h4>
			</div>
		 	<div class="form-row">
			    <div class="col-md-3 mb-3">
			      <label for="edo">Estado: </label>
			      <input type="text" class="form-control" id="edo" placeholder="Ejemplo: Puebla" required>
			    </div>
			    <div class="col-md-5 mb-3">
			      <label for="mun">Municipio: </label>
			      <input type="text" class="form-control" id="mun" placeholder="Ejemplo: San Salvador el Verde" required>
			    </div>
			    <div class="col-md-4 mb-3">
			      <label for="loc">Localidad: </label>
			      <input type="text" class="form-control" id="loc" placeholder="Ejemplo: San Lucas el Grande" required>
			    </div>
			    <div class="col-md-3 mb-3">
			      <label for="col">Colonia: </label>
			      <input type="text" class="form-control" id="col" placeholder="Ejemplo: Ventanas" required>
			    </div>
			    <div class="col-md-3 mb-3">
			      <label for="ne">Num Exterior: </label>
			      <input type="text" class="form-control" id="ne" placeholder="Ejemplo: 10" required>
			    </div>
			    <div class="col-md-3 mb-3">
			      <label for="ni">Num Interior: </label>
			      <input type="text" class="form-control" id="ni" placeholder="Ejemplo: 10" required>
			    </div>
			    <div class="col-md-3 mb-3">
			      <label for="cp">Codigo Postal: </label>
			      <input type="text" class="form-control" id="cp" placeholder="Ejemplo: 74136" required>
			    </div>
		 	 </div>
		 	
		<div class="form-row">

				<div class="col-md-4 mb-3">
					  <input class="botons form-control" type="submit" value="Registro">
				</div>
				<div class="col-md-4 mb-3">
				 	<input class="botons" type="submit" value="Cancelar">
				</div>
				<div class="col-md-4 mb-3">
					  <input class="botons" type="submit" value="Registrar Asistencia">
				 </div>

 		</div>
		</form>

</body>
</html>