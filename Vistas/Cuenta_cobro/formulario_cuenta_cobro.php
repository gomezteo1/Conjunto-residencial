<!DOCTYPE html>
<html lang="es">
<head>
	<title>Cuenta Cobro R</title>
	<style>
		.carta{
		-webkit-box-shadow: 10px 10px 20px 4px rgba(0,0,0,0.52);
		-moz-box-shadow: 10px 10px 20px 4px rgba(0,0,0,0.52);
		box-shadow: 10px 10px 20px 4px rgba(0,0,0,0.52);
		}
		.izquierda{
			text-align: left;
		}
		.botoncito{
	
		border: none;
		background: #f2f2f2;
		color: #2d567a;
		padding: 10px;
		font-size: 20px;
		border-radius: 5px;
		/* position: relative; */
		box-sizing: border-box;
		transition:  500ms ease-out;  
		position: relative;
 		left: 250px;	
		bottom: 70px;

		}
		.tituloM {
			text-align: right;
			
			font-size: 30px;
		}
		.padre{
			justify-content:center; 
		}
		.hijo{
			
			padding: 10px;
  			margin: 10px;

			  display:inline-block;
			}



	</style>
	</head>
<body>
	<div id="registrar-cuenta_cobro">								
		<form name="frmcuenta_cobro" id="frmcuenta_cobro" method="POST" action=""  
		data-toggle="validator" class="popup-form" >
		<div id="prueba"></div>  
		
			<section class="full-width header-well">
				<div class="full-width header-well-icon">
					<i class="zmdi zmdi-washing-machine"></i>
				</div>
				<div class="full-width header-well-text">
					<p class="text-condensedLight">
						Registrar Cuenta Cobro
					</p>
				</div>
			</section>
			<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
				
				<div class="mdl-tabs__panel is-active" id="tabNewProduct">
					<div class="mdl-grid">
						<div class="mdl-cell mdl-cell--12-col">
							<div class="full-width panel mdl-shadow--2dp">
								<div class="full-width panel-tittle bg-primary text-center tittles">
								Cuenta Cobro
								</div>
								<div class="full-width panel-content">
									<div class="mdl-grid">
										<div class="mdl-cell mdl-cell--12-col">
											<legend class="text-condensedLight"><i class="zmdi zmdi-border-color"></i> &nbsp; Información Basica</legend><br>
										</div>
										<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="number"  pattern="^[0-9]" min="0" step="1" name="numero_cuenta"  id="numero_cuenta">
												<label class="mdl-textfield__label" for="Numero Cuenta">Numero Cuenta</label>
												<span class="mdl-textfield__error">Numero Cuenta Invalido</span>
											</div>
										</div>
										
										<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" name="nit" id="nit" >
												<label class="mdl-textfield__label" for="Nit">NIT</label>
												<span class="mdl-textfield__error">Nit Invalido</span>
											</div>
										</div>
										<div>

										<div class="form-group col-sm-8">
																	
										</div><!-- end form-group -->

										<div class="form-group col-sm-12 col-12">
											<?php $llenar_select_usuario_inmueble="si";
											require_once("Controladores/Usuario_Inmueble_Controlador.php");
											?>
										</div><!-- end form-group -->
																			
										<div class="form-group col-sm-8">
																	
										</div><!-- end form-group -->
									

										<div class="form-group col-sm-6">
											<?php $llenar_select_month="si";
											require_once("Controladores/Month_Controlador.php");
											?>
										</div><!-- end form-group -->

										
										<br>
										<br>
										<br>
										
										
										<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="number" pattern="^[0-9]" id="monto_por_cancelar"  name="monto_por_cancelar" placeholder="Ingrese el monto">
												<label class="mdl-textfield__label" for="Monto Por Cancelar"></label>
												<span class="mdl-textfield__error">Monto por Cancelar</span>
											</div>
										</div>


									</div>
							</div>
								<center>
										<div class="col-12" id="detalle_cuenta_cobro">
										
										</div>
										
								</center>
							</div>
						</div>
					</div>
				</div>
			</div>
			</form>
			<div class="row justify-content-center">
				<button class="btn btn-dark" name="btnagregar"  id="btnagregar">Agregar</button>
				<br>
				
				<button class=" btn btn-success"  name="btnguardar" id="btnguardar">
				Guardar
				</button>
				</div>
				
			<div class="mostrar"></div>
		</div>
	</div>


</body>
</html>



