<!DOCTYPE html>
<html lang="es">
<head>
	<title>Tipo Pago </title>
</head>
<body>
				
				<form action="Controladores/Tipo_Pago_Controlador.php" method="POST" data-toggle="validator" class="popup-form">
				<input type='hidden' name='action' value='modificar_tipo_pago'>       
		
		<section class="full-width header-well">
			<div class="full-width header-well-icon">
				<i class="zmdi zmdi-washing-machine"></i>
			</div>
			<div class="full-width header-well-text" align="left">
				<p class="text-condensedLight">
					Modificar Tipo De Pago
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


									    <input hidden readonly name='codigo_tipo_pago' id='codigo_tipo_pago'   value='<?php echo $_GET['codigo_tipo_pago'] ?>'  type="text" > 

										<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="tipo_pago" name="tipo_pago" value='<?php echo $tipo_pago->tipo_pago; ?>'>
												<label class="mdl-textfield__label" for="Tipo De Pago">Tipo De Pago</label>
												<span class="mdl-textfield__error">Tipo De Pago Invalido</span>
											</div>
										</div>
										
										<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="descripcion" name="descripcion" value='<?php echo $tipo_pago->descripcion; ?>'>
												<label class="mdl-textfield__label" for="Descripción">Descripción</label>
												<span class="mdl-textfield__error">Descripción Invalida</span>
											</div>
										</div>

										

									</div>
									<p class="text-center">
										<button id="button-MTipo_pago button-Mcc" name="button-Mcc" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary button-RPago " value="res-registrar-tipo_pago" type="submit">
											<i class="zmdi zmdi-plus"></i>
										</button>
										<div class="mdl-tooltip" for="btn-tipo-pago">Modificar Tipo De Pago</div>
									</p>

								
								
							</div>
						</div>
					</div>
				</div>
			</div>
			</form>
			
		</div>
	</div>


</body>
</html>

<!----VALIDACION PERFECTA FULL HD 4K----->
<script type="text/javascript">

$(document).ready(function(){
		$('#button-MTipo_pago').click(function(){

			if($('#tipo_pago').val()==""){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes Ingresar El Tipo De Pago!',
					})
					return false;
			}
			else if($('#descripcion').val()==""){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes Ingresar La Descripción!',
					})
					return false;
			}
			else
				swal({
					title: "Hecho!",
					text: "Se Ha Actualizado Correctamente",
					icon: "success",
					button: "Continuar",
				});
		});
	});

	

</script>

