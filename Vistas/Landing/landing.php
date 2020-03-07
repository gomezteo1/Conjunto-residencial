
<?php 
		if(isset($_SESSION['acceso'])) { ?>
		
			<div class="container" >
				<div class="col-12" align="center">
					<div style="width:370px; height:400px;" align="center"> 
						<img style="width:100%; height:100%;" src="image/Logo.png" >
					</div>
					<div class="card">
						<!--Inquilino-->
						<?php if( $_SESSION['acceso']['id_rol']>=3){?>
						<div class="card-head" align="center">
							<mark><p class="text-condensedLight noLink" >Bienvenido(a)  <strong> <?php  echo "".$_SESSION['acceso']['nombres']."".'   '."".$_SESSION['acceso']['apellidos']; ?></strong> Hemos recibido su solicitud, esta siendo revisada por administración, esto puede llevar unos días, muchas gracias por esperar.</p>
							<a href="destruir_sesion.php">Salir</a>
							</mark>
						</div>
						
						<!-- Los otros roles-->
						<?php } else{?>
						<div class="card-head" align="center">
							<mark><p class="text-condensedLight noLink" >Bienvenido(a)  <strong> <?php  echo "".$_SESSION['acceso']['nombres']."".'   '."".$_SESSION['acceso']['apellidos']; ?></strong> El menu esta a la izquierda </p>
							<p class="text-condensedLight noLink">Por favor elija una opción.</p>
							</mark>
						</div>
				
						<?php } ?>
					</div>
				</div>
			</div>	

		<?php } else if(!isset($_SESSION['acceso'])){ ?>
		
			<?php require_once('Vistas/Landing/footer.php') ?>
		
		<?php } else if(isset($_SESSION['debe']) && $_SESSION['acceso']['id_rol']==2 ){ ?>


			<div align="center"> 
			<img src="image/Logo.png" width="300" height="300">


			</div>
			<div class="card">
					<div class="card-head" align="center">
					<mark><p class="text-condensedLight noLink" >Bienvenido(a)  <strong> <?php  echo "".$_SESSION['acceso']['nombres']."".'   '."".$_SESSION['acceso']['apellidos']; ?></strong> Tienes una notificación, a la derecha encontraras un menu de notificaciones  </p>
					<p class="text-condensedLight noLink">Por favor revisala.</p>
					</mark>
					</div>
				
			</div>
		</div>
		</div>	

		<?php } ?>

