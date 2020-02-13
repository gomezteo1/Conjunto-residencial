
<div class="form-group">
<select class="form-control" name="slcinquilino" id="slcinquilino">
<?php
foreach ($inquilinos as $inquilino){?>
     <option value="<?php echo $inquilino->documeto; ?>">
     <?php echo $inquilino->nombres." ".$inquilino->apellidos;?>
     </option>
<?php } ?>
</select>
</div>