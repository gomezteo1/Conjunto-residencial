<!DOCTYPE html>
<html>
<head>
	<title>Inicio Tipo Pago</title>
</head>
<body>
	<div align="center">
		<section class="full-width header-well">
			<div class="full-width header-well-icon">
				<i class="zmdi zmdi-shopping-cart"></i>
			</div>
			<div align="left" class="full-width header-well-text">
				<p class="text-condensedLight">
					Inicio Tipo Pago
					<a align="rigth" class="btn btn-outline-primary" href="?controller=tipo_pago&action=formulario_registrar">Registrar</a>
					
				
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
								<td><b>#Tipo Pago</b></td>
								<td><b>Tipo Pago</b></td>
								<td><b>Descripción</b></td>
								<td colspan=2 align="center"><b>Acciones</b></td>
							</tr>		
						</thead>
						<?php foreach ($tipo_pagos as $tipo_pago) { ?>
						<tbody>
							<tr>
								<td><?php echo $tipo_pago->codigo_tipo_pago; ?></td>
								<td><?php echo $tipo_pago->tipo_pago; ?></td>
								<td><?php echo $tipo_pago->descripcion;?></dh>
								<td><a href="?controller=tipo_pago&action=formulario_modificar&codigo_tipo_pago=<?php echo $tipo_pago->codigo_tipo_pago ?>" class="btn btn-secondary">Actualizar</a> </th>
								<!-- <td>
									<a href="?controller=tipo_pago&action=eliminar_tipo_pago&codigo_tipo_pago=<?php echo $tipo_pago->codigo_tipo_pago ?>" class="btn btn-danger">Eliminar</a>
								</td> -->
							</tr>
						</tbody>
						<?php }	?>
						<tfoot>
							<tr>
								<td><b>#Tipo Pago</b></td>
								<td><b>Tipo Pago</b></td>
								<td><b>Descripción</b></td>
								<td colspan=2 align="center"><b>Acciones</b></td>
							</tr>		
						</tfoot>
					</table>
				</div>
			</div>
		</div>		
	</div>
</body>

<!--este es del toogle-->
<!--este es del toogle-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>



<script>
$(function(){ //Función Jquery
  	$('#btnbuscar').click(function(e) {
    e.preventDefault(); //Evitar submit
	metodo="Buscar";
	dato_buscar=document.getElementById('txtbuscar').value;
	alert(dato_buscar);
	 $.ajax({
			type:'POST',
            //url:'Vistas/Producto/prueba.php',
			url:'Controladores/Tipo_Pago_Controlador.php',
           	//dataType: "json",
           	data:{action:metodo,dato_buscar:dato_buscar},
            success:function(data){	
			document.getElementById('resultado_busqueda').innerHTML=data;				
			}
		});	
	});		
});
</script>

</html>


