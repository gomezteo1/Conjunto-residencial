<?php
	if ($_GET['controller'] == 'usuario' ){
?>
<div class="mdl-cell mdl-cell--12-col">
	<div class="mdl-textfield mdl-js-textfield">
		<select required class="mdl-textfield__input" name="slctipo_documento" id="slctipo_documento">
			<option selected hidden disabled >Seleccioné Un Tipo De Documento</option>
			<?php
			foreach ($tipo_documentos as $tipo_documento){?>
					<option <?php 
					echo  isset($usuario) && $usuario->id_tipo_documento==$tipo_documento->id_tipo_documento ?'
				selected':''; ?> value="<?php echo $tipo_documento->id_tipo_documento; ?>">
				<?php echo $tipo_documento->documento;?>
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
		<select required class="mdl-textfield__input" name="slctipo_documento" id="slctipo_documento">
			<option selected hidden disabled >Seleccioné Un Tipo De Documento</option>
			<?php
			foreach ($tipo_documentos as $tipo_documento){?>
				<option value="<?php echo $tipo_documento->id_tipo_documento; ?>">
				<?php echo $tipo_documento->documento;?>
						</option>		
			<?php } ?>
		</select>
	</div>
</div>
<?php
}?>

