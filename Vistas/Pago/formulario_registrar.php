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
									        <legend class="text-condensedLight"><i class="zmdi zmdi-border-color"></i> &nbsp; Información Basica</legend><br>
									    </div>

										
										

										
										<?php
											$llenar_select_cuenta_cobro="si";
											require("Controladores/Cuenta_cobro_Controlador.php"
											);
										?>		
										

										<?php
														
											$llenar_select_tipo_pago="si";
											require("Controladores/Tipo_Pago_Controlador.php");
										?>

										<div class="mdl-cell mdl-cell--8-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="number" pattern="-?[0-9- ]*(\.[0-9]+)?" id="monto_cancelado" name="monto_cancelado" required>
												<label class="mdl-textfield__label" for="Monto Cancelado"> Monto</label>
												<span class="mdl-textfield__error">Numero de Monto Cancelado Invalido</span>
											</div>
										</div>
										

										<div class="mdl-cell mdl-cell--8-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="number" pattern="-?[0-9- ]*(\.[0-9]+)?" id="monto_a_pagar" name="monto_a_pagar" required>
												<label class="mdl-textfield__label" for="Monto a Pagar">Monto a Pagar </label>
												<span class="mdl-textfield__error">Numero de Monto a Pagar Invalido</span>
											</div>
										</div>
									</div>
									<div onmouseover="items_pagos()">
									<p class="text-center">
										<button id="button-Rpago" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" type="submit">
												<i class="zmdi zmdi-plus"></i>
										</button>
										
										<div class="mdl-tooltip" for="btn-addPago">Agregar Pago</div>
									</p>
									<div>
								
								
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

<script type="text/javascript">
	
var Lista = [];

function items_pagos($codigo_cuenta_cobro){


	if($pago=="1"){

		button-Rpago

		var datos = {"codigo_cuenta_cobro":$codigo_cuenta_cobro};
		 if(!Lista.includes(datos)){
            //Si no está un, entonces lo insertamos
            	Lista.push( datos );
        	}
        else{
            //De lo contrario
            console.log("Ese ya está");
        }
	}


}



</script>

<script type="text/javascript">

$(document).ready(function(){
	$('#button-Rpago').click(function(){
			var monto_canceladoRango = $('#monto_cancelado').val();
			var monto_a_pagarRango = $('#monto_a_pagar').val();
			var cuentaCobroRango = $('#slccuenta_cobro').val();
			var tipoPagoRango = $('#slctipo_pago').val();
			
			if(cuentaCobroRango==undefined || cuentaCobroRango=="" ){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes Ingresar La Cuenta De Cobro!',
				})
				return false;
			}else if(tipoPagoRango==undefined || tipoPagoRango=="" ){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes Ingresar El Tipo De Pago!',
				})
				return false;
			}else if(monto_canceladoRango==""){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes Ingresar El Monto Cancelado!',
					})
					return false;
			}else if(monto_canceladoRango.length<=3 || monto_canceladoRango.length>=10) {
				Swal.fire({
				icon: 'error',
				title: 'Error',
				text: 'El Monto Cancelado Debe Tener 4 A 9 Caracteres',
				})
				return false;
			}else if(monto_a_pagarRango==""){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes Ingresar el Monto A Pagar!',
					})
					return false;
			}else if(monto_a_pagarRango.length<=3 || monto_a_pagarRango.length>=10) {
				Swal.fire({
				icon: 'error',
				title: 'Error',
				text: 'El Monto A Pagar Debe Tener 4 A 9 Caracteres',
				})
				return false;
			}else{
				swal({
					title: "Hecho!",
					text: "Se ha Registrado Correctamente",
					icon: "success",
					button: "Continuar",
				});
			}
		}); 
	});

	

</script>