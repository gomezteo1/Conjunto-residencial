<select name="slcabono" id="slcabono">
<option selected hidden disabled >Seleccioné Un Abono</option>
<?php
foreach ($abonos as $abono) { ?>
	
	<option value="<?php echo $abono->codigo_abono; ?>">
		<?php echo $abono->abono_valor; ?>
	</option>		
<?php } ?>
</select>