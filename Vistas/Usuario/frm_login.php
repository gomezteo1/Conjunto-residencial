<!DOCTYPE html>
<html lang="es">
<head>
	<title>Login</title>
</head>
<body>
	<br>
	<div class="login-wrap cover">
		<div class="container-login">
			<p class="text-center" style="font-size: 80px;">
				<i class="zmdi zmdi-account-circle"></i>
			</p>
			<p class="text-center text-condensedLight">Ingresa/e Con Su Cuenta</p>
			<form class="login100-form validate-form" action="Controladores/Usuario_Controlador.php" method="POST">
												<input type="hidden" name="action" value="login_usuario">
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				    <input class="mdl-textfield__input" type="correo" id="correo" name="correo">
				    <label class="mdl-textfield__label" for="userName">Correo</label>
				</div>
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				  	<i id="show" class="fa fa-eye"></i><label class="mdl-textfield__label" for="clave">Clave</label>
					<input class="mdl-textfield__input" type="password" id="clave" name="clave">
				    
				</div>
				<button class="mdl-button mdl-js-button mdl-js-ripple-effect" type="submit" id="Login" style="color: #3F51B5; margin: 0 auto; display: block;">
					Iniciar Sesión
				</button>
				<br><br>
				<div class="form-group last col-12">
					<span class="txt1">
						¿Olvido Su Contraseña?
					</span>
					<a class="txt2" href="?controller=usuario&action=frm_recuperar_clave">
						Recuperar
					</a>
				</div>	
			</form>
		</div>
	</div>

</body>
</html>
<script type="text/javascript">
$(document).ready(function(){
		$('#Login').click(function(){
			var correoRango = $('#correo').val();
			var claveRango = $('#clave').val();
			if(correoRango==""){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes Ingresar El Correo!',
					})
					return false;
			}else if(correoRango.indexOf('@', 0) == -1 || correoRango.indexOf('.', 0) == -1) {
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'El Correo Electrónico Introducido No Es Correcto.!',
					})
					return false;
			}else if(claveRango==""){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes Ingresar La Clave!',
					})
					return false;
			}else{
					return true;
			}
		});
	});

	

</script>
