<br><br><br>
<div class="container" style="height: 500px;">
	<div class="col-12">
		
		<?php 
		 if(isset($_SESSION['acceso'])) { ?>
		
		<div align="center"> 
		<img src="image/Logo.jpg" width="300" height="300">


		</div>
		<div class="card">
			<!--Inquilino-->
			<?php if( $_SESSION['acceso']['id_rol']==3){?>
		<div class="card-head" align="center">
				<mark><p class="text-condensedLight noLink" >Bienvenido(a)  <strong> <?php  echo "".$_SESSION['acceso']['nombres']."".'   '."".$_SESSION['acceso']['apellidos']; ?></strong> Hemos recibido su solicitud, esta siendo revisada por administración, esto puede llevar unos días, muchas gracias por esperar.</p>
				<a href="destruir_sesion.php">Salir</a>
			 	</mark>
			 </div>

<?php

			}
			else{?>
			  <div class="card-head" align="center">
				<mark><p class="text-condensedLight noLink" >Bienvenido(a)  <strong> <?php  echo "".$_SESSION['acceso']['nombres']."".'   '."".$_SESSION['acceso']['apellidos']; ?></strong> El menu esta a la izquierda </p>
				<p class="text-condensedLight noLink">Por favor elija una opción.</p>
			 	</mark>
			 </div>
			
<?php

			}
			?>
		</div>
	</div>
</div>	

		<?php } else if(!isset($_SESSION['acceso'])){ ?>
		
<main>



		<div class="content-one">
				<div class="content-img">
					<div class="content-font">
					<legend>Proyecto Zamasoft </h1></legend>
					<h1>Conjunto Residencial Juan Del Corral</h1>
					</div>
				</div>
		</div>

		<div class="content-two">
			<div class="content-details">

				<div class="content-details-for">
				<label class="icon-heart"></label>
				<h3>Prado</h3>
				<p>«Prado es un barrio del centro de Medellín, ubicado en la zona norte de la comuna de La Candelaria, cerca del centro de la ciudad. Desde 2006 es patrimonio arquitectónico de la ciudad.</p>
				</div>
				

				<div class="content-details-for">
				<label class="icon-support"></label>
				<h3></h3>
				<p> rango de servicios por medio del cual se proporciona asistencia a los usuarios cuando estos presenten algún problema al utilizar un producto o servicio, ya sea este el hardware o software de una computadora de un servidor </p>
				</div>
				<div class="content-details-for">
				<label class="icon-laptop"></label>
				<h3>Como llegar</h3>
				<p>Dirección: Cl. 61 #51d- 113, Medellín, Antioquia <a href="https://www.google.com/maps/dir/6.24777,-75.553666/conjunto+residencial+juan+del+corral+medellin/@6.2543607,-75.5707889,15z/data=!3m1!4b1!4m9!4m8!1m1!4e1!1m5!1m1!1s0x8e4428e4c0b5a3fd:0xc72a7c3d27e5a33!2m2!1d-75.5668861!2d6.2597099"><strong>Como llegar</strong></a></p>
				</div>
			</div>
		</div>

	<div class="content-five">
			<div class="content-item3">
				<h3>Historia Del Conjunto Recidencial Juan Del Corral</h3>
				<p>.</p>
			</div>
		</div>
	</main>
	
	<footer>
		<div class="container-footer-all">
			<div class="container-body">
			  <div class="colum1">

					  <h1>Mas informacion de la compañia</h1>
					  <p>Esta compañia se dedica a la venta de inmuebles y alquiler de inmuebles 
					  </p>

			  </div>
			  <div class="colum2">

					  <h1>Redes Sociales</h1>

					  <div class="row">
						  <img src="icon/facebook.png">
						  <label>Siguenos en Facebook juandelco</label>
					  </div>
					  <div class="row">
						  <img src="icon/twitter.png">
						  <label>Siguenos en Twitter @juandelco</label>
					  </div>
					  <div class="row">
						  <img src="icon/instagram.png">
						  <label>Siguenos en Instagram @juandelco</label>
					  </div>
					  <div class="row">
						  <img src="icon/google-plus.png">
						  <label>Siguenos en Google Plus @juandelco</label>
					  </div>
					  <div class="row">
						  <img src="icon/pinterest.png">
						  <label>Siguenos en Pinteres @juandelco</label>
					  </div>
			  </div>
			 <div class="colum3">
					  <h1>Informacion Contactos</h1>
					  <div class="row2">
						  <img src="icon/house.png">
						  <label>prado centro 
						  medellin
						  colombia
						  </label>
					  </div>
					  <div class="row2">
						  <img src="icon/smartphone.png">
						  <label>+1-829-395-2064</label>
					  </div>
					  <div class="row2">
						  <img src="icon/contact.png">
						   <label>juandelcoral@gmail.com</label>
					  </div>
				</div>
		  	</div>
		</div>
		<div class="container-footer">
							 <div class="footer">
								  <div class="copyright">
									  © 2019 Todos los Derechos Reservados | <a href="">Zamasoft</a>
								  </div>
							<div class="information">
									  <a href="">Informacion Compañia</a> | <a href="">Privacion y Politica</a> | <a href="">Terminos y Condiciones</a>
								  </div>
							  </div>
					</div>
		</footer>			



		<?php } else if(isset($_SESSION['debe']) && $_SESSION['acceso']['id_rol']==2 ){ ?>

	
		<div align="center"> 
		<img src="image/Logo.jpg" width="300" height="300">


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

	