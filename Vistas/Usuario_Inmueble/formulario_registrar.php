<!DOCTYPE html>
<html lang="es">
<head>
	<title>Usuario Inmueble</title>
</head>
<body>
		<div id="registrar-usuario_inmueble">	
		<form action="Controladores/Usuario_Inmueble_Controlador.php" method="POST" id="res-registrar-usuario_inmueble">
		<input  type="hidden" name="action" value="registrar_usuario_inmueble">
		
		<section class="full-width header-well" align="left">
			<div class="full-width header-well-icon">
				<i class="zmdi zmdi-washing-machine"></i>
			</div>
			<div class="full-width header-well-text">
				<p class="text-condensedLight">
					Asignar Inmuebles A Usuarios
				</p>
			</div>
		</section>
		<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
	
			<div class="mdl-tabs__panel is-active" id="tabNewProduct">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--12-col">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle bg-primary text-center tittles">
								Nuevo Usuario Inmueble
							</div>
							<div class="full-width panel-content">
								
									<div class="mdl-grid">
										<div class="mdl-cell mdl-cell--12-col">
									        <legend class="text-condensedLight"><i class="zmdi zmdi-border-color"></i> &nbsp; Información Basica</legend><br>
									    </div>

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
										<button id="button-Rusuario_inmueble" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" type="submit">
												<i class="zmdi zmdi-plus"></i>
										</button>
										<div class="mdl-tooltip" for="btn-addUsuario_Inmueble">Agregar Usuario Inmueble</div>
									</p>
								
								
							</div>
						</div>
					</div>
				</div>
			</div>
			</form>
			<div class="mostrar"></div>
		</div>
	</div>


</body>
</html>







