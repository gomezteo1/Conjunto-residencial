<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

	<title>Inicio Cuentas De Cobro</title>
</head>
<body>
	<div align="center">
		<section class="full-width header-well">
			<div class="full-width header-well-icon">
				<i class="zmdi zmdi-shopping-cart"></i>
			</div>
			<div align="left" class="full-width header-well-text">
				<p class="text-condensedLight">
					Inicio Cuenta Cobro
					<a href="?controller=cuenta_cobro&action=formulario_cuenta_cobro" class="btn btn-outline-primary">Registrar</a>

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
								<td><b>Serial</b></td>
								<td><b>Numero Cuenta</b></td>
								<td><b>Nit</b></td>
								<td><b>Serial Usuario e Inmueble</b></td>
								<td><b>Usuario</b></td>
								<td><b>Inmueble</b></td>
								<td><b>Documento</b></td>
								<td><b>Mes-Valor</b></td>
								<td><b>Fecha</b></td>
								<td><b>Mora</b></td>
								<td><b>Monto por pagar</b></td>
								<td><b>Estado</b></td>
								<td colspan="2" align="center"><b>Acciones</b></td>
							</tr>
						</thead>
						<?php foreach ($cuenta_cobros as $cuenta_cobro) { ?>
							<tbody>
								<tr>
									<td><?php echo $cuenta_cobro->codigo_cuenta_cobro; ?></td>
									<td><?php echo $cuenta_cobro->numero_cuenta; ?></td>
									<td><?php echo $cuenta_cobro->nit; ?></td>
									<td><?php echo $cuenta_cobro->id_usuario_inmueble?></td>
									<td><?php echo $cuenta_cobro->nombreUsuario;?></td>
									<td><?php echo $cuenta_cobro->nombreInmueble; ?></td>
									<td><?php echo $cuenta_cobro->nombreDocumento; ?></td>
									<td><?php echo $cuenta_cobro->nombreMes; ?></td>
									<td><?php echo $cuenta_cobro->fecha; ?></td>
									<td><?php echo $cuenta_cobro->porMora; ?></td>
									<td><?php echo $cuenta_cobro->monto_por_cancelar; ?></td>
									<td><?php echo $cuenta_cobro->estado==1?'Pagado':'Sin Pagar'; ?></td>
									
									<td><a href="?controller=cuenta_cobro&action=formulario_modificar&codigo_cuenta_cobro=<?php echo $cuenta_cobro->codigo_cuenta_cobro?> "class="btn btn-secondary">Actualizar</a></td>
									<td>
										<input <?php echo $cuenta_cobro->estado==1 ? "checked" : "" ?> onchange="prueba_cc(this)" type="checkbox" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" name="status" id="<?php echo $cuenta_cobro->codigo_cuenta_cobro ?>">
									</td>
									<td scope="col"><a class="btn btn-success" target="_blank" href="?controller=reportec&action=index&codigo_cuenta_cobro=<?php echo $cuenta_cobro->codigo_cuenta_cobro ?>">Ver</a> </td>
								</tr>
							</tbody>			
							<?php } ?>
							<tfoot>
								<tr>
									<td><b>Serial</b></td>
									<td><b>Numero Cuenta</b></td>
									<td><b>Nit</b></td>
									<td><b>Serial Usuario e Inmueble</b></td>
									<td><b>Usuario</b></td>
									<td><b>Inmueble</b></td>
									<td><b>Documento</b></td>
									<td><b>Mes-Valor</b></td>
									<td><b>Fecha</b></td>
									<td><b>Mora</b></td>
									<td><b>Monto por pagar</b></td>
									<td><b>Estado</b></td>
									<td colspan="2" align="center"><b>Acciones</b></td>
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
				data-target="#exampleModalcc ">
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
 
  function prueba_cc(as)
{
    var estado;

	if(as.getAttribute('checked')!=null){
      estado =1;
	}
	else{
	  estado = 0;	
	}	
	console.log(as.getAttribute('checked')); 
	console.log("cuenta_cobro");
	console.log(as);
		 $.ajax({
			type:'POST',
			url:'Controladores/Cuenta_cobro_Controlador.php',
            data:{codigo_cuenta_cobro:as.id,
					action:'desactivar_estado', 
					on: estado},
            success:function(data){
            console.log(data);	
			}
			});
}   

</script>


<script>
$(function(){ //Función Jquery
  	$('#btnbuscar').click(function(e) {
    e.preventDefault(); 
	metodo="Buscar";
	dato_buscar=document.getElementById('txtbuscar').value;
	 $.ajax({
			type:'POST',
			url:'Controladores/Cuenta_cobro_Controlador.php',
           data:{action:metodo,dato_buscar:dato_buscar},
            success:function(data){	
			document.getElementById('resultado_busqueda').innerHTML=data;				
			}
		});	
	});		
});
</script>

</html>


