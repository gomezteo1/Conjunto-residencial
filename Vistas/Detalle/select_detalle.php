<select name="slcdetalle" id="slcdetalle">
<?php
foreach ($detalles as $detalle){?>
     <option value="<?php echo $detalle->id_mes; ?>">
     <?php echo $detalle->id_mes;?>
     </option>
<?php } ?>
</select>