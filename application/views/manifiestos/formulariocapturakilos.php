<!-- Vista manifiestos/formulariocapturakilos -->
<?php
//var_dump( $recoleccion );
$total=0.0;
?><form id="frm_captura_kilos" style="max-width: 1200px; font-size: 85%; overflow: auto; max-height: 550px;">
	<div class="row">
		<label for="frm_noexterno" class="col-sm-4 control-label">No. Externo</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="frm_noexterno" name="frm_noexterno" value="<?= $noexterno; ?>" />
		</div>
	</div>
	<div class="row">
		<?php
		$tipo_residuo_cat = "";
		$grid_opened = false;
		foreach( $recoleccion as $kr => $rec ) {
			if( $tipo_residuo_cat != $rec[ 'residuo' ][ 'opcion' ] ) {
				$tipo_residuo_cat = $rec[ 'residuo' ][ 'opcion' ];
				if( $grid_opened ) {
					?></tbody></table></div></div><?php
				}
				$grid_opened = true;
				?>
				<div class="col-sm-4">
					<h5><?php echo $tipo_residuo_cat; ?></h5>
					<div class="table-responsive">
					<table class="table table-striped table-hover">
						<tbody class="tblCantidades">
				<?php
			}
			?>
			<tr>
				<td><?= $rec["residuo"]["nombre"]; ?></td>
				<!--<td>
					<input type="text" id="capacidad_<?= $rec["residuo"]["idresiduo"]; ?>" name="capacidad_<?= $rec["residuo"]["idresiduo"]; ?>" value="<?= ($rec["recoleccion"]!==false?$rec["recoleccion"]["contenedorcapacidad"]:""); ?>" />
				</td>
				<td>
					<input type="text" id="tipo_<?= $rec["residuo"]["idresiduo"]; ?>" name="tipo_<?= $rec["residuo"]["idresiduo"]; ?>" value="<?= ($rec["recoleccion"]!==false?$rec["recoleccion"]["contenedortipo"]:""); ?>" />
				</td>-->
				<td>
					<input type="text" class="form-control numero" id="cantidad_<?= $rec["residuo"]["idresiduo"]; ?>" name="cantidad_<?= $rec["residuo"]["idresiduo"]; ?>" value="<?= ($rec["recoleccion"]!==false?$rec["recoleccion"]["cantidad"]:""); ?>" maxlength="8" onchange="Manifiesto.SumaCantidad()" />
				</td>
				<!--<td>
					<input type="text" id="unidad_<?= $rec["residuo"]["idresiduo"]; ?>" name="unidad_<?= $rec["idresiduo"]["idresiduo"]; ?>" value="<?= ($rec["recoleccion"]!==false?$rec["recoleccion"]["unidad"]:""); ?>" />
				</td>-->
			</tr>
			<?php
			$total+=floatval(($rec["recoleccion"]!==false?$rec["recoleccion"]["cantidad"]:"0"));
		}
		if( $grid_opened ) {
			?></tbody></table></div></div><?php
		}
		?>
	</div>
	<div class="row">
		<div class="col-sm-2"><strong>Total</strong></div>
		<div class="col-sm-10"><input type="text" class="form-control numero" id="total" name="total" readonly="readonly" value="<?= number_format($total,3); ?>" /></div>
	</div>
	<div class="row">
		<div class="col-sm-2"><i>Si el servicio no se realizó:</i></div>
		<div class="col-sm-10">
			<select id="frm_motivo" name="frm_motivo" class="form-control">
				<option value=""></option>
				<?php foreach($motivos as $cat): ?>
					<optgroup label="<?= $cat["descripcion"]; ?>"></optgroup>
					<?php foreach($cat["opciones"] as $opc): ?>
						<option value="<?= $opc["idcatalogodet"]; ?>" <?= ($motivo==$opc["idcatalogodet"]?'selected="selected"':""); ?>><?= $opc["descripcion"]; ?></option>
					<?php endforeach; ?>
				<?php endforeach; ?>
			</select>
		</div>
	</div>
	<input type="hidden" class="form-control" id="frm_manifiesto_fecha_captura" name="frm_manifiesto_fecha_captura" value="<?= $fecha_captura; ?>"  />
	<input type="hidden" class="form-control" id="frm_manifiesto_capturista" name="frm_manifiesto_capturista" value="<?= $capturista; ?>" />
</form>
<!-- Vista manifiestos/formulariocapturakilos End -->