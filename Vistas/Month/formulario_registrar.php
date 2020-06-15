<!DOCTYPE html>
<html lang="es">
<head>
	<title>Mes</title>
</head>
<body>
		<div id="registrar-month">	
		<form action="Controladores/Month_Controlador.php" method="POST" id="res-registrar-month">
		<input  type="hidden" name="action" value="registrar_month">
		
		<section class="full-width header-well">
			<div class="full-width header-well-icon">
				<i class="zmdi zmdi-washing-machine"></i>
			</div>
			<div class="full-width header-well-text" align="left">
				<p class="text-condensedLight">
					Registrar Mes
				</p>
			</div>
		</section>
		<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
			
			<div class="mdl-tabs__panel is-active" id="tabNewProduct">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--12-col">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle bg-primary text-center tittles">
								Mes
							</div>
							<div class="full-width panel-content">
								
									<div class="mdl-grid">
										<div class="mdl-cell mdl-cell--12-col">
									        <legend class="text-condensedLight"><i class="zmdi zmdi-border-color"></i> &nbsp; Información Basica</legend><br>
									    </div>
										
											<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="mes" name="mes" required>
												<label class="mdl-textfield__label" for="Mes">Mes</label>
												<span class="mdl-textfield__error">Mes Invalido</span>
											</div>

										</div>
										<div class="mdl-cell mdl-cell--8-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="number"  pattern="^[0-9]" min="0" step="1" id="tarifa" name="tarifa" required>
												<label class="mdl-textfield__label" for="Tarifa">Tarifa</label>
												<span class="mdl-textfield__error">Farifa Invalido</span>
											</div>
										</div>
										
										<div class="mdl-cell mdl-cell--8-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="number"  pattern="^[0-9]" min="0" step="1" id="porcentaje" name="porcentaje" required>
												<label class="mdl-textfield__label" for="Porcentaje">Porcentaje</label>
												<span class="mdl-textfield__error">Porcentaje Invalido</span>
											</div>
										</div>
									</div>
									<p class="text-center">
										<button id="button-Rmonth" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" type="submit">
											<i class="zmdi zmdi-plus"></i>
										</button>
										<div class="mdl-tooltip" for="btn-addProduct">Agregar Mes</div>
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
		$('#button-Rmonth').click(function(){

			var mesRango = $('#mes').val();
			var tarifaRango = $('#tarifa').val();
			var fechaRango = $('#fecha').val();
			var porcentajeRango = $('#porcentaje').val();
			
			if(mesRango==""){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes Ingresar El Mes!',
					})
					return false;
			}else if(mesRango.length<=4 || mesRango.length>=10) {
				Swal.fire({
				icon: 'error',
				title: 'Error',
				text: 'El Mes Debe Tener 5 A 9 Caracteres',
				})
				return false;
			}else if(tarifaRango==""){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes Ingresar La Tarifa!',
					})
					return false;
			}else if (tarifaRango <= 0) {
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'La Tarifa No Debe Tener Caracteres Negativos',
				})
				return false;
			}else if(tarifaRango.length<=5 || tarifaRango.length>=10) {
				Swal.fire({
				icon: 'error',
				title: 'Error',
				text: 'La Tarifa Debe Tener 6 A 9 Caracteres',
				})
				return false;
			}else if(porcentajeRango==""){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes Ingresar El Porcentaje!',
					})
					return false;
			}else if (porcentajeRango <= 0) {
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'El Porcenaje No Debe Tener Caracteres Negativos',
				})
				return false;
			}else if(porcentajeRango.length<=0 || porcentajeRango.length>=4) {
				Swal.fire({
				icon: 'error',
				title: 'Error',
				text: 'El Porcentaje Debe Tener 1 A 3 Caracteres',
				})
				return false;
			}else if(fecha==""){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes Ingresar La Fecha!',
					})
					return false;
			}else{
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



