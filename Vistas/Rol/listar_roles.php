
						<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
							<thead>
								<tr>
									<th scope="col"># Rol</th>
									<th scope="col">Rol</th>
								</tr>		
							</thead>
							<?php  
							foreach ($roles as $rol) { ?>
							<tbody>
								<tr>
									<th scope="col"> <?php echo $rol->id_rol; ?> </th>
									<th scope="col"> <?php echo $rol->rol; ?> </th>
									
									<th scope="col"><a class="btn btn-secondary" href="?controller=rol&action=formulario_modificar&id_rol=<?php echo $rol->id_rol ?>">Actualizar</a> </th>
									
								
									<!-- <th scope="col"><a class="btn btn-danger" href="?controller=rol&action=eliminar_rol&id_rol=<?php echo $rol->id_rol ?>">Eliminar</a> </th> -->
								</tr>		
														
							
							<?php
							}	
							?>
								
							</tbody>
						</table>
					