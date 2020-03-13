<?php

if($_GET['controller'] == 'cuenta_cobro'){ ?>
	<div class="mdl-cell mdl-cell--12-col">
	<div class="mdl-textfield mdl-js-textfield">
		<select required class="mdl-textfield__input" name="slcusuario_inmueble" id="slcusuario_inmueble">
			<option selected hidden disabled >Selecione un usuario e inmueble</option>
			<?php
			foreach ($usuario_inmuebles as $usuario_inmueble){?>
				
				<option <?php 
					echo  isset($cuenta_cobro) && $cuenta_cobro->id_usuario_inmueble==$usuario_inmueble->id_usuario_inmueble ?'
				selected':''; ?> value="<?php echo $usuario_inmueble->id_usuario_inmueble; ?>">
					<?php echo $usuario_inmueble->id_usuario_inmueble;?>
				</option>		
			<?php } ?>
		</select>
	</div>
</div>

<?php }

else{
	?>
	<div class="mdl-cell mdl-cell--12-col">
	<div class="mdl-textfield mdl-js-textfield">
		<select required class="mdl-textfield__input" name="slcusuario_inmueble" id="slcusuario_inmueble">
			<option selected hidden disabled >Selecione un usuario e inmueble</option>
			<?php
			foreach ($usuario_inmuebles as $usuario_inmueble){?>
				
				<option  value="<?php echo $usuario_inmueble->id_usuario_inmueble; ?>">
					<?php echo $usuario_inmueble->id_usuario_inmueble;?>
				</option>		
			<?php } ?>
		</select>
	</div>
</div>

<?php
 	
}?>