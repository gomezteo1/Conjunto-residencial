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
				<img src="./image/buscar.png" class="btn-outline">
			</div>
		</section>
		<div class=""></div>
		<div class="mdl-grid">
			<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
				<div id="resultado_busqueda">
					<table id="mytable" class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
						<thead>
							<tr>
								<td><b>Serial Tipo De Pago</b></td>
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
							</tr>
						</tbody>
						<?php }	?>
						<tfoot>
							<tr>
								<td><b>Serial Tipo De Pago</b></td>
								<td><b>Tipo Pago</b></td>
								<td><b>Descripción</b></td>
								<td colspan=2 align="center"><b>Acciones</b></td>
							</tr>		
						</tfoot>
					</table>
				</div>
			</div>
		</div>		
		<button data-toggle="modal" 
				style="
					position: relative;
  					left: 450px;
					 border: 1px solid #E1E1E1;
					 border-radius: 100%;"
				data-target="#exampleModaltp ">
					<img src="image/info.png"  >
		</button>		
	</div>
</body>



<script>
 $(document).ready(function(){
 $("#txtbuscar").keyup(function(){
 _this = this;
 $.each($("#mytable tbody tr"), function() {
 if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
 $(this).hide();
 else
 $(this).show();
 });
 });
});
</script>
<script>
$(function(){
  	$('#btnbuscar').click(function(e) {
    e.preventDefault(); 
	metodo="Buscar";
	dato_buscar=document.getElementById('txtbuscar').value;
	 $.ajax({
			type:'POST',
			url:'Controladores/Tipo_Pago_Controlador.php',
           	data:{action:metodo,dato_buscar:dato_buscar},
            success:function(data){	
			document.getElementById('resultado_busqueda').innerHTML=data;				
			}
		});	
	});		
});
</script>

</html>


