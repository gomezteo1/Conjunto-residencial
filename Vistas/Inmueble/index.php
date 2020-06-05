<!DOCTYPE html>
<html>
<head>
	<title>Inicio Inmueble</title>
</head>
<body>
	<div align="center">
		<section class="full-width header-well">
			<div class="full-width header-well-icon">
				<i class="zmdi zmdi-shopping-cart"></i>
			</div>
			<div class="full-width header-well-text" align="left">
				<p class="text-condensedLight">
					Inicio Inmueble
					<a class="btn btn-outline-primary" href="?controller=inmueble&action=formulario_registrar">Registrar</a>

				</p>
				<input type="text" name="txtbuscar" id="txtbuscar" />
				<button class="btn-outline" name="btnbuscar" id="btnbuscar">
				<img src="./image/buscar.png" class="btn-outline">
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
								<td><b>Serial Inmueble</b></td>
								<td><b>Numero de matricula</b></td>
								<td><b>Tipo</b></td>
								<td><b>Torre</b></td>
								<td><b>Numero</b></td>
								<td><b>Metros</b></td>
								<td><b>Estado</b></td>
								<td colspan="1" align="center"><b>Acciones</b></b></td>
							</tr>		
						</thead>
						<?php foreach($inmuebles as $inmueble){ ?>
						<tbody>
							<tr>
								<td><?php echo $inmueble->codigo_inmueble; ?></td>
								<td><?php echo $inmueble->numero_matricula; ?></td>
								<td><?php echo $inmueble->tipo;?></td>
								<td><?php echo $inmueble->torre;?></td>
								<td><?php echo $inmueble->numero;?></td>
								<td><?php echo $inmueble->metros;?></td>
								<td><?php echo $inmueble->estado==1?'Activo':'Inactivo'; ?></td>
								<td><a class="btn btn-secondary" href="?controller=inmueble&action=formulario_modificar&codigo_inmueble=<?php echo $inmueble->codigo_inmueble ?>">Actualizar</a> </td>
								<td>
									<input <?php echo $inmueble->estado==1 ? "checked" : "" ?> onchange="prueba_i(this)" type="checkbox" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" name="status" id="<?php echo $inmueble->codigo_inmueble ?>">
								</td>
		
							<!-- <td>
									<a onclick="alertEliminar()" class="btn btn-danger" href="?controller=inmueble&action=eliminar_inmueble&codigo_inmueble=<?php echo $inmueble->codigo_inmueble ?>">Elimar</a> </td> -->
							</tr>		
						</tbody>
						<?php }	?>
						<tfoot>
							<tr>
								<td><b>Serial Inmueble</b></td>
								<td><b>Numero de matricula</b></td>
								<td><b>Tipo</b></td>
								<td><b>Torre</b></td>
								<td><b>Numero</b></td>
								<td><b>Metros</b></td>
								<td><b>Estado</b></td>
								<td colspan="1" align="center"><b>Acciones</b></b></td>
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
				data-target="#exampleModali ">
					<img src="image/info.png"  >
		</button>		
	</div>
</body>


<script>
 
 function prueba_i(as)
{
    var estado;

	if(as.getAttribute('checked')!=null){
      estado =1;
	}
	else{
	  estado = 0;	
	}	
	console.log(as.getAttribute('checked')); 
	console.log("inmueble");
	console.log(as);
		 $.ajax({
			type:'POST',
			url:'Controladores/Inmueble_Controlador.php',
            //dataType: "json",
            data:{codigo_inmueble:as.id,
					action:'desactivar_estado', 
					on: estado},
            success:function(data){
            console.log(data);	
			//console.log("llega mi pez");
			}
			});
}   /*$(function() {
    $('input[name="status"]').change(()=>{
      console.log("llego");	
      console.log(this);

     
		});		
     });*/



/*
function estado(estado) {
    metodo = "cambiarEstado";
    id = $(estado).attr('id');
    componente = document.getElementById('url').value;
    $.ajax({
        type: 'POST',
        url: 'controlador/' + componente + '.php', // aqui estara la logica del buscador, al url del controlador
        data: {
            action: metodo,
            id: id
        },
        beforeSend: function() {},
        error: function() {
            Swal.fire({
                title: 'Error!',
                text: 'Ha ocurrido un error en el sistema',
                type: 'error',
                confirmButtonText: 'Cool'
            })
        },
        success: function(data) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'bottom-end',
                showConfirmButton: false,
                timer: 3000
            })

            Toast.fire({
                type: 'success',
                title: data +
                    'Cambio realizado con exito'
            })
        }
    });
    //  });
}*/

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
          	url:'Controladores/Inmueble_Controlador.php',
           	data:{action:metodo,dato_buscar:dato_buscar},
            success:function(data){	
				document.getElementById('resultado_busqueda').innerHTML=data;				
			}
		});	
	});		
});

</script>
</html>


