<!DOCTYPE html>
<html>
<head>
	<title>Inicio Usuario Inmueble</title>
</head>
<?php 
//require_once('conexion.php');
 ?>
<body>
	<div align="center">
		<section class="full-width header-well">
			<div class="full-width header-well-icon">
				<i class="zmdi zmdi-shopping-cart"></i>
			</div>
			<div align="left" class="full-width header-well-text">
				<p class="text-condensedLight">
					Mis Inmuebles 
				</p>
			</div>
		</section>
		<div class=""></div>
		<div class="mdl-grid">
			<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--6-col-tablet mdl-cell--6-col-desktop">
				<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
					<thead>
						<tr>
							<td><b>Serial Usuario Inmueble</b></td>
							<td><b>Usuario</b></td>
							<td><b>Inmueble</b>	</td>
							<!--<td colspan=4>Acciones</td>-->
						</tr>		
					</thead>
					<?php  
					foreach ($usuario_inmuebles as $usuario_inmueble) { ?>
					<tbody>
						<tr>
							<td><?php echo $usuario_inmueble->id_usuario_inmueble; ?></td>
							<td><?php echo $usuario_inmueble->nombreUsuario; ?></td>
							<td><?php echo $usuario_inmueble->nombreInmueble;?></td>
							<!--<td><a class="btn btn-secondary" href="?controller=usuario_inmueble&action=formulario_modificar&id_usuario_inmueble=<?php echo $usuario_inmueble->id_usuario_inmueble ?>">A</a> </th>
							<td><a class="btn btn-danger"  href="?controller=usuario_inmueble&action=eliminar_usuario_inmueble&id_usuario_inmueble=<?php echo $usuario_inmueble->id_usuario_inmueble?>">E</a> </th>-->
							<!--<td><a class="btn btn-success" target="_blank" href="?controller=reporte&action=index&codigo_pago=<?php echo $usuario_inmueble->id_usuario_inmueble ?>">Ver</a> </th>-->	
						</tr>
					</tbody>									
					<?php }	?>
					<tfoot>
							<tr>
								<td><b>Serial Usuario Inmueble</b></td>
								<td><b>Usuario</b></td>
								<td><b>Inmueble</b></td>
							
							</tr>		
						</tfoot>
				</table>
			</div>
		</div>
		
	</div>
</body>
</html>


