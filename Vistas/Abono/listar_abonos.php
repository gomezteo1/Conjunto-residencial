
<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
		<thead>
			<tr>
				<td><b># Abono</b></td>
				<td><b>Monto a pagar</b></td>
				<td><b>Nombre</b></td>
				<td><b>Fecha</b></td>
				<td><b>Deuda</b></td>
				<td><b>Abono</b></td>
				<td><b>Saldo</b></td>
				<td colspan=3 align="center" ><b>Acciones</b></td>
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
				<td><a  class="btn btn-secondary" href="?controller=abono&action=formulario_modificar&codigo_abono=<?php echo $abono->codigo_abono ?>">Actualizar</a> </td>
				<!-- <td><a class="btn btn-danger" href="?controller=abono&action=eliminar_abono&codigo_abono=<?php echo $abono->codigo_abono ?>">Eliminar</a> </td> -->
				<td scope="col"><a class="btn btn-success" target="_blank" href="?controller=reportea&action=index&codigo_abono=<?php echo $abono->codigo_abono ?>">Ver</a> </td>
			</tr>
		</tbody>			
		<?php } ?>
		<tfoot>
			<tr>
				<td><b># Abono</b></td>
				<td><b>Monto a pagar</b></td>
				<td><b>Nombre</b></td>
				<td><b>Fecha</b></td>
				<td><b>Deuda</b></td>
				<td><b>Abono</b></td>
				<td><b>Saldo</b></td>
				<td colspan=3 align="center" ><b>Acciones</b></td>
			</tr>	
		</tfoot>
</table>
				