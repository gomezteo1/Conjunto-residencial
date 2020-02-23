<?php
session_start();

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Zamasoft</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="iconos/css/fontello.css">
	<link rel="stylesheet" href="css/menu.css">
	<link rel="stylesheet" href="css/estilos-inicio.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/.css">
	<link rel="stylesheet" href="css/material.min.css">
	<link rel="stylesheet" href="css/material-design-iconic-font.min.css">
	<link rel="stylesheet" href="css/jquery.mCustomScrollbar.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" href="style/index_style.css">
	<!-- CSS nativo -->
	<link rel="stylesheet" href="Estilo/css/stilo.css">
	<link rel="stylesheet" href="Estilo/css/estilachos.css">
 	
 	


	<style>
	
	.footer-style {
		    padding-top: 50px;
		    background-color: rgb(28, 30, 32);
		}
		footer {
		  color: white;
		}
		footer h3 {
		  margin-bottom: 30px;
		    font-weight: 800;
		}
		footer .footer-above {
		  padding-top: 50px;
		  background-color: #2C3E50;
		}
		footer .footer-col {
		  margin-bottom: 50px;
		}
		footer .footer-below {
		  padding: 25px 0;
		  background-color: #233140;
		}
	</style>
	


</head>
<body>
	

<?php if(isset($_SESSION['acceso']['id_rol']) && $_SESSION['acceso']['id_rol']==1){ ?>	

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
														<i class="zmdi zmdi-balance"></i>Cuenta de cobro
													</div>
												</a>
											</li>
											<li class="full-width">
												<a href= "?controller=tipo_pago&action=index" class="full-width">
													<div class="navLateral-body-cl">
													</div>
													<div class="navLateral-body-cr">
														<i class="zmdi zmdi-balance"></i>Tipo de pago
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
														<i class="zmdi zmdi-balance"></i>Month
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
													<i class="zmdi zmdi-balance"></i>Tipos de documento
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
														<i class="zmdi zmdi-balance"></i>Usuario e Inmueble
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
											echo'<a href="destruir_sesion.php"><div class="navLateral-body-cl">
											</div>
											<div class="navLateral-body-cr">
											<i class="zmdi zmdi-power bg-danger"></i>Cerrar Sesion
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
		<?php } 

		//Layout propietarios
		if(isset($_SESSION['acceso']['id_rol']) && $_SESSION['acceso']['id_rol']==2){
			if(isset($_SESSION['acceso'])){ 
		$cuenta_cobros;
		
		if (isset($_SESSION['acceso']) && $_SESSION['acceso']['id_rol']==2 ) {
			require_once('Modelos/Cuenta_Cobro.php');
			$cuenta_cobros=Cuenta_Cobro::notificar_cuenta_cobro_propietario($_SESSION['acceso']['id_usuario']);
			
		} ?>
		<!-- Notifications area -->
			<section class="full-width container-notifications">
				<div class="full-width container-notifications-bg btn-Notification"></div>
			    <section class="NotificationArea">
			        <div class="full-width text-center NotificationArea-title tittles">Notificationes <i class="zmdi zmdi-close btn-Notification"></i></div>
			        

			            
			            <?php 

			            	if(isset($cuenta_cobros) && count($cuenta_cobros)>0){
			            		$_SESSION['debe']=true;
			            		foreach ($cuenta_cobros as $cuenta_cobro) {
			            		//var_dump($cuenta_cobros);	
			            		if($cuenta_cobro['estado']==1){
			            		 

			            		?>	
			            		<a href="#" class="Notification" id="notifation-unread-1">
			            <div class="Notification-icon"><i class="zmdi zmdi-accounts-alt bg-success"></i></div>
						         <div class="Notification-text">
						                <p>
						                    <i class="zmdi zmdi-circle"></i>
						                    <strong>Notificación Pago Realizado</strong> 
						                    <br>
						                    <small>Cuenta Cobro Pagada</small>
						                </p>
						          </div>
						        <div class="mdl-tooltip mdl-tooltip--left" for="notifation-unread-1">Notification</div> 
						    </a>
						     	<?php } else{ ?>
								<a href="#" class="Notification" id="notifation-unread-1">
			            <div class="Notification-icon"><i class="zmdi zmdi-accounts-alt bg-info"></i></div>
								   <div class="Notification-text">
						                <p>
						                    <i class="zmdi zmdi-circle-o"></i>
						                    <strong>Notificación Cuenta Cobro </strong> 
						                    <br>
						                    <small>Cuenta Cobro Pendiente</small>
						                </p>
						          </div>
						        <div class="mdl-tooltip mdl-tooltip--left" for="notifation-unread-1">Notification</div> 
						        </a>
						    
						
						<?php  	} 
			            	} } ?>
				            		

			           

			         
			    </section>
			</section>
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
												<a href="?controller=cuenta_cobro&action=indexusuario" class="full-width">
													<div class="navLateral-body-cl">
													</div>
													<div class="navLateral-body-cr">
														<i class="zmdi zmdi-balance"></i>Cuenta de cobro
													</div>
												</a>
											</li>
											<li class="full-width">
												<a href= "?controller=pago&action=indexusuario" class="full-width">
													<div class="navLateral-body-cl">
													</div>
													<div class="navLateral-body-cr">
														<i class="zmdi zmdi-balance"></i>Pago
													</div>
												</a>
											</li>
											<li class="full-width">
											<a href= "?controller=usuario_inmueble&action=indexusuario" class="full-width">
												<div class="navLateral-body-cl">
													</div>
													<div class="navLateral-body-cr">
														<i class="zmdi zmdi-balance"></i>Usuario e Inmueble
												</div>
											</a>
											</li>
											
											<li class="full-width">
											<a href="?controller=abono&action=indexusuario" class="full-width">
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
														<i class="zmdi zmdi-balance"></i>Perfíl
													</div>
											</a>
										</li>
										<li>
										<?php  
											echo'<a href="destruir_sesion.php">
											<div class="navLateral-body-cl">
											</div>
											<div class="navLateral-body-cr">
											<i class="zmdi zmdi-power bg-danger"></i>Cerrar Sesion
											</div></a>';
											?>		
										</li>
									</ul>
								</li>
								<!--lOS QUE DIVIDEN LA ZONA-->
								<!-- <li class="full-width divider-menu-h"></li>
								

									<li class="full-width divider-menu-h"></li>
									<li class="full-width">
										<a href="#!" class="full-width btn-subMenu">
											<div class="navLateral-body-cl">
											<i class="zmdi zmdi-balance"></i>
											</div>
											<div class="navLateral-body-cr">
												SALIR
											</div>
											<span class="zmdi zmdi-chevron-left"></span>
										</a>
										<ul class="full-width menu-principal sub-menu-options">
											<li class="full-width">
												
											</li>
											
										</ul>
									</li> -->


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
								<li class="btn-Notification" id="notifications">
									<i class="zmdi zmdi-notifications"></i>
									<div class="mdl-tooltip" for="notifications">Notificación</div>
								</li>
								<!--<li class="btn-exit" id="btn-exit">
									<i class="zmdi zmdi-power"></i>
									<div class="mdl-tooltip" for="btn-exit">Cerrar Sesión</div>
								</li>-->
								<li class="text-condensedLight noLink" ><small> <?php  echo "".$_SESSION['acceso']['nombres'].""; ?> </small></li>
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
<?php } 
if($_SESSION['acceso']['id_rol']==3){ ?>	


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
<?php
 }
}

