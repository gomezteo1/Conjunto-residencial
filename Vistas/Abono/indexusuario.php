<!DOCTYPE html>
<html lang="es">
<head>
	<title>Inicio Abonos</title>
</head>
<body>
	<div align="center">	
		<section class="full-width header-well">
			<div class="full-width header-well-icon">
				<i class="zmdi zmdi-store"></i>
			</div>
			<div align="left" class="full-width header-well-text">
				<p class="text-condensedLight">
					Tus Abonos
				</p>
			</div>
		</section>
		<div class=""></div>
		<div class="mdl-grid">
			<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
				<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
					<thead>
						<tr>
							<td><b>#Abono</b></td>
							<td><b>#Pago</b></td>
							<td><b>Nombre</b></td>
							<td><b>Fecha</b></td>
							<td><b>Deuda</b></td>
							<td><b>Abono</b></td>
							<td><b>Saldo</b></td>
							<td colspan="1" align="center" ><b>Acciones</b></td>
						</tr>
					</thead>
					<?php foreach ($abonos as $abono) { ?>
					<tbody>			
						<tr>
							<td><?php echo $abono->codigo_abono; ?></td>
							<td><?php echo $abono->nombrePago; ?></td>
							<td><?php echo $abono->nombreUsuario;?></td>
							<td><?php echo $abono->fecha;?></td>
							<td><?php echo $abono->deuda;?></td>
							<td><?php echo $abono->abono;?></td>
							<td><?php echo $abono->saldo;?></td>
							<td scope="col"><a class="btn btn-success" target="_blank" href="?controller=reportea&action=index&codigo_abono=<?php echo $abono->codigo_abono ?>">Ver</a> </th>
						</tr>
					</tbody>						
					<?php } ?>
					<tfoot>
						<tr>
							<td><b>#Abono</b></td>
							<td><b>#Pago</b></td>
							<td><b>Nombre</b></td>
							<td><b>Fecha</b></td>
							<td><b>Deuda</b></td>
							<td><b>Abono</b></td>
							<td><b>Saldo</b></td>
							<td colspan="1" align="center" ><b>Acciones</b></td>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>	
	</div>
</body>
</html>
