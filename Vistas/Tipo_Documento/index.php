<!DOCTYPE html>
<html>
<head>
	<title>Inicio Tipo Documento</title>
</head>
<body>
	<div align="center">
		<section class="full-width header-well">
			<div class="full-width header-well-icon">
				<i class="zmdi zmdi-shopping-cart"></i>
			</div>
			<div align="left" class="full-width header-well-text">
				<p class="text-condensedLight">
					Inicio Tipo Documento
					<a class="btn btn-outline-primary" href="?controller=tipo_documento&action=formulario_registrar">Registrar</a>

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
								<td><b>Serial Tipo Documento</b></td>
								<td><b>Documento</b></td>
								<td colspan=3><b>Acciones</b></td>
							</tr>
						</thead>
						<?php foreach ($tipo_documentos as $tipo_documento) { ?>
						<tbody>
							<tr>
								<td><?php echo $tipo_documento->id_tipo_documento; ?></td>
								<td><?php echo $tipo_documento->documento; ?></td>
								<td><a class="btn btn-secondary" href="?controller=tipo_documento&action=formulario_modificar&id_tipo_documento=<?php echo $tipo_documento->id_tipo_documento ?>">Actualizar</a></td>
							</tr>		
						</tbody>
						<?php } ?>
						<tfoot>
							<tr>
								<td><b>Serial Tipo Documento</b></td>
								<td><b>Documento</b></td>
								<td colspan=3><b>Acciones</b></td>
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
				data-target="#exampleModald ">
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
          	url:'Controladores/Tipo_Documento_Controlador.php',
           	data:{action:metodo,dato_buscar:dato_buscar},
            success:function(data){	
			document.getElementById('resultado_busqueda').innerHTML=data;				
			}
		});	
	});		
});
</script>
</html>



