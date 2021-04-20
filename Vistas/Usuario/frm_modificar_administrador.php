<!DOCTYPE html>
<html lang="es">
<head>
	<title>Usuario M</title>
</head>
<body>
		
		<form action="Controladores/Usuario_Controlador.php" method="POST">
		<input type="hidden" name="action" value="modificar_administrador">
		
		<section class="full-width header-well" align="left">
			<div class="full-width header-well-icon">
				<i class="zmdi zmdi-washing-machine"></i>
			</div>
			<div class="full-width header-well-text">
				<p class="text-condensedLight">
					Modificar Usuarios
				</p>
			</div>
		</section>
		<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
			
			<div class="mdl-tabs__panel is-active" id="tabNewProduct">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--12-col">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle bg-primary text-center tittles">
								Usuarios
							</div>
							<div class="full-width panel-content">
								
									<div class="mdl-grid">
										<div class="mdl-cell mdl-cell--12-col">
									        <legend class="text-condensedLight"><i class="zmdi zmdi-border-color"></i> &nbsp; Información Basica</legend><br>
									    </div>

									    <input value="<?php echo $usuario->id_usuario  ?>" name="id_usuario" id="id_usuario" class="w3-input" type="id_usuario" hidden> 

										<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="nombres" name="nombres" value="<?php echo $usuario->nombres  ?>">
												<label class="mdl-textfield__label" for="nombres">Nombre</label>
												<span class="mdl-textfield__error">Nombre invalido</span>
											</div>
										</div>
										
										<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="apellidos" name="apellidos" value="<?php echo $usuario->apellidos  ?>">
												<label class="mdl-textfield__label" for="apellidos">Apellido</label>
												<span class="mdl-textfield__error">Apellido invalido</span>
											</div>
										</div>

										<div class="mdl-cell mdl-cell--12-col">
										    <legend class="text-condensedLight"><i class="zmdi zmdi-border-color"></i> &nbsp; Tipo De Documento</legend><br>
										</div>

										<div>
											<?php
												$llenar_select_tipo_documento="si";
												require("Controladores/Tipo_Documento_Controlador.php");
											?>
										</div>

										<div class="mdl-cell mdl-cell--8-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="number"  pattern="^[0-9]" min="0" step="1" id="numero_documento" name="numero_documento" value="<?php echo $usuario->numero_documento  ?>">
												<label class="mdl-textfield__label" for="numero_documento">Numero Documento</label>
												<span class="mdl-textfield__error">Numero De Documento Invalido</span>
											</div>
										</div>
										
										<div class="mdl-cell mdl-cell--12-col">
										    <legend class="text-condensedLight"><i class="zmdi zmdi-border-color"></i> &nbsp;Otros Datos</legend><br>
										</div>
										
										<div>
											<?php
												$llenar_select_rol="si";
												require("Controladores/Rol_Controlador.php");
											?>
										</div>
										

										

										<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="number"  pattern="^[0-9]" min="0" step="1" id="telefono" name="telefono" value="<?php echo $usuario->telefono  ?>">
												<label class="mdl-textfield__label" for="telefono">Telefono</label>
												<span class="mdl-textfield__error">Telefono invalido</span>
											</div>
										</div>

									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<input class="mdl-textfield__input" type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo $usuario->fecha_nacimiento  ?>">
										<label class="mdl-textfield__label"  for="fecha_nacimiento"></label>
										<span class="mdl-textfield__error">Fecha Invalida</span>
									</div>

									<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet" hidden>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="estado" name="estado" value="<?php echo $usuario->estado  ?>">
												<label class="mdl-textfield__label" for="estado">Estado</label>
												<span class="mdl-textfield__error">Estado invalido</span>
											</div>
										</div>

										<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ@*\/\-_.]*(\.[0-9]+)?" id="correo" name="correo" value="<?php echo $usuario->correo  ?>">
												<label class="mdl-textfield__label" for="correo">Correo</label>
												<span class="mdl-textfield__error">Correo invalido</span>
											</div>
										</div>
										<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ@*\/\-_.]*(\.[0-9]+)?" id="correo_recuperacion" name="correo_recuperacion" value="<?php echo $usuario->correo_recuperacion  ?>">
												<label class="mdl-textfield__label" for="correo_recuperacion">Correo Recuperación</label>
												<span class="mdl-textfield__error">Correo R.invalido</span>
											</div>
										</div>

									</div>
									<p class="text-center">
										<button id="button-Rusuario" name="button-Rusuario" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" type="submit">
											<i class="zmdi zmdi-plus"></i>
										</button>
										<div class="mdl-tooltip" for="btn-addProduct">Modificar Usuario</div>
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





