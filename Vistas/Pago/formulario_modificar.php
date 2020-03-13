<!DOCTYPE html>
<html lang="es">
<head>
	<title>Pago M</title>
</head>
<body>
		
		<form action="Controladores/Pago_Controlador.php" method="POST">
		<input type="hidden" name="action" value="modificar_pago">
		
		<section class="full-width header-well">
			<div class="full-width header-well-icon">
				<i class="zmdi zmdi-washing-machine"></i>
			</div>
			<div class="full-width header-well-text" align="left">
				<p class="text-condensedLight">
					Modificar Pago
				</p>
			</div>
		</section>
		<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
			
			<div class="mdl-tabs__panel is-active" id="tabNewProduct">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--12-col">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle bg-primary text-center tittles">
								 Pago
							</div>
							<div class="full-width panel-content">
								
									<div class="mdl-grid">
										<div class="mdl-cell mdl-cell--12-col">
									        <legend class="text-condensedLight"><i class="zmdi zmdi-border-color"></i> &nbsp; Información basica</legend><br>
									    </div>

									    <input value="<?php echo $pago->codigo_pago ?>" name="codigo_pago" id="codigo_pago" class="w3-input" type="number" hidden> 

										

										<?php
											$llenar_select_cuenta_cobro="si";
											require("Controladores/Cuenta_cobro_Controlador.php"
											);
										?>		

										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
											<input readonly class="mdl-textfield__input" type="date" id="fecha" name="fecha" value="<?php echo $pago->fecha ?>">
											<label class="mdl-textfield__label"  for="fecha_"></label>
											<span class="mdl-textfield__error">Fecha Invalida</span>
										</div>	

										<?php
														
											$llenar_select_tipo_pago="si";
											require("Controladores/Tipo_Pago_Controlador.php");
										?>

										<div class="mdl-cell mdl-cell--8-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="number" pattern="-?[0-9- ]*(\.[0-9]+)?" id="monto_cancelado" name="monto_cancelado" value="<?php echo $pago->monto_cancelado ?>">
												<label class="mdl-textfield__label" for="monto_cancelado"># monto_cancelado</label>
												<span class="mdl-textfield__error">Numero de monto_cancelado equivocado</span>
											</div>
										</div>
										

										<div class="mdl-cell mdl-cell--8-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="number" pattern="-?[0-9- ]*(\.[0-9]+)?" id="monto_a_pagar" name="monto_a_pagar" value="<?php echo $pago->monto_a_pagar ?>">
												<label class="mdl-textfield__label" for="monto_cancelado"># monto a pagar </label>
												<span class="mdl-textfield__error">Numero de monto a pagar equivocado</span>
											</div>
										</div>
										


									</div>
									<p class="text-center">
										<button id="button-Mpago" name="button-Mpago" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" type="submit" >
											<i class="zmdi zmdi-plus"></i>
										</button>
										<div class="mdl-tooltip" for="btn-addProduct">Agregar Pago</div>
									</p>
								
							</div>
						</div>
					</div>
				</div>
			</div>
			</form>
			<div class="mostrar"></div>
		</div>



</body>
<script src="js/pago.js"></script>

<script src="js/usuario.js"></script>
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




<!----VALIDACION PERFECTA FULL HD 4K----->
<script type="text/javascript">

$(document).ready(function(){
		$('#button-Mpago').click(function(){

			if($('#fecha').val()==""){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes ingresar la fecha!',
					})
					return false;
			}
			else if($('#monto_cancelado').val()==""){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes ingresar el monto cancelado!',
					})
					return false;
			}
			else if($('#monto_a_pagar').val()==""){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes ingresar el monto a pagar!',
					})
					return false;
			}
			else
				swal({
					title: "Hecho!",
					text: "Se ha actualizado correctamente",
					icon: "success",
					button: "Continuar",
				});
		});
	});

	

</script>









