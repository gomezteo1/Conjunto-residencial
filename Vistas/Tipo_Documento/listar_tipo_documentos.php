
						<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
							<thead>
								<tr>
									<th scope="col"># Tipo Documento</th>
									<th scope="col">Documento</th>
									<th colspan=3 >Acciones</th>
								</tr>
							</thead>
							<?php
			foreach ($tipo_documentos as $tipo_documento) { ?>
				<tbody>
					<tr>
						<th scope="col"><?php echo $tipo_documento->id_tipo_documento; ?></th>
						<th scope="col"><?php echo $tipo_documento->documento; ?></th>
					
						<th scope="col"><a class="btn btn-secondary" href="?controller=tipo_documento&action=formulario_modificar&id_tipo_documento=<?php echo $tipo_documento->id_tipo_documento ?>">Actualizar</a> </th>
						<!-- <th scope="col"><a class="btn btn-danger" href="?controller=tipo_documento&action=eliminar_tipo_documento&id_tipo_documento=<?php echo $tipo_documento->id_tipo_documento ?>">Eliminar</a> </th> -->
					</tr>		
						<?php } ?>
								
							</tbody>
						</table>
				