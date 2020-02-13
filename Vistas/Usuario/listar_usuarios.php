
						<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
							<thead>
								<tr>
									<th scope="col">#Usuario</th>
									<th scope="col">Nombre</th>
									<th scope="col">Apellido</th>			
									<th scope="col">Tipo Documento</th>
									<th scope="col">Numero Documento</th>
									<th scope="col">Rol</th>	
									<th scope="col">Telefono</th>
									<th scope="col">Fecha Nacimiento</th>
									<th scope="col">Estado</th>			
									<th scope="col">Clave</th>
									<th scope="col">Email</th>			
									<!--<th scope="col">Email recuperacion</th>-->
									<th colspan="4">Acciones</th>
								</tr>		
							</thead>
							<?php  
							foreach($usuarios as $usuario){ 
							?>
							<tbody>
								<tr>
									<th scope="col"><?php echo $usuario->id_usuario; ?></th>
									<th scope="col"><?php echo $usuario->nombres; ?></th>
									<th scope="col"><?php echo $usuario->apellidos; ?></th>
									<th scope="col"><?php echo $usuario->nombreTipoDocumento; ?></th>
									<th scope="col"><?php echo $usuario->numero_documento; ?></th>
									<th scope="col"><?php echo $usuario->nombreRol ?></th>
									<th scope="col"><?php echo $usuario->telefono; ?></th>
									<th scope="col"><?php echo $usuario->fecha_nacimiento; ?></th>
									<th scope="col"><?php echo $usuario->estado==1?'Activo':'Inactivo'; ?></th>
									<th scope="col"><?php echo $usuario->clave; ?></th>
									<th scope="col"><?php echo $usuario->correo; ?></th>
									<!--<th scope="col"><?php //echo $usuario->correo_recuperacion; ?></th>-->
								
									<th scope="col">
										
										<a href=
										"?controller=usuario&action=frm_modificar_administrador&id_usuario=<?php echo
										 $usuario->id_usuario ?> " class="btn btn-secondary">Actualizar
										</a>
										
									</th>

									<th scope="col">
										
										<a href=
											"?controller=usuario&action=eliminar_administrador&id_usuario=<?php echo 
										 	$usuario->id_usuario ?> " class="btn btn-danger">Eliminar
										 </a>
										 
									</th>
								
								</tr>
							
							
							<?php
							}	
							?>
								
							</tbody>
						</table>
					