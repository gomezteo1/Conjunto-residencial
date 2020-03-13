<!DOCTYPE html>
<html lang="es">
<head>
	<title>Pago R</title>
</head>
<body>
		<div id="registrar-pago">	
		<form action="Controladores/Pago_Controlador.php" method="POST" id="res-registrar-pago">
		<input  type="hidden" name="action" value="registrar_pago">
		
		<section class="full-width header-well">
			<div class="full-width header-well-icon">
				<i class="zmdi zmdi-washing-machine"></i>
			</div>
			<div class="full-width header-well-text" align="left">
				<p class="text-condensedLight">
					Registrar Pago
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

										
										

										<?php
											$llenar_select_cuenta_cobro="si";
											require("Controladores/Cuenta_cobro_Controlador.php"
											);
										?>		

										<!-- <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
											<input class="mdl-textfield__input" type="date" id="fecha" name="fecha" required>
											<label class="mdl-textfield__label"  for="fecha"></label>
											<span class="mdl-textfield__error">Fecha Invalida</span>
										</div>	 -->

										<?php
														
											$llenar_select_tipo_pago="si";
											require("Controladores/Tipo_Pago_Controlador.php");
										?>

										<div class="mdl-cell mdl-cell--8-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="number" pattern="-?[0-9- ]*(\.[0-9]+)?" id="monto_cancelado" name="monto_cancelado" required>
												<label class="mdl-textfield__label" for="monto_cancelado"># monto_cancelado</label>
												<span class="mdl-textfield__error">Numero de monto_cancelado equivocado</span>
											</div>
										</div>
										

										<div class="mdl-cell mdl-cell--8-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="number" pattern="-?[0-9- ]*(\.[0-9]+)?" id="monto_a_pagar" name="monto_a_pagar" required>
												<label class="mdl-textfield__label" for="monto_cancelado"># monto a pagar </label>
												<span class="mdl-textfield__error">Numero de monto a pagar equivocado</span>
											</div>
										</div>
									
										


										
									</div>
									<p class="text-center">
										<button id="button-Rpago" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" type="submit">
												<i class="zmdi zmdi-plus"></i>
										</button>
										<div class="mdl-tooltip" for="btn-addPago">Agregar pago</div>
									</p>
								
								
							</div>
						</div>
					</div>
				</div>
			</div>
			</form>
			<div class="mostrar"></div>
		</div>
	</div>


</body>

</html>



<!----VALIDACION PERFECTA FULL HD 4K----->
<script type="text/javascript">

$(document).ready(function(){
		$('#button-Rpago').click(function(){

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
					text: "Se ha registrado correctamente",
					icon: "success",
					button: "Continuar",
				});
		});
	});

	

</script>