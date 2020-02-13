<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1"/>
	
	<title>Modificar abonos</title>
	<!-- set your website meta description and keywords -->
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<meta name="description" content="Add your business website description here">
	<meta name="keywords" content="Add your business website keywords here">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	<!-- set your website favicon -->
	<link href="favicon.html" rel="icon">	
	
	<!-- Bootstrap Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Font Awesome Stylesheets -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Template Main Stylesheets -->
	<link rel="stylesheet" href="css/contact-form.css" type="text/css">	

	<style type="text/css">
		.ww{ position: relative; box-shadow: 5px 5px 10px black; /*box-shadow: 1px 2px 4px rgba(0, 0, 0, .5);*/ padding: 10px; background: white;}
	</style>
	

</head>

<body>

<div id="modificar-abono">
<form action='Controladores/Abono_Controlador.php' method='POST' id="res-modificar-abono">
<input type='hidden' name='action' value='modificar_abono'>
	
	<section id="contact-form-section" class="form-content-wrap">
		<div class="container">
			<div class="row">
				<div class="tab-content">
					<div class="col-sm-12">
						<div class="item-wrap ww">
							<div class="row ">
								
								<div class="col-md-12">
								
								
								
<div id="modificar-abono">
<form action='Controladores/Abono_Controlador.php' method='POST' id="res-modificar-abono">
<input type='hidden' name='action' value='modificar_abono'>

<section class="full-width header-well">
			<div class="full-width header-well-icon">
				<i class="zmdi zmdi-balance"></i>
			</div>
			<div class="full-width header-well-text">
				<p class="text-condensedLight">
					Modificar Abono
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
					<form action='Controladores/Abono_Controlador.php' method='POST' id="res-registrar-abono">
							<div class="mdl-grid">
								<div class="mdl-cell mdl-cell--12-col">
		                            <legend class="text-condensedLight"><i class="zmdi zmdi-border-color"></i> &nbsp; Modificar Abono</legend><br>
								</div>
								
								<div class="mdl-cell mdl-cell--12-col">
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<input class="mdl-textfield__input" type="number" id="codigo_abono" name="codigo_abono" value="<?php echo $abono->codigo_abono ?>" readonly>
										<label class="mdl-textfield__label"  for="codigo_abono"></label>
										<span class="mdl-textfield__error">Codigo A. Invalido</span>
									</div>
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
										<input class="mdl-textfield__input" type="date" id="fecha" name="fecha" value="<?php echo $abono->fecha ?>">
										<label class="mdl-textfield__label"  for="fecha"></label>
										<span class="mdl-textfield__error">Fecha Invalida</span>
									</div>
								</div>
								<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<input class="mdl-textfield__input" type="number"  pattern="-?[0-9]*(\.[0-9]+)?" id="deuda" name="deuda" value="<?php echo $abono->dueda ?>" placeholder="Aqui estará su deuda al seleccionar el codigo de pago" readonly>
										<label class="mdl-textfield__label" for="deuda"></label>
										<span class="mdl-textfield__error">Deuda Invalida</span>
									</div>
								</div>

								<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<input class="mdl-textfield__input" type="number" pattern="-?[0-9]*(\.[0-9]+)?" id="abono" name="abono" value="<?php echo $abono->abono ?>" placeholder="Digite el valor a abonar"
											onkeypress="calcular_total()"
											onkeyup="calcular_total()"
											onkeydown="calcular_total()">
										<label class="mdl-textfield__label" for="abono">Abono</label>
										<span class="mdl-textfield__error">Abono Invalido</span>
									</div>
								</div>


								<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<input class="mdl-textfield__input" type="number" pattern="-?[0-9]*(\.[0-9]+)?" id="saldo" name="saldo"  value="<?php echo $abono->saldo ?>" readonly>
										<label class="mdl-textfield__label" for="abono">Saldo</label>
										<span class="mdl-textfield__error">Saldo Invalido</span>
									</div>
								</div>											
													<span class="sub-text">* Campos obligatorio</span>
													<div class="clearfix"></div>
												</div><!-- end row -->
											</form><!-- end form -->
											<input algin="center" type='submit' id="button-Mabono" name="button-Mabono" value='Guardar'>
							
								</div>
							</div><!--End row -->
							</form>
						</div>
							
						
								
							
							<!-- Popup end -->
							
						</div><!-- end item-wrap -->
					</div><!--End col -->
				</div><!--End tab-content -->
			</div><!--End row -->
		</div><!--End container -->
	</section>
	
<div class="colBottomMargin">
		&nbsp;<div class="colBottomMargin">&nbsp;</div>
	</div>	
	
	
	
	<a href="#" class="scrollup"><i class="fa fa-arrow-circle-up"></i></a>
		
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

	<!---<script src="javascript/funciones.js"> </script>--->
	
</body>
</html>


<!----VALIDACION PERFECTA FULL HD 4K----->
<script type="text/javascript">

$(document).ready(function(){
		$('#button-Mabono').click(function(){

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
			if($('#fecha').val()==""){
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