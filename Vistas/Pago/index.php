<!DOCTYPE html>
<html>
<head>
	<title>Inicio Pago</title>
</head>
<?php 
require_once('conexion.php');
 ?>
<body>
	<div align="center">
		<section class="full-width header-well">
			<div class="full-width header-well-icon">
				<i class="zmdi zmdi-shopping-cart"></i>
			</div>
			<div align="left" class="full-width header-well-text">
				<p class="text-condensedLight">
					Inicio Pago
					<a class="btn btn-outline-primary" href="?controller=pago&action=formulario_registrar">Registrar</a>
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
								<td><b>#Pago</b></td>
								<td><b>Nombre</b></td>
								<td><b>#Cuenta Cobro</b></td>
								<td><b>Fecha</b></td>
								<td><b>Tipo Pago</b></td>
								<td><b>Monto Cancelado</b></td>
								<td><b>Monto a Pagar</b></td>
								<td colspan="1" align="center"><b>Acciones</b></td>
							</tr>		
						</thead>
						<?php  
						foreach ($pagos as $pago) { ?>
						<tbody>
							<tr>
								<td><?php echo $pago->codigo_pago; ?></td>
								<td><?php echo $pago->nombreUsuario; ?></td>
								<td><?php echo $pago->codigo_cuenta_cobro;?></td>
								<td><?php echo $pago->fecha; ?></td>
								<td><?php echo $pago->nombreTipoPago;?></td>
								<td><?php echo $pago->monto_cancelado; ?></td>
								<td><?php echo $pago->monto_a_pagar;?></td>
								<td><a class="btn btn-secondary" href="?controller=pago&action=formulario_modificar&codigo_pago=<?php echo $pago->codigo_pago ?>">Actualizar</a></td>
								<!-- <td><a class="btn btn-danger"  href="?controller=pago&action=eliminar_pago&codigo_pago=<?php echo $pago->codigo_pago?>">Eliminar</a> </th> -->
								<td><a class="btn btn-success" target="_blank" href="?controller=reporte&action=index&codigo_pago=<?php echo $pago->codigo_pago ?>">Ver</a></td>
							</tr>
						</tbody>									
						<?php }	?>
						<tfoot>
							<tr>
								<td><b>#Pago</b></td>
								<td><b>Nombre</b></td>
								<td><b>#Cuenta Cobro</b></td>
								<td><b>Fecha</b></td>
								<td><b>Tipo Pago</b></td>
								<td><b>Monto Cancelado</b></td>
								<td><b>Monto a Pagar</b></td>
								<td colspan="1" align="center"><b>Acciones</b></td>
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
	alert(dato_buscar);
	 $.ajax({
			type:'POST',
          	url:'Controladores/Pago_Controlador.php',
           	data:{action:metodo,dato_buscar:dato_buscar},
            success:function(data){	
				document.getElementById('resultado_busqueda').innerHTML=data;				
			}
		});	
	});		
});

</script>
</html>


