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
												<input class="mdl-textfield__input" value="<?php echo $cuenta_cobro->numero_cuenta ?>" type="number"  pattern="^[0-9]" min="0" step="1" id="numero_cuenta" name="numero_cuenta" required>
												<label class="mdl-textfield__label" for="Numero Cuenta"></label>
												<span class="mdl-textfield__error">Numero Cuenta</span>
											</div>
											</div>

											<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet" readonly>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" value="<?php echo $cuenta_cobro->nit ?>" type="number"  pattern="^[0-9]" min="0" step="1" id="nit" name="nit" required>
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
												<input class="mdl-textfield__input" value="<?php echo $cuenta_cobro->monto_por_cancelar ?>" type="number"  pattern="^[0-9]" min="0" step="1" id="monto_por_cancelar" name="monto_por_cancelar" required>
												<label class="mdl-textfield__label" for="Monto Por Cancelar"></label>
												<span class="mdl-textfield__error">Monto por Cancelar</span>
											</div>
											</div>
												
											<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet" readonly>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" value="<?php echo $cuenta_cobro->porMora ?>" type="float"  id="porMora" name="porMora" required>
												<label class="mdl-textfield__label" for="Mora"></label>
												<span class="mdl-textfield__error">Mora</span>
											</div>
											</div>

									</div>
									<p class="text-center">
										<button id="button-Mcc" value='Guardar' name="button-Mcc" value="res-registrar-cuenta_cobro" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" type="submit" >
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

<script>


$(document).ready(function(){
    $('#button-Mcc').click(function(e) {
    
        numeroCuenta = $('#numero_cuenta').val()
        nit = $('#nit').val()
        slcusuario_inmueble = $('#slcusuario_inmueble').val();
        var nombreSelect = $("select#slcusuario_inmueble option:selected").attr("nombre");
        slcmonth = $('#slcmonth').val();
        var mesSlect = $("select#slcmonth option:selected").attr("fecha");
        fecha = $('#fecha').val()
        monto_por_cancelar = $('#monto_por_cancelar').val();

		if (numeroCuenta == "") {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Debes Ingresar El Numero De La Cuenta!',
            })
            return false;
        } else if (numeroCuenta <= 0) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'El Numero De Cuenta No Debe Tener Caracteres Negativos',
            })
            return false;
        } else if (numeroCuenta.length <= 5 || numeroCuenta.length >= 13) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'El Numero De Cuenta Debe Tener 6 A 13 Caracteres',
            })
            return false;
        } else if (nit == "") {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Debes Ingresar El Nit!',
            })
            return false;
        } else if (nit <= 0) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'El Nit No Debe Tener Caracteres Negativos',
            })
            return false;
        } else if (nit.length <= 7 || nit.length >= 25) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'El Nit Debe Tener 8 A 24 Caracteres',
            })
            return false;
        } else if (slcusuario_inmueble == undefined || slcusuario_inmueble == "") {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Debes Ingresar Los Datos De La Cuenta!',
            })
            return false;
        } else if (slcmonth == undefined || slcmonth == "") {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Debes Ingresar El Mes Y Tarifa De La Cuenta!',
            })
            return false;
        } else if (monto_por_cancelar == "") {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Debes Ingresar El Monto!',
            })
            return false;
        } else if (monto_por_cancelar <= 0) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'El Monto No Debe Tener Caracteres Negativos',
            })
            return false;
        } else if (monto_por_cancelar.length <= 6 && monto_por_cancelar.length >= 9) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'El Monto Debe Tener 6 A 8 Caracteres',
            })
            return false;
        } else {
            Swal.fire({
				title: "Hecho!",
				text: "Se Ha Registrado Correctamente",
				icon: "success",
				button: "Continuar",
            });
        }

    });
});
</script>
	</body>
</html>









