	<!-- navLateral -->
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
									<small><?php  echo "Bienvenido   ".$_SESSION['acceso']['nombres']."   Seleccioné Una Opción"; ?></small>
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
								<!--lOS QUE DIVIDEN LA ZONA-->
								<li class="full-width divider-menu-h"></li>
									<li class="full-width">
										<a href="#!" class="full-width btn-subMenu">
											<div class="navLateral-body-cl">
											<i class="zmdi zmdi-balance"></i>
											</div>
											<div class="navLateral-body-cr">
												GESTIÓN DE ADMINISTRACIÓN
											</div>
											<span class="zmdi zmdi-chevron-left"></span>
										</a>
										<ul class="full-width menu-principal sub-menu-options">
											<li class="full-width">
												<a href="?controller=cuenta_cobro&action=index" class="full-width">
													<div class="navLateral-body-cl">
													</div>
													<div class="navLateral-body-cr">
														<i class="zmdi zmdi-balance"></i>Cuenta De Cobro
													</div>
												</a>
											</li>
											<li class="full-width">
												<a href= "?controller=tipo_pago&action=index" class="full-width">
													<div class="navLateral-body-cl">
													</div>
													<div class="navLateral-body-cr">
														<i class="zmdi zmdi-balance"></i>Tipo De Pago
													</div>
												</a>
											</li>
											<li class="full-width">
											<a href= "?controller=pago&action=index" class="full-width">
												<div class="navLateral-body-cl">
													</div>
													<div class="navLateral-body-cr">
														<i class="zmdi zmdi-balance"></i>Pagos
												</div>
											</a>
											</li>
											
											<li class="full-width">
											<a href="?controller=month&action=index" class="full-width">
													<div class="navLateral-body-cl">
													</div>
													<div class="navLateral-body-cr">
														<i class="zmdi zmdi-balance"></i>Mes y Tarifa
													</div>
												</a>
											</li>
											<li class="full-width">
											<a href= "?controller=abono&action=index" class="full-width">
													<div class="navLateral-body-cl">
													</div>
													<div class="navLateral-body-cr">
														<i class="zmdi zmdi-balance"></i>Abonos
													</div>
												</a>
											</li>
										</ul>
									</li>
								<!--lOS QUE DIVIDEN LA ZONA-->
								<li class="full-width divider-menu-h"></li>
								<li class="full-width">
									<a href="#!" class="full-width btn-subMenu">
										<div class="navLateral-body-cl">
										<i class="zmdi zmdi-balance"></i>
										</div>
										<div class="navLateral-body-cr">
											GESTIÓN DE USUARIOS
										</div>
										<span class="zmdi zmdi-chevron-left"></span>
									</a>
									<ul class="full-width menu-principal sub-menu-options">
										<li class="full-width">
											<a href="?controller=usuario&action=index" class="full-width">
												<div class="navLateral-body-cl">
												</div>
												<div class="navLateral-body-cr">
													<i class="zmdi zmdi-balance"></i>Usuarios
												</div>
											</a>
										</li>
										<li class="full-width">
											<a href="?controller=rol&action=index" class="full-width">
												<div class="navLateral-body-cl">
												</div>
												<div class="navLateral-body-cr">
												<i class="zmdi zmdi-balance"></i>Roles
												</div>
											</a>
										</li>
										<li class="full-width">
											<a href="?controller=tipo_documento&action=index" class="full-width">
												<div class="navLateral-body-cl">
												</div>
												<div class="navLateral-body-cr">
													<i class="zmdi zmdi-balance"></i>Tipos De Documento
												</div>
											</a>
										</li>
									</ul>
								</li>
								<!--lOS QUE DIVIDEN LA ZONA-->
								<li class="full-width divider-menu-h"></li>
									<li class="full-width">
										<a href="#!" class="full-width btn-subMenu">
											<div class="navLateral-body-cl">
											<i class="zmdi zmdi-balance"></i>
											</div>
											<div class="navLateral-body-cr ">
												GESTIÓN DE INMUEBLES
											</div>
											<span class="zmdi zmdi-chevron-left"></span>
										</a>
										<ul class="full-width menu-principal sub-menu-options">
											<li class="full-width">
											<a href="?controller=usuario_inmueble&action=index" class="full-width">
													<div class="navLateral-body-cl">
													</div>
													<div class="navLateral-body-cr">
														<i class="zmdi zmdi-balance"></i>Usuario E Inmueble
													</div>
												</a>
											</li>
											<li class="full-width">
												<a href="?controller=inmueble&action=index" class="full-width">
													<div class="navLateral-body-cl">
													</div>
													<div class="navLateral-body-cr">
														<i class="zmdi zmdi-balance "></i>Inmueble
													</div>
												</a>
											</li>
											
										</ul>
									</li>
									

									<li class="full-width divider-menu-h"></li>
									<li class="full-width">
										<a href="#!" class="full-width btn-subMenu">
											<div class="navLateral-body-cl">
											<i class="zmdi zmdi-balance"></i>
											</div>
											<div class="navLateral-body-cr">
												GESTIÓN DE CUENTA
											</div>
											<span class="zmdi zmdi-chevron-left"></span>
										</a>
										<ul class="full-width menu-principal sub-menu-options">
											<li class="full-width">
											<a href="?controller=usuario&action=indexUsuario&id_usuario=<?php echo $_SESSION['acceso']['id_usuario']?>" class="full-width">
													<div class="navLateral-body-cl">
													</div>
													<div class="navLateral-body-cr">
														<i class="zmdi zmdi-balance"></i>Perfil
													</div>
												</a>
										</li>
											<li class="full-width">
											<?php  
											 //echo'<a href="?controller=usuario&action=cerrarSesion"><div class="navLateral-body-cl">
											echo'<a href="destruir_sesion.php"><div class="navLateral-body-cl">
											</div>
											<div class="navLateral-body-cr">
											<i class="zmdi zmdi-power bg-danger"></i>Cerrar Sesión
											</div></a>';
											?>		
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
								<li class="text-condensedLight noLink" ><small> <?php  echo "".$_SESSION['acceso']['nombres'].""; ?> </small>
								</li>
								<li class="noLink">
									<div>
									<figure >
										<img src="assets/img/avatar-male.png" alt="Avatar" class="img-responsive">
									</figure>
								</li>
							</ul>
						</nav>
					</div>
				</div>
				<br>

<!-------------------Ayudas en linea--------------------------->
				<?php require_once('modales.php'); ?>