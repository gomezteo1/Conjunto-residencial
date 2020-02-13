<?php
if ($_GET['controller'] == 'cuenta_cobro' ){
	?>
<div class="mdl-cell mdl-cell--12-col">
	<div class="mdl-textfield mdl-js-textfield">
		<select required class="mdl-textfield__input" name="slctipo_pago" id="slcslctipo_pago">
			<option selected hidden disabled >Selecione un pago</option>
			<?php
			foreach ($tipo_pagos as $tipo_pago){?>
				
				<option <?php 
					echo  isset($cuenta_cobro) && $cuenta_cobro->codigo_tipo_pago==$tipo_pago->codigo_tipo_pago ?'
				selected':''; ?> value="<?php echo $tipo_pago->codigo_tipo_pago; ?>">
					<?php echo $tipo_pago->tipo_pago;?>
				</option>		
			<?php } ?>
		</select>
	</div>
</div>

<?php
 }

else if($_GET['controller'] == 'pago' ){
	?>
	
	<div class="mdl-cell mdl-cell--12-col">
	<div class="mdl-textfield mdl-js-textfield">
		<select required class="mdl-textfield__input" name="slctipo_pago" id="slcslctipo_pago">
			<option selected hidden disabled >Selecione un pago</option>
			<?php
			foreach ($tipo_pagos as $tipo_pago){?>
				
				<option <?php 
					echo  isset($pago) && $pago->codigo_tipo_pago==$tipo_pago->codigo_tipo_pago ?'
				selected':''; ?> value="<?php echo $tipo_pago->codigo_tipo_pago; ?>">
					<?php echo $tipo_pago->tipo_pago;?>
				</option>		
			<?php } ?>
		</select>
	</div>
</div>

<?php
}else{?>

	<div class="mdl-cell mdl-cell--12-col">
	<div class="mdl-textfield mdl-js-textfield">
		<select required class="mdl-textfield__input" name="slctipo_pago" id="slctipo_pago">
			<option selected hidden disabled >Selecione un tipo de pago</option>
			<?php
			foreach ($tipo_pagos as $tipo_pago){?>
				<option value="<?php echo $tipo_pago->codigo_tipo_pago; ?>">
				<?php echo $tipo_pago->tipo_pago?>
				</option>		
			<?php } ?>
		</select>
	</div>
</div>

<?php
 	
}?>
