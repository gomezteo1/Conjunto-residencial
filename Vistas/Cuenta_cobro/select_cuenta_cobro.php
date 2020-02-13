<?php
if ($_GET['controller'] == 'pago' ){
	?>
<div class="mdl-cell mdl-cell--12-col">
	<div class="mdl-textfield mdl-js-textfield">
		<select required class="mdl-textfield__input" name="slccuenta_cobro" id="slccuenta_cobro">
			<option selected hidden disabled >Selecione una cuenta de cobro</option>
			<?php
			foreach ($cuenta_cobros as $cuenta_cobro){?>
				
				<option <?php 
					echo  isset($pago) && $pago->codigo_cuenta_cobro==$cuenta_cobro->codigo_cuenta_cobro ?'
				selected':''; ?> value="<?php echo $cuenta_cobro->codigo_cuenta_cobro; ?>">
					<?php echo $cuenta_cobro->codigo_cuenta_cobro;?>
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
		<select required class="mdl-textfield__input" name="slccuenta_cobro" id="slccuenta_cobro">
			<option selected hidden disabled >Selecione una cuenta de cobro</option>
			<?php
			foreach ($cuenta_cobros as $cuenta_cobro){?>
				<option <?php echo $pago->codigo_cuenta_cobro==$cuenta_cobro->codigo_cuenta_cobro ?'selected':'' ?> value="<?php echo $cuenta_cobro->codigo_cuenta_cobro; ?>">
			     	<?php echo $cuenta_cobro->codigo_cuenta_cobro;?>
			     </option>
			<?php } ?>
		</select>
	</div>
</div>

<?php
 	
}?>







