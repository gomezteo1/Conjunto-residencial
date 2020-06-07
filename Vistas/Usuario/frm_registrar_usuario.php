<!DOCTYPE html>
<html lang="es">
<head>
	<title>Usuario</title>
</head>
<body>
	<div id="registrar-usuario">	
		<form action="Controladores/Usuario_Controlador.php" method="POST" id="res-registrar-usuario" onSubmit="return validar();">
		
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
									        <legend class="text-condensedLight"><i class="zmdi zmdi-border-color"></i> &nbsp; Información Basica</legend><br>
									    </div>
										<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="nombres" name="nombres">
												<label class="mdl-textfield__label" for="Nombres">Nombre</label>
												<span class="mdl-textfield__error">Nombre invalido</span>
											</div>
										</div>
										
										<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="apellidos" name="apellidos" >
												<label class="mdl-textfield__label" for="Apellidos">Apellido</label>
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
												<input class="mdl-textfield__input" type="number" pattern="-?[0-9- ]*(\.[0-9]+)?" id="numero_documento" name="numero_documento" >
												<label class="mdl-textfield__label" for="Numero Documento">Numero Documento</label>
												<span class="mdl-textfield__error">Numero De Documento Invalido</span>
											</div>
										</div>
									
										<div class="mdl-cell mdl-cell--12-col">
										    <legend class="text-condensedLight"><i class="zmdi zmdi-border-color"></i> &nbsp;Otros Datos</legend><br>
										</div>


										<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input min="7" max="10" class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="telefono" name="telefono" >
												<label class="mdl-textfield__label" for="Telefono">Telefono</label>
												<span class="mdl-textfield__error">Telefono Invalido</span>
											</div>
										</div>
											
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
											<input class="mdl-textfield__input"  type="date" id="fecha_nacimiento" name="fecha_nacimiento">
											<label class="mdl-textfield__label"  for="Fecha Nacimiento"></label>
											<span class="mdl-textfield__error">Fecha Invalida</span>
										</div>

									
										<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="estado" name="estado" hidden>
											
										

										<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ@*\/\-_.]*(\.[0-9]+)?" id="clave" name="clave" >
												<label class="mdl-textfield__label" for="clave">Clave</label>
												<span class="mdl-textfield__error">Clave invalida</span>
											</div>
										</div>
										<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ@*\/\-_.]*(\.[0-9]+)?" id="correo" name="correo" >
												<label class="mdl-textfield__label" for="Correo">Correo</label>
												<span class="mdl-textfield__error">Correo invalido</span>
											</div>
										</div>
										<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓ@*\/\-_.]*(\.[0-9]+)?" id="correo_recuperacion" name="correo_recuperacion">
												<label class="mdl-textfield__label" for="Correo R.invalido">Correo Recuperación</label>
												<span class="mdl-textfield__error">Correo R.invalido</span>
											</div>
										</div>

									</div>
									 <!-- <div onclick="validar()">  -->
										<p class="text-center">
											<button id="button-Rusuario"  class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" type="submit" on>
												<i class="zmdi zmdi-plus"></i>
											</button>
											<div class="mdl-tooltip" for="btn-addProduct">Agregar Usuario</div>
										</p>
									<!-- </div> -->
								
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
//fecha
$(document).ready(function(){

	var dateNow = new Date();
	var validDate = [dateNow.getFullYear()-15, ("0" + dateNow.getMonth()).slice(-2),("0" + dateNow.getDate()).slice(-2)].join('-');
	document.getElementById('fecha_nacimiento').setAttribute('max',validDate);
	
	$('#button-Rusuario').click(function(){
			var nombreRango = $('#nombres').val();
			var apellidoRango = $('#apellidos').val()
			var numeroDocumentoRango = $('#numero_documento').val()
			var telefonoRango = $('#telefono').val()
			var claveRango = $('#clave').val()
			var correoRango = $('#correo').val()
			var correoRecuperacionRango = $('#correo_recuperacion').val()
			
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
			}
			else if(apellidoRango==""){
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
			}else if(numeroDocumentoRango==""){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes Ingresar El Numero De Documento!',
					})
					return false;
			}
			if(numeroDocumentoRango.length <=5 || numeroDocumentoRango.length>=13){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Numero Documetno Debe Tener 6 A 13 Caracteres',
					})
					return false;
			}
			else if(telefonoRango==""){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes Ingresar El Telefono!',
					})
					return false;
			}else if(telefonoRango.length <=6 || telefonoRango.length>=10){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Telefono Debe Tener 7 A 10 Caracteres',
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

<!-- <script type="text/javascript">
			//Validaciones de rango
$(document).ready(function(){
		$('#button-Rusuario').click(function(){
		
		dvar nombreRango = $('#nombres').val();
			

		if(nombreRango.length){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes Ingresar Diez Caracteres',
					})
					return false;
			}
			// else
			// 	swal({
			// 			title: "Hecho!",
			// 			text: "Se Ha Registrado Correctamente",
			// 			icon: "success",
			// 			button: "Continuar",
			// 		});
		});
	});
</script> -->

