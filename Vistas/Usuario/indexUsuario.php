<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<title>Inicio Usuario</title>
	
	<!-- Esto es del toogle-->
	<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
	<script
	  src="https://code.jquery.com/jquery-3.4.1.js"
	  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
	  crossorigin="anonymous"></script>
	<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
</head>
<?php 
require_once('conexion.php');
 ?>
<body background="img/5.jpg">
	<div align="center">
		<section class="full-width header-well">
			<div class="full-width header-well-icon">
				<i class="zmdi zmdi-shopping-cart"></i>
			</div>
			<div align="left" class="full-width header-well-text">
				<p class="text-condensedLight">
					Datos Usuario
				</p>
			</div>
		</section>
		<div class=""></div>
		<div class="mdl-grid">
			<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
				<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
					<thead>
						<tr>
							<td><b>#Usuario</b></td>
							<td><b>Nombre</b></td>
							<td><b>Apellido</b></td>			
							<td><b>Tipo Documento</b></td>
							<td><b>Numero Documento</b></td>
							<!--<td><b>Rol</b></th>-->	
							<td><b>Telefono</b></td>
							<td><b>Fecha Nacimiento</b></td>
							<!--<td>Estado</td>-->			
								<!--<td>Clave</td>-->	
							<td><b>Correo</b></td>			
							<td><b>Correo recuperacion</b></td>	
							<td><b>Cambiar Clave</b></td>		
							<td colspan="1" align="center"><b>Acciones</b></td>
						</tr>	
					</thead>
					<?php foreach($usuarios as $usuario){ ?>
					<tbody>
						<tr>
							<td><?php echo $usuario->id_usuario; ?></td>
							<td><?php echo $usuario->nombres; ?></td>
							<td><?php echo $usuario->apellidos; ?></td>
							<td><?php echo $usuario->nombreTipoDocumento; ?></td>
							<td><?php echo $usuario->numero_documento; ?></td>
							<!--<td><?php //echo $usuario->id_rol; ?></td>-->
							<td><?php echo $usuario->telefono; ?></td>
							<td><?php echo $usuario->fecha_nacimiento; ?></td>
							<!--<td><?php //echo $usuario->estado; ?></th>-->
							<!--<td><?php //echo $usuario->clave; ?></th>
							-->
							<td><?php echo $usuario->correo; ?></td>
							<td><?php echo $usuario->correo_recuperacion; ?></td>
							<td> <a class="btn btn-primary" href="?controller=usuario&action=frm_cambiarClaveUsu&id_usuario=<?php echo $usuario->id_usuario ?>">Cambiar Clave</a></td>

							<td>
								<a href=
									"?controller=usuario&action=frm_modificar_usuario&id_usuario=<?php echo
										$usuario->id_usuario ?> " class="btn btn-secondary">Modificar
								</a>
							</td>
						</tr>
					</tbody>
					<?php }	?>
					<tfoot>
							<tr>
								<td><b>#Usuario</b></td>
								<td><b>Nombre</b></td>
								<td><b>Apellido</b></td>			
								<td><b>Tipo Documento</b></td>
								<td><b>Numero Documento</b></td>
								<!-- <td>Rol</td>	 -->
								<td><b>Telefono</b></td>
								<td><b>Fecha Nacimiento</b></td>
								<!-- <td>Estado</td>			 -->
								<td><b>Correo</b></td>
								<td><b>Correo recuperacion</b></td>
								<td><b>Cambiar Clave</b></td>			
							
								<td colspan="1" align="center"><b>Acciones</b></td>
							</tr>		
						</tfoot>
				</table>
			</div>
		</div>
	</div>
</body>

<!--este es del toogle-->
<!--este es del toogle-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</html>



