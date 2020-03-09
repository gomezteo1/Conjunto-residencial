<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
	<thead>
		<tr>
			<td><b>#Inmueble</b></td>
			<td><b>Numero de matricula</b></td>
			<td><b>Tipo</b></td>
			<td><b>Torre</b></td>
			<td><b>Numero</b></td>
			<td><b>Metros</b></td>
			<td><b>Estado</b></td>
			<td colspan="1" align="center"><b>Acciones</b></b></td>
		</tr>		
	</thead>
	<?php foreach($inmuebles as $inmueble){ ?>
	<tbody>
		<tr>
			<td><?php echo $inmueble->codigo_inmueble; ?></td>
			<td><?php echo $inmueble->numero_matricula; ?></td>
			<td><?php echo $inmueble->tipo;?></td>
			<td><?php echo $inmueble->torre;?></td>
			<td><?php echo $inmueble->numero;?></td>
			<td><?php echo $inmueble->metros;?></td>
			<td><?php echo $inmueble->estado==1?'Activo':'Inactivo'; ?></td>
			<td><a class="btn btn-secondary" href="?controller=inmueble&action=formulario_modificar&codigo_inmueble=<?php echo $inmueble->codigo_inmueble ?>">Actualizar</a> </td>
			<td>
				<input <?php echo $inmueble->estado==1 ? "checked" : "" ?> onchange="prueba_i(this)" type="checkbox" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" name="status" id="<?php echo $inmueble->codigo_inmueble ?>">
			</td>
			
			<?php //Validacion del estado
			 if($inmueble->estado==0){?> 
			<td><a class="btn btn-success" href="?controller=inmueble&action=desactivar_estado_inmueble&codigo_inmueble=<?php echo $inmueble->codigo_inmueble ?>">Activar</a> </td>
			<?php } else { ?> <td><a class="btn btn-danger" href="?controller=inmueble&action=activar_estado_inmueble&codigo_inmueble=<?php echo $inmueble->codigo_inmueble ?>">Desactivar</a> </td>
 			<?php } ?> 	
			
		</tr>		
	</tbody>
	<?php }	?>
	<tfoot>
		<tr>
			<td><b>#Inmueble</b></td>
			<td><b>Numero de matricula</b></td>
			<td><b>Tipo</b></td>
			<td><b>Torre</b></td>
			<td><b>Numero</b></td>
			<td><b>Metros</b></td>
			<td><b>Estado</b></td>
			<td colspan="1" align="center"><b>Acciones</b></b></td>
		</tr>		
	</tfoot>
</table>