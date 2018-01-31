<!-- Vista facturacion/formulario -->
<form class="form-horizontal" role="form" id="frm_facturacion">
	<div class="form-group">
		<label for="frm_facturacion_tiposervicio" class="col-sm-2 control-label">Tipo de Servicio</label>
		<div class="col-sm-4">
			<select id="frm_facturacion_tiposervicio" name="frm_facturacion_tiposervicio" class="form-control">
				<?php if($tiposervicio!==false) foreach($tiposervicio["opciones"] as $opc): ?>
					<option value="<?= $opc["idcatalogodet"]; ?>" <?= ($opc["idcatalogodet"]==$objeto->getTiposervicio()?'selected="selected"':''); ?> >
						<?= $opc["descripcion"]; ?>
					</option>
				<?php endforeach; ?>
			</select>
		</div>
		<label for="frm_facturacion_tipocobro" class="col-sm-2 control-label">Tipo de Cobro</label>
		<div class="col-sm-4">
			<select id="frm_facturacion_tipocobro" name="frm_facturacion_tipocobro" class="form-control">
				<?php if($tipocobro!==false) foreach($tipocobro["opciones"] as $opc): ?>
					<option value="<?= $opc["idcatalogodet"]; ?>" <?= ($opc["idcatalogodet"]==$objeto->getTipocobro()?'selected="selected"':''); ?> >
						<?= $opc["descripcion"]; ?>
					</option>
				<?php endforeach; ?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="frm_facturacion_precio" class="col-sm-2 control-label">Precio</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="frm_facturacion_precio" name="frm_facturacion_precio" value="<?= $objeto->getPrecio(); ?>" placeholder="Precio" />
		</div>
		<label for="frm_facturacion_kilosintegrados" class="col-sm-2 control-label">Unidades Integradas</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="frm_facturacion_kilosintegrados" name="frm_facturacion_kilosintegrados" value="<?= $objeto->getKilosintegrados(); ?>" placeholder="Unidades Integrades" />
		</div>
	</div>
	<div class="form-group">
		<label for="frm_facturacion_kiloexcedido" class="col-sm-2 control-label">Precio Unidades Excedidas</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="frm_facturacion_kiloexcedido" name="frm_facturacion_kiloexcedido" value="<?= $objeto->getKiloexcedido(); ?>" placeholder="Precio Unidad Excedida" />
		</div>
		<label for="frm_facturacion_unidad" class="col-sm-2 control-label">Unidad</label>
		<div class="col-sm-4">
			<select id="frm_facturacion_unidad" name="frm_facturacion_unidad" class="form-control">
				<?php if($unidad!==false) foreach($unidad["opciones"] as $opc): ?>
					<option value="<?= $opc["idcatalogodet"]; ?>" <?= ($opc["idcatalogodet"]==$objeto->getUnidad()?'selected="selected"':''); ?> >
						<?= $opc["descripcion"]; ?>
					</option>
				<?php endforeach; ?>
			</select>
		</div>
	</div>
</form>
<!-- Vista facturacion/formulario End -->