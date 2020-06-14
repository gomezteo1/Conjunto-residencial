<!DOCTYPE html>
<html lang="es">
<head>
	<title>Cuenta de Cobro M</title>
</head>
<body>
		
<form action="Controladores/Cuenta_cobro_Controlador.php" method="POST" data-toggle="validator" class="popup-form">
	<input type='hidden' name='action' value='modificar_cuenta_cobro'>                 

		
		<section class="full-width header-well">
			<div class="full-width header-well-icon">
				<i class="zmdi zmdi-washing-machine"></i>
			</div>
			<div class="full-width header-well-text" align="left">
				<p class="text-condensedLight">
					Modificar Cuenta Cobro
				</p>
			</div>
		</section>
		<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
			
			<div class="mdl-tabs__panel is-active" id="tabNewProduct">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--12-col">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle bg-primary text-center tittles">
								 Modificar Cuenta Cobro
							</div>
							<div class="full-width panel-content">
								
									<div class="mdl-grid">
										<div class="mdl-cell mdl-cell--12-col">
									        <legend class="text-condensedLight"><i class="zmdi zmdi-border-color"></i> &nbsp; Información Basica</legend><br>
									    </div>

										<input hidden readonly name='codigo_cuenta_cobro' id='codigo_cuenta_cobro' value="<?php echo $_GET['codigo_cuenta_cobro'] ?>"  type="text">
									
										<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet" readonly>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" value="<?php echo $cuenta_cobro->numero_cuenta ?>" type="number" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="numero_cuenta" name="numero_cuenta" required>
												<label class="mdl-textfield__label" for="Numero Cuenta"></label>
												<span class="mdl-textfield__error">Numero Cuenta</span>
											</div>
											</div>

											<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet" readonly>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" value="<?php echo $cuenta_cobro->nit ?>" type="number" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="nit" name="nit" required>
												<label class="mdl-textfield__label" for="Nit"></label>
												<span class="mdl-textfield__error">Nit</span>
											</div>
											</div>
									
											<div class="form-group col-sm-12">
												<?php $llenar_select_usuario_inmueble="si";
												require_once("Controladores/Usuario_Inmueble_Controlador.php");
												?>
											</div><!-- end form-group -->
											
											<div class="form-group col-sm-8">
												<?php $llenar_select_month="si";
												require_once("Controladores/Month_Controlador.php");
												?>
											</div><!-- end form-group -->
											
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input readonly class="mdl-textfield__input" type="date" id="fecha" name="fecha" value="<?php echo $cuenta_cobro->fecha ?>">
												<label class="mdl-textfield__label"  for="Fecha_"></label>
												<span class="mdl-textfield__error">Fecha </span>
											</div>	
											
											
											<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" value="<?php echo $cuenta_cobro->monto_por_cancelar ?>" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="monto_por_cancelar" name="monto_por_cancelar" required>
												<label class="mdl-textfield__label" for="Monto Por Cancelar"></label>
												<span class="mdl-textfield__error">Monto por Cancelar</span>
											</div>
											</div>
												
											<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet" readonly>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" value="<?php echo $cuenta_cobro->porMora ?>" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="porMora" name="porMora" required>
												<label class="mdl-textfield__label" for="Mora"></label>
												<span class="mdl-textfield__error">Mora</span>
											</div>
											</div>

									</div>
									<p class="text-center">
										<button id="button-Mcc" value='Guardar' name="button-Mcc" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" type="submit" >
											<i class="zmdi zmdi-plus"></i>
										</button>
										<div class="mdl-tooltip" for="btn-addProduct">Modificar CC</div>
									</p>
								
							</div>
						</div>
					</div>
				</div>
			</div>
			</form>
			<div class="mostrar"></div>
		</div>
	</body>
</html>









