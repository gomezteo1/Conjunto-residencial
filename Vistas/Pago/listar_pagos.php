<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
	<thead>
		<tr>
			<td><b>#Pago</b></td>
			<td><b>Nombre</b></td>
			<td><b>#Cuenta Cobro</b></td>
			<td><b>Fecha</b></td>
			<td><b>Tipo Pago</b></td>
			<td><b>Monto Cancelado</b></td>
			<td><b>Monto a Pagar</b></td>
			<td colspan=4><b>Acciones</b></td>
		</tr>		
	</thead>
	<?php  
	foreach ($pagos as $pago) { ?>
	<tbody>
		<tr>
			<td><?php echo $pago->codigo_pago; ?></td>
			<td><?php echo $pago->nombreUsuario; ?></td>
			<td><?php echo $pago->codigo_cuenta_cobro;?></td>
			<td><?php echo $pago->fecha; ?></td>
			<td><?php echo $pago->nombreTipoPago;?></td>
			<td><?php echo $pago->monto_cancelado; ?></td>
			<td><?php echo $pago->monto_a_pagar;?></td>
			<td><a class="btn btn-secondary" href="?controller=pago&action=formulario_modificar&codigo_pago=<?php echo $pago->codigo_pago ?>">Actualizar</a></td>
			<!-- <td><a class="btn btn-danger"  href="?controller=pago&action=eliminar_pago&codigo_pago=<?php echo $pago->codigo_pago?>">Eliminar</a> </th> -->
			<td><a class="btn btn-success" target="_blank" href="?controller=reporte&action=index&codigo_pago=<?php echo $pago->codigo_pago ?>">Ver</a></td>
		</tr>
	</tbody>									
	<?php }	?>
	<tfoot>
		<tr>
			<td><b>#Pago</b></td>
			<td><b>Nombre</b></td>
			<td><b>#Cuenta Cobro</b></td>
			<td><b>Fecha</b></td>
			<td><b>Tipo Pago</b></td>
			<td><b>Monto Cancelado</b></td>
			<td><b>Monto a Pagar</b></td>
			<td colspan=4><b>Acciones</b></td>
		</tr>		
	</tfoot>
</table>