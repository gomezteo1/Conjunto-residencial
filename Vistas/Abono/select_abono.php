<select name="slcabono" id="slcabono">
<option selected hidden disabled >Selecione un abono</option>
<?php
foreach ($abonos as $abono) { ?>
	
	<option value="<?php echo $abono->codigo_abono; ?>">
		<?php echo $abono->abono_valor; ?>
	</option>		
<?php } ?>
</select>