if(!isset($_SESSION['acceso']['id_rol']) && !isset($_SESSION['acceso'])){ ?>

	<header>
		<img src="image/Logo.jpg" class="img-logo">
		<!--<input type="checkbox" id="check">-->
		<label for="check" class="icon-menu"></label>

		<nav class="menu">
			<ul>
				<li id="inicio"><a href="#" id="inicio2">Inicio</a></li>
				<li id="acercade"><a href="#" id="acercade2">Acerca de</a></li>
				<li id="servicios"><a href="#" id="servicios2">Contactanos</a></li>
				<li> <a href="?controller=usuario&action=frm_registrar_usuario">Registrarse</a></li>
				<!--<li id="menu"><a href="menu.php" id="menu">Menu</a></li>-->
				<li> <a href="?controller=usuario&action=frm_login">Iniciar Sesion</a></li>
			</ul>
		</nav>
	</header>
<?php } require_once('routes.php'); ?>




</body>
</html>

<script>window.jQuery || document.write('<script src="js/jquery-1.11.2.min.js"><\/script>')</script>
<script src="js/material.min.js" ></script>

<script src="js/jquery.mCustomScrollbar.concat.min.js" ></script>
<script src="js/main.js" ></script>
<script src="js/tipo_pago.js">
</script>
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<script src="vendor/animsition/js/animsition.min.js"></script>
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="vendor/select2/select2.min.js"></script>
<script src="vendor/daterangepicker/moment.min.js"></script>
<script src="vendor/daterangepicker/daterangepicker.js"></script>
<script src="vendor/countdowntime/countdowntime.js"></script>

<script src="js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src='js/script.js'></script>
<script src="js/jquery.min.js">
</script>

<script src="js/jquery.js">
</script>
<script src="js/pago.js">
</script>
<script src="js/tipo_documento.js">
</script>
<script src="js/rol.js">
</script>
<script src="js/factura.js">
</script>
<script src="js/usuario.js">
</script>
<script src="js/cuenta_cobro.js">
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script src="js/mCustomScrollbar.js"></script>