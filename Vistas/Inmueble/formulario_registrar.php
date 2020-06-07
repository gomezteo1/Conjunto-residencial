
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Registrar Inmueble</title>
</head>
<body>
		<div id="registrar-inmueble">	
		<form action="Controladores/Inmueble_Controlador.php" method="POST" id="res-registrar-inmueble">
		<input  type="hidden" name="action" value="registrar_inmueble">
		
		<section class="full-width header-well">
			<div class="full-width header-well-icon">
				<i class="zmdi zmdi-washing-machine"></i>
			</div>
			<div class="full-width header-well-text" align="left">
				<p class="text-condensedLight">
					Registrar Inmueble
				</p>
			</div>
		</section>
		<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
			
			<div class="mdl-tabs__panel is-active" id="tabNewProduct">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--12-col">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle bg-primary text-center tittles">
								 Inmueble
							</div>
							<div class="full-width panel-content">
								
									<div class="mdl-grid">
										<div class="mdl-cell mdl-cell--12-col">
									        <legend class="text-condensedLight"><i class="zmdi zmdi-border-color"></i> &nbsp; Información Basica</legend><br>
									    </div>


										<div class="mdl-cell mdl-cell--8-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="number" pattern="-?[0-9- ]*(\.[0-9]+)?" id="numero_matricula" name="numero_matricula" >
												<label class="mdl-textfield__label" for="Numero Matricula">Numero Matricula</label>
												<span class="mdl-textfield__error">Numero De Matricula Invalido</span>
											</div>
										</div>

										<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="tipo" name="tipo" >
												<label class="mdl-textfield__label" for="Tipo">Tipo De Inmueble</label>
												<span class="mdl-textfield__error">Tipo De Inmueble Invalido</span>
											</div>
										</div>

										<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="torre" name="torre" >
												<label class="mdl-textfield__label" for="Torre">Tipo De Inmueble</label>
												<span class="mdl-textfield__error">Torre Invalido</span>
											</div>
										</div>
										
										<div class="mdl-cell mdl-cell--8-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="number" pattern="-?[0-9- ]*(\.[0-9]+)?" id="numero" name="numero" >
												<label class="mdl-textfield__label" for="Numero">Numero Inmueble</label>
												<span class="mdl-textfield__error">Numero De Inmueble Invalido</span>
											</div>
										</div>

										<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="metros" name="metros" >
												<label class="mdl-textfield__label" for="metros">Metros Cuadrados</label>
												<span class="mdl-textfield__error">Tipo De Inmueble Invalido</span>
											</div>
										</div>

									</div>
									<p class="text-center">
										<button id="button-Rinmueble" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" type="submit">
											<i class="zmdi zmdi-plus"></i>
										</button>
										<div class="mdl-tooltip" for="btn-addProduct">Agregar Inmueble</div>
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
		$('#button-Rinmueble').click(function(){

			var numeroMatriculaRango = $('#numero_matricula').val();
			var tipoRango = $('#tipo').val();
			var torreRango = $('#torre').val();
			var numeroRango = $('#numero').val();
			var metrosRango = $('#metros').val();
	
			if(numeroMatriculaRango==""){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes Ingresar El Numero De La Matricula!',
				})
				return false;
			}else if(numeroMatriculaRango.length<=5 || numeroMatriculaRango.length>=10) {
				Swal.fire({
				icon: 'error',
				title: 'Error',
				text: 'La Matricula Debe Tener 6 A 9 Caracteres',
				})
				return false;
			}else if(tipoRango==""){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes Ingresar El Tipo De Apartamento!',
					})
					return false;
			}else if(tipoRango.length<=7 || tipoRango.length>=25) {
				Swal.fire({
				icon: 'error',
				title: 'Error',
				text: 'El Tipo De Apartamento Debe Tener 8 A 24 Caracteres',
				})
				return false;
			}else if(torreRango==""){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes Ingresar La Torre!',
					})
					return false;
			}else if(torreRango.length<=0 || torreRango.length>=10) {
				Swal.fire({
				icon: 'error',
				title: 'Error',
				text: 'La Torre Debe Tener 1 A 9 Caracteres',
				})
				return false;
			}else if(numeroRango==""){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes Ingresar El Numero Del Inmueble!',
					})
					return false;
			}else if(numeroRango.length<=2 || numeroRango.length>=5) {
				Swal.fire({
				icon: 'error',
				title: 'Error',
				text: 'El Numero De Inmueble Debe Tener 3 A 4 Caracteres',
				})
				return false;
			}else if(metrosRango==""){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes Ingresar Los Metros Del Inmueble!',
					})
					return false;
			}else if(metrosRango.length<=0 || metrosRango.length>=4) {
				Swal.fire({
				icon: 'error',
				title: 'Error',
				text: 'Los Metros Del Inmueble Debe Tener 1 A 4 Caracteres',
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

