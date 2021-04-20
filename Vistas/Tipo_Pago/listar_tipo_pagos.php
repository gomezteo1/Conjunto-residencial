<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
	<thead>
		<tr>
			<td><b>Serial Tipo De Pago</b></td>
			<td><b>Tipo Pago</b></td>
			<td><b>Descripción</b></td>
			<td colspan=2 align="center"><b>Acciones</b></td>
		</tr>		
	</thead>
	<?php foreach ($tipo_pagos as $tipo_pago) { ?>
	<tbody>
		<tr>
			<td><?php echo $tipo_pago->codigo_tipo_pago; ?></td>
			<td><?php echo $tipo_pago->tipo_pago; ?></td>
			<td><?php echo $tipo_pago->descripcion;?></dh>
			<td><a href="?controller=tipo_pago&action=formulario_modificar&codigo_tipo_pago=<?php echo $tipo_pago->codigo_tipo_pago ?>" class="btn btn-secondary">Actualizar</a> </th>
		</tr>
	</tbody>
	<?php }	?>
	<tfoot>
		<tr>
			<td><b>Serial Tipo De Pago</b></td>
			<td><b>Tipo Pago</b></td>
			<td><b>Descripción</b></td>
			<td colspan=2 align="center"><b>Acciones</b></td>
		</tr>		
	</tfoot>
</table>