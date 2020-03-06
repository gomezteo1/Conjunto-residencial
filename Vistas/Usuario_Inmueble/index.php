<!DOCTYPE html>
<html>
<head>
	<title>Inicio Usuario Inmueble</title>
</head>
<body>
	<div align="center">
		<section class="full-width header-well">
			<div class="full-width header-well-icon">
				<i class="zmdi zmdi-shopping-cart"></i>
			</div>
			<div align="left" class="full-width header-well-text">
				<p class="text-condensedLight">
				Inmueble y su Usuario
				<a class="btn btn-outline-primary" href="?controller=usuario_inmueble&action=formulario_registrar">Registrar</a>

				</p>
				<input type="text" name="txtbuscar" id="txtbuscar" />
				<button class="btn-outline" name="btnbuscar" id="btnbuscar">
					<img src="./Reportes/imajenes/busqueda.png">
				</button>
			</div>
		</section>
		<div class=""></div>
		<div class="mdl-grid">
			<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
				<div id="resultado_busqueda">
					<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
						<thead>
							<tr>
								<td><b>#Usuario Inmueble</b></td>
								<td><b>Usuario</b></td>
								<td><b>Inmueble</b></td>
								<td colspan=2><b>Acciones</b></td>
							</tr>		
						</thead>
						<?php foreach ($usuario_inmuebles as $usuario_inmueble) { ?>
						<tbody>
							<tr>
								<td><?php echo $usuario_inmueble->id_usuario_inmueble; ?></td>
								<td><?php echo $usuario_inmueble->nombreUsuario; ?></td>
								<td><?php echo $usuario_inmueble->nombreInmueble;?></td>
								<td><a class="btn btn-secondary" href="?controller=usuario_inmueble&action=formulario_modificar&id_usuario_inmueble=<?php echo $usuario_inmueble->id_usuario_inmueble ?>">Actualizar</a></td>
								<!-- <td><a class="btn btn-danger"  href="?controller=usuario_inmueble&action=eliminar_usuario_inmueble&id_usuario_inmueble=<?php echo $usuario_inmueble->id_usuario_inmueble?>">E</a> </th> -->
								<!--<td><a class="btn btn-success" target="_blank" href="?controller=reporte&action=index&codigo_pago=<?php echo $usuario_inmueble->id_usuario_inmueble ?>">Ver</a> </th>-->
							</tr>
						</tbody>
						<?php }	?>
						<tfoot>
							<tr>
								<td><b>#Usuario Inmueble</b></td>
								<td><b>Usuario</b></td>
								<td><b>Inmueble</b></td>
								<td colspan=2><b>Acciones</b></td>
							</tr>		
						</tfoot>
					</table>
				</div>
			</div>
		</div>		
	</div>
</body>



<script>
$(function(){ //Función Jquery
  	$('#btnbuscar').click(function(e) {
    e.preventDefault(); //Evitar submit
	metodo="Buscar";
	dato_buscar=document.getElementById('txtbuscar').value;
	//alert(dato_buscar);
	 $.ajax({
			type:'POST',
          	url:'Controladores/Usuario_Inmueble_Controlador.php',
           	data:{action:metodo,dato_buscar:dato_buscar},
            success:function(data){	
				document.getElementById('resultado_busqueda').innerHTML=data;				
			}
		});	
	});		
});

</script>
</html>


