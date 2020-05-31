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
											<input class="mdl-textfield__input" type="date" id="fecha_nacimiento" name="fecha_nacimiento">
											<label class="mdl-textfield__label"  for="Fecha Nacimiento"></label>
											<span class="mdl-textfield__error">Fecha Invalida</span>
										</div>

										<!-- <button >
										Verificar Fecha<i class="fas fa-file-chart-line"></i>
										</button> -->

									
										
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

$(document).ready(function(){
		$('#button-Rusuario').click(function(){

			if($('#nombres').val()==""){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes Ingresar El/Los Nombre(s)!',
					})
					return false;
			}
			else if($('#apellidos').val()==""){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes Ingresar Los Apellidos!',
					})
					return false;
			}
			else if($('#apellidos').length()<=10 && length()>=2){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes Ingresar Diez Caracteres',
					})
					return false;
			}

			else if($('#numero_documento').val()==""){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes Ingresar El Numero De Documento!',
					})
					return false;
			}
			else if($('#numero_documento').length()<=13 && length()>=6){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes Ingresar Entre Seis Y Diez Caracteres Minimos',
					})
					return false;
			}
			else if($('#telefono').val()==""){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes Ingresar El Telefono!',
					})
					return false;
			}
			else if($('#telefono').length()<=13 && length()>=7){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes Ingresar Entre Siete Y Diez Caracteres Minimos',
					})
					return false;
			}
			else if($('#fecha_nacimiento').val()==""){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes ingresar La Fecha!',
					})
					return false;
			}
			else if($('#clave').val()==""){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes Ingresar La Contraseña!',
					})
					return false;
			}else if($('#clave').length()<=20 && length()>=7){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes Ingresar Entre Siete Y Diez Caracteres Minimos',
					})
					return false;
			}
			else if($('#correo').val()==""){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes Ingresar El Correo!',
					})
					return false;
			}else if($('#correo').length()<=30 && length()>=10){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes Ingresar Entre Siete Y Diez Caracteres Minimos',
					})
					return false;
			}
			else if($('#correo_recuperacion').val()==""){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes Ingresar El Correo Alternativo!',
					})
					return false;
			}
			else if($('#correo_recuperacion').length()<=30 && length()>=10){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes Ingresar Entre Siete Y Diez Caracteres Minimos',
					})
					return false;
			}
			else
				swal({
						title: "Hecho!",
						text: "Se Ha Registrado Correctamente",
						icon: "success",
						button: "Continuar",
					});
		});
	});
</script> 

