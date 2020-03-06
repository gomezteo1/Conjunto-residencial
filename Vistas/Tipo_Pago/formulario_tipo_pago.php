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
								Tipo Pago
							</div>
							<div class="full-width panel-content">
								
									<div class="mdl-grid">
										<div class="mdl-cell mdl-cell--12-col">
									        <legend class="text-condensedLight"><i class="zmdi zmdi-border-color"></i> &nbsp; Información basica</legend><br>
									    </div>
										<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="tipo_pago" name="tipo_pago" required>
												<label class="mdl-textfield__label" for="tipo_pago">Tipo pago</label>
												<span class="mdl-textfield__error">Tipo pago invalido</span>
											</div>
										</div>
										
										<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="descripcion" name="descripcion" required>
												<label class="mdl-textfield__label" for="descripcion">Descripcion</label>
												<span class="mdl-textfield__error">Descripcion invalido</span>
											</div>
										</div>

										

									</div>
									<p class="text-center">
										<button id="button-RTipo_pago" type="submit" class="btn-primary" value="res-registrar-tipo_pago" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" type="submit">
											<i class="zmdi zmdi-plus"></i>
										</button>
										<div class="mdl-tooltip" for="btn-tipo-pago">Agregar tipo de pago</div>
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
		$('#button-RTipo_pago').click(function(){

			if($('#tipo_pago').val()==""){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes ingresar el tipo de pago!',
					})
					return false;
			}
			else if($('#descripcion').val()==""){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes ingresar la descripcion!',
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
