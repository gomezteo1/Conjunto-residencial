<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<title>Index</title>
	
	<!-- Esto es del toogle-->
	<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
	<script
	  src="https://code.jquery.com/jquery-3.4.1.js"
	  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
	  crossorigin="anonymous"></script>
	<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
</head>
<?php 
require_once('conexion.php');
 ?>
<body background="img/5.jpg">
		
	
		<div>
			<section class="full-width header-well">
				<div class="full-width header-well-icon">
					<i class="zmdi zmdi-shopping-cart"></i>
				</div>
				<div align="left" class="full-width header-well-text">
					<p class="text-condensedLight">
						Tus Pagos
					</p>
					
					
				</div>
			</section>

			<div class="full-width divider-menu-h"></div>
			<div class="mdl-grid">
				<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
					<div class="table-responsive">
						<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
							<thead>
								<tr>
									<th scope="col"># Pago</th>
									<th scope="col">Nombres</th>
									<th scope="col">Cuenta cobro</th>
									<th scope="col">Fecha</th>
									<th scope="col">Tipo pago</th>
									<th scope="col">Monto cancelado</th>
									<th scope="col">Monto pagar</th>
									<th colspan=4>Acciones</th>
								</tr>		
							</thead>
							<?php  
							foreach ($pagos as $pago) { ?>
							<tbody>
								<tr>
									<th scope="col"><?php echo $pago->codigo_pago; ?></th>
									<th scope="col"><?php echo $pago->nombreUsuario; ?></th>
									<th scope="col"><?php echo $pago->codigo_cuenta_cobro;?></th>
									<th scope="col"><?php echo $pago->fecha; ?></th>
									<th scope="col"><?php echo $pago->nombreTipoPago;?></th>
									<th scope="col"><?php echo $pago->monto_cancelado; ?></th>
									<th scope="col"><?php echo $pago->monto_a_pagar;?></th>

									
									<th scope="col"><a class="btn btn-success" target="_blank" href="?controller=reporte&action=index&codigo_pago=<?php echo $pago->codigo_pago ?>">Ver</a> </th>
								</tr>
																
							
							<?php
							}	
							?>
								
							</tbody>
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


</html>


