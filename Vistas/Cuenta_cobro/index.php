<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<title>Inicio Cuentas de cobro</title>
	<!-- Esto es del toogle-->
	<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
	<script
	  src="https://code.jquery.com/jquery-3.4.1.js"
	  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
	  crossorigin="anonymous"></script>
	<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
	<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
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
								<td><b>#</b></td>
								<td><b>#Cuenta</b></td>
								<td><b>Nit</b></td>
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
									<!-- <td><a href="?controller=cuenta_cobro&action=eliminar_cuenta_cobro&codigo_cuenta_cobro=<?php echo $cuenta_cobro->codigo_cuenta_cobro ?>"class="btn btn-danger">Eliminar</a></td> -->
									<td scope="col"><a class="btn btn-success" target="_blank" href="?controller=reportec&action=index&codigo_cuenta_cobro=<?php echo $cuenta_cobro->codigo_cuenta_cobro ?>">Ver</a> </td>
								</tr>
							</tbody>			
							<?php } ?>
							<tfoot>
								<tr>
									<td><b>#</b></td>
									<td><b>#Cuenta</b></td>
									<td><b>Nit</b></td>
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
	</div>
</body>
<script
	  src="https://code.jquery.com/jquery-3.4.1.js"
	  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
	  crossorigin="anonymous"></script>
	<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

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
            //dataType: "json",
            data:{codigo_cuenta_cobro:as.id,
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
	alert(dato_buscar);
	 $.ajax({
			type:'POST',
            //url:'Vistas/Producto/prueba.php',
			url:'Controladores/Cuenta_cobro_Controlador.php',
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


