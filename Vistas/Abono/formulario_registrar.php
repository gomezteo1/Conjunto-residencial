<!DOCTYPE html>
<html lang="en-US">
<head>
	<title>Registrar Abonos</title>
</head>
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
			                            <legend class="text-condensedLight"><i class="zmdi zmdi-border-color"></i> &nbsp; Información Basica</legend><br>
			                        </div>
									<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
															<?php
															$llenar_select_pago="si";
																require("Controladores/Pago_Controlador.php");
															?>
											<label class="mdl-textfield__label" for="Serial Pago"></label>
											<span class="mdl-textfield__error">Serial Pago</span>
										</div>
									</div>

								
									<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
											<input class="mdl-textfield__input" type="number"  pattern="^[0-9]" min="0" step="1" id="deuda" name="deuda" placeholder="Aqui estará su deuda al seleccionar el codigo de pago" readonly>
											<label class="mdl-textfield__label" for="Deuda"></label>
											<span class="mdl-textfield__error">Deuda Invalida</span>
										</div>
									</div>

									<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
											<input class="mdl-textfield__input" type="number"  pattern="^[0-9]" min="0" step="1" id="abono" name="abono"
												onkeypress="calcular_total()"
												onkeyup="calcular_total()"
												onkeydown="calcular_total()">
											<label class="mdl-textfield__label" for="abono">Abono</label>
											<span class="mdl-textfield__error">Abono Invalido</span>
										</div>
									</div>

									<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
											<input class="mdl-textfield__input" type="number"  pattern="^[0-9]" min="0" step="1" id="saldo" name="saldo" readonly>
											<label class="mdl-textfield__label" for="Saldo">Saldo</label>
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
</html>

<script type="text/javascript">

$(document).ready(function(){
		$('#button-Rabono').click(function(){
			var deudaRango = $('#deuda').val();
			var abonoRango = $('#abono').val();
			var saldoRango = $('#saldo').val();
			var pagoRango = $('#slcpago').val();
			if(pagoRango ==undefined || pagoRango =="" ){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes Ingresar El Pago!',
				})
				return false;
			}else if(deudaRango==""){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes Ingresar La Deuda!',
					})
					return false;
			}else if(deudaRango==0) {
				Swal.fire({
				icon: 'error',
				title: 'Error',
				text: 'No hay Deuda',
				})
				return false;
			}
			 else if(abonoRango==""){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes Ingresar Un Valor A Abonar!',
					})
					return false;
			}else if (abonoRango <= 0) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'El Abono No Debe Tener Caracteres Negativos',
           		 })
       	    	 return false;
       		}else if(abonoRango.length<=3 || abonoRango.length>=10) {
				Swal.fire({
				icon: 'error',
				title: 'Error',
				text: 'El Abono Debe Tener De 4 A 9 Caracteres',
				})
				return false;
			}else if(saldoRango==""){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes Ingresar El Saldo!',
					})
					return false;
			}else if (saldoRango <= 0) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'El Saldo No Debe Tener Caracteres Negativos',
				})
				return false;
			 }
			else{
				swal({
					title: "Hecho!",
					text: "Se Ha Registrado Correctamente",
					icon: "success",
					button: "Continuar",
				});
			}	
		});
	});

	

</script>

