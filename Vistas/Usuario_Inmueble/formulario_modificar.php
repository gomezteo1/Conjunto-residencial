<!DOCTYPE html>
<html lang="es">
<head>
	<title>Usuario Inmueble</title>
</head>
<body>
		
		<form action="Controladores/Usuario_Inmueble_Controlador.php" method="POST">
		<input type="hidden" name="action" value="modificar_usuario_inmueble">
		
		<section class="full-width header-well" align="left">
			<div class="full-width header-well-icon">
				<i class="zmdi zmdi-washing-machine"></i>
			</div>
			<div class="full-width header-well-text">
				<p class="text-condensedLight">
					Modificar Asignación De Inmueble
				</p>
			</div>
		</section>
		<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
			
			<div class="mdl-tabs__panel is-active" id="tabNewProduct">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--12-col">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle bg-primary text-center tittles">
								Asignarle Un inmueble Al Usuario
							</div>
							<div class="full-width panel-content">
								
									<div class="mdl-grid">
										<div class="mdl-cell mdl-cell--12-col">
									        <legend class="text-condensedLight"><i class="zmdi zmdi-border-color"></i> &nbsp; Información Basica</legend><br>
									    </div>

									    <input value="<?php echo $usuario_inmueble->id_usuario_inmueble ?>" name="id_usuario_inmueble" id="id_usuario_inmueble" class="w3-input" type="number" hidden> 

										<?php
											$llenar_select_usuario="si";
											require("Controladores/Usuario_Controlador.php"
												);
										?>		

										<?php
											$llenar_select_inmueble="si";
											require("Controladores/Inmueble_Controlador.php"
											);
										?>		

										


									</div>
									<p class="text-center">
										<button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" type="submit" id="ModificarA" name="ModificarA">
											<i class="zmdi zmdi-plus"></i>
										</button>
										<div class="mdl-tooltip" for="btn-addProduct">Agregar Usuario Inmueble</div>
									</p>
								
							</div>
						</div>
					</div>
				</div>
			</div>
			</form>
			<div class="mostrar"></div>
		</div>



</body>
</html>


