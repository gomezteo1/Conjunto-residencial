<!DOCTYPE html>
<html lang="en">
<head>
	<title>Modificar Abonos</title>
</head>

<body>
<section class="full-width header-well">
			<div class="full-width header-well-icon">
				<i class="zmdi zmdi-washing-machine"></i>
			</div>
			<div class="full-width header-well-text" align="left">
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
					<input type='hidden' name='action' value='modificar_abono'>	
						<div class="mdl-grid">
								<div class="mdl-cell mdl-cell--12-col">
		                            <legend class="text-condensedLight"><i class="zmdi zmdi-border-color"></i> &nbsp; Información Basica</legend><br>
								</div>
								
								<div class="mdl-cell mdl-cell--12-col">
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<input class="mdl-textfield__input" type="number"  pattern="^[0-9]" min="0" step="1" id="codigo_abono" name="codigo_abono" value="<?php echo $abono->codigo_abono ?>" readonly>
										<label class="mdl-textfield__label"  for="Serial Abono"></label>
										<span class="mdl-textfield__error">Serial A. Invalido</span>
									</div>
								</div>

								<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
														<?php
														$llenar_select_pago="si";
															require("Controladores/Pago_Controlador.php");
														?>
										<label class="mdl-textfield__label" for="Pago"></label>
										<span class="mdl-textfield__error">Numero Invalido</span>
									</div>
								</div>


								 <div class="mdl-cell mdl-cell--12-col " >
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<input readonly class="mdl-textfield__input" type="date" id="fecha" name="fecha" value="<?php echo $abono->fecha ?>">
										<label class="mdl-textfield__label"  for="Fecha"></label>
										<span class="mdl-textfield__error">Fecha Invalida</span>
									</div>
								</div> 
								<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<input class="mdl-textfield__input" type="number"  pattern="^[0-9]" min="0" step="1" id="deuda" name="deuda" value="<?php echo $abono->dueda ?>" placeholder="Aqui Estará Su Deuda al Seleccionar El Codigo De Pago" readonly>
										<label class="mdl-textfield__label" for="Deuda"></label>
										<span class="mdl-textfield__error">Deuda Invalida</span>
									</div>
								</div>

								<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<input class="mdl-textfield__input" type="number"  pattern="^[0-9]" min="0" step="1" id="abono" name="abono" value="<?php echo $abono->abono ?>" placeholder="Digite el Valor a Abonar"
											onkeypress="calcular_total()"
											onkeyup="calcular_total()"
											onkeydown="calcular_total()">
										<label class="mdl-textfield__label" for="Abono">Abono</label>
										<span class="mdl-textfield__error">Abono Invalido</span>
									</div>
								</div>


								<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<input class="mdl-textfield__input" type="number"  pattern="^[0-9]" min="0" step="1" id="saldo" name="saldo"  value="<?php echo $abono->saldo ?>" readonly>
										<label class="mdl-textfield__label" for="Saldo">Saldo</label>
										<span class="mdl-textfield__error">Saldo Invalido</span>
									</div>
								</div>											
													<span class="sub-text">* Campos Obligatorios</span>
													<div class="clearfix"></div>
												</div><!-- end row -->
											
											<p class="text-center">
											<button id="button-Rabono" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary button-Rabono" value="res-registrar-abono">
												<i class="zmdi zmdi-plus"></i>
											</button>
										<div class="mdl-tooltip" for="btn-addProduct">Modificar Abono</div>
									</p>

								</div>
							</div><!--End row -->
							</form>
							<div class="mostrar"></div>
						</div>
						<!-- Popup end -->
							
						</div><!-- end item-wrap -->
					</div><!--End col -->
				</div><!--End tab-content -->
			</div><!--End row -->
		</div><!--End container -->
	</section>
</body>
</html>


<script type="text/javascript">

$(document).ready(function(){
		$('#button-Rabono').click(function(){
			// alert('llega')
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
			 }else if(abonoRango==""){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes Ingresar Un Valor A Abonar!',
					})
					return false;
			}else if(abonoRango.length<=3 || abonoRango.length>=10) {
				Swal.fire({
				icon: 'error',
				title: 'Error',
				text: 'El Abono Debe Tener De 4 A 9 Caracteres',
				})
				return false;
			}
			else if(saldoRango==""){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes Ingresar El Saldo!',
					})
					return false;
			}else if(saldoRango.length<=-1 || saldoRango.length>=3) {
				Swal.fire({
				icon: 'error',
				title: 'Error',
				text: 'El Saldo No Puede Ser Menor A Cero',
				})
				return false;
			}else
				swal({
					title: "Hecho!",
					text: "Se Ha Registrado Correctamente",
					icon: "success",
					button: "Continuar",
				});
		});
	});

	

</script>