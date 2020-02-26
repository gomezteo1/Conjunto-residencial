<section class="full-width navLateral">
		<div class="full-width navLateral-bg btn-menu"></div>
		<div class="full-width navLateral-body">
			<div class="full-width navLateral-body-logo text-center tittles">
			<i class="zmdi zmdi-balance"></i></i> ZAMASOFT 
			</div>
			<figure class="full-width navLateral-body-tittle-menu">
				<div align="center">
								<img src="assets/img/avatar-male.png" alt="Avatar" class="img-responsive">
							</div>
				<figcaption>
					<span>
						Perfil<br>
						<small><?php  echo "Bienvenido   ".$_SESSION['acceso']['nombres']."   elija su opción"; ?></small>
					</span>
				</figcaption>
			</figure>
			<nav class="full-width">
				<ul class="full-width list-unstyle menu-principal">
					<li class="full-width">
						<a href="index.php" class="full-width">
							<div class="navLateral-body-cl">
								<i class="zmdi zmdi-view-dashboard"></i>
							</div>
							<div class="navLateral-body-cr">
								INICIO
							</div>
						</a>
					</li>
					<li class="full-width divider-menu-h"></li>
					
					<li class="full-width divider-menu-h"></li>
					<li class="full-width">
						<a href="#!" class="full-width btn-subMenu">
							<div class="navLateral-body-cl">
							<i class="zmdi zmdi-balance"></i>
							</div>
							<div class="navLateral-body-cr">
								AJUSTES
							</div>
							<span class="zmdi zmdi-chevron-left"></span>
						</a>
						<ul class="full-width menu-principal sub-menu-options">
							<li class="full-width">
							<?php  
									echo'<a href="?controller=usuario&action=indexUsuario&id_usuario='.
									$_SESSION['acceso']['id_usuario']
									.'"><div class="navLateral-body-cl">
									
									</div>
									<div class="navLateral-body-cr">
									<i class="zmdi zmdi-balance"></i>Perfil
									</div></a>';

									echo'<a href="destruir_sesion.php"><div class="navLateral-body-cl">
									
									</div>
									<div class="navLateral-body-cr">
									<i class="zmdi zmdi-balance"></i>Cerrar Sesion
									</div></a>';
								?>									
							</li>
							
						</ul>
					</li>
							
						</ul>
					</li>
				</ul>
			</nav>
		</div>
	</section>


	<!-- pageContent -->
	<section class="full-width pageContent">
		<!-- navBar -->
		<div class="full-width navBar">
			<div class="full-width navBar-options">
				<i class="zmdi zmdi-swap btn-menu" id="btn-menu"></i>	
				<div class="mdl-tooltip" for="btn-menu">Ocultar / Mostrar MENU</div>
				<nav class="navBar-options-list">
					<ul class="list-unstyle">
						<!--<li class="btn-Notification" id="notifications">
							<i class="zmdi zmdi-notifications"></i>
							<div class="mdl-tooltip" for="notifications">Notificación</div>
						</li>-->
						<li class="btn-exit" id="btn-exit">
							<i class="zmdi zmdi-power"></i>
							<div class="mdl-tooltip" for="btn-exit">Cerrar Sesión</div>
						</li>
						<li class="text-condensedLight noLink" ><small> <?php  echo "".$_SESSION['acceso']['nombres'].""; ?> </small></li>
						<li class="noLink">
							<figure>
								<img src="assets/img/avatar-male.png" alt="Avatar" class="img-responsive">
							</figure>
						</li>
					</ul>
				</nav>
			</div>
		</div>