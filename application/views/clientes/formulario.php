<!-- Vista cliente/formulario -->
<?= $menumain; ?>
<div class="container">
	<h3>Clientes</h3>
	<form class="form-horizontal" role="form" id="frm_clientes">
		<input type="hidden" id="frm_cliente_idsucursal" name="frm_cliente_idsucursal" value="<?= $idsucursal; ?>" />
		<input type="hidden" id="frm_cliente_idcliente" name="frm_cliente_idcliente" value="<?= $objeto->getIdcliente(); ?>" />
		<div class="form-group">
			<label for="frm_cliente_razonsocial" class="col-sm-2 control-label">Razón Social <abbr class="text-danger" title="Campo Obligatorio">(*)</abbr></label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="frm_cliente_razonsocial" name="frm_cliente_razonsocial" value="<?= $objeto->getRazonsocial(); ?>" placeholder="Nombre o Razón Social del Cliente" maxlength="60" />
			</div>
		</div>
		<div class="form-group">
			<label for="frm_cliente_nombrecorto" class="col-sm-2 control-label">Nombre Corto</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="frm_cliente_nombrecorto" name="frm_cliente_nombrecorto" value="<?= $objeto->getNombreCorto(); ?>" placeholder="Nombre Corto del Cliente" maxlength="250" />
			</div>
		</div>
		<div class="form-group">
			<label for="frm_cliente_identificador" class="col-sm-2 control-label">Número de Cliente <abbr class="text-danger" title="Campo Obligatorio">(*)</abbr></label>
			<div class="col-sm-4">
				<input type="text" class="form-control" id="frm_cliente_identificador" name="frm_cliente_identificador" value="<?= $objeto->getIdentificador(); ?>" placeholder="Número de Cliente" readonly="readonly" maxlength="13" />
			</div>
			<label for="frm_cliente_rfc" class="col-sm-2 control-label">Registro Federal de Contribuyentes <abbr class="text-danger" title="Campo Obligatorio">(*)</abbr></label>
			<div class="col-sm-4">
				<input type="text" class="form-control" id="frm_cliente_rfc" name="frm_cliente_rfc" value="<?= $objeto->getRfc(); ?>" placeholder="Registro Federal de Contribuyentes del Cliente" />
			</div>
		</div>
		<div class="form-group">
			<label for="frm_cliente_vendedor" class="col-sm-2 control-label">Vendedor</label>
			<div class="col-sm-4">
				<select id="frm_cliente_vendedor" name="frm_cliente_vendedor" class="form-control">
					<?php if($vendedor!==false) foreach($vendedor["opciones"] as $opc): ?>
						<option value="<?= $opc["idcatalogodet"]; ?>" <?= ($opc["idcatalogodet"]==$objeto->getVendedor()?'selected="selected"':''); ?> >
							<?= $opc["descripcion"]; ?>
						</option>
					<?php endforeach; ?>
				</select>
			</div>
			<label for="frm_cliente_afiliacion" class="col-sm-2 control-label">Afiliación</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" id="frm_cliente_afiliacion" name="frm_cliente_afiliacion" value="<?= $objeto->getAfiliacion(); ?>" placeholder="Afiliación" />
			</div>
		</div>
		<div class="form-group">
			<label for="frm_cliente_giro" class="col-sm-2 control-label">Giro</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" id="frm_cliente_giro" name="frm_cliente_giro" value="<?= $objeto->getGiro(); ?>" placeholder="Giro del Cliente" />
			</div>
			<label for="frm_cliente_fechaalta" class="col-sm-2 control-label">Fecha de Alta en Sistema</label>
			<div class="col-sm-4">
				<input type="date" class="form-control" id="frm_cliente_fechaalta" name="frm_cliente_fechaalta" value="<?= $objeto->getFechaalta(); ?>" />
			</div>
		</div>
		<div class="form-group">
			<label for="frm_cliente_status" class="col-sm-2 control-label">Estatus</label>
			<div class="col-sm-4">
				<select id="frm_cliente_status" name="frm_cliente_status" class="form-control">
					<?php if($estatuscliente!==false) foreach($estatuscliente["opciones"] as $opc): ?>
						<option value="<?= $opc["idcatalogodet"]; ?>" <?= ($opc["idcatalogodet"]==$objeto->getStatus()?'selected="selected"':''); ?> >
							<?= $opc["descripcion"]; ?>
						</option>
					<?php endforeach; ?>
				</select>
				<input type="hidden" id="frm_cliente_fechastatus" name="frm_cliente_fechastatus" value="<?= $objeto->getFechastatus(); ?>" />
				<input type="hidden" id="frm_cliente_status_current" name="frm_cliente_status_current" value="<?= $objeto->getStatus(); ?>" />
			</div>
		</div>
		<h5>Contrato</h5>
		<div class="form-group">
			<label for="frm_cliente_fechacontratoinicio" class="col-sm-2 control-label">Fecha de Inicio</label>
			<div class="col-sm-4">
				<input type="date" class="form-control" id="frm_cliente_fechacontratoinicio" name="frm_cliente_fechacontratoinicio" value="<?= $objeto->getFechacontratoinicio(); ?>" />
			</div>
			<label for="frm_cliente_fechacontratofin" class="col-sm-2 control-label">Fecha de Termino</label>
			<div class="col-sm-4">
				<input type="date" class="form-control" id="frm_cliente_fechacontratofin" name="frm_cliente_fechacontratofin" value="<?= $objeto->getFechacontratofin(); ?>" />
			</div>
		</div>
		<h5>Servicios</h5>
		<div class="form-group">
			<label for="frm_cliente_fechaserviciosinicio" class="col-sm-2 control-label">Fecha de Inicio</label>
			<div class="col-sm-4">
				<input type="date" class="form-control" id="frm_cliente_fechaserviciosinicio" name="frm_cliente_fechaserviciosinicio" value="<?= $objeto->getFechaserviciosinicio(); ?>" />
			</div>
			<label for="frm_cliente_fechaserviciosfin" class="col-sm-2 control-label">Fecha de Termino</label>
			<div class="col-sm-4">
				<input type="date" class="form-control" id="frm_cliente_fechaserviciosfin" name="frm_cliente_fechaserviciosfin" value="<?= $objeto->getFechaserviciosfin(); ?>" />
			</div>
		</div>
		<h5>Dirección</h5>
		<div class="form-group">
			<label for="frm_cliente_calle" class="col-sm-2 control-label">Calle</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="frm_cliente_calle" name="frm_cliente_calle" value="<?= $objeto->getCalle(); ?>" placeholder="Calle" />
			</div>
		</div>
		<div class="form-group">
			<label for="frm_cliente_numexterior" class="col-sm-2 control-label">Número Exterior</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" id="frm_cliente_numexterior" name="frm_cliente_numexterior" value="<?= $objeto->getNumexterior(); ?>" placeholder="Número Exterior de la Empresa" />
			</div>
			<label for="frm_cliente_numinterior" class="col-sm-2 control-label">Número Interior</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" id="frm_cliente_numinterior" name="frm_cliente_numinterior" value="<?= $objeto->getNuminterior(); ?>" placeholder="Número Interior de la Empresa" />
			</div>
		</div>
		<div class="form-group">
		    <label for="frm_cliente_cp" class="col-sm-2 control-label">Código Postal</label>
			<div class="col-sm-3">
				<input type="number" class="form-control" id="frm_cliente_cp" name="frm_cliente_cp" value="<?= $objeto->getCp(); ?>" placeholder="C. P." min="0" max="99999" />
			</div>
			<div class="col-sm-1">
				<button type="button" class="btn btn-default" onclick="Cliente.DisplayFrmCP()">
					<span class="glyphicon glyphicon-search"></span>
				</button>
			</div>
			<label for="frm_cliente_colonia" class="col-sm-2 control-label">Colonia</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" id="frm_cliente_colonia" name="frm_cliente_colonia" value="<?= $objeto->getColonia(); ?>" placeholder="colonia" />
			</div>
		</div>
		<div class="form-group">
			<label for="frm_cliente_municipio" class="col-sm-2 control-label">Delegación o Municipio</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" id="frm_cliente_municipio" name="frm_cliente_municipio" value="<?= $objeto->getMunicipio(); ?>" placeholder="Delegación o Municipio" />
			</div>
			<label for="frm_cliente_estado" class="col-sm-2 control-label">Estado</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" id="frm_cliente_estado" name="frm_cliente_estado" value="<?= $objeto->getEstado(); ?>" placeholder="Estado" />
			</div>
		</div>
		<div class="form-group">
			<label for="frm_cliente_referencias" class="col-sm-2 control-label">Referencias</label>
			<div class="col-sm-10">
				<textarea rows="3" class="form-control" id="frm_cliente_referencias" name="frm_cliente_referencias"><?= $objeto->getReferencias(); ?></textarea>
			</div>
		</div>
		<h5>Contacto</h5>
		<div class="form-group">
			<label for="frm_cliente_representante" class="col-sm-2 control-label">Representante <abbr class="text-danger" title="Campo Obligatorio">(*)</abbr></label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="frm_cliente_representante" name="frm_cliente_representante" value="<?= $objeto->getRepresentante(); ?>" placeholder="Representante" />
			</div>
		</div>
		<div class="form-group">
			<label for="frm_cliente_representantecargo" class="col-sm-2 control-label">Cargo</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" id="frm_cliente_representantecargo" name="frm_cliente_representantecargo" value="<?= $objeto->getRepresentantecargo(); ?>" placeholder="Cargo del Representante" />
			</div>
			<label for="frm_cliente_representanteemail" class="col-sm-2 control-label">Corro Electrónico</label>
			<div class="col-sm-4">
				<input type="email" class="form-control" id="frm_cliente_representanteemail" name="frm_cliente_representanteemail" value="<?= $objeto->getRepresentanteemail(); ?>" placeholder="Correo Electrónico" />
			</div>
		</div>
		<div class="form-group">
			<label for="frm_cliente_representantetelefono" class="col-sm-2 control-label">Teléfono</label>
			<div class="col-sm-4">
				<input type="tel" class="form-control" id="frm_cliente_representantetelefono" name="frm_cliente_representantetelefono" value="<?= $objeto->getRepresentantetelefono(); ?>" placeholder="Teléfono" maxlength="13" />
			</div>
			<label for="frm_cliente_representanteextencion" class="col-sm-2 control-label">Extensión</label>
			<div class="col-sm-4">
				<input type="tel" class="form-control" id="frm_cliente_representanteextencion" name="frm_cliente_representanteextencion" value="<?= $objeto->getRepresentanteextencion(); ?>" placeholder="Extensión" maxlength="5" />
			</div>
		</div>
		<div class="form-group">
			<label for="frm_cliente_representantetelefono2" class="col-sm-2 control-label">Teléfono 2</label>
			<div class="col-sm-4">
				<input type="tel" class="form-control" id="frm_cliente_representantetelefono2" name="frm_cliente_representantetelefono2" value="<?= $objeto->getRepresentantetelefono2(); ?>" placeholder="Teléfono 2" maxlength="13" />
			</div>
			<label for="frm_cliente_representanteextension2" class="col-sm-2 control-label">Extensión 2</label>
			<div class="col-sm-4">
				<input type="tel" class="form-control" id="frm_cliente_representanteextension2" name="frm_cliente_representanteextension2" value="<?= $objeto->getRepresentanteextension2(); ?>" placeholder="Extensión 2" maxlength="5" />	
			</div>
		</div>
		<h5>Notas y Observaciones</h5>
		<div class="form-group">
			<div class="col-sm-12">
				<textarea rows="3" class="form-control" id="frm_cliente_observaciones" name="frm_cliente_observaciones"><?= $objeto->getObservaciones(); ?></textarea>
			</div>
		</div>
		<h5>
			Facturación
			<button type="button" class="btn btn-default btn-xs" title="Agregar Opción" onclick="Cliente.FrmAgregarFacturacion()">
				<span class="glyphicon glyphicon-plus-sign"></span>
			</button>
		</h5>
		<div id="facturacion"><?= $facturaciones; ?></div>
		<div class="form-group">
			<div class="col-sm-3">
				<div class="checkbox">
					<label>
						<input type="checkbox" id="frm_cliente_facturaxgenerador" name="frm_cliente_facturaxgenerador" value="1" <?= ($objeto->getFacturaxgenerador()==1?'checked="checked"':''); ?> />
						Factura por generador
					</label>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="checkbox">
					<label>
						<input type="checkbox" id="frm_cliente_ordencompra" name="frm_cliente_ordencompra" value="1" <?= ($objeto->getOrdencompra()==1?'checked="checked"':''); ?> />
						Orden de Compra
					</label>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="checkbox">
					<label>
						<input type="checkbox" id="frm_cliente_desglosemanifiestos" name="frm_cliente_desglosemanifiestos" value="1" <?= ($objeto->getDesglosemanifiestos()==1?'checked="checked"':''); ?> />
						Desglosar Manifiestos
					</label>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label for="frm_cliente_leyendas" class="col-sm-2 control-label">Leyendas</label>
			<div class="col-sm-10">
				<textarea rows="3" class="form-control" id="frm_cliente_leyendas" name="frm_cliente_leyendas"><?= $objeto->getLeyendas(); ?></textarea>
			</div>
		</div>
		<h5>
			Cobranza
			<button type="button" class="btn btn-default btn-xs" title="Copiar datos desde generales" onclick="Cliente.CopiaGenerales()">
				<span class="glyphicon glyphicon-import"></span>
			</button>
		</h5>
		<div class="form-group">
			<label for="frm_cliente_diascredito" class="col-sm-2 control-label">Días de Crédito</label>
			<div class="col-sm-4">
				<select id="frm_cliente_diascredito" name="frm_cliente_diascredito" class="form-control">
					<?php if($diascredito!==false) foreach($diascredito["opciones"] as $opc): ?>
						<option value="<?= $opc["idcatalogodet"]; ?>" <?= ($opc["idcatalogodet"]==$objeto->getDiascredito()?'selected="selected"':''); ?> >
							<?= $opc["descripcion"]; ?>
						</option>
					<?php endforeach; ?>
				</select>
			</div>
			<label for="frm_cliente_referenciabancaria" class="col-sm-2 control-label">Referencia Bancaria</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" id="frm_cliente_referenciabancaria" name="frm_cliente_referenciabancaria" value="<?= $objeto->getReferenciabancaria(); ?>" placeholder="" />
			</div>
		</div>
		<div class="form-group">
			<label for="frm_cliente_metodopago" class="col-sm-2 control-label">Método de Pago</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" id="frm_cliente_metodopago" name="frm_cliente_metodopago" value="<?= $objeto->getMetodoPago(); ?>" placeholder="" maxlength="250" />
			</div>
			<label for="frm_cliente_referenciapago" class="col-sm-2 control-label">Referencia de Pago</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" id="frm_cliente_referenciapago" name="frm_cliente_referenciapago" value="<?= $objeto->getReferenciaPago(); ?>" placeholder="" maxlength="250" />
			</div>
		</div>
		<div class="form-group">
			<label for="frm_cliente_cobranzacontacto" class="col-sm-2 control-label">Contacto</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="frm_cliente_cobranzacontacto" name="frm_cliente_cobranzacontacto" value="<?= $objeto->getCobranzacontacto(); ?>" placeholder="Contacto" />
			</div>
		</div>
		<div class="form-group">
			<label for="frm_cliente_cobranzaemail" class="col-sm-2 control-label">Corro Electrónico</label>
			<div class="col-sm-10">
				<input type="email" class="form-control" id="frm_cliente_cobranzaemail" name="frm_cliente_cobranzaemail" value="<?= $objeto->getCobranzaemail(); ?>" placeholder="Correo Electrónico" />
			</div>
		</div>
		<div class="form-group">
			<label for="frm_cliente_cobranzatelefono" class="col-sm-2 control-label">Teléfono</label>
			<div class="col-sm-4">
				<input type="tel" class="form-control" id="frm_cliente_cobranzatelefono" name="frm_cliente_cobranzatelefono" value="<?= $objeto->getCobranzatelefono(); ?>" placeholder="Teléfono" maxlength="13" />
			</div>
			<label for="frm_cliente_cobranzaextension" class="col-sm-2 control-label">Extensión</label>
			<div class="col-sm-4">
				<input type="tel" class="form-control" id="frm_cliente_cobranzaextension" name="frm_cliente_cobranzaextension" value="<?= $objeto->getCobranzaextension(); ?>" placeholder="Extensión" maxlength="5" />
			</div>
		</div>
		<div class="form-group">
			<label for="frm_cliente_cobranzatelefono2" class="col-sm-2 control-label">Teléfono 2</label>
			<div class="col-sm-4">
				<input type="tel" class="form-control" id="frm_cliente_cobranzatelefono2" name="frm_cliente_cobranzatelefono2" value="<?= $objeto->getCobranzatelefono2(); ?>" placeholder="Teléfono" maxlength="13" />
			</div>
			<label for="frm_cliente_cobranzaextension2" class="col-sm-2 control-label">Extensión 2</label>
			<div class="col-sm-4">
				<input type="tel" class="form-control" id="frm_cliente_cobranzaextension2" name="frm_cliente_cobranzaextension2" value="<?= $objeto->getCobranzaextension2(); ?>" placeholder="Extensión" maxlength="5" />
			</div>
		</div>
		<div class="form-group">
			<label for="frm_cliente_cobranzaobservaciones" class="col-sm-2 control-label">Observaciones</label>
			<div class="col-sm-10">
				<textarea rows="3" class="form-control" id="frm_cliente_cobranzaobservaciones" name="frm_cliente_cobranzaobservaciones"><?= $objeto->getCobranzaobservaciones(); ?></textarea>
			</div>
		</div>
		<div class="form-group">
			<label for="frm_cliente_cobranzacalle" class="col-sm-2 control-label">Calle</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="frm_cliente_cobranzacalle" name="frm_cliente_cobranzacalle" value="<?= $objeto->getCobranzacalle(); ?>" placeholder="Calle" />
			</div>
		</div>
		<div class="form-group">
			<label for="frm_cliente_cobranzanumexterior" class="col-sm-2 control-label">Número Exterior</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" id="frm_cliente_cobranzanumexterior" name="frm_cliente_cobranzanumexterior" value="<?= $objeto->getCobranzanumexterior(); ?>" placeholder="Número Exterior" />
			</div>
			<label for="frm_cliente_cobranzanuminterior" class="col-sm-2 control-label">Número Interior</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" id="frm_cliente_cobranzanuminterior" name="frm_cliente_cobranzanuminterior" value="<?= $objeto->getCobranzanuminterior(); ?>" placeholder="Número Interior" />
			</div>
		</div>
		<div class="form-group">
		    <label for="frm_cliente_cobranzacp" class="col-sm-2 control-label">Código Postal</label>
			<div class="col-sm-3">
				<input type="number" class="form-control" id="frm_cliente_cobranzacp" name="frm_cliente_cobranzacp" value="<?= $objeto->getCobranzacp(); ?>" placeholder="C. P." min="0" max="99999" />
			</div>
			<div class="col-sm-1">
				<button type="button" class="btn btn-default" onclick="Cliente.DisplayFrmCPCobranza()">
					<span class="glyphicon glyphicon-search"></span>
				</button>
			</div>
			<label for="frm_cliente_cobranzacolonia" class="col-sm-2 control-label">Colonia</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" id="frm_cliente_cobranzacolonia" name="frm_cliente_cobranzacolonia" value="<?= $objeto->getCobranzacolonia(); ?>" placeholder="colonia" />
			</div>
		</div>
		<div class="form-group">
			<label for="frm_cliente_cobranzamunicipio" class="col-sm-2 control-label">Delegación o Municipio</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" id="frm_cliente_cobranzamunicipio" name="frm_cliente_cobranzamunicipio" value="<?= $objeto->getCobranzamunicipio(); ?>" placeholder="Delegación o Municipio" />
			</div>
			<label for="frm_cliente_cobranzaestado" class="col-sm-2 control-label">Estado</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" id="frm_cliente_cobranzaestado" name="frm_cliente_cobranzaestado" value="<?= $objeto->getCobranzaestado(); ?>" placeholder="Estado" />
			</div>
		</div>
		<h5>Facturación Electrónica</h5>
		<div class="form-group">
			<label for="frm_cliente_categoria" class="col-sm-2 control-label">Categoria</label>
			<div class="col-sm-4">
				<select id="frm_cliente_categoria" name="frm_cliente_categoria" class="form-control">
					<?php if( $categorias !== false ) foreach( $categorias[ "opciones" ] as $opc): ?>
						<option value="<?= $opc[ "idcatalogodet" ]; ?>" <?= ( $opc[ "idcatalogodet" ] == $objeto->getCategoria() ? 'selected="selected"' : '' ); ?> >
							<?= $opc[ "descripcion" ]; ?>
						</option>
					<?php endforeach; ?>
				</select>
			</div>
			<label for="frm_cliente_cfdi_moneda" class="col-sm-2 control-label">Moneda</label>
			<div class="col-sm-4">
				<select id="frm_cliente_cfdi_moneda" name="frm_cliente_cfdi_moneda" class="form-control">
					<?php if( $monedas !== false ) foreach( $monedas[ "opciones" ] as $opc): ?>
						<option value="<?= $opc[ "idcatalogodet" ]; ?>" <?= ( $opc[ "idcatalogodet" ] == $objeto->getCfdi_moneda() ? 'selected="selected"' : '' ); ?> >
							<?= $opc[ "descripcion" ]; ?>
						</option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label for="frm_cliente_cfdi_formapago" class="col-sm-2 control-label">Forma de Pago</label>
			<div class="col-sm-4">
				<select id="frm_cliente_cfdi_formapago" name="frm_cliente_cfdi_formapago" class="form-control">
					<?php if( $formaspago !== false ) foreach( $formaspago[ "opciones" ] as $opc): ?>
						<option value="<?= $opc[ "idcatalogodet" ]; ?>" <?= ( $opc[ "idcatalogodet" ] == $objeto->getcfdi_formapago() ? 'selected="selected"' : '' ); ?> >
							<?= $opc[ "descripcion" ]; ?>
						</option>
					<?php endforeach; ?>
				</select>
			</div>
			<label for="frm_cliente_cfdi_metodopago" class="col-sm-2 control-label">Método de Pago</label>
			<div class="col-sm-4">
				<select id="frm_cliente_cfdi_metodopago" name="frm_cliente_cfdi_metodopago" class="form-control">
					<?php if( $metodospago !== false ) foreach( $metodospago[ "opciones" ] as $opc): ?>
						<option value="<?= $opc[ "idcatalogodet" ]; ?>" <?= ( $opc[ "idcatalogodet" ] == $objeto->getcfdi_metodopago() ? 'selected="selected"' : '' ); ?> >
							<?= $opc[ "descripcion" ]; ?>
						</option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label for="frm_cliente_cfdi_usocfdi" class="col-sm-2 control-label">Uso del CFDi</label>
			<div class="col-sm-4">
				<select id="frm_cliente_cfdi_usocfdi" name="frm_cliente_cfdi_usocfdi" class="form-control">
					<?php if( $usoscfdi !== false ) foreach( $usoscfdi[ "opciones" ] as $opc): ?>
						<option value="<?= $opc[ "idcatalogodet" ]; ?>" <?= ( $opc[ "idcatalogodet" ] == $objeto->getCfdi_usocfdi() ? 'selected="selected"' : '' ); ?> >
							<?= $opc[ "descripcion" ]; ?>
						</option>
					<?php endforeach; ?>
				</select>
			</div>
			<label for="frm_cliente_cfdi_claveprodserv" class="col-sm-2 control-label">Producto</label>
			<div class="col-sm-4">
				<select id="frm_cliente_cfdi_claveprodserv" name="frm_cliente_cfdi_claveprodserv" class="form-control">
					<?php if( $clavesproducto !== false ) foreach( $clavesproducto[ "opciones" ] as $opc): ?>
						<option value="<?= $opc[ "idcatalogodet" ]; ?>" <?= ( $opc[ "idcatalogodet" ] == $objeto->getCfdi_claveprodserv() ? 'selected="selected"' : '' ); ?> >
							<?= $opc[ "descripcion" ]; ?>
						</option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label for="frm_cliente_cfdi_claveunidad" class="col-sm-2 control-label">Clave Unidad</label>
			<div class="col-sm-4">
				<select id="frm_cliente_cfdi_claveunidad" name="frm_cliente_cfdi_claveunidad" class="form-control">
					<?php if( $clavesunidad !== false ) foreach( $clavesunidad[ "opciones" ] as $opc): ?>
						<option value="<?= $opc[ "idcatalogodet" ]; ?>" <?= ( $opc[ "idcatalogodet" ] == $objeto->getCfdi_claveunidad() ? 'selected="selected"' : '' ); ?> >
							<?= $opc[ "descripcion" ]; ?>
						</option>
					<?php endforeach; ?>
				</select>
			</div>
			<label for="frm_cliente_cfdi_unidad" class="col-sm-2 control-label">Unidad</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" id="frm_cliente_cfdi_unidad" name="frm_cliente_cfdi_unidad" value="<?= $objeto->getCfdi_unidad(); ?>" placeholder="Unidad de Medida" maxlength="20" />
			</div>
		</div>
		<div class="form-group">
			<label for="frm_cliente_cfdi_impuesto" class="col-sm-2 control-label">Impuesto</label>
			<div class="col-sm-4">
				<select id="frm_cliente_cfdi_impuesto" name="frm_cliente_cfdi_impuesto" class="form-control">
					<?php if( $impuestos !== false ) foreach( $impuestos[ "opciones" ] as $opc): ?>
						<option value="<?= $opc[ "idcatalogodet" ]; ?>" <?= ( $opc[ "idcatalogodet" ] == $objeto->getCfdi_impuesto() ? 'selected="selected"' : '' ); ?> >
							<?= $opc[ "descripcion" ]; ?>
						</option>
					<?php endforeach; ?>
				</select>
			</div>
			<label for="frm_cliente_cfdi_tipofactor" class="col-sm-2 control-label">Tipo Factor</label>
			<div class="col-sm-4">
				<select id="frm_cliente_cfdi_tipofactor" name="frm_cliente_cfdi_tipofactor" class="form-control">
					<?php if( $tiposfactor !== false ) foreach( $tiposfactor[ "opciones" ] as $opc): ?>
						<option value="<?= $opc[ "idcatalogodet" ]; ?>" <?= ( $opc[ "idcatalogodet" ] == $objeto->getCfdi_tipofactor() ? 'selected="selected"' : '' ); ?> >
							<?= $opc[ "descripcion" ]; ?>
						</option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label for="frm_cliente_cfdi_tasaocuota" class="col-sm-2 control-label">Impuesto Tasa o Cuota</label>
			<div class="col-sm-4">
				<select id="frm_cliente_cfdi_tasaocuota" name="frm_cliente_cfdi_tasaocuota" class="form-control" onchange="Cliente.RellenaBase()">
					<option></option>
					<?php if( $tasas !== false ) foreach( $tasas[ "opciones" ] as $opc): ?>
						<option value="<?= $opc[ "idcatalogodet" ]; ?>" <?= ( $opc[ "idcatalogodet" ] == $objeto->getCfdi_tasaocuota() ? 'selected="selected"' : '' ); ?> >
							<?= $opc[ "descripcion" ]; ?>
						</option>
					<?php endforeach; ?>
				</select>
			</div>
			<label for="frm_cliente_cfdi_base" class="col-sm-2 control-label">Impuesto Base</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" id="frm_cliente_cfdi_base" name="frm_cliente_cfdi_base" value="<?= $objeto->getCfdi_base(); ?>" placeholder="Base del Impuesto" maxlength="10" />
			</div>
		</div>
		<div class="form-group">
			<label for="frm_cliente_banco" class="col-sm-2 control-label">Banco</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" id="frm_cliente_banco" name="frm_cliente_banco" value="<?= $objeto->getBanco(); ?>" placeholder="Banco" maxlength="250" />
			</div>
			<label for="frm_cliente_rfcbanco" class="col-sm-2 control-label">RFC</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" id="frm_cliente_rfcbanco" name="frm_cliente_rfcbanco" value="<?= $objeto->getRfcbanco(); ?>" placeholder="RFC del Banco" maxlength="13" />
			</div>
		</div>
		<div class="form-group">
			<label for="frm_cliente_cuenta" class="col-sm-2 control-label">Cuenta</label>
			<div class="col-sm-4">
				<input type="number" class="form-control" id="frm_cliente_cuenta" name="frm_cliente_cuenta" value="<?= $objeto->getCuenta(); ?>" placeholder="Cuenta Bancaria" maxlength="30" min="0" />
			</div>
			<label for="frm_cliente_clabe" class="col-sm-2 control-label">CLABE</label>
			<div class="col-sm-4">
				<input type="number" class="form-control" id="frm_cliente_clabe" name="frm_cliente_clabe" value="<?= $objeto->getClabe(); ?>" placeholder="CLABE Interbancaria" maxlength="30" min="0" />
			</div>
		</div>
		<div class="form-group">
			<label for="frm_cliente_correo" class="col-sm-2 control-label">Correo</label>
			<div class="col-sm-10">
				<input type="email" class="form-control" id="frm_cliente_correo" name="frm_cliente_correo" value="<?= $objeto->getCorreo(); ?>" placeholder="Correo" maxlength="250" />
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-8"></div>
			<div class="col-sm-2">
                <button type="button" class="btn btn-success" onclick="Cliente.Enviar(<?= ($objeto->getIdcliente()!="" && $objeto->getIdcliente()!=0?'false':'true'); ?>)" >Guardar</button>
            </div>
            <div class="col-sm-2">
                <button type="button" class="btn btn-danger" onclick="location.href='<?= base_url('clientes'); ?>'">Cancelar</button>
            </div>
		</div>
	</form>
</div>
<!-- Vista cliente/formulario End -->