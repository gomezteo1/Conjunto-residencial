<!DOCTYPE html>
<html lang="es">
<head>
	<title>Documento</title>
</head>
<body>
		<div id="registrar-documento">	
		<form action="Controladores/Tipo_Documento_Controlador.php" method="POST" id="res-registrar-tipo_documento">
		<input  type="hidden" name="action" value="registrar_tipo_documento">
		
		<section class="full-width header-well" align="left">
			<div class="full-width header-well-icon">
				<i class="zmdi zmdi-washing-machine"></i>
			</div>
			<div class="full-width header-well-text" align="left">
				<p class="text-condensedLight">
					Registrar Tipo Documento
				</p>
			</div>
		</section>
		
			<div class="mdl-tabs__panel is-active" id="tabNewProduct">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--12-col">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle bg-primary text-center tittles">
								Tipo Documento
							</div>
							<div class="full-width panel-content">
								
									<div class="mdl-grid">
										<div class="mdl-cell mdl-cell--12-col">
									        <legend class="text-condensedLight"><i class="zmdi zmdi-border-color"></i> &nbsp; Información Basica</legend><br>
									    </div>
										<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="documento" name="documento">
												<label class="mdl-textfield__label" for="Documento">Tipo De Documento</label>
												<span class="mdl-textfield__error">Tipo De Documento Invalido</span>
											</div>
										</div>
										
										
										

									</div>
									<p class="text-center">
										<button id="button-Rtipo_documento" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" type="submit">
											<i class="zmdi zmdi-plus"></i>
										</button>
										<div class="mdl-tooltip" for="btn-addTipo_documento">Agregar Documento</div>
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

<script type="text/javascript">

$(document).ready(function(){
		$('#button-Rtipo_documento').click(function(){

		var documentoRango = $('#documento').val();
	
			if(documentoRango==""){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes Ingresar El Tipo De Documento!',
					})
					return false;
			}
			else if(documentoRango.length<=7 || documentoRango.length>=30) {
					Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Tipo Documento Debe Tener 8 A 29 Caracteres',
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