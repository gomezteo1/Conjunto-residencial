

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1"/>
	<title>Rol</title>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<meta name="description" content="Add your business website description here">
	<meta name="keywords" content="Add your business website keywords here">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
		<div id="registrar-rol">	
		<form action="Controladores/Rol_Controlador.php" method="POST" id="res-registrar-rol">
		<input  type="hidden" name="action" value="registrar_rol">
		
		<section class="full-width header-well">
			<div class="full-width header-well-icon">
				<i class="zmdi zmdi-washing-machine"></i>
			</div>
			<div class="full-width header-well-text" align="left">
				<p class="text-condensedLight">
					Registrar Rol
				</p>
			</div>
		</section>
		
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
										<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="rol" name="rol" required>
												<label class="mdl-textfield__label" for="Rol">Rol</label>
												<span class="mdl-textfield__error">Rol invalido</span>
											</div>
										</div>
										
										
										

									</div>
									<p class="text-center">
										<button id="button-Rrol" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" type="submit">
											<i class="zmdi zmdi-plus"></i>
										</button>
										<div class="mdl-tooltip" for="btn-addRol">Agregar Rol</div>
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
		$('#button-Rrol').click(function(){

	var rolRango = $('#rol').val();
	
	if(rolRango==""){
		Swal.fire({
			icon: 'error',
			title: 'Error',
			text: 'Debes Ingresar El Rol!',
			})
			return false;
	}
	else if(rolRango.length<=7 || rolRango.length>=25) {
			Swal.fire({
			icon: 'error',
			title: 'Error',
			text: 'El Rol Debe Tener 8 A 24 Caracteres',
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