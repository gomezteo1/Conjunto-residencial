<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1"/>
	<title>cuenta cobro</title>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<meta name="description" content="Add your business website description here">
	<meta name="keywords" content="Add your business website keywords here">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
	<div id="registrar-cuenta_cobro">								
		<form name="frmcuenta_cobro" id="frmcuenta_cobro" method="POST" action="" 
		data-toggle="validator" class="popup-form">
		<div id="prueba"></div>  
		
			<section class="full-width header-well">
				<div class="full-width header-well-icon">
					<i class="zmdi zmdi-washing-machine"></i>
				</div>
				<div class="full-width header-well-text">
					<p class="text-condensedLight">
						Registrar cuenta cobro
					</p>
				</div>
			</section>
			<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
				
				<div class="mdl-tabs__panel is-active" id="tabNewProduct">
					<div class="mdl-grid">
						<div class="mdl-cell mdl-cell--12-col">
							<div class="full-width panel mdl-shadow--2dp">
								<div class="full-width panel-tittle bg-primary text-center tittles">
									cuenta cobro
								</div>
								<div class="full-width panel-content">
									<div class="mdl-grid">
										<div class="mdl-cell mdl-cell--12-col">
											<legend class="text-condensedLight"><i class="zmdi zmdi-border-color"></i> &nbsp; Información basica</legend><br>
										</div>
										<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" name="numero_cuenta" id="numero_cuenta" required>
												<label class="mdl-textfield__label" for="numero_cuenta">numero cuenta</label>
												<span class="mdl-textfield__error">numero cuenta invalido</span>
											</div>
										</div>
										<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" name="nit" id="nit" required>
												<label class="mdl-textfield__label" for="nit">NIT</label>
												<span class="mdl-textfield__error">Nit invalido</span>
											</div>
										</div>
										<div>
								
										<div class="form-group col-sm-6">
																			
											<?php $llenar_select_usuario="si";
											require_once("Controladores/Usuario_Controlador.php");
											?>
										</div><!-- end form-group -->
																			
										<div class="form-group col-sm-6">
																	
										</div><!-- end form-group -->
										<div class="form-group col-sm-6">
											<?php $llenar_select_inmueble="si";
											require_once("Controladores/Inmueble_Controlador.php");
											?>
										</div><!-- end form-group -->

										<div class="form-group col-sm-6">
											<?php $llenar_select_month="si";
											require_once("Controladores/Month_Controlador.php");
											?>
										</div><!-- end form-group -->

										
										<br>
										<br>
										<br>
										<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="date" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" name="fecha" id="fecha" required>
												<label class="mdl-textfield__label" for="fecha"></label>
												<span class="mdl-textfield__error"> invalido</span>
											</div>
										</div>
										
										<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="monto_por_cancelar" name="monto_por_cancelar" required>
												<label class="mdl-textfield__label" for="monto_por_cancelar"></label>
												<span class="mdl-textfield__error">Monto por Cancelar</span>
											</div>
										</div>
									</div>
								
										</div>
									<center>
										<div id="detalle_cuenta_cobro">
										aqui ira el detalle
										</div>
									</center>
							</div>
						</div>
					</div>
				</div>
			</div>
			</form>
			<div class="row justify-content-center">
				<button class="btn btn-dark" name="btnagregar" id="btnagregar">agregar</button>

				<button class=" btn btn-success"name="btnguardar" id="btnguardar">
			
Guardar</button>
</div>
			<div class="mostrar"></div>
		</div>
	</div>


</body>
<script src="./zamasoft(1)/js/cuenta_cobro.js"></script>
<script src="js/jquery-3.2.1.min.js"></script>	
		<!-- Popper js -->
		<script src="js/popper.min.js"></script>
		<!-- Bootstrap Js -->
		<script src="js/bootstrap.min.js"></script>
		<!-- Form Validator -->
		<script src="js/validator.min.js"></script>
		<!-- Contact Form Js -->
		<script src="js/contact-form.js"></script>
	
		<script src="js/abono.js"></script>


	
		



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>








<!--------------------------------------------------------------------------------------------------------------------------------------------->
