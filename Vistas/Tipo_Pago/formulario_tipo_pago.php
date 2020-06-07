<!DOCTYPE html>
<html lang="es">
<head>
	<title>Tipo pago</title>
</head>
<body>
	<div id="registrar-tipo_pago">								
		<form action="Controladores/Tipo_Pago_Controlador.php" method="POST" id="res-registrar-tipo_pago" data-toggle="validator" class="popup-form">
        	<input type='hidden' name='action' value='registrar_tipoPago'>    
			<section class="full-width header-well">
				<div class="full-width header-well-icon">
					<i class="zmdi zmdi-washing-machine"></i>
				</div>
				<div class="full-width header-well-text" align="left">
					<p class="text-condensedLight">
						Registrar Tipo Pago
					</p>
				</div>
			</section>
			<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
				
				<div class="mdl-tabs__panel is-active" id="tabNewProduct">
					<div class="mdl-grid">
						<div class="mdl-cell mdl-cell--12-col">
							<div class="full-width panel mdl-shadow--2dp">
								<div class="full-width panel-tittle bg-primary text-center tittles">
									Tipo De Pago
								</div>
								<div class="full-width panel-content">
									
									<div class="mdl-grid">
										<div class="mdl-cell mdl-cell--12-col">
											<legend class="text-condensedLight"><i class="zmdi zmdi-border-color"></i> &nbsp; Información Basica</legend><br>
										</div>
										<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="tipo_pago" name="tipo_pago" required>
												<label class="mdl-textfield__label" for="Tipo De Pago">Tipo De Pago</label>
												<span class="mdl-textfield__error">Tipo De Pago Invalido</span>
											</div>
										</div>
										
										<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="textarea" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="descripcion" name="descripcion" required>
												<label class="mdl-textfield__label" for="Descripción">Descripción</label>
												<span class="mdl-textfield__error">Descripción Invalida</span>
											</div>
										</div>
									</div>
									<p class="text-center">
										<button id="button-RTipo_pago" value="res-registrar-tipo_pago" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" type="submit">
											<i class="zmdi zmdi-plus"></i>
										</button>
										<div class="mdl-tooltip" for="btn-tipo-pago">Agregar Tipo De Pago</div>
									</p>
									
								</div>
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



<!----VALIDACION PERFECTA FULL HD 4K----->
<script type="text/javascript">

$(document).ready(function(){
		$('#button-RTipo_pago').click(function(){

		var tipoPagoRango = $('#tipo_pago').val();
		var descripcionRango = $('#descripcion').val()

			if(tipoPagoRango==""){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes Ingresar El Tipo De Pago!',
					})
					return false;
			}
			else if(tipoPagoRango.length<=4 || tipoPagoRango.length>=17) {
					Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Tipo Pago Debe Tener 5 A 17 Caracteres',
					})
					return false;
			}
			else if(descripcionRango==""){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes Ingresar La Descripción!',
					})
					return false;
			}
			else if(descripcionRango.length<=4 || descripcionRango.length>=41) {
					Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Descripcion Debe Tener 5 A 40 Caracteres',
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
