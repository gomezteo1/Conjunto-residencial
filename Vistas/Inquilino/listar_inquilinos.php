<table border='1'>
	<tr>
		<td>Documento</td>
		<td>Nombres</td>
		<td>Apellidos</td>
		<td>Telefono</td>
		<td colspan=3 >Acciones</td>
	</tr>
<?php
	foreach ($inquilinos as $inquilino) { ?>
		
			<tr>
				<td><?php echo $inquilino->documeto; ?></td>
				<td><?php echo $inquilino->nombres; ?></td>
				<td><?php echo $inquilino->apellidos;?></td>
				<td><?php echo $inquilino->telefono;?></td>

				<td><a href="?controller=inquilino&action=formulario_modificar&documeto=<?php echo $inquilino->documeto ?>">Actualizar</a> </td>
				<td><a href="?controller=inquilino&action=eliminar_inquilino&documeto=<?php echo $inquilino->documeto ?>">Eliminar</a> </td>
			</tr>		
	<?php } ?>
</table>
