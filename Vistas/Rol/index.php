<!DOCTYPE html>
<html>
<head>
	<title>Inicio Rol</title>
</head>
<body>
	<div align="center">
		<section class="full-width header-well">
			<div class="full-width header-well-icon">
				<i class="zmdi zmdi-shopping-cart"></i>
			</div>
			<div align="left" class="full-width header-well-text">
				<p class="text-condensedLight">
					Inicio Rol
					<a class="btn btn-outline-primary" href="?controller=rol&action=formulario_registrar">Registrar</a>

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
								<td><b>Serial Rol</b></td>
								<td><b>Rol</b></td>
							</tr>		
						</thead>
						<?php foreach ($roles as $rol) { ?>
						<tbody>
							<tr>
								<td><?php echo $rol->id_rol; ?> </td>
								<td><?php echo $rol->rol; ?> </td>
								<td><a class="btn btn-secondary" href="?controller=rol&action=formulario_modificar&id_rol=<?php echo $rol->id_rol ?>">Actualizar</a> </td>
								<!-- <td><a class="btn btn-danger" href="?controller=rol&action=eliminar_rol&id_rol=<?php echo $rol->id_rol ?>">Eliminar</a> </th> -->
							</tr>		
						</tbody>
						<?php }	?>
						<tfoot>
							<tr>
								<td><b>Serial Rol</b></td>
								<td><b>Rol</b></td>
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
				data-target="#exampleModalr ">
					<img src="image/info.png"  >
		</button>		
	</div>
</body>

<script>
 // Write on keyup event of keyword input element
 $(document).ready(function(){
 $("#txtbuscar").keyup(function(){
 _this = this;
 // Show only matching TR, hide rest of them
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
$(function(){ //Función Jquery
  	$('#btnbuscar').click(function(e) {
    e.preventDefault(); //Evitar submit
	metodo="Buscar";
	dato_buscar=document.getElementById('txtbuscar').value;
	//alert(dato_buscar);
	 $.ajax({
			type:'POST',
          	url:'Controladores/Rol_Controlador.php',
           	data:{action:metodo,dato_buscar:dato_buscar},
            success:function(data){	
				document.getElementById('resultado_busqueda').innerHTML=data;				
			}
		});	
	});		
});

</script>
</html>




