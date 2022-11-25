<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	 <?php
		$not = mysqli_query($conexion,"SELECT * FROM Notificaciones WHERE 
							Matricula ='$m' AND Estado = 0 AND Fecha < '$fecha_actual'");
		$cuantas = mysqli_num_rows($not);
	?>

	<li class="nav-item dropdown" id="notimedu">
		<a class="nav-item nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-envelope-open"></i></a>
			<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="background: #24303c">
				<div>
				<ul id="cont" style="color: white" class="dropdown-item">Tienes <?php echo $cuantas; ?> notificaciones nuevas
				</ul>
					<li>
						
						<ul>
							<?php
							    while ($no = mysqli_fetch_array($not)) {
							?>
							<ul>
								<a style="color: white;"><i class="fa fa-users"></i><?php echo $no['Matricula'] ?> <?php echo $no['Causa']; ?> el dia <?php echo $no['Fecha'];?>
							    </a>
							</ul>
							<?php
							}
							?>
						</ul>
						
					</li>
				<input class="botons form-control btn-primary" type="submit" id="modificarnotificacion" value="Marcar como leidas">
				</div>
			</ul>
	</li>

</body>
</html>