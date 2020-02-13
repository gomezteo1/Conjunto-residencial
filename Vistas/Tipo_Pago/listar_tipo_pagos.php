
						<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
							<thead>
								<tr>
									
						            <th class="text-center"># Tipo Pago</th>
						            <th>Tipo Pago</th>
						            <th>Descripción</th>
									<th colspan= 2>acciones </th>
						          </tr>		
							</thead>
							<?php  
							foreach ($tipo_pagos as $tipo_pago) { ?>
								<tbody>
								<tr>
									<th><?php echo $tipo_pago->codigo_tipo_pago; ?></th>
									<th><?php echo $tipo_pago->tipo_pago; ?></th>
									<th><?php echo $tipo_pago->descripcion;?></th>
									<th>
										<a href="?controller=tipo_pago&action=formulario_modificar&codigo_tipo_pago=<?php echo $tipo_pago->codigo_tipo_pago ?>" class="btn btn-secondary">Actualizar
										</a> 
									</th>
									<!--<th>
										<a href="?controller=tipo_pago&action=eliminar_tipo_pago&codigo_tipo_pago=<?php echo $tipo_pago->codigo_tipo_pago ?>" class="btn btn-outline-danger glyphicon glyphicon-remove">Eliminar</a>
									</th>-->
								</tr>
					<?php 
							}	
							?>
								
							</tbody>
						</table>
					