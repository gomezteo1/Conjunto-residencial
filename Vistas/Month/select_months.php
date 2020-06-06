<?php
if ($_GET['controller'] == 'cuenta_cobro' ){
	?>
<div class="mdl-cell mdl-cell--12-col">
	<div class="mdl-textfield mdl-js-textfield">
		<select required class="mdl-textfield__input" name="slcmonth" id="slcmonth">
			<option selected hidden disabled >Seleccioné Un Mes Y Tarifa</option>
			<?php
			foreach ($months as $month){?>
				<option <?php echo isset($cuenta_cobro) && $cuenta_cobro->codigo_month==$month->codigo_month ?'
				selected':'';?> value="<?php echo $month->codigo_month; ?>"fecha="<?php echo  $month->elmesesito;  ?>">
					<?php echo $month->elmesesito;?>
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
		<select required class="mdl-textfield__input" name="slcmonth" id="slcmonth">
			<option selected hidden disabled >Seleccioné Un Mes Y Tarifa</option>
			<?php
			foreach ($months as $month){?>
				
				 <option <?php echo $cuenta_cobro->codigo_month==$month->codigo_month ?'selected':'' ?> value="<?php echo $month->codigo_month; ?>">
			     	<?php echo $month->mes;?>
			     </option>
			<?php } ?>
		</select>
	</div>
</div>


<?php
 	
}?>




