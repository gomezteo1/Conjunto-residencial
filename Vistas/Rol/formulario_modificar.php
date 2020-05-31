


<!DOCTYPE html>
<html lang="es">
<head>
	<title>Rol</title>
</head>
<body>
		
		<form action="Controladores/Rol_Controlador.php" method="POST">
		<input type="hidden" name="action" value="modificar_rol">
		
		<section class="full-width header-well">
			<div class="full-width header-well-icon">
				<i class="zmdi zmdi-washing-machine"></i>
			</div>
			<div class="full-width header-well-text" align="left">
				<p class="text-condensedLight">
				Modificar Rol
				</p>
			</div>
		</section>
		<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
			
			<div class="mdl-tabs__panel is-active" id="tabNewProduct">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--12-col">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle bg-primary text-center tittles">
								Rol
							</div>
							<div class="full-width panel-content">
								
									<div class="mdl-grid">
										<div class="mdl-cell mdl-cell--12-col">
									        <legend class="text-condensedLight"><i class="zmdi zmdi-border-color"></i> &nbsp; Información Basica</legend><br>
									    </div>

									    <input value="<?php echo $rol->id_rol ?>" name="id_rol" id="id_rol" placeholder="Desactivar estado en 0" class="w3-input" type="text"  hidden> 
										
									   

										<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="rol" name="rol" value="<?php echo $rol->rol ?>">
												<label class="mdl-textfield__label" for="Rol">Rol</label>
												<span class="mdl-textfield__error">Rol invalido</span>
											</div>
										</div>
										

										
										
											<input value="<?php echo $rol->estado ?>" name="estado" id="estado" placeholder="Desactivar estado en 0" class="w3-input" type="text"  hidden> 


									</div>
									<p class="text-center">
										<button id="button-Mrol" name="button-Mrol" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" type="submit" >
											<i class="zmdi zmdi-plus"></i>
										</button>
										<div class="mdl-tooltip" for="btn-addRol">Modificar Rol</div>
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
		$('#button-Mrol').click(function(){

			if($('#rol').val()==""){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes Ingresar El Rol!',
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

