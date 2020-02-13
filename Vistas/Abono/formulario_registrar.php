<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8">
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1"/>
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	
	<title>registrar abonos</title>
	<!-- set your website meta description and keywords -->
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<meta name="description" content="Add your business website description here">
	<meta name="keywords" content="Add your business website keywords here">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<!-- set your website favicon -->
</head>
<!----DISEÑO FULL HD 4K------>

<body>
	<form action='Controladores/Abono_Controlador.php' method='POST' id="res-registrar-abono">
	<input type='hidden' name='action' value='registrar_abono'>

	<section class="full-width header-well">
				<div class="full-width header-well-icon">
					<i class="zmdi zmdi-balance"></i>
				</div>
				<div class="full-width header-well-text">
					<p class="text-condensedLight">
						Registrar Abono
					</p>
				</div>
		</section>
			<div class="full-width divider-menu-h"></div>
			<div class="mdl-grid">
				<div class="mdl-cell mdl-cell--12-col">
					<div class="full-width panel mdl-shadow--2dp">
						<div class="full-width panel-tittle bg-primary text-center tittles">
							Abonar
						</div>
						<div class="full-width panel-content">
						<div id="registrar-abono">
						<form action='Controladores/Abono_Controlador.php' method='POST' id="res-registrar-abono">
						<input type='hidden' name='action' value='registrar_abono'>
								<div class="mdl-grid">
									<div class="mdl-cell mdl-cell--12-col">
			                            <legend class="text-condensedLight"><i class="zmdi zmdi-border-color"></i> &nbsp; Registrar Abono</legend><br>
			                        </div>
									<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
															<?php
															$llenar_select_pago="si";
																require("Controladores/Pago_Controlador.php");
															?>
											<label class="mdl-textfield__label" for="DNICompany"></label>
											<span class="mdl-textfield__error">Invalid number</span>
										</div>
									</div>

									<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
															<?php
															$llenar_select_usuario="si";
																require("Controladores/Usuario_Controlador.php");
															?>
											<label class="mdl-textfield__label" for="NameCompany"></label>
											<span class="mdl-textfield__error">Invalid name</span>
										</div>
									</div>

									<div class="mdl-cell mdl-cell--12-col">
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
											<input class="mdl-textfield__input" type="date" id="fecha" name="fecha" >
											<label class="mdl-textfield__label"  for="fecha"></label>
											<span class="mdl-textfield__error">Fecha Invalida</span>
										</div>
									</div>
									<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
											<input class="mdl-textfield__input" type="number"  pattern="-?[0-9]*(\.[0-9]+)?" id="deuda" name="deuda" placeholder="Aqui estará su deuda al seleccionar el codigo de pago" readonly>
											<label class="mdl-textfield__label" for="deuda"></label>
											<span class="mdl-textfield__error">Deuda Invalida</span>
										</div>
									</div>

									<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
											<input class="mdl-textfield__input" type="number" pattern="-?[0-9]*(\.[0-9]+)?" id="abono" name="abono"
												onkeypress="calcular_total()"
												onkeyup="calcular_total()"
												onkeydown="calcular_total()">
											<label class="mdl-textfield__label" for="abono">Abono</label>
											<span class="mdl-textfield__error">Abono Invalido</span>
										</div>
									</div>


									<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
											<input class="mdl-textfield__input" type="number" pattern="-?[0-9]*(\.[0-9]+)?" id="saldo" name="saldo" readonly
											<label class="mdl-textfield__label" for="abono">Saldo</label>
											<span class="mdl-textfield__error">Saldo Invalido</span>
										</div>
									</div>




								</div>
								<p class="text-center">
									<button id="button-Rabono" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary button-Rabono" value="res-registrar-abono">
										<i class="zmdi zmdi-plus"></i>
									</button>
									<div class="mdl-tooltip" for="btn-addCompany">Agregar Abono</div>
								</p>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	

		<a href="#" class="scrollup"><i class="fa fa-arrow-circle-up"></i></a>
</body>		
		<!-- jQuery Library -->
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

</html>


<!----VALIDACION PERFECTA FULL HD 4K----->
<script type="text/javascript">

$(document).ready(function(){
		$('#button-Rabono').click(function(){
			alert('llega')

			if($('#slcusuario').val()==""){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes seleccionar el usuario!',
					})
					return false;
			}
			else if($('#slcpago').val()==""){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes seleccionar un pago!',
					})
					return false;
			}
			else if($('#fecha').val()==""){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes ingresar la fecha!',
					})
					return false;
			}
			else if($('#deuda').val()==""){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes ingresar la deuda!',
					})
					return false;
			}
			else if($('#abono').val()==""){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes ingresar un valor a abonar!',
					})
					return false;
			}if($('#saldo').val()==""){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes ingresar el saldo!',
					})
					return false;
			}else
				swal({
					title: "Hecho!",
					text: "Se ha registrado correctamente",
					icon: "success",
					button: "Continuar",
				});
		});
	});

	

</script>

