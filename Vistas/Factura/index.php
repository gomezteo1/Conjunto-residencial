<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body background="img/5.jpg">
	<p><a class="btn btn-success" href="?controller=factura&action=formulario_factura">Registrar</a>
</p>
<div id="resultado_busqueda">
</div>


<!--<input type="text" name="txtbuscar" id="txtbuscar" />
<button name="btnbuscar" id="btnbuscar">Buscar</button>
<div id="resultado_busqueda">
-->
<table class="table table-dark" border='1'>
	<tr>
		<th scope="col">codigo_factura</th>
		<th scope="col">documento_cliente</th>
		<th scope="col">fecha_factura</th>
		<th colspan=3 >Acciones</th>
	</tr>
<?php
	foreach ($facturas as $factura) { ?>
		
			<tr>
				<th scope="col"><?php echo $factura->codigo_factura; ?></th>
				<th scope="col"><?php echo $factura->documento_cliente; ?></th>
				<th scope="col"><?php echo $factura->fecha_factura;?></th>
				<th scope="col"><a class="btn btn-success" target="_blank" href="?controller=reporte&action=index&codigo_factura=<?php echo $factura->codigo_factura ?>">Ver Factura</a> </th>
				<!--<td><a href="?controller=factura&action=eliminar_factura&id_inmueble=<?php echo $factura->id_inmueble ?>">Eliminar</a>--> <!--</td>-->
			</tr>		
	<?php } ?>
</table>

</body>
</html>








