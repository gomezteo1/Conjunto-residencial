<!DOCTYPE html>
<html>
<head>
	<title>Inicio Usuario</title>
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
							<td><b>Serial Usuario</b></td>
							<td><b>Nombre</b></td>
							<td><b>Apellido</b></td>			
							<td><b>Tipo Documento</b></td>
							<td><b>Numero Documento</b></td>
							<td><b>Telefono</b></td>
							<td><b>Fecha Nacimiento</b></td>
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
							<td><?php echo $usuario->telefono; ?></td>
							<td><?php echo $usuario->fecha_nacimiento; ?></td>
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
								<td><b>Serial Usuario</b></td>
								<td><b>Nombre</b></td>
								<td><b>Apellido</b></td>			
								<td><b>Tipo Documento</b></td>
								<td><b>Numero Documento</b></td>
								<td><b>Telefono</b></td>
								<td><b>Fecha Nacimiento</b></td>
								<td><b>Correo</b></td>
								<td><b>Correo recuperacion</b></td>
								<td><b>Cambiar Clave</b></td>			
								<td colspan="1" align="center"><b>Acciones</b></td>
							</tr>		
						</tfoot>
				</table>
			</div>
		</div>
		<button data-toggle="modal" 
				style="
					position: relative;
  					left: 450px;
					 border: 1px solid #E1E1E1;
					 border-radius: 100%;"
				data-target="#exampleModalup ">
					<img src="image/info.png"  >
		</button>	
	</div>
</body>



</html>



