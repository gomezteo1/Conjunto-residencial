<!DOCTYPE html>
<html>
<head>
	<title>Inicio Registro U</title>
</head>
<body>
	<div align="center">
		<section class="full-width header-well">
			<div class="full-width header-well-icon">
				<i class="zmdi zmdi-shopping-cart"></i>
			</div>
			<div  align="left" class="full-width header-well-text">
				<p class="text-condensedLight">
					Inicio Usuario
					<a class="btn btn-outline-primary" href="?controller=usuario&action=frm_registrar_usuario">Registrar</a>

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
								<td><b>Serial Usuario</b></td>
								<td><b>Nombre</b></td>
								<td><b>Apellido</b></td>			
								<td><b>Tipo Documento</b></td>
								<td><b>Numero Documento</b></td>
								<td><b>Rol</b></td>	
								<td><b>Telefono</b></td>
								<td><b>Fecha_nacimiento</b></td>
								<td><b>Estado</b></td>			
								<td><b>Correo</b></td>
								<td><b>Cambiar Clave</b></td>			
								
								<td colspan="1" align="center"><b>Acciones</b></td>
							</tr>		
						</thead>
						<?php foreach($usuarios as $usuario){ ?>
						<tbody>
							<tr>
								<td><?php echo $usuario->id_usuario; ?></td>
								<td><?php echo $usuario->nombres; ?></td>
								<td><?php echo $usuario->apellidos; ?></td>
								<td><?php echo $usuario->nombreTipoDocumento; ?></td>
								<td><?php echo $usuario->numero_documento; ?></td>
								<td><?php echo $usuario->nombreRol ?></td>
								<td><?php echo $usuario->telefono; ?></td>
								<td><?php echo $usuario->fecha_nacimiento; ?></td>
								<td><?php echo $usuario->estado==1?'Activo':'Inactivo'; ?></td>
								<!--<td><?php echo $usuario->clave; ?></th>-->
								<td><?php echo $usuario->correo; ?></td>
								<!--<td><?php //echo $usuario->correo_recuperacion; ?></th>-->
								<td><a class=" btn btn-primary" href="?controller=usuario&action=frm_cambiarClaveAdm&id_usuario=<?php echo$usuario->id_usuario ?>">Clave</a></td>
								<td><a href=
									"?controller=usuario&action=frm_modificar_administrador&id_usuario=<?php echo
										$usuario->id_usuario ?> " class="btn btn-secondary">Actualizar
									</a>
								</td>
								
								<td>
									<input <?php echo $usuario->estado==1 ? "checked" : "" ?> onchange="prueba_u(this)" type="checkbox" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" name="status" id="<?php echo $usuario->id_usuario ?>">
								</td>
							</tr>
						</tbody>
						<?php }	?>
						<tfoot>
							<tr>
								<td><b>Serial Usuario</b></td>
								<td><b>Nombre</b></td>
								<td><b>Apellido</b></td>			
								<td><b>Tipo Documento</b></td>
								<td><b>Numero Documento</b></td>
								<td><b>Rol</b></td>	
								<td><b>Telefono</b></td>
								<td><b>Fecha Nacimiento</b></td>
								<td><b>Estado</b></td>			
								<td><b>Correo</b></td>
								<td><b>Cambiar Clave</b></td>			
								<td colspan="1" align="center"><b>Acciones</b></td>
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
				data-target="#exampleModalu ">
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
 
 function prueba_u(as)
{
    var estado;

	if(as.getAttribute('checked')!=null){
      estado =1;
	}
	else{
	  estado = 0;	
	}	
	console.log(as.getAttribute('checked')); 
	console.log("usuario");
	console.log(as);
		 $.ajax({
			type:'POST',
			url:'Controladores/Usuario_Controlador.php',
            data:{id_usuario:as.id,
					action:'desactivar_estado', 
					on: estado},
            success:function(data){
            console.log(data);	
			}
			});
}  

</script>

<script>
$(function(){ 
  	$('#btnbuscar').click(function(e) {
    e.preventDefault(); 
	metodo="Buscar";
	dato_buscar=document.getElementById('txtbuscar').value;
	
	 $.ajax({
			type:'POST',
          	url:'Controladores/Usuario_Controlador.php',
           	data:{action:metodo,dato_buscar:dato_buscar},
            success:function(data){	
				document.getElementById('resultado_busqueda').innerHTML=data;				
			}
		});	
	});		
});

</script>
</html>


