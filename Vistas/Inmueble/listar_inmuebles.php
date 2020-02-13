<table border='1' class="table table-bordered">
	<tr  text-algin:center>
		<td><b># Inmueble </b></td>
		<td><b>Numero de matricula</b></td>
		<td><b>Tipo</b></td>
		<td><b>Torre</b></td>
        <td><b>Numero</b></td>
        <td><b>Metros</b></td>
        <td colspan=3 ><b>Acciones</b></td>
	

	</tr>
<?php
	foreach ($inmuebles as $inmueble) { ?>
		
			<tr>
				<td><?php echo $inmueble->codigo_inmueble; ?></td>
				<td><?php echo $inmueble->numero_matricula; ?></td>
				<td><?php echo $inmueble->tipo;?></td>
				<td><?php echo $inmueble->torre;?></td>
                <td><?php echo $inmueble->numero;?></td>
                <td><?php echo $inmueble->metros;?></td>
               	<td><a class="btn btn-secondary" href="?controller=inmueble&action=formulario_modificar&codigo_inmueble=<?php echo $inmueble->codigo_inmueble ?>">Actualizar</a> </td>

				<!-- <td><a class="btn btn-danger" href="?controller=inmueble&action=eliminar_inmueble&codigo_inmueble=<?php echo $inmueble->codigo_inmueble ?>">Eliminar</a> </td> -->
			</tr>		
	<?php } ?>
</table>

</div>