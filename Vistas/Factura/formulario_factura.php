<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


<form name="frmfactura" id="frmfactura"
method="POST" action="../Controlador/Factura_Controlador.php">

<div>


<table class="table table-dark" border="1" align="center">
	<tr>
		<td>
			Cliente:
		</td>
		<td>
			<?php
			$llenar_select_cliente="si";
			require_once("Controladores/Cliente_Controlador.php");
			?>
		</td>
	</tr>
	<tr>
		<td>
			Inmueble:
		</td>
		<td>
		<?php
			$llenar_select_inmueble="si";
			require_once("Controladores/Inmueble_Controlador.php");
		?>
		</td>
	</tr>	
	<tr>
		<td>
			Torre:
		</td>
		<td>
		<?php
		$llenar_select_torre="si";
		require_once("Controladores/Select_Torre.php");
		?>
		
		</td>
	</tr>
	<tr>
		<td>
			Precio:
		</td>
		<td>
			<input type="number" id="txtprecio"
			name="txtprecio" readonly 
			/>
		</td>
	</tr>
	

<tr><td colspan="2" align="center">
		<button class="btn btn-outline-success" name="btnagregar" id="btnagregar">
		Agregar
		</button>
		</td>
	</tr>
</table> 
</div>
<div id="detalle_factura">
  
</div>
<button class="btn btn-outline-success" name="btnguardar" id="btnguardar">
Guardar
</button> 
<input type="hidden" name="facturacion"
id="facturacion" value="si" />
<input type="text" id="txtcantidad_detalles"
name="txtcantidad_detalles" value=0 />
</form>