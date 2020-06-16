<?php
session_start();
//Este es el bueno de los layousts
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<!--------------------------------------------Tonto el que lea :V okno jajajaj--------------------------------------------------------->
	<title>Zamasoft</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/menu.css">
	<link rel="stylesheet" href="css/estilos-inicio.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/material.min.css">
	<link rel="stylesheet" href="css/material-design-iconic-font.min.css">
	<link rel="stylesheet" href="css/jquery.mCustomScrollbar.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!-- -------------------------------  CSS nativo ---------------------------------->
	<link rel="stylesheet" href="Estilo/css/stilo.css">
	<link rel="stylesheet" href="Estilo/css/estilachos.css">
	 <!-------------------------------------Viene de cuenta cobro index----------------------->
	<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
	<script
	  src="https://code.jquery.com/jquery-3.4.1.js"
	  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
	  crossorigin="anonymous"></script>
	<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
	<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
	<!--------------------------------Sweetalert--------------------------------------------->
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<link rel="icon" type="image/png" href="icon/house.png"/>

	<style>.footer-style {padding-top: 50px;background-color: rgb(28, 30, 32);}footer {color: white;}footer h3 {margin-bottom: 30px;font-weight: 800;}footer .footer-above {padding-top: 50px;background-color: #2C3E50;}footer .footer-col {margin-bottom: 50px;
	}footer .footer-below { padding: 25px 0;background-color: #233140;}</style>
	
</head>
<body>
	
<?php if(isset($_SESSION['acceso']['id_rol']) && $_SESSION['acceso']['id_rol']==1){ ?>	
	 <!--//Layout Administrador-->
	<?php require_once('Vistas/Landing/administrador.php') ?> <?php } 

	//Layout Propietarios
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
			        <div class="full-width text-center NotificationArea-title tittles">Notificationes<i class="zmdi zmdi-close btn-Notification"></i></div>
			        	 <?php if(isset($cuenta_cobros) && count($cuenta_cobros)>0){
			            		$_SESSION['debe']=true;
			            		foreach ($cuenta_cobros as $cuenta_cobro) {
			            		//var_dump($cuenta_cobros);	
			            		if($cuenta_cobro['estado']==0){ ?>	
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
									 <?php } else { ?>
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

						    <?php  } } } ?>
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
									<small><?php  echo "Bienvenido   ".$_SESSION['acceso']['nombres']."  Seleccioné Una Opción"; ?></small>
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
														<i class="zmdi zmdi-balance"></i>Cuenta De Cobro
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
														<i class="zmdi zmdi-balance"></i>Usuario E Inmueble
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
														<i class="zmdi zmdi-balance"></i>Perfil
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
								
								</li>
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
	
	<!---Layout del Inquilino------------------------------------------>
	<?php require_once('Vistas/Landing/inquilino.php') ?>
	
<?php } }

if(!isset($_SESSION['acceso']['id_rol']) && !isset($_SESSION['acceso'])){ ?>
	<!---La cabecera sin loguear ------------------------------------------>

	<?php require_once('Vistas/Landing/header.php') ?>
	
<?php } require_once('routes.php'); ?>




</body>
</html>
<!------------------------------------------------------------------------------------------------------>
<!--este es del toogle-->
<!--este es del toogle-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!----------------------------------------frmModifciarU------------------------------------------------->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!----------------------------------------frmMoficarA------------------------------------------------->
<script src="js/jquery-3.2.1.min.js"></script>	
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/validator.min.js"></script>
<script src="js/contact-form.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="js/jquery-1.11.2.min.js"><\/script>')</script>
<script src="js/material.min.js" ></script>
<script src="js/jquery.mCustomScrollbar.concat.min.js" ></script>
<script src="js/main.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src='js/script.js'></script>
<script src="js/jquery.min.js"></script>
<script src="js/jquery.js"></script>
<!--Google api-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<!-- Proyecto-->
<script src="js/usuario.js"></script>
<script src="js/pago.js"></script>
<script src="js/tipo_documento.js"></script>
<script src="js/rol.js"></script>
<!-- <script src="js/factura.js"></script> -->
<script src="js/usuario.js"></script>
<script src="js/cuenta_cobro.js"></script>
<script src="js/tipo_pago.js"></script>
<script src="js/abono.js"></script>
<!-- <script src="js/mCustomScrollbar.js"></script> -->
<script src="node_modules\sweetalert2\dist\sweetalert2.all.js"></script>
<script src="node_modules\sweetalert2\dist\sweetalert2.all.min.js"></script>
<script src="node_modules\sweetalert2\dist\sweetalert2.js"></script>
<script src="node_modules\sweetalert2\dist\sweetalert2.min.js"></script>
	
<script>
	$(function (){
	
		<?php if(isset($_SESSION["guardar"]) != null): ?>	
		swal.fire('<?= $_SESSION["guardar"] ?>','','success',);
		<?php $_SESSION["guardar"] = null; ?>
		<?php endif; ?>		

	});
</script>

<script>
	$(function (){
	
		<?php if(isset($_SESSION["modificar"]) != null): ?>	
		swal.fire('<?= $_SESSION["modificar"] ?>','','success',);
		<?php $_SESSION["modificar"] = null; ?>
		<?php endif; ?>		

	});
</script>

<script>
/**/ 
$(function (){
	
	<?php if(isset($_SESSION["buscar"]) != null): ?>	
	swal.fire('<?= $_SESSION["buscar"] ?>','','success',);
	<?php $_SESSION["buscar"] = null; ?>
	<?php endif; ?>		

});

</script>