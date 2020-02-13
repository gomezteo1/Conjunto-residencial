
	<div id="resultado_busqueda">
		<div align="center">
			<section class="full-width header-well">
				<div class="full-width header-well-icon">
					<i class="zmdi zmdi-shopping-cart"></i>
				</div>
				<div class="full-width header-well-text" align="left">
					<p class="text-condensedLight">
					Busqueda Usuario Inmueble
					</p>
					<input type="text" name="txtbuscar" id="txtbuscar" />
					<button class="btn-outline" name="btnbuscar" id="btnbuscar">
					<img src="./Reportes/imajenes/busqueda.png">
					</button>
				</div>
			</section>

			<div class="full-width divider-menu-h"></div>
			<div class="mdl-grid">
				<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
					<div class="table-responsive">
						<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
							<thead>
								<tr>
									<th scope="col"># usuario inmueble</th>
									<th scope="col">Usuario</th>
									<th scope="col">Inmueble</th>
									
									<th colspan=4>Acciones</th>
								</tr>		
							</thead>
							<?php  
							foreach ($usuario_inmuebles as $usuario_inmueble) { ?>
							<tbody>
								<tr>
									<th scope="col"><?php echo $usuario_inmueble->id_usuario_inmueble; ?></th>
									<th scope="col"><?php echo $usuario_inmueble->id_usuario; ?></th>
									<th scope="col"><?php echo $usuario_inmueble->codigo_inmueble;?></th>
									

									<th scope="col"><a class="btn btn-secondary" href="?controller=usuario_inmueble&action=formulario_modificar&id_usuario_inmueble=<?php echo $usuario_inmueble->id_usuario_inmueble ?>">Actualizar</a> </th>
									<!-- <th scope="col"><a class="btn btn-danger"  href="?controller=usuario_inmueble&action=eliminar_usuario_inmueble&id_usuario_inmueble=<?php echo $usuario_inmueble->id_usuario_inmueble?>">E</a> </th> -->
									<!--<th scope="col"><a class="btn btn-success" target="_blank" href="?controller=reporte&action=index&codigo_pago=<?php echo $pago->codigo_pago ?>">Ver</a> </th>-->
								</tr>
																
							
							<?php
							}	
							?>
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
