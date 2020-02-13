<?php
//require("Controladores/Categoria_Controlador.php");
?>
<link rel="stylesheet" href="./css/reset.css">
	<link rel="stylesheet" href="./css/main.css">
	<title>Formulario</title>

<div id="registrar-inquilino">
<form action='Controladores/Inquilino_Controlador.php' method='POST' id="res-registrar-inquilino">
	<input type='hidden' name='action' value='registrar_inquilino'>
	<body>
	<div class="container">
		<div class="form__top">
			<h2>Formulario <span>Registro</span></h2>
		
			<input class="input" type="text" id="documeto" name="documeto" placeholder="&#128100;  documento" autofocus>

			<input class="input" type="text" id="nombres" name="nombres" placeholder="&#128100;  nombres">

			<input class="input" type="text" id="apellidos" name="apellidos" placeholder="&#128100;  apellidos">


			<input class="input" type="text" id="telefono" name="telefono" placeholder="&#128100;  telefono">
			<br>
			<br>
			<button id="button-RInquilino" type="submit" class="btn btn-sm btn-primary button-RInquilino" value="res-registrar-inquilino">Registrar</button>
    <div id="res-registrar-inquilino" style="width: 100%; margin:0px; padding:0px;"></div>
			</div>
		</form>
	</div>
	
</body>
	


<!----VALIDACION PERFECTA FULL HD 4K----->
<script type="text/javascript">

$(document).ready(function(){
		$('#button-RInquilino').click(function(){

			if($('#documeto').val()==""){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes ingresar el documento!',
					})
					return false;
			}
			else if($('#nombres').val()==""){
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
			else if($('#telefono').val()==""){
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Debes ingresar el talefono!',
					})
					return false;
			}else
				swal({
					title: "Hecho!",
					text: "Se ha registrado correctamente",
					icon: "success",
					button: "Continuar",
				});
		});
	});

	

</script>


