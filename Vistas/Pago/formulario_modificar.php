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
									        <legend class="text-condensedLight"><i class="zmdi zmdi-border-color"></i> &nbsp; Información Basica</legend><br>
									    </div>
									    <input value="<?php echo $pago->codigo_pago ?>" name="codigo_pago" id="codigo_pago" class="w3-input" type="number" hidden> 
										<?php
											$llenar_select_cuenta_cobro="si";
											require("Controladores/Cuenta_cobro_Controlador.php"
											);
										?>		
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
											<input readonly class="mdl-textfield__input" type="date" id="fecha" name="fecha" value="<?php echo $pago->fecha ?>">
											<label class="mdl-textfield__label"  for="Fecha_"></label>
											<span class="mdl-textfield__error">Fecha Invalida</span>
										</div>	
										<?php
											$llenar_select_tipo_pago="si";
											require("Controladores/Tipo_Pago_Controlador.php");
										?>
										<div class="mdl-cell mdl-cell--8-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="number"  pattern="^[0-9]" min="0" step="1" id="monto_cancelado" name="monto_cancelado" value="<?php echo $pago->monto_cancelado ?>">
												<label class="mdl-textfield__label" for="Monto Cancelado">Numero Monto Cancelado</label>
												<span class="mdl-textfield__error">Numero Monto Cancelado Equivocado</span>
											</div>
										</div>
										<div class="mdl-cell mdl-cell--8-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="number"  pattern="^[0-9]" min="0" step="1" id="monto_a_pagar" name="monto_a_pagar" value="<?php echo $pago->monto_a_pagar ?>" readonly>
												<label class="mdl-textfield__label" for="Monto A Pagar">Deuda </label>
												<span class="mdl-textfield__error">Numero Monto A Pagar Equivocado</span>
											</div>
										</div>
									</div>
									<p class="text-center">
										<button id="button-Rpago" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" type="submit">
												<i class="zmdi zmdi-plus"></i>
										</button>
										<div class="mdl-tooltip" for="btn-addProduct">Modificar Pago</div>
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
</html>
<script type="text/javascript">
$(document).ready(function(){
	$('#button-Rpago').click(function(){
			var monto_canceladoRango = $('#monto_cancelado').val();
			var monto_a_pagarRango = $('#monto_a_pagar').val();
			var cuentaCobroRango = $('#slccuenta_cobro').val();
			var tipoPagoRango = $('#slctipo_pago').val();
			if(monto_a_pagarRango < monto_canceladoRango){
				Swal.fire({
				icon: 'error',
				title: 'Error',
				text: 'El Monto No Puede Ser Superior A La Deuda',
				})
				return false;
			}
			else if(cuentaCobroRango==undefined || cuentaCobroRango=="" ){
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
			}else if (monto_canceladoRango <= 0) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'El Monto Cancelado No Debe Tener Caracteres Negativos',
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
			}else if (monto_a_pagarRango <= 0) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'El Monto A Pagar No Debe Tener Caracteres Negativos',
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








