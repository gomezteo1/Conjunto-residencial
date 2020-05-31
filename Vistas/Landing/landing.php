
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
							<mark><p class="text-condensedLight noLink" >Bienvenido(a)  <strong> <?php  echo "".$_SESSION['acceso']['nombres']."".'   '."".$_SESSION['acceso']['apellidos']; ?></strong> Hemos recibido Su Solicitud, Está Siendo Revisada Ror Administración, Esto Puede Llevar Unos Días, Muchas Gracias Por Esperar.</p>
							<a href="destruir_sesion.php">Salir</a>
							</mark>
						</div>
						
						<!-- Los otros roles-->
						<?php } else{?>
						<div class="card-head" align="center">
							<mark><p class="text-condensedLight noLink" >Bienvenido(a)  <strong> <?php  echo "".$_SESSION['acceso']['nombres']."".'   '."".$_SESSION['acceso']['apellidos']; ?></strong> El Menu Está A La Izquierda </p>
							<p class="text-condensedLight noLink">Por Favor Elija Una Opción.</p>
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
					<mark><p class="text-condensedLight noLink" >Bienvenido(a)  <strong> <?php  echo "".$_SESSION['acceso']['nombres']."".'   '."".$_SESSION['acceso']['apellidos']; ?></strong> Tienes Una Notificación, A La Derecha Encontraras Un Menu De Notificaciones  </p>
					<p class="text-condensedLight noLink">Por Favor Revisala.</p>
					</mark>
					</div>
				
			</div>
		</div>
		</div>	

		<?php } ?>

