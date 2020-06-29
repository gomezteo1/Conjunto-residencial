<?php
if ($_GET['controller'] == 'abono' ){
	?>
<div class="mdl-cell mdl-cell--12-col">
	<div class="mdl-textfield mdl-js-textfield">
		<select required class="mdl-textfield__input" name="slcpago" id="slcpago">
			<option selected hidden disabled >Seleccioné Un Pago</option>
			<?php
			foreach ($pagos as $pago){?>
				
			<option <?php echo isset($abono) && $abono->codigo_pago==$pago->codigo_pago ?'
				selected':''; ?> value="<?php echo $pago->codigo_pago; ?>" nombre="<?php echo  $pago->Datos;  ?>" >
				<?php echo $pago->Datos;?>
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
		<select required class="mdl-textfield__input"  name="slcpago" id="slcpago">
			<option selected hidden disabled >Seleccioné Un Pago</option>
			<?php
			foreach ($pagos as $pago){?>
				
				<option value="<?php echo $pago->codigo_pago; ?>">
					<?php echo $pago->codigo_pago;?>
				</option>	
			<?php } ?>
		</select>
	</div>
</div>

<?php
 	
}?>
