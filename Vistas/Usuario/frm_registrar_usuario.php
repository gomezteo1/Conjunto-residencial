<!DOCTYPE html>
<html lang="es">
<head>
	<title>Usuario</title>
</head>
<body>
		<div id="registrar-usuario">	
		<form action="Controladores/Usuario_Controlador.php" method="POST" id="res-registrar-usuario">
		<input  type="hidden" name="action" value="registrar_usuario">
		
		<section class="full-width header-well" align="left">
			<div class="full-width header-well-icon">
				<i class="zmdi zmdi-washing-machine"></i>
			</div>
			<div class="full-width header-well-text">
				
			</div>
		</section>
		
		<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
			
			<div class="mdl-tabs__panel is-active" id="tabNewProduct">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--12-col">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle bg-primary text-center tittles">
								Registrarse
							</div>
							<div class="full-width panel-content">
								
									<div class="mdl-grid">
										<div class="mdl-cell mdl-cell--12-col">
									        <legend class="text-condensedLight"><i class="zmdi zmdi-border-color"></i> &nbsp; Información basica</legend><br>
									    </div>
										<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="nombres" name="nombres" required>
												<label class="mdl-textfield__label" for="nombres">Nombre</label>
												<span class="mdl-textfield__error">Nombre invalido</span>
											</div>
										</div>
										
										<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="apellidos" name="apellidos" required>
												<label class="mdl-textfield__label" for="apellidos">Apellido</label>
												<span class="mdl-textfield__error">Apellido invalido</span>
											</div>
										</div>

										<div class="mdl-cell mdl-cell--12-col">
										    <legend class="text-condensedLight"><i class="zmdi zmdi-border-color"></i> &nbsp; Tipo de documento</legend><br>
										</div>

										<div>
											<?php
												$llenar_select_tipo_documento="si";
												require("Controladores/Tipo_Documento_Controlador.php");
											?>
										</div>

										<div class="mdl-cell mdl-cell--8-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="number" pattern="-?[0-9- ]*(\.[0-9]+)?" id="numero_documento" name="numero_documento" required>
												<label class="mdl-textfield__label" for="numero_documento"># documento</label>
												<span class="mdl-textfield__error">Numero de documento equivocado</span>
											</div>
										</div>
									
										

										<div class="mdl-cell mdl-cell--12-col">
										    <legend class="text-condensedLight"><i class="zmdi zmdi-border-color"></i> &nbsp;Otros Datos</legend><br>
										</div>

										<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="telefono" name="telefono" required>
												<label class="mdl-textfield__label" for="telefono">Telefono</label>
												<span class="mdl-textfield__error">Telefono invalido</span>
											</div>
										</div>

									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<input class="mdl-textfield__input" type="date" id="fecha_nacimiento" name="fecha_nacimiento" required>
										<label class="mdl-textfield__label"  for="fecha_nacimiento"></label>
										<span class="mdl-textfield__error">Fecha Invalida</span>
									</div>

										<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="estado" name="estado" required>
												<label class="mdl-textfield__label" for="estado">Estado</label>
												<span class="mdl-textfield__error">Estado invalido</span>
											</div>
										</div>

										<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ@*\/\-_.]*(\.[0-9]+)?" id="clave" name="clave" required>
												<label class="mdl-textfield__label" for="clave">Clave</label>
												<span class="mdl-textfield__error">Clave invalido</span>
											</div>
										</div>
										<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ@*\/\-_.]*(\.[0-9]+)?" id="correo" name="correo" required>
												<label class="mdl-textfield__label" for="correo">Correo</label>
												<span class="mdl-textfield__error">Correo invalido</span>
											</div>
										</div>
										<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓ@*\/\-_.]*(\.[0-9]+)?" id="correo_recuperacion" name="correo_recuperacion" required>
												<label class="mdl-textfield__label" for="correo_recuperacion">Correo Recuperación</label>
												<span class="mdl-textfield__error">Correo R.invalido</span>
											</div>
										</div>

									</div>
									<p class="text-center">
										<button id="button-Rusuario" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" type="submit">
											<i class="zmdi zmdi-plus"></i>
										</button>
										<div class="mdl-tooltip" for="btn-addProduct">Agregar usuario</div>
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
		$('#button-Rusuario').click(function(){

			if($('#nombres').val()==""){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes ingresar el nombre(s)!',
					})
					return false;
			}
			else if($('#apellidos').val()==""){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes ingresar los apellidos!',
					})
					return false;
			}
			else if($('#numero_documento').val()==""){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes ingresar el numero de documento!',
					})
					return false;
			}else if($('#telefono').val()==""){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes ingresar el telefono!',
					})
					return false;
			}else if($('#fecha_nacimiento').val()==""){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes ingresar la fecha!',
					})
					return false;
			}else if($('#estado').val()==""){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes ingresar su estado!',
					})
					return false;
			}else if($('#clave').val()==""){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes ingresar la contraseña!',
					})
					return false;
			}else if($('#correo').val()==""){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes ingresar el correo!',
					})
					return false;
			}else if($('#correo_recuperacion').val()==""){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes ingresar el correo alternativo!',
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

