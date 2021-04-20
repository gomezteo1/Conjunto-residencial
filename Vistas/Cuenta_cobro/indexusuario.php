<!DOCTYPE html>
<html>
<head>
	
	<title>Inicio Cuenta Cobro</title>
</head>
<?php 
require_once('conexion.php');
 ?>
<body>
	<div align="center">
		<section class="full-width header-well">
			<div class="full-width header-well-icon">
				<i class="zmdi zmdi-shopping-cart"></i>
			</div>
			<div align="left" class="full-width header-well-text">
				<p class="text-condensedLight">
					Tus Cuentas de Cobro
				</p>
			</div>
		</section>
		<div class=""></div>
		<div class="mdl-grid">
			<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
					<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">		<thead>
						<tr>
							<td><b>Serial</b></td>
							<td><b>Numero Cuenta</b></td>
							<td><b>Nit</b></td>
							<td><b>Usuario</b></td>
							<td><b>Inmueble</b></td>
							<td><b>Mes</b></td>
							<td><b>Documento</b></td>
							<td><b>Fecha</b></td>
							<td><b>Mora</b></td>
							<td><b>Monto por pagar</b></td>
							
							<td><b>Estado</b></td>
							<td colspan="1" align="center"><b>Acciones</b></td>
						</tr>
					</thead>
					<?php foreach ($cuenta_cobros as $cuenta_cobro){?>
					<tbody>
						<tr>
							<td><?php echo $cuenta_cobro->codigo_cuenta_cobro; ?></td>
							<td><?php echo $cuenta_cobro->numero_cuenta; ?></td>
							<td><?php echo $cuenta_cobro->nit; ?></td>
							<td><?php echo $cuenta_cobro->nombreUsuario;?></td>
							<td><?php echo $cuenta_cobro->nombreInmueble; ?></td>
							<td><?php echo $cuenta_cobro->nombreMes; ?></td>
							<td><?php echo $cuenta_cobro->nombreDocumento; ?></td>
							<td><?php echo $cuenta_cobro->fecha; ?></td>
							<td><?php echo $cuenta_cobro->porMora; ?></td>
							<td><?php echo $cuenta_cobro->monto_por_cancelar; ?></td>
							<td><?php echo $cuenta_cobro->estado==1?'Pagado':'Sin Pagar'; ?></td>
							<td scope="col"><a class="btn btn-success" target="_blank" href="?controller=reportec&action=index&codigo_cuenta_cobro=<?php echo $cuenta_cobro->codigo_cuenta_cobro ?>">Ver</a> </th>
						</tr>
					</tbody>
					<?php } ?>
					<tfoot>
						<tr>
							<td><b>Serial</b></td>
							<td><b>Numero Cuenta</b></td>
							<td><b>Nit</b></td>
							<td><b>Usuario</b></td>
							<td><b>Inmueble</b></td>
							<td><b>Mes</b></td>
							<td><b>Documento</b></td>
							<td><b>Fecha</b></td>
							<td><b>Mora</b></td>
							<td><b>Monto por pagar</b></td>
							<td><b>Estado</b></td>
							<td colspan="1" align="center"><b>Acciones</b></td>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</body>
<script
	  src="https://code.jquery.com/jquery-3.4.1.js"
	  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
	  crossorigin="anonymous"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</html>