<script type="text/javascript">
$(document).ready(function(){

	var dateNow = new Date();
	var validDate = [dateNow.getFullYear()-15, ("0" + dateNow.getMonth()).slice(-2),("0" + dateNow.getDate()).slice(-2)].join('-');
	document.getElementById('fecha_nacimiento').setAttribute('max',validDate);
	
	$('#button-Rusuario').click(function(){
			var nombreRango = $('#nombres').val();
			var apellidoRango = $('#apellidos').val();
			var tipoDocumentoRango = $('#slctipo_documento').val();
			var numeroDocumentoRango = $('#numero_documento').val();
			var telefonoRango = $('#telefono').val();
			var claveRango = $('#clave').val();
			var correoRango = $('#correo').val();
			var correoRecuperacionRango = $('#correo_recuperacion').val();
			
			if(nombreRango==""){
					Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes Ingresar El/Los Nombre(s)!',
					})
					return false;
			}else if(nombreRango.length<=4 || nombreRango.length>=17) {
					Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Nombre Debe Tener 5 A 17 Caracteres',
					})
					return false;
			}else if(apellidoRango==""){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes Ingresar Los Apellidos!',
					})
					return false;
			}else if(apellidoRango.length <=5 || apellidoRango.length>=17){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Apellido Debe Tener 6 A 17 Caracteres',
					})
					return false;
			}else if(tipoDocumentoRango==undefined || tipoDocumentoRango=="" ){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes Ingresar El Tipo De Documento!',
				})
				return false;
			}else if(numeroDocumentoRango==""){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes Ingresar El Numero De Documento!',
					})
					return false;
			}else if (numeroDocumentoRango <= 0) {
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'El Numero Documento No Debe Tener Caracteres Negativos',
				})
				return false;
			}else if(numeroDocumentoRango.length <=5 || numeroDocumentoRango.length>=13){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Numero Documento Debe Tener 6 A 13 Caracteres',
					})
					return false;
			}else if(telefonoRango==""){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes Ingresar El Telefono!',
					})
					return false;
			}else if (telefonoRango <= 0) {
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'El Telefono No Debe Tener Caracteres Negativos',
				})
				return false;
			}else if(telefonoRango.length <=6 || telefonoRango.length>=13){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Telefono Debe Tener 7 A 12 Caracteres',
					})
					return false;
			}else if($('#fecha_nacimiento').val()==""){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes ingresar La Fecha!',
					})
					return false;
			}else if(claveRango==""){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes Ingresar La Contraseña!',
					})
					return false;
			}else if(claveRango.length <=9 || claveRango.length>=20){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'La Clave Debe Tener 10 A 20 Caracteres',
					})
					return false;
			}else if(correoRango==""){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes Ingresar El Correo!',
					})
					return false;
			}else if(correoRango.length <=14 || correoRango.length>=30){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'El Correo Debe Tener 15 A 30 Caracteres',
					})
					return false;
			}else if(correoRecuperacionRango==""){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes Ingresar El Correo Alternativo!',
					})
					return false;
			}else if(correoRecuperacionRango.length <=14 || correoRecuperacionRango.length>=30){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'El Correo Alternativo Debe Tener 15 A 30 Caracteres',
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


