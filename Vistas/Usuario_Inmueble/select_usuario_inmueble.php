<div class="mdl-cell mdl-cell--12-col">
	<div class="mdl-textfield mdl-js-textfield">
		<select required class="mdl-textfield__input"  name="slcpago" id="slcpago">
			<option selected hidden disabled >Selecione un pago</option>
			<?php
			foreach ($pagos as $pago){?>
				
				<option value="<?php echo $pago->codigo_pago; ?>">
					<?php echo $pago->codigo_pago;?>
				</option>	
			<?php } ?>
		</select>
	</div>
</div>