<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
	<thead>
		<tr>
			<td><b>Serial Rol</b></td>
			<td><b>Rol</b></td>
		</tr>		
	</thead>
	<?php foreach ($roles as $rol) { ?>
	<tbody>
		<tr>
			<td><?php echo $rol->id_rol; ?> </td>
			<td><?php echo $rol->rol; ?> </td>
			<td><a class="btn btn-secondary" href="?controller=rol&action=formulario_modificar&id_rol=<?php echo $rol->id_rol ?>">Actualizar</a> </td>
			<!-- <td><a class="btn btn-danger" href="?controller=rol&action=eliminar_rol&id_rol=<?php echo $rol->id_rol ?>">Eliminar</a> </th> -->
		</tr>		
	</tbody>
	<?php }	?>
	<tfoot>
		<tr>
			<td><b>Serial Rol</b></td>
			<td><b>Rol</b></td>
		</tr>		
	</tfoot>
</table>