<!DOCTYPE html>
<html lang="es">
<head>
	<title>Cuenta Cobro R</title>
	</head>
<body>
	<div id="registrar-cuenta_cobro">								
		<form name="frmcuenta_cobro" id="frmcuenta_cobro" method="POST" action=""  
		data-toggle="validator" class="popup-form" >
		<div id="prueba"></div>  
		
			<section class="full-width header-well">
				<div class="full-width header-well-icon">
					<i class="zmdi zmdi-washing-machine"></i>
				</div>
				<div class="full-width header-well-text">
					<p class="text-condensedLight">
						Registrar Cuenta Cobro
					</p>
				</div>
			</section>
			<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
				
				<div class="mdl-tabs__panel is-active" id="tabNewProduct">
					<div class="mdl-grid">
						<div class="mdl-cell mdl-cell--12-col">
							<div class="full-width panel mdl-shadow--2dp">
								<div class="full-width panel-tittle bg-primary text-center tittles">
								Cuenta Cobro
								</div>
								<div class="full-width panel-content">
									<div class="mdl-grid">
										<div class="mdl-cell mdl-cell--12-col">
											<legend class="text-condensedLight"><i class="zmdi zmdi-border-color"></i> &nbsp; Información Basica</legend><br>
										</div>
										<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" name="numero_cuenta" id="numero_cuenta" required>
												<label class="mdl-textfield__label" for="Numero Cuenta">Numero Cuenta</label>
												<span class="mdl-textfield__error">Numero Cuenta Invalido</span>
											</div>
										</div>
										<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" name="nit" id="nit" required>
												<label class="mdl-textfield__label" for="Nit">NIT</label>
												<span class="mdl-textfield__error">Nit Invalido</span>
											</div>
										</div>
										<div>

										<div class="form-group col-sm-8">
																	
										</div><!-- end form-group -->

										<div class="form-group col-sm-12 col-12">
											<?php $llenar_select_usuario_inmueble="si";
											require_once("Controladores/Usuario_Inmueble_Controlador.php");
											?>
										</div><!-- end form-group -->
																			
										<div class="form-group col-sm-8">
																	
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
												<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="monto_por_cancelar" name="monto_por_cancelar" required>
												<label class="mdl-textfield__label" for="Monto Por Cancelar"></label>
												<span class="mdl-textfield__error">Monto por Cancelar</span>
											</div>
										</div>


									</div>
							</div>
								<center>
										<div id="detalle_cuenta_cobro">
										Detalle
										</div>
								</center>
							</div>
						</div>
					</div>
				</div>
			</div>
			</form>
			<div class="row justify-content-center">
				<button class="btn btn-dark" name="btnagregar"  id="btnagregar">Agregar</button>

				<button class=" btn btn-success" name="btnguardar" id="btnguardar">
				Guardar</button>
</div>
			<div class="mostrar"></div>
		</div>
	</div>


</body>


<script type="text/javascript">

$(document).ready(function(){
		$('#btnagregar').click(function(){
			var numeroCuentaRango = $('#numero_cuenta').val();
			var nitRango = $('#nit').val();
			var montoPorCancelarRango = $('#monto_por_cancelar').val();
			// var mesRango = $("#slcmonth option[value="+ value +"]").attr("selected",true);
			
			// if(mesRango==""){
			// 	Swal.fire({
			// 		icon: 'error',
			// 		title: 'Error',
			// 		text: 'Debes Ingresar El Numero De La Cuenta!',
			// 	})
			// 	return false;
			// }else 
			if(numeroCuentaRango==""){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes Ingresar El Numero De La Cuenta!',
				})
				return false;
			}
			else if(numeroCuentaRango.length<=5 || numeroCuentaRango.length>=13) {
				Swal.fire({
				icon: 'error',
				title: 'Error',
				text: 'El Numero De Cuenta Debe Tener 6 A 13 Caracteres',
				})
				return false;
			}else if(nitRango==""){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes Ingresar El Nit!',
					})
					return false;
			}else if(nitRango.length<=7 || nitRango.length>=25) {
				Swal.fire({
				icon: 'error',
				title: 'Error',
				text: 'El Nit Debe Tener 8 A 24 Caracteres',
				})
				return false;
			}else if(montoPorCancelarRango==""){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes Ingresar El Monto!',
					})
					return false;
			}else if(montoPorCancelarRango.length<=0 || montoPorCancelarRango.length>=9) {
				Swal.fire({
				icon: 'error',
				title: 'Error',
				text: 'El Monto Debe Tener 1 A 8 Caracteres',
				})
				return false;
			}
		});
	});
</script>
<!-- Falta que saque la alerta al guardar -->						

<!-- <script>
	$(document).ready(function(){
	$('#btnguardar').click(function(){
		swal({
			title: "Hecho!",
			text: "Se Ha Registrado Correctamente La Cuenta De Cobro",
			icon: "success",
			button: "Continuar",
		});
	});
});	

</script> -->


</html>



