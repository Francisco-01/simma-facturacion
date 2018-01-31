<!-- Vista manifiestos/vista -->
<?= $menumain; ?>
<?php
/*$manifiesto=new ModManifiesto();
$generador=new Modgenerador();
$cliente=new Modcliente();
$empresa=new Modempresa();
$sucursal=new Modsucursal();
$ruta=new Modruta();
$operador=new Modoperador();
$vehiculo=new Modvehiculo();*/

$sucursal->setIdsucursal($cliente->getIdsucursal());
$sucursal->getFromDatabase();

$total=0.0;
?>
<div class="container">
	<div class="btn-toolbar pull-right" role="toolbar">
		<div class="btn-group">
			<?php if($this->modsesion->hasPermisoHijo(18)): ?>
			<button type="button" class="btn btn-default" title="Ver todos los Manifiestos" onclick="location.href='<?= base_url('manifiestos/index/'.$sucursal->getIdempresa().'/'.$sucursal->getIdsucursal()); ?>';">
				<span class="glyphicon glyphicon-th-list"></span>
			</button>
			<?php endif;
			if($this->modsesion->hasPermisoHijo(25)): ?>
			<button type="button" class="btn btn-default" title="Ver la Sucursal Asociada" onclick="location.href='<?= base_url('sucursales/ver/'.$sucursal->getIdsucursal()); ?>';">
				<span class="glyphicon glyphicon-eye-open"></span>
			</button>
			<?php endif;
			if($this->modsesion->hasPermisoHijo(42)): ?>
			<button type="button" class="btn btn-default" title="Capturar Kilos" onclick="Manifiesto.FrmCapturaKilos(<?= $manifiesto->getIdmanifiesto(); ?>)">
				<span class="glyphicon glyphicon-pencil"></span>
			</button>
			<?php endif;
			if($this->modsesion->hasPermisoHijo(43)): ?>
			<button type="button" class="btn btn-default" title="Imprimir Manifiesto" onclick="Manifiesto.Imprimir(<?= $manifiesto->getIdmanifiesto(); ?>)">
				<span class="glyphicon glyphicon-print"></span>
			</button>
			<?php endif;
			if($this->modsesion->hasPermisoHijo(44)): ?>
			<button type="button" class="btn btn-default" title="Borrar Manifiesto" onclick="Manifiesto.Eliminar(<?= $sucursal->getIdempresa(); ?>,<?= $sucursal->getIdsucursal(); ?>,<?= $manifiesto->getIdmanifiesto(); ?>)">
				<span class="glyphicon glyphicon-trash"></span>
			</button>
			<?php endif; ?>
		</div>
	</div>
	<h3>Manifiesto <small><?= $manifiesto->getIdentificador().($manifiesto->getNoexterno()!=""?" (No. Externo: {$manifiesto->getNoexterno()})":""); ?></small></h3>
	<form class="form-horizontal" role="form" id="frm_manifiesto">
		<h5>Generador</h5>
		<div class="form-group">
			<label class="col-sm-2 control-label">Cliente</label>
			<div class="col-sm-4">
				<p class="form-control-static"><?= $cliente->getIdentificador()." - ".$cliente->getRazonsocial(); ?></p>
			</div>
			<label class="col-sm-2 control-label" id="captura_fec">
				<?php if ($manifiesto->getFecha_captura() != "") {
				echo "Fecha de Captura:";
				} ?>
			</label>
			<div class="col-sm-4">
				<p class="form-control-static"><?= DateToMx( substr($manifiesto->getFecha_captura(), 0, 10) ).substr($manifiesto->getFecha_captura(), 10); ?> </p>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Generador</label>
			<div class="col-sm-4">
				<p class="form-control-static"><?= $generador->getIdentificador()." - ".$generador->getRazonsocial(); ?></p>
			</div>
			<label class="col-sm-2 control-label">
				<?php if ($manifiesto->getCapturista() != "") {
				echo "Capturista:";
				} ?></label>
			<div class="col-sm-4">
				<p class="form-control-static"><?= $manifiesto->getCapturista( ); ?></p>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Responsable</label>
			<div class="col-sm-10">
				<p class="form-control-static"><?= $generador->getRepresentante()." - ".$generador->getRepresentantetelefono().($generador->getRepresentanteextension()!=""?" (Ext. ".$generador->getRepresentanteextension().")":""); ?></p>
			</div>
		</div>
		<h5>Facturacion</h5>
		<div class="form-group">
			<label class="col-sm-2 control-label">Esquema de Facturación</label>
			<div class="col-sm-8">
				<p class="form-control-static"><?php
				foreach( $tipos_cobro[ 'opciones' ] as $opc ) {
					if( $opc[ 'idcatalogodet' ] == $tipo_cobro->getTipocobro() ) {
						echo $opc[ 'descripcion'] . " / ";
					}
				}
				?><?php
				foreach( $tipos_servicio[ 'opciones' ] as $opc ) {
					if( $opc[ 'idcatalogodet' ] == $tipo_cobro->getTiposervicio() ) {
						echo $opc[ 'descripcion'];
					}
				}
				?><?php
				foreach( $unidades[ 'opciones' ] as $opc ) {
					if( $opc[ 'idcatalogodet' ] == $tipo_cobro->getUnidad() ) {
						echo " (" . $opc[ 'descripcion'] . ")";
					}
				}
				?></p>
			</div>
			<div class="col-sm-2">
				<div class="checkbox">
					<label>
						<input type="checkbox" value="1" id="frm_manifiesto_facturable" name="frm_manifiesto_facturable" <?= ($manifiesto->getFacturable()==1?'checked="checked"':''); ?> disabled="disabled" />
						Facturable
					</label>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Factura Asociada</label>
			<div class="col-sm-10">
				<p class="form-control-static"><?= $manifiesto->getUuid() . ( $manifiesto->getUuid_excedente() != "" ? '<br />' : '' ) . $manifiesto->getUuid_excedente(); ?></p>
			</div>
		</div>
		<h5>Transportista</h5>
		<?php
		$sucursal->setIdsucursal($ruta->getEmpresatransportista());
		$sucursal->getFromDatabase();
		$empresa->setIdempresa($sucursal->getIdempresa());
		$empresa->getFromDatabase();
		?>
		<div class="form-group">
			<label class="col-sm-2 control-label">Razon Social</label>
			<div class="col-sm-10">
				<p class="form-control-static"><?= $empresa->getRazonsocial()." (".$sucursal->getNombre().")"; ?></p>
			</div>			
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Ruta</label>
			<div class="col-sm-10">
				<p class="form-control-static"><?= $ruta->getIdentificador()." - ".$ruta->getNombre(); ?></p>
			</div>			
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Operador</label>
			<div class="col-sm-4">
				<p class="form-control-static"><?= $operador->getNombre()." ".$operador->getApaterno()." ".$operador->getAmaterno(); ?></p>
			</div>
			<label class="col-sm-2 control-label">Vehiculo</label>
			<div class="col-sm-4">
				<p class="form-control-static"><?= $vehiculo->getPlaca()." (".$vehiculo->getTipo().")"; ?></p>
			</div>
		</div>
		<h5>Planta de Tratamiento</h5>
		<?php
		$sucursal->setIdsucursal($ruta->getEmpresadestinofinal());
		$sucursal->getFromDatabase();
		$empresa->setIdempresa($sucursal->getIdempresa());
		$empresa->getFromDatabase();
		?>
		<div class="form-group">
			<label class="col-sm-2 control-label">Razon Social</label>
			<div class="col-sm-10">
				<p class="form-control-static"><?= $empresa->getRazonsocial()." (".$sucursal->getNombre().")"; ?></p>
			</div>			
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Representante</label>
			<div class="col-sm-10">
				<p class="form-control-static"><?= $sucursal->getRepresentante(); ?></p>
			</div>			
		</div>
		<h5>Recolección</h5>
		<?php if($motivo!="" && $motivo>0) foreach($motivos as $cat) foreach($cat["opciones"] as $opc) if($motivo==$opc["idcatalogodet"]): ?>
			<?= $opc["descripcion"]; ?> (<?= $cat["descripcion"]; ?>)
		<?php endif; ?>
		<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Residuo</th>
						<th>Tipo</th>
						<!--<th>Capacidad del Contenedor</th>
						<th>Tipo de Contenedor</th>-->
						<th>Cantidad Total</th>
						<!--<th>Unidad de Volumen</th>-->
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>Residuo</th>
						<th>Tipo</th>
						<!--<th>Capacidad del Contenedor</th>
						<th>Tipo de Contenedor</th>-->
						<th>Cantidad Total</th>
						<!--<th>Unidad de Volumen</th>-->
					</tr>
				</tfoot>
				<tbody>
					<?php foreach($recoleccion as $r) if($r["recoleccion"]!==false ):?>
						<tr>
							<td><?= $r["residuo"]["nombre"]; ?></td>
							<td><?php echo $r[ 'residuo' ][ 'opcion' ]; ?></td>
							<!--<td><?= ($r["recoleccion"]!==false?$r["recoleccion"]["contenedorcapacidad"]:""); ?></td>
							<td><?= ($r["recoleccion"]!==false?$r["recoleccion"]["contenedortipo"]:""); ?></td>-->
							<td class="numero"><?= ($r["recoleccion"]!==false?$r["recoleccion"]["cantidad"]:""); ?></td>
							<!--<td><?= ($r["recoleccion"]!==false?$r["recoleccion"]["unidad"]:""); ?></td>-->
						</tr>
					<?php 
					$total+=floatval(($r["recoleccion"]!==false?$r["recoleccion"]["cantidad"]:"0"));
					endif; ?>
					<tr>
						<td><strong>Total</strong></td>
						<td></td>
						<td class="numero"><strong><?= number_format($total,3); ?></strong></td>
					</tr>
				</tbody>
			</table>
		</div>
	</form>
</div>
<script type="text/javascript">
	var idManifiesto=<?= $manifiesto->getIdmanifiesto(); ?>;
</script>
<!-- Vista manifiestos/vista End -->