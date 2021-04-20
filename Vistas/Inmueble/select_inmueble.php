<?php
if ($_GET['controller'] == 'cuenta_cobro' ){
	?>
<div class="mdl-cell mdl-cell--12-col">
	<div class="mdl-textfield mdl-js-textfield">
		<select required class="mdl-textfield__input" name="slcinmueble" id="slcinmueble">
			<option selected hidden disabled >Seleccioné Un Inmueble</option>
			<?php
			foreach ($inmuebles as $inmueble){?>
				<option <?php 
					echo  isset($cuenta_cobro) && $cuenta_cobro->codigo_inmueble==$inmueble->codigo_inmueble ?'
				selected':''; ?> value="<?php echo $inmueble->codigo_inmueble; ?>">
					<?php echo $inmueble->numero;?>
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
		<select required class="mdl-textfield__input" name="slcinmueble" id="slcinmueble">
			<option selected hidden disabled >Seleccioné Un Inmueble</option>
			<?php
			foreach ($inmuebles as $inmueble){?>
				<option <?php 
					echo  isset($usuario_inmueble) && $usuario_inmueble->codigo_inmueble==$inmueble->codigo_inmueble ?'
				selected':''; ?> value="<?php echo $inmueble->codigo_inmueble; ?>">
					<?php echo $inmueble->numero,' ,Torre: ',$inmueble->torre;?>
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
		<select required class="mdl-textfield__input" name="slcinmueble" id="slcinmueble">
			<option selected hidden disabled >Seleccioné Un Inmueble</option>
			<?php
			foreach ($inmuebles as $inmueble){?>
				<option value="<?php echo $inmueble->codigo_inmueble; ?>">
			     	<?php echo $inmueble->numero;?>
			     </option>
			<?php } ?>
		</select>
	</div>
</div>

<?php
 	
}?>
