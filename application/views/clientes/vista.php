<!-- Vista cliente/vista -->
<?= $menumain; ?>
<div class="container">
	<div class="btn-toolbar pull-right" role="toolbar">
		<div class="btn-group">
			<?php if($this->modsesion->hasPermisoHijo(5)): ?>
			<button type="button" class="btn btn-default" title="Ver todos los Clientes" onclick="location.href='<?= base_url('clientes/index/'.$sucursal->getIdempresa().'/'.$sucursal->getIdsucursal()); ?>';">
				<span class="glyphicon glyphicon-th-list"></span>
			</button>
			<?php endif;
			if($this->modsesion->hasPermisoHijo(25)):?>
			<button type="button" class="btn btn-default" title="Ver la Sucursal Asociada" onclick="location.href='<?= base_url('sucursales/ver/'.$sucursal->getIdsucursal()); ?>';">
				<span class="glyphicon glyphicon-eye-open"></span>
			</button>
			<?php endif;
			if($this->modsesion->hasPermisoHijo(66)):?>
			<button type="button" class="btn btn-default" title="Ver Generadores del Cliente" onclick="location.href=location.href.replace('#dataGeneradores','')+'#dataGeneradores';">
				<span class="glyphicon glyphicon-tags"></span>
			</button>
			<?php endif;
			if($this->modsesion->hasPermisoHijo(67)):?>
			<button type="button" class="btn btn-default" title="Actualizar Cliente" onclick="location.href='<?= base_url('clientes/actualizar/'.$objeto->getIdcliente()); ?>';">
				<span class="glyphicon glyphicon-edit"></span>
			</button>
			<?php endif;
			if($this->modsesion->hasPermisoHijo(68)):?>
			<button type="button" class="btn btn-default" title="Borrar Cliente	" onclick="Cliente.Eliminar(<?= $sucursal->getIdempresa(); ?>,<?= $sucursal->getIdsucursal(); ?>,<?= $objeto->getIdcliente(); ?>)">
				<span class="glyphicon glyphicon-trash"></span>
			</button>
			<?php endif; ?>
		</div>
	</div>
	<h3>Clientes</h3>
	<form class="form-horizontal" role="form" id="frm_clientes">
		<div class="form-group">
			<label for="frm_cliente_razonsocial" class="col-sm-2 control-label">Razón Social</label>
			<div class="col-sm-10">
				<p class="form-control-static"><?= $objeto->getRazonsocial(); ?></p>
			</div>
		</div>
		<div class="form-group">
			<label for="frm_cliente_nombrecorto" class="col-sm-2 control-label">Nombre Corto</label>
			<div class="col-sm-10">
				<p class="form-control-static"><?= $objeto->getNombreCorto(); ?></p>
			</div>
		</div>
		<div class="form-group">
			<label for="frm_cliente_identificador" class="col-sm-2 control-label">Número de Cliente</label>
			<div class="col-sm-4">
				<p class="form-control-static"><?= $objeto->getIdentificador(); ?></p>
			</div>
			<label for="frm_cliente_rfc" class="col-sm-2 control-label">Registro Federal de Contribuyentes</label>
			<div class="col-sm-4">
				<p class="form-control-static"><?= $objeto->getRfc(); ?></p>
			</div>
		</div>
		<div class="form-group">
			<label for="frm_cliente_vendedor" class="col-sm-2 control-label">Vendedor</label>
			<div class="col-sm-4">
				<p class="form-control-static">
					<?php 
						if($vendedor!==false) 
							foreach($vendedor["opciones"] as $opc) 
								if($opc["idcatalogodet"]==$objeto->getVendedor()) 
								{ 
									echo $opc["descripcion"]; 
									break; 
								} 
					?>
				</p>
			</div>
			<label for="frm_cliente_afiliacion" class="col-sm-2 control-label">Afiliación</label>
			<div class="col-sm-4">
				<p class="form-control-static"><?= $objeto->getAfiliacion(); ?></p>
			</div>
		</div>
		<div class="form-group">
			<label for="frm_cliente_giro" class="col-sm-2 control-label">Giro</label>
			<div class="col-sm-4">
				<p class="form-control-static"><?= $objeto->getGiro(); ?></p>
			</div>
			<label for="frm_cliente_fechaalta" class="col-sm-2 control-label">Fecha de Alta en Sistema</label>
			<div class="col-sm-4">
				<p class="form-control-static"><?= DateToMx($objeto->getFechaalta()); ?></p>
			</div>
		</div>
		<div class="form-group">
			<label for="frm_cliente_status" class="col-sm-2 control-label">Estatus</label>
			<div class="col-sm-4">
				<p class="form-control-static">
					<?php 
						if($estatuscliente!==false) 
							foreach($estatuscliente["opciones"] as $opc) 
								if($opc["idcatalogodet"]==$objeto->getStatus()) 
								{ 
									echo $opc["descripcion"]; 
									break; 
								} 
					?>
				</p>
			</div>
			<label for="frm_cliente_fechastatus" class="col-sm-2 control-label">Fecha Cambio Status</label>
			<div class="col-sm-4">
				<p class="form-control-static"><?= DateToMx($objeto->getFechastatus()); ?></p>
			</div>
		</div>
		<h5>Contrato</h5>
		<div class="form-group">
			<label for="frm_cliente_fechacontratoinicio" class="col-sm-2 control-label">Fecha de Inicio</label>
			<div class="col-sm-4">
				<p class="form-control-static"><?= DateToMx($objeto->getFechacontratoinicio()); ?></p>
			</div>
			<label for="frm_cliente_fechacontratofin" class="col-sm-2 control-label">Fecha de Termino</label>
			<div class="col-sm-4">
				<p class="form-control-static"><?= DateToMx($objeto->getFechacontratofin()); ?></p>
			</div>
		</div>
		<h5>Servicios</h5>
		<div class="form-group">
			<label for="frm_cliente_fechaserviciosinicio" class="col-sm-2 control-label">Fecha de Inicio</label>
			<div class="col-sm-4">
				<p class="form-control-static"><?= DateToMx($objeto->getFechaserviciosinicio()); ?></p>
			</div>
			<label for="frm_cliente_fechaserviciosfin" class="col-sm-2 control-label">Fecha de Termino</label>
			<div class="col-sm-4">
				<p class="form-control-static"><?= DateToMx($objeto->getFechaserviciosfin()); ?></p>
			</div>
		</div>
		<h5>Dirección</h5>
		<div class="form-group">
			<label for="frm_cliente_calle" class="col-sm-2 control-label">Calle</label>
			<div class="col-sm-10">
				<p class="form-control-static"><?= $objeto->getCalle(); ?></p>
			</div>
		</div>
		<div class="form-group">
			<label for="frm_cliente_numexterior" class="col-sm-2 control-label">Número Exterior</label>
			<div class="col-sm-4">
				<p class="form-control-static"><?= $objeto->getNumexterior(); ?></p>
			</div>
			<label for="frm_cliente_numinterior" class="col-sm-2 control-label">Número Interior</label>
			<div class="col-sm-4">
				<p class="form-control-static"><?= $objeto->getNuminterior(); ?></p>
			</div>
		</div>
		<div class="form-group">
		    <label for="frm_cliente_cp" class="col-sm-2 control-label">Código Postal</label>
			<div class="col-sm-4">
				<p class="form-control-static"><?= $objeto->getCp(); ?></p>
			</div>
			<label for="frm_cliente_colonia" class="col-sm-2 control-label">Colonia</label>
			<div class="col-sm-4">
				<p class="form-control-static"><?= $objeto->getColonia(); ?></p>
			</div>
		</div>
		<div class="form-group">
			<label for="frm_cliente_municipio" class="col-sm-2 control-label">Delegación o Municipio</label>
			<div class="col-sm-4">
				<p class="form-control-static"><?= $objeto->getMunicipio(); ?></p>
			</div>
			<label for="frm_cliente_estado" class="col-sm-2 control-label">Estado</label>
			<div class="col-sm-4">
				<p class="form-control-static"><?= $objeto->getEstado(); ?></p>
			</div>
		</div>
		<div class="form-group">
			<label for="frm_cliente_referencias" class="col-sm-2 control-label">Referencias</label>
			<div class="col-sm-10">
				<p class="form-control-static"><?= $objeto->getReferencias(); ?></p>
			</div>
		</div>
		<h5>Contacto</h5>
		<div class="form-group">
			<label for="frm_cliente_representante" class="col-sm-2 control-label">Representante</label>
			<div class="col-sm-10">
				<p class="form-control-static"><?= $objeto->getRepresentante(); ?></p>
			</div>
		</div>
		<div class="form-group">
			<label for="frm_cliente_representantecargo" class="col-sm-2 control-label">Cargo</label>
			<div class="col-sm-4">
				<p class="form-control-static"><?= $objeto->getRepresentantecargo(); ?></p>
			</div>
			<label for="frm_cliente_representanteemail" class="col-sm-2 control-label">Correo Electrónico</label>
			<div class="col-sm-4">
				<p class="form-control-static"><?= $objeto->getRepresentanteemail(); ?></p>
			</div>
		</div>
		<div class="form-group">
			<label for="frm_cliente_representantetelefono" class="col-sm-2 control-label">Teléfono</label>
			<div class="col-sm-4">
				<p class="form-control-static"><?= $objeto->getRepresentantetelefono(); ?></p>
			</div>
			<label for="frm_cliente_representanextension" class="col-sm-2 control-label">Extensión</label>
			<div class="col-sm-4">
				<p class="form-control-static"><?= $objeto->getRepresentanteextencion(); ?></p>
			</div>
		</div>
		<div class="form-group">
			<label for="frm_cliente_representantetelefono2" class="col-sm-2 control-label">Teléfono 2</label>
			<div class="col-sm-4">
				<p class="form-control-static"><?= $objeto->getRepresentantetelefono2(); ?></p>
			</div>
			<label for="frm_cliente_representanextension2" class="col-sm-2 control-label">Extensión 2</label>
			<div class="col-sm-4">
				<p class="form-control-static"><?= $objeto->getRepresentanteextension2(); ?></p>
			</div>
		</div>
		<h5>Notas y Observaciones</h5>
		<div class="form-group">
			<div class="col-sm-12">
				<p class="form-control-static"><?= $objeto->getObservaciones(); ?></p>
			</div>
		</div>
		<h5>Facturación</h5>
		<div id="facturacion"><?= $facturaciones; ?></div>
		<div class="form-group">
			<div class="col-sm-3">
				<div class="checkbox">
					<label>
						<input disabled="disabled" type="checkbox" id="frm_cliente_facturaxgenerador" name="frm_cliente_facturaxgenerador" value="1" <?= ($objeto->getFacturaxgenerador()==1?'checked="checked"':''); ?> />
						Factura por generador
					</label>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="checkbox">
					<label>
						<input disabled="disabled" type="checkbox" id="frm_cliente_ordencompra" name="frm_cliente_ordencompra" value="1" <?= ($objeto->getOrdencompra()==1?'checked="checked"':''); ?> />
						Orden de Compra
					</label>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="checkbox">
					<label>
						<input disabled="disabled" type="checkbox" id="frm_cliente_desglosemanifiestos" name="frm_cliente_desglosemanifiestos" value="1" <?= ($objeto->getDesglosemanifiestos()==1?'checked="checked"':''); ?> />
						Desglosar Manifiestos
					</label>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label for="frm_cliente_leyendas" class="col-sm-2 control-label">Leyendas</label>
			<div class="col-sm-10">
				<p class="form-control-static"><?= $objeto->getLeyendas(); ?></p>
			</div>
		</div>
		<h5>Cobranza</h5>
		<div class="form-group">
			<label for="frm_cliente_diascredito" class="col-sm-2 control-label">Días de Crédito</label>
			<div class="col-sm-4">
				<p class="form-control-static">
					<?php 
						if($diascredito!==false) 
							foreach($diascredito["opciones"] as $opc) 
								if($opc["idcatalogodet"]==$objeto->getDiascredito()) 
								{ 
									echo $opc["descripcion"]; 
									break; 
								} 
					?>
				</p>
			</div>
			<label for="frm_cliente_referenciabancaria" class="col-sm-2 control-label">Referencia Bancaria</label>
			<div class="col-sm-4">
				<p class="form-control-static"><?= $objeto->getReferenciabancaria(); ?><p class="form-control-static">
			</div>
		</div>		
		<div class="form-group">
			<label for="frm_cliente_metodopago" class="col-sm-2 control-label">Método de Pago</label>
			<div class="col-sm-4">
				<p class="form-control-static"><?= $objeto->getMetodoPago(); ?></p>
			</div>
			<label for="frm_cliente_referenciapago" class="col-sm-2 control-label">Referencia de Pago</label>
			<div class="col-sm-4">
				<p class="form-control-static"><?= $objeto->getReferenciaPago(); ?></p>
			</div>
		</div>
		<div class="form-group">
			<label for="frm_cliente_cobranzacontacto" class="col-sm-2 control-label">Contacto</label>
			<div class="col-sm-10">
				<p class="form-control-static"><?= $objeto->getCobranzacontacto(); ?></p>
			</div>
		</div>
		<div class="form-group">
			<label for="frm_cliente_cobranzaemail" class="col-sm-2 control-label">Correo Electrónico</label>
			<div class="col-sm-10">
				<p class="form-control-static"><?= $objeto->getCobranzaemail(); ?></p>
			</div>
		</div>
		<div class="form-group">
			<label for="frm_cliente_cobranzatelefono" class="col-sm-2 control-label">Teléfono</label>
			<div class="col-sm-4">
				<p class="form-control-static"><?= $objeto->getCobranzatelefono(); ?></p>
			</div>
			<label for="frm_cliente_cobranzaextension" class="col-sm-2 control-label">Extensión</label>
			<div class="col-sm-4">
				<p class="form-control-static"><?= $objeto->getCobranzaextension(); ?></p>
			</div>
		</div>
		<div class="form-group">
			<label for="frm_cliente_cobranzatelefono2" class="col-sm-2 control-label">Teléfono 2</label>
			<div class="col-sm-4">
				<p class="form-control-static"><?= $objeto->getCobranzatelefono2(); ?></p>
			</div>
			<label for="frm_cliente_cobranzaextension2" class="col-sm-2 control-label">Extensión 2</label>
			<div class="col-sm-4">
				<p class="form-control-static"><?= $objeto->getCobranzaextension2(); ?></p>
			</div>
		</div>
		<div class="form-group">
			<label for="frm_cliente_cobranzaobservaciones" class="col-sm-2 control-label">Observaciones</label>
			<div class="col-sm-10">
				<p class="form-control-static"><?= $objeto->getCobranzaobservaciones(); ?></p>
			</div>
		</div>
		<div class="form-group">
			<label for="frm_cliente_cobranzacalle" class="col-sm-2 control-label">Calle</label>
			<div class="col-sm-10">
				<p class="form-control-static"><?= $objeto->getCobranzacalle(); ?></p>
			</div>
		</div>
		<div class="form-group">
			<label for="frm_cliente_cobranzanumexterior" class="col-sm-2 control-label">Número Exterior</label>
			<div class="col-sm-4">
				<p class="form-control-static"><?= $objeto->getCobranzanumexterior(); ?></p>
			</div>
			<label for="frm_cliente_cobranzanuminterior" class="col-sm-2 control-label">Número Interior</label>
			<div class="col-sm-4">
				<p class="form-control-static"><?= $objeto->getCobranzanuminterior(); ?></p>
			</div>
		</div>
		<div class="form-group">
		    <label for="frm_cliente_cobranzacp" class="col-sm-2 control-label">Código Postal</label>
			<div class="col-sm-4">
				<p class="form-control-static"><?= $objeto->getCobranzacp(); ?></p>
			</div>
			<label for="frm_cliente_cobranzacolonia" class="col-sm-2 control-label">Colonia</label>
			<div class="col-sm-4">
				<p class="form-control-static"><?= $objeto->getCobranzacolonia(); ?></p>
			</div>
		</div>
		<div class="form-group">
			<label for="frm_cliente_cobranzamunicipio" class="col-sm-2 control-label">Delegación o Municipio</label>
			<div class="col-sm-4">
				<p class="form-control-static"><?= $objeto->getCobranzamunicipio(); ?></p>
			</div>
			<label for="frm_cliente_cobranzaestado" class="col-sm-2 control-label">Estado</label>
			<div class="col-sm-4">
				<p class="form-control-static"><?= $objeto->getCobranzaestado(); ?></p>
			</div>
		</div>
		<h5>Facturación Electrónica</h5>
		<div class="form-group">
			<label for="frm_cliente_categoria" class="col-sm-2 control-label">Categoria</label>
			<div class="col-sm-4">
				<p class="form-control-static">
					<?php if( $categorias !== false ) foreach( $categorias[ "opciones" ] as $opc): ?>
						<?= ( $opc[ "idcatalogodet" ] == $objeto->getCategoria() ? $opc[ "descripcion" ] : '' ); ?>
					<?php endforeach; ?>
				</p>
			</div>
			<label for="frm_cliente_cfdi_moneda" class="col-sm-2 control-label">Moneda</label>
			<div class="col-sm-4">
				<p class="form-control-static">
					<?php if( $monedas !== false ) foreach( $monedas[ "opciones" ] as $opc): ?>
						<?= ( $opc[ "idcatalogodet" ] == $objeto->getCfdi_moneda() ? $opc[ "descripcion" ] : '' ); ?>
					<?php endforeach; ?>
				</p>
			</div>
		</div>
		<div class="form-group">
			<label for="frm_cliente_cfdi_formapago" class="col-sm-2 control-label">Forma de Pago</label>
			<div class="col-sm-4">
				<p class="form-control-static">
					<?php if( $formaspago !== false ) foreach( $formaspago[ "opciones" ] as $opc): ?>
						<?= ( $opc[ "idcatalogodet" ] == $objeto->getcfdi_formapago() ? $opc[ "descripcion" ] : '' ); ?>
					<?php endforeach; ?>
				</p>
			</div>
			<label for="frm_cliente_cfdi_metodopago" class="col-sm-2 control-label">Método de Pago</label>
			<div class="col-sm-4">
				<p class="form-control-static">
					<?php if( $metodospago !== false ) foreach( $metodospago[ "opciones" ] as $opc): ?>
						<?= ( $opc[ "idcatalogodet" ] == $objeto->getcfdi_metodopago() ? $opc[ "descripcion" ] : '' ); ?>
					<?php endforeach; ?>
				</p>
			</div>
		</div>
		<div class="form-group">
			<label for="frm_cliente_cfdi_usocfdi" class="col-sm-2 control-label">Uso del CFDi</label>
			<div class="col-sm-4">
				<p class="form-control-static">
					<?php if( $usoscfdi !== false ) foreach( $usoscfdi[ "opciones" ] as $opc): ?>
						<?= ( $opc[ "idcatalogodet" ] == $objeto->getCfdi_usocfdi() ? $opc[ "descripcion" ] : '' ); ?>
					<?php endforeach; ?>
				</p>
			</div>
			<label for="frm_cliente_cfdi_claveprodserv" class="col-sm-2 control-label">Producto</label>
			<div class="col-sm-4">
				<p class="form-control-static">
					<?php if( $clavesproducto !== false ) foreach( $clavesproducto[ "opciones" ] as $opc): ?>
						<?= ( $opc[ "idcatalogodet" ] == $objeto->getCfdi_claveprodserv() ? $opc[ "descripcion" ] : '' ); ?>
					<?php endforeach; ?>
				</p>
			</div>
		</div>
		<div class="form-group">
			<label for="frm_cliente_cfdi_claveunidad" class="col-sm-2 control-label">Clave Unidad</label>
			<div class="col-sm-4">
				<p class="form-control-static">
					<?php if( $clavesunidad !== false ) foreach( $clavesunidad[ "opciones" ] as $opc): ?>
						<?= ( $opc[ "idcatalogodet" ] == $objeto->getCfdi_claveunidad() ? $opc[ "descripcion" ] : '' ); ?>
					<?php endforeach; ?>
				</p>
			</div>
			<label for="frm_cliente_cfdi_unidad" class="col-sm-2 control-label">Unidad</label>
			<div class="col-sm-4">
				<p class="form-control-static"><?= $objeto->getCfdi_unidad(); ?></p>
			</div>
		</div>
		<div class="form-group">
			<label for="frm_cliente_cfdi_impuesto" class="col-sm-2 control-label">Impuesto</label>
			<div class="col-sm-4">
				<p class="form-control-static">
					<?php if( $impuestos !== false ) foreach( $impuestos[ "opciones" ] as $opc): ?>
						<?= ( $opc[ "idcatalogodet" ] == $objeto->getCfdi_Impuesto() ? $opc[ "descripcion" ] : '' ); ?>
					<?php endforeach; ?>
				</p>
			</div>
			<label for="frm_cliente_cfdi_tipofactor" class="col-sm-2 control-label">Tipo Factor</label>
			<div class="col-sm-4">
				<p class="form-control-static">
					<?php if( $tiposfactor !== false ) foreach( $tiposfactor[ "opciones" ] as $opc): ?>
						<?= ( $opc[ "idcatalogodet" ] == $objeto->getCfdi_tipofactor() ? $opc[ "descripcion" ] : '' ); ?>
					<?php endforeach; ?>
				</p>
			</div>
		</div>
		<div class="form-group">
			<label for="frm_cliente_cfdi_tasaocuota" class="col-sm-2 control-label">Impuesto Tasa o Cuota</label>
			<div class="col-sm-4">
				<p class="form-control-static">
					<?php if( $tasas !== false ) foreach( $tasas[ "opciones" ] as $opc): ?>
						<?= ( $opc[ "idcatalogodet" ] == $objeto->getCfdi_tasaocuota() ? $opc[ "descripcion" ] : '' ); ?>
					<?php endforeach; ?>
				</p>
			</div>
			<label for="frm_cliente_cfdi_base" class="col-sm-2 control-label">Impuesto Base</label>
			<div class="col-sm-4">
				<p class="form-control-static"><?= $objeto->getCfdi_base(); ?></p>
			</div>
		</div>
		<div class="form-group">
			<label for="frm_cliente_banco" class="col-sm-2 control-label">Banco</label>
			<div class="col-sm-4">
				<p class="form-control-static"><?= $objeto->getBanco(); ?></p>
			</div>
			<label for="frm_cliente_rfcbanco" class="col-sm-2 control-label">RFC</label>
			<div class="col-sm-4">
				<p class="form-control-static"><?= $objeto->getRfcbanco(); ?></p>
			</div>
		</div>
		<div class="form-group">
			<label for="frm_cliente_cuenta" class="col-sm-2 control-label">Cuenta</label>
			<div class="col-sm-4">
				<p class="form-control-static"><?= $objeto->getCuenta(); ?></p>
			</div>
			<label for="frm_cliente_clabe" class="col-sm-2 control-label">CLABE</label>
			<div class="col-sm-4">
				<p class="form-control-static"><?= $objeto->getClabe(); ?></p>
			</div>
		</div>
		<div class="form-group">
			<label for="frm_cliente_correo" class="col-sm-2 control-label">Correo</label>
			<div class="col-sm-10">
				<p class="form-control-static"><?= $objeto->getCorreo(); ?></p>
			</div>
		</div>
	</form>
	<?php if($this->modsesion->hasPermisoHijo(66)):?>
	<hr />
	<div id="dataGeneradores">
		<div class="btn-toolbar pull-right" role="toolbar">
			<div class="btn-group">
				<?php if($this->modsesion->hasPermisoHijo(75)):?>
				<button type="button" class="btn btn-default" title="Nuevo Generador" onclick="location.href='<?= base_url('generadores/nuevo/'.$objeto->getIdcliente());?>';">
					<span class="glyphicon glyphicon-list-alt"></span>
				</button>
				<?php endif;?>
			</div>
		</div>
		<h4>Generadores</h4>
		<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Número de Generador</th>
						<th>Nombre</th>
						<th>Ubicación</th>
						<th>Número de Registro Ambiental</th>
						<!--<th>Número de Registro como Generador</th>
						<th>Servicios</th>-->
						<th>Horario</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>Número de Generador</th>
						<th>Nombre</th>
						<th>Ubicación</th>
						<th>Número de Registro Ambiental</th>
						<!--<th>Número de Registro como Generador</th>
						<th>Servicios</th>-->
						<th>Horario</th>
					</tr>
				</tfoot>
				<tbody>
					<?php if($generadores!==false) foreach($generadores as $generador): ?>
						<tr>
							<td data-order="<?= Refill($generador["identificador"],10,"0"); ?>">
								<a href="<?= base_url('generadores/ver/'.$generador["idgenerador"]); ?>">
									<?= $generador["identificador"]; ?>
								</a>
							</td>
							<td><?= $generador["razonsocial"]; ?></td>
							<td><?= "{$generador["municipio"]}, {$generador["estado"]}"; ?></td>
							<td><?= $generador["numregamb"]; ?></td>
							<!--<td><?= $generador["numreggen"]; ?></td>
							<td>
								<?= $generador["serviciolunes"]==1?" Lunes, ":""; ?>
								<?= $generador["serviciomartes"]==1?" Martes, ":""; ?>
								<?= $generador["serviciomiercoles"]==1?" Miércoles, ":""; ?>
								<?= $generador["serviciojueves"]==1?" Jueves, ":""; ?>
								<?= $generador["servicioviernes"]==1?" Viernes, ":""; ?>
								<?= $generador["serviciosabado"]==1?" Sábado, ":""; ?>
								<?= $generador["serviciodomingo"]==1?" Domingo ":""; ?>
							</td>-->
							<td><?= "{$generador["horarioinicio"]} a {$generador["horariofin"]} y {$generador["horarioinicio2"]} a {$generador["horariofin2"]}"; ?></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
	<?php endif;?>
</div>
<script type="text/javascript">
	$(document).ready(function(){$("div.table-responsive table").DataTable();});
</script>
<!-- Vista cliente/vista End -->