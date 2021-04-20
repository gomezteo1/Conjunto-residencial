<?php if($_GET['controller'] == 'usuario_inmueble' ){ ?>
	<div class="mdl-cell mdl-cell--12-col">
	<div class="mdl-textfield mdl-js-textfield">
		<select required class="mdl-textfield__input" name="slcusuario" id="slcusuario">
			<option selected hidden disabled >Seleccioné Un Usuario</option>
			<?php
			foreach ($usuarios as $usuario){?>
				<option <?php 
					echo  isset($usuario_inmueble) && $usuario_inmueble->id_usuario==$usuario->id_usuario ?'
				selected':''; ?> value="<?php echo $usuario->id_usuario; ?>">
					<?php echo $usuario->nombres;?>
				</option>		
			<?php } ?>
		</select>
	</div>
</div>
<?php }else{ ?>
	<div class="mdl-cell mdl-cell--12-col">
	<div class="mdl-textfield mdl-js-textfield">
		<select required class="mdl-textfield__input" name="slcusuario" id="slcusuario">
			<option selected hidden disabled >Seleccioné Un Usuario</option>
			<?php
			foreach ($usuarios as $usuario){?>
				<option  value="<?php echo $usuario->id_usuario; ?>">
					<?php echo $usuario->nombres;?>
				</option>		
			<?php } ?>
		</select>
	</div>
</div>
<?php } ?>