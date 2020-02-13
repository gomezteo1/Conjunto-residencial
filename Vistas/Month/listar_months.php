
						<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
							<thead>
								<tr>
									<th scope="col">#Mes</th>
									<th scope="col">Mes</th>
								
									<th scope="col">Porcentaje</th>
									<th scope="col">Fecha</th>
									
									<th colspan=3 >Acciones</th>
								</tr>
							</thead>
							<?php
			foreach ($months as $month) { ?>
				<tbody>
					<tr>
						<th scope="col"><?php echo $month->codigo_month; ?></th>
						<th scope="col"><?php echo $month->mes; ?></th>
					
						<th scope="col"><?php echo $month->porcentaje; ?></th>
						<th scope="col"><?php echo $month->fecha; ?></th>

					
						<th scope="col"><a class="btn btn-secondary" href="?controller=month&action=formulario_modificar&codigo_month=<?php echo $month->codigo_month ?>">Actualizar</a> </th>
						<!-- <th scope="col"><a class="btn btn-danger" href="?controller=month&action=eliminar_month&codigo_month=<?php echo $month->codigo_month ?>">Eliminar</a> </th> -->
					</tr>		
						<?php } ?>
								
							</tbody>
						</table>
					