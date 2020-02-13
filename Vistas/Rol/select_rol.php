

<?php
if ($_GET['controller'] == 'usuario' ){
	?>
<div class="mdl-cell mdl-cell--12-col">
	<div class="mdl-textfield mdl-js-textfield">
		<select required class="mdl-textfield__input" name="slcrol" id="slcrol">
			<option selected hidden disabled >Selecione un rol</option>
			<?php
			foreach ($roles as $rol){?>
				
				<option <?php echo isset($usuario) && $usuario->id_rol==$rol->id_rol ?'selected':'' ?> value="<?php echo $rol->id_rol; ?>">
					<?php echo $rol->rol;?>
				</option>	
			<?php } ?>
		</select>
	</div>
</div>

<?php
 }else{
	?>
	
	<div class="mdl-cell mdl-cell--12-col">
	<div class="mdl-textfield mdl-js-textfield">
		<select required class="mdl-textfield__input" name="slcrol" id="slcrol">
			<option selected hidden disabled >Selecione un rol</option>
			<?php
			foreach ($roles as $rol){?>
				
				<option value="<?php echo $rol->id_rol; ?>">
					<?php echo $rol->rol;?>
				</option>	
			<?php } ?>
		</select>
	</div>
</div>


<?php
 	
}?>

