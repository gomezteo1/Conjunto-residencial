<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
	<thead>
		<tr>
			<td><b>Serial Usuario</b></td>
			<td><b>Nombre</b></td>
			<td><b>Apellido</b></td>			
			<td><b>Tipo Documento</b></td>
			<td><b>Numero Documento</b></td>
			<td><b>Rol</b></td>	
			<td><b>Telefono</b></td>
			<td><b>Fecha Nacimiento</b></td>
			<td><b>Estado</b></td>			
			<td><b>Correo</b></td>
			<td><b>Cambiar Clave</b></td>			
			<td colspan="1" align="center"><b>Acciones</b></td>
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
			<!-- <td>
				<input <?php echo $usuario->estado==1 ? "checked" : "" ?> onchange="prueba_u(this)" type="checkbox" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" name="status" id="<?php echo $usuario->id_usuario ?>">
			</td> -->

		
			<?php if($usuario->estado==0){?>
				<td>
				<button class="btn btn-success">
					<a href=
					"?controller=usuario&action=activarEstadoLista&id_usuario=<?php echo
				 	$usuario->id_usuario ?> ">Activar 
				 	</a>
				 </button>
			</td>		

			<?php } else{?> 
			 <td >
				<button class="btn btn-danger">
					<a href=
					"?controller=usuario&action=desactivarEstadoLista&id_usuario=<?php echo
				 	$usuario->id_usuario ?> "> Desactivar
				 	</a>
				 </button>
			</td>
			<?php	}  ?>
		</tr>
	</tbody>
	<?php }	?>
	<tfoot>
		<tr>
			<td><b>Serial Usuario</b></td>
			<td><b>Nombre</b></td>
			<td><b>Apellido</b></td>			
			<td><b>Tipo Documento</b></td>
			<td><b>Numero Documento</b></td>
			<td><b>Rol</b></td>	
			<td><b>Telefono</b></td>
			<td><b>Fecha Nacimiento</b></td>
			<td><b>Estado</b></td>			
			<td><b>Correo</b></td>
			<!--<td>Email recuperacion</th>-->
			<td><b>Cambiar Clave</b></td>			
			<td colspan="1" align="center"><b>Acciones</b></td>
		</tr>		
	</tfoot>
</table>