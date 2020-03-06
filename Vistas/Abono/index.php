<!DOCTYPE html>
<html lang="es">
<head>
	<title>Inicio Abono</title>
</head>
<body>
	<div align="center">
		<section class="full-width header-well">
			<div class="full-width header-well-icon">
				<i class="zmdi zmdi-store"></i>
			</div>
			<div align="left" class="full-width header-well-text">
				<p class="text-condensedLight">
					Inicio de Abono 
					<a align="left" class="btn btn-outline-primary" href="?controller=abono&action=formulario_registrar">Registrar</a>

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
						<td><b># Abono</b></td>
						<td><b>Monto a pagar</b></td>
						<td><b>Nombre</b></td>
						<td><b>Fecha</b></td>
						<td><b>Deuda</b></td>
						<td><b>Abono</b></td>
						<td><b>Saldo</b></td>
						<td colspan=3 align="center" ><b>Acciones</b></td>
					</tr>
				</thead>			
				<?php
				foreach ($abonos as $abono) { ?>
				<tbody>
					<tr>
						<td><?php echo $abono->codigo_abono; ?></td>
						<td><?php echo $abono->nombrePago; ?></td>
						<td><?php echo $abono->nombreUsuario;?></td>
						<td><?php echo $abono->fecha;?></td>
						<td><?php echo $abono->deuda;?></td>
						<td><?php echo $abono->abono;?></td>
						<td><?php echo $abono->saldo;?></td>
						<td><a  class="btn btn-secondary" href="?controller=abono&action=formulario_modificar&codigo_abono=<?php echo $abono->codigo_abono ?>">Actualizar</a> </td>
						<!-- <td><a class="btn btn-danger" href="?controller=abono&action=eliminar_abono&codigo_abono=<?php echo $abono->codigo_abono ?>">Eliminar</a> </td> -->
						<td scope="col"><a class="btn btn-success" target="_blank" href="?controller=reportea&action=index&codigo_abono=<?php echo $abono->codigo_abono ?>">Ver</a> </td>
					</tr>
				</tbody>			
				<?php } ?>
				<tfoot>
					<tr>
						<td><b># Abono</b></td>
						<td><b>Monto a pagar</b></td>
						<td><b>Nombre</b></td>
						<td><b>Fecha</b></td>
						<td><b>Deuda</b></td>
						<td><b>Abono</b></td>
						<td><b>Saldo</b></td>
						<td colspan=3 align="center" ><b>Acciones</b></td>
					</tr>		
				</tfoot>
			</table>
		</div>
	</div>
</body>
</html>


<script>
$(function(){ //Función Jquery
  	$('#btnbuscar').click(function(e) {
    e.preventDefault(); //Evitar submit
	metodo="Buscar";
	dato_buscar=document.getElementById('txtbuscar').value;
	alert(dato_buscar);
	 $.ajax({
			type:'POST',
            //url:'Vistas/Inmueble/prueba.php',
			url:'Controladores/Abono_Controlador.php',
           //dataType: "json",
           data:{action:metodo,dato_buscar:dato_buscar},
            success:function(data){	
document.getElementById('resultado_busqueda').innerHTML=data;				
			}
		});	
	});		
});
</script>