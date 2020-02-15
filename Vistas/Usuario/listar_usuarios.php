<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
	<thead>
		<tr>
			<td>#Usuario</td>
			<td>Nombre</td>
			<td>Apellido</td>			
			<td>Tipo Documento</td>
			<td>Numero Documento</td>
			<td>Rol</td>	
			<td>Telefono</td>
			<td>Fecha_nacimiento</td>
			<td>Estado</td>			
			<td>Email</td>
			<td>Cambiar Clave</td>			
			<!--<td>Email recuperacion</th>-->
			<td colspan="4" align="center">Acciones</td>
		</tr>		
	</thead>
	<?php foreach($usuarios as $usuario){ ?>
	<tbody>
		<tr>
			<td><?php echo $usuario->id_usuario; ?></td>
			<td><?php echo $usuario->nombres; ?></td>
			<td><?php echo $usuario->apellidos; ?></td>
			<td><?php echo $usuario->nombreTipoDocumento; ?></td>
			<td><?php echo $usuario->numero_documento; ?></td>
			<td><?php echo $usuario->nombreRol ?></td>
			<td><?php echo $usuario->telefono; ?></td>
			<td><?php echo $usuario->fecha_nacimiento; ?></td>
			<td><?php echo $usuario->estado==1?'Activo':'Inactivo'; ?></td>
			<!--<td><?php echo $usuario->clave; ?></th>-->
			<td><?php echo $usuario->correo; ?></td>
			<!--<td><?php //echo $usuario->correo_recuperacion; ?></th>-->
			<td><a class=" btn btn-primary" href="?controller=usuario&action=frm_cambiarClaveAdm&id_usuario=<?php echo$usuario->id_usuario ?>">Clave</a></th>
			<td><a href=
				"?controller=usuario&action=frm_modificar_administrador&id_usuario=<?php echo
					$usuario->id_usuario ?> " class="btn btn-secondary">Actualizar
				</a>
			</td>
			<!-- <th scope="col"><a href=
					"?controller=usuario&action=eliminar_administrador&id_usuario=<?php echo 
					$usuario->id_usuario ?> " class="btn btn-danger">Eliminar</a></th> -->
			<td>
				<input <?php echo $usuario->estado==1 ? "checked" : "" ?> onchange="prueba_u(this)" type="checkbox" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" name="status" id="<?php echo $usuario->id_usuario ?>">
			</td>
		</tr>
	</tbody>
	<?php }	?>
</table>