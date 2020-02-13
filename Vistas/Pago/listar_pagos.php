
					<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
							<thead>
								<tr>
									<th scope="col">#Pago</th>
									<th scope="col">Nombre</th>
									<th scope="col">#Cuenta Cobro</th>
									<th scope="col">Fecha</th>
									<th scope="col">Tipo Pago</th>
									<th scope="col">Monto Cancelado</th>
									<th scope="col">Monto a Pagar</th>
									<th colspan=4>Acciones</th>
								</tr>		
							</thead>
							<?php  
							foreach ($pagos as $pago) { ?>
							<tbody>
								<tr>
									<th scope="col"><?php echo $pago->codigo_pago; ?></th>
									<th scope="col"><?php echo $pago->nombreUsuario; ?></th>
									<th scope="col"><?php echo $pago->codigo_cuenta_cobro;?></th>
									<th scope="col"><?php echo $pago->fecha; ?></th>
									<th scope="col"><?php echo $pago->nombreTipoPago;?></th>
									<th scope="col"><?php echo $pago->monto_cancelado; ?></th>
									<th scope="col"><?php echo $pago->monto_a_pagar;?></th>

									<th scope="col"><a class="btn btn-secondary" href="?controller=pago&action=formulario_modificar&codigo_pago=<?php echo $pago->codigo_pago ?>">Actualizar</a> </th>
									<!-- <th scope="col"><a class="btn btn-danger"  href="?controller=pago&action=eliminar_pago&codigo_pago=<?php echo $pago->codigo_pago?>">Eliminar</a> </th> -->
									<th scope="col"><a class="btn btn-success" target="_blank" href="?controller=reporte&action=index&codigo_pago=<?php echo $pago->codigo_pago ?>">Ver</a> </th>
								</tr>
																
							
							<?php
							}	
							?>
								
							</tbody>
						</table>
					