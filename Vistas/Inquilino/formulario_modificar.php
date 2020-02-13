
<link rel="stylesheet" href="./css/reset.css">
	<link rel="stylesheet" href="./css/main.css">
	<title>Formulario</title>

<form action='Controladores/Inquilino_Controlador.php' method='POST'>
	<input type='hidden' name='action' value='modificar_inquilino'>
	<body>
	<div class="container">
		<div class="form__top">
			<h2>Formulario <span>Registro</span></h2>
		
			<input class="input" type="text" id="documeto" name="documeto" placeholder="&#128100;  documento" value="<?php echo $inquilino->documeto ?>" required autofocus>

			<input class="input" type="text" id="nombres" name="nombres" placeholder="&#128100;  nombres"  value="<?php echo $inquilino->nombres ?>" required>

			<input class="input" type="text" id="apellidos" name="apellidos" placeholder="&#128100;  apellidos" value="<?php echo $inquilino->apellidos ?>" required>

			<input class="input" type="text" id="telefono" name="telefono" placeholder="&#128100;  telefono" value="<?php echo $inquilino->telefono ?>" required>
			<br>
			<input id="button-MInquilino" name="button-MInquilino" type='submit' value='Actualizar'>
		   	</div>
		</form>
	</div>
	
</body>



<!----VALIDACION PERFECTA FULL HD 4K----->
<script type="text/javascript">

$(document).ready(function(){
		$('#button-MInquilino').click(function(){

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
					text: "Se ha actualizado correctamente",
					icon: "success",
					button: "Continuar",
				});
		});
	});

	

</script>


