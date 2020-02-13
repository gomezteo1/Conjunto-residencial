
<?php
if ($_GET['controller'] == 'pago' ){
	?>
<div class="mdl-cell mdl-cell--12-col">
	<div class="mdl-textfield mdl-js-textfield">
		<select required class="mdl-textfield__input" name="slcusuario" id="slcusuario">
			<option selected hidden disabled >Selecione un usuario</option>
			<?php
			foreach ($usuarios as $usuario){?>
				
				<option <?php 
					echo  isset($pago) && $pago->id_usuario==$usuario->id_usuario ?'
				selected':''; ?> value="<?php echo $usuario->id_usuario; ?>">
					<?php echo $usuario->nombres;?>
				</option>		
			<?php } ?>
		</select>
	</div>
</div>

<?php
 }

else if($_GET['controller'] == 'usuario_inmueble' ){
	?>
	<div class="mdl-cell mdl-cell--12-col">
	<div class="mdl-textfield mdl-js-textfield">
		<select required class="mdl-textfield__input" name="slcusuario" id="slcusuario">
			<option selected hidden disabled >Selecione un usuario</option>
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

<?php
}

else if($_GET['controller'] == 'abono'){
	?>
	<div class="mdl-cell mdl-cell--12-col">
	<div class="mdl-textfield mdl-js-textfield">
		<select required class="mdl-textfield__input" name="slcusuario" id="slcusuario">
			<option selected hidden disabled >Selecione un usuario</option>
			<?php
			foreach ($usuarios as $usuario){?>
				
				<option <?php 
					echo  isset($abono) && $abono->id_usuario==$usuario->id_usuario ?'
				selected':''; ?> value="<?php echo $usuario->id_usuario; ?>">
					<?php echo $usuario->nombres;?>
				</option>		
			<?php } ?>
		</select>
	</div>
</div>

<?php
}

else if($_GET['controller'] == 'cuenta_cobro'){
	?>
	<div class="mdl-cell mdl-cell--12-col">
	<div class="mdl-textfield mdl-js-textfield">
		<select required class="mdl-textfield__input" name="slcusuario" id="slcusuario">
			<option selected hidden disabled >Selecione un usuario</option>
			<?php
			foreach ($usuarios as $usuario){?>
				
				<option <?php 
					echo  isset($cuenta_cobro) && $cuenta_cobro->id_usuario==$usuario->id_usuario ?'
				selected':''; ?> value="<?php echo $usuario->id_usuario; ?>">
					<?php echo $usuario->nombres;?>
				</option>		
			<?php } ?>
		</select>
	</div>
</div>

<?php
 }

else{
	?>
	<div class="mdl-cell mdl-cell--12-col">
	<div class="mdl-textfield mdl-js-textfield">
		<select required class="mdl-textfield__input" name="slcusuario" id="slcusuario">
			<option selected hidden disabled >Selecione un usuario</option>
			<?php
			foreach ($usuarios as $usuario){?>
				
				<option  value="<?php echo $usuario->id_usuario; ?>">
					<?php echo $usuario->nombres;?>
				</option>		
			<?php } ?>
		</select>
	</div>
</div>

<?php
 	
}?>