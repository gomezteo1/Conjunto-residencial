<!DOCTYPE html>
<html lang="es">
<head>
	<title>Mes</title>
</head>
<body>
		
		<form action="Controladores/Month_Controlador.php" method="POST">
		<input type="hidden" name="action" value="modificar_month">
		
		<section class="full-width header-well">
			<div class="full-width header-well-icon">
				<i class="zmdi zmdi-washing-machine"></i>
			</div>
			<div class="full-width header-well-text" align="left">
				<p class="text-condensedLight">
					Modificar Mes
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


									    	<input hidden class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="codigo_month" name="codigo_month" value="<?php echo $month->codigo_month  ?>" >

											<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="mes" name="mes" value="<?php echo $month->mes  ?>" >
												<label class="mdl-textfield__label" for="Mes">Mes</label>
												<span class="mdl-textfield__error">Mes invalido</span>
											</div>

										</div>
										<div class="mdl-cell mdl-cell--8-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="number" pattern="-?[0-9- ]*(\.[0-9]+)?" id="tarifa" name="tarifa" value="<?php echo $month->tarifa  ?>">
												<label class="mdl-textfield__label" for="Tarifa">Tarifa</label>
												<span class="mdl-textfield__error">Tarifa Invalida</span>
											</div>
										</div>
										
										<div class="mdl-cell mdl-cell--8-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="number" pattern="-?[0-9- ]*(\.[0-9]+)?" id="porcentaje" name="porcentaje" value="<?php echo $month->porcentaje  ?>">
												<label class="mdl-textfield__label" for="Porcentaje">Porcentaje</label>
												<span class="mdl-textfield__error">Porcentaje Invalido</span>
											</div>
										</div>
										

										
										

									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<input class="mdl-textfield__input" type="date" id="fecha" name="fecha"  readonly value="<?php echo $month->fecha  ?>">
										<label class="mdl-textfield__label"  for="Fecha"></label>
										<span class="mdl-textfield__error">Fecha Invalida</span>
									</div>


									    
									</div>
									<p class="text-center">
										<button id="button-Mmonth" name="button-Mmonth" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" type="submit" >
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



</body>
</html>




<!----VALIDACION PERFECTA FULL HD 4K----->
<script type="text/javascript">

$(document).ready(function(){
		$('#button-Mmonth').click(function(){

			if($('#mes').val()==""){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes ingresar El Mes!',
					})
					return false;
			}
			else if($('#tarifa').val()==""){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes Ingresar La Tarifa!',
					})
					return false;
			}
			else if($('#fecha').val()==""){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes Ingresar La Fecha!',
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





