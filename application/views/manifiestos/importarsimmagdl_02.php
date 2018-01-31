<!-- Vista manifiestos/importarsimma_gdl_02 -->
<?= $menumain; ?>
<?php
	if(!isset($manifiestos)||$manifiestos===false||!is_array($manifiestos)) $manifiestos=array();
?>
<div class="container">
	<h3>Importar Manifiestos <small>Preimportación</small></h3>
	<form class="form-horizontal" role="form" method="post" id="frm_importado" action="<?= base_url("manifiestos/importado_final/$idempresa/$idsucursal")?>">
		<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Fila</th>
						<th>Manifiesto</th>
						<th>Fecha</th>
						<th>Ruta</th>
						<th>No. Cliente</th>
						<th>No. Generador</th>
						<th>Motivo</th>
						<th>Total</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>Fila</th>
						<th>Manifiesto</th>
						<th>Fecha</th>
						<th>Ruta</th>
						<th>No. Cliente</th>
						<th>No. Generador</th>
						<th>Motivo</th>
						<th>Total</th>
					</tr>
				</tfoot>
				<tbody>
					<?php foreach($manifiestos as $k=>$manif): 
						$suma=0.0;
						$suma+=$manif["res_sangre"];
						$suma+=$manif["res_cultivos"];
						$suma+=$manif["res_pato"];
						$suma+=$manif["res_noanat"];
						$suma+=$manif["res_medcad"];
						$suma+=$manif["res_punzo"];
						$suma+=$manif["res_ext01"];						
						$suma+=$manif["res_ext02"];						
						$suma+=$manif["res_ext03"];						
						$suma+=$manif["res_ext04"];						
						$suma+=$manif["res_ext05"];						
						$suma+=$manif["res_ext06"];						
						$suma+=$manif["res_ext07"];						
						$suma+=$manif["res_ext08"];						
						$suma+=$manif["res_ext09"];						
						$suma+=$manif["res_ext10"];						
						$suma+=$manif["res_ext11"];						
						$suma+=$manif["res_ext12"];						
						$suma+=$manif["res_ext13"];						
						$suma+=$manif["res_ext14"];						
						$suma+=$manif["res_ext15"];
						?>
						<tr>
							<td rowspan="6"><?= ($k+3); ?></td>
							<td rowspan="6">
								<?= $manif["manif"]; ?>
								<input type="hidden" id="identif_manif_<?= $k; ?>" name="identif_manif_<?= $k; ?>" value="<?= $manif["manif"]; ?>" />
							</td>
							<td>
								<input type="date" class="form-control" id="fecha_<?= $k; ?>" name="fecha_<?= $k; ?>" value="<?= DateToMySQL($manif["fecha"]); ?>" />
							</td>
							<td>
								<select class="form-control" id="ruta_<?= $k; ?>" name="ruta_<?= $k; ?>">
									<?php
									foreach($rutas as $emp)
										foreach($emp["sucursales"] as $suc)
										{
											?>
											<optgroup label="<?= $emp["razonsocial"]." - ".$suc["nombre"] ?>">
											<?php
											foreach($suc["rutas"] as $ruta)
											{
												?>
												<option value="<?= $ruta["id"]?>" <?= ($ruta["id"]==$manif["idruta_actual"]?'selected="selected"':''); ?> ><?= $ruta["identificador"]." - ".$ruta["nombre"]; ?></option>
												<?php
											}
											?>
											</optgroup>
											<?php
										}
									?>
								</select>
							</td>
							<td>
								<input type="number" class="form-control" id="no_cte_<?= $k; ?>" name="no_cte_<?= $k; ?>" value="<?= $manif["identifcte_actual"]; ?>" min="1" max="999999" maxlength="6" onblur="Manifiesto.importarValidaCliente(<?= $k; ?>)" />
								<div id="nom_cte_<?= $k; ?>"><?= $manif["nomcte_actual"]?></div>
								<input type="hidden" id="id_cte_<?= $k; ?>" name="id_cte_<?= $k; ?>" value="<?= $manif["idcte_actual"]; ?>" />
							</td>
							<td>
							    <input type="number" class="form-control" id="no_gen_<?= $k; ?>" name="no_gen_<?= $k; ?>" value="<?= $manif["identifgen_actual"]; ?>" min="1" max="999999" maxlength="6" onblur="Manifiesto.importarValidaGenerador(<?= $k; ?>)" />
								<div id="nom_gen_<?= $k; ?>"><?= $manif["nomgen_actual"]?></div>
								<input type="hidden" id="id_gen_<?= $k; ?>" name="id_gen_<?= $k; ?>" value="<?= $manif["idgen_actual"]; ?>" />
							</td>
							<td>
								<select id="frm_motivo_<?= $k; ?>" name="frm_motivo_<?= $k; ?>" class="form-control">
									<option value=""></option>
									<?php foreach($motivos as $cat): ?>
										<optgroup label="<?= $cat["descripcion"]; ?>"></optgroup>
										<?php foreach($cat["opciones"] as $opc): ?>
											<option value="<?= $opc["idcatalogodet"]; ?>" <?= (strtolower(trim($manif["causa"]))==strtolower(trim($cat["descripcion"])) && strtolower(trim($manif["motivo"]))==strtolower(trim($opc["descripcion"]))?'selected="selected"':""); ?>><?= $opc["descripcion"]; ?></option>
										<?php endforeach; ?>
									<?php endforeach; ?>
								</select>
							</td>
							<td>
								<input type="text" class="form-control" id="total_<?= $k; ?>" name="total_<?= $k; ?>" value="<?= $suma; ?>" readonly="readonly" />
							</td>
						</tr>
						<tr>
							<td class="abajo">
								Sangre<br />
								<div>
									<input type="text" class="form-control" id="sangre_<?= $k; ?>" name="sangre_<?= $k; ?>" value="<?= $manif["res_sangre"]; ?>" onblur="Manifiesto.importarSumaKilos(<?= $k; ?>)" />
								</div>
							</td>
							<td class="abajo">
								Cultivos y Cepas<br />
								<div>
									<input type="text" class="form-control" id="cultivos_<?= $k; ?>" name="cultivos_<?= $k; ?>" value="<?= $manif["res_cultivos"]; ?>" onblur="Manifiesto.importarSumaKilos(<?= $k; ?>)" />
								</div>
							</td>
							<td class="abajo">
								Patológicos<br />
								<div>
									<input type="text" class="form-control" id="pato_<?= $k; ?>" name="pato_<?= $k; ?>" value="<?= $manif["res_pato"]; ?>" onblur="Manifiesto.importarSumaKilos(<?= $k; ?>)" />
								</div>
							</td>
							<td class="abajo">
								No Anatómcos<br />
								<div>
									<input type="text" class="form-control" id="noanat_<?= $k; ?>" name="noanat_<?= $k; ?>" value="<?= $manif["res_noanat"]; ?>" onblur="Manifiesto.importarSumaKilos(<?= $k; ?>)" />
								</div>
							</td>
							<td class="abajo">
								Punzocortantes<br />
								<div>
									<input type="text" class="form-control" id="punzo_<?= $k; ?>" name="punzo_<?= $k; ?>" value="<?= $manif["res_punzo"]; ?>" onblur="Manifiesto.importarSumaKilos(<?= $k; ?>)" />
								</div>
							</td>
							<td class="abajo">
								Medicamento Caduco<br />
								<div>
									<input type="text" class="form-control" id="medcad_<?= $k; ?>" name="medcad_<?= $k; ?>" value="<?= $manif["res_medcad"]; ?>" onblur="Manifiesto.importarSumaKilos(<?= $k; ?>)" />
								</div>
							</td>
						</tr>
						<tr>
							<td class="abajo">
								Balastras<br />
								<div>
									<input type="text" class="form-control" id="resext01_<?= $k; ?>" name="resext01_<?= $k; ?>" value="<?= $manif["res_ext01"]; ?>" onblur="Manifiesto.importarSumaKilos(<?= $k; ?>)" />
								</div>
							</td>
							<td class="abajo">
								Filtros de Aire<br />
								<div>
									<input type="text" class="form-control" id="resext02_<?= $k; ?>" name="resext02_<?= $k; ?>" value="<?= $manif["res_ext02"]; ?>" onblur="Manifiesto.importarSumaKilos(<?= $k; ?>)" />
								</div>
							</td>
							<td class="abajo">
								Kg. Merma de Proceso<br />
								<div>
									<input type="text" class="form-control" id="resext03_<?= $k; ?>" name="resext03_<?= $k; ?>" value="<?= $manif["res_ext03"]; ?>" onblur="Manifiesto.importarSumaKilos(<?= $k; ?>)" />
								</div>
							</td>
							<td class="abajo">
								Porron Alcohol Isopropilico<br />
								<div>
									<input type="text" class="form-control" id="resext04_<?= $k; ?>" name="resext04_<?= $k; ?>" value="<?= $manif["res_ext04"]; ?>" onblur="Manifiesto.importarSumaKilos(<?= $k; ?>)" />
								</div>
							</td>
							<td class="abajo">
								Porron de Sanitizante<br />
								<div>
									<input type="text" class="form-control" id="resext05_<?= $k; ?>" name="resext05_<?= $k; ?>" value="<?= $manif["res_ext05"]; ?>" onblur="Manifiesto.importarSumaKilos(<?= $k; ?>)" />
								</div>
							</td>
							<td class="abajo">
								Porron de Solventes<br />
								<div>
									<input type="text" class="form-control" id="resext06_<?= $k; ?>" name="resext06_<?= $k; ?>" value="<?= $manif["res_ext06"]; ?>" onblur="Manifiesto.importarSumaKilos(<?= $k; ?>)" />
								</div>
							</td>
						</tr>
						<tr>
							<td class="abajo">
								Porron envases vacios<br />
								<div>
									<input type="text" class="form-control" id="resext07_<?= $k; ?>" name="resext07_<?= $k; ?>" value="<?= $manif["res_ext07"]; ?>" onblur="Manifiesto.importarSumaKilos(<?= $k; ?>)" />
								</div>
							</td>
							<td class="abajo">
								Porron Merma de Proceso<br />
								<div>
									<input type="text" class="form-control" id="resext08_<?= $k; ?>" name="resext08_<?= $k; ?>" value="<?= $manif["res_ext08"]; ?>" onblur="Manifiesto.importarSumaKilos(<?= $k; ?>)" />
								</div>
							</td>
							<td class="abajo">
								Tambor Basura Industrial<br />
								<div>
									<input type="text" class="form-control" id="resext09_<?= $k; ?>" name="resext09_<?= $k; ?>" value="<?= $manif["res_ext09"]; ?>" onblur="Manifiesto.importarSumaKilos(<?= $k; ?>)" />
								</div>
							</td>
							<td class="abajo">
								Tambor de Sanitizante<br />
								<div>
									<input type="text" class="form-control" id="resext10_<?= $k; ?>" name="resext10_<?= $k; ?>" value="<?= $manif["res_ext10"]; ?>" onblur="Manifiesto.importarSumaKilos(<?= $k; ?>)" />
								</div>
							</td>
							<td class="abajo">
								Tambor envases con medicamento<br />
								<div>
									<input type="text" class="form-control" id="resext11_<?= $k; ?>" name="resext11_<?= $k; ?>" value="<?= $manif["res_ext11"]; ?>" onblur="Manifiesto.importarSumaKilos(<?= $k; ?>)" />
								</div>
							</td>
							<td class="abajo">
								Tambor Fase Movil<br />
								<div>
									<input type="text" class="form-control" id="resext12_<?= $k; ?>" name="resext12_<?= $k; ?>" value="<?= $manif["res_ext12"]; ?>" onblur="Manifiesto.importarSumaKilos(<?= $k; ?>)" />
								</div>
							</td>
						</tr>
						<tr>
							<td class="abajo">
								Tambor Merma de Proceso<br />
								<div>
									<input type="text" class="form-control" id="resext13_<?= $k; ?>" name="resext13_<?= $k; ?>" value="<?= $manif["res_ext13"]; ?>" onblur="Manifiesto.importarSumaKilos(<?= $k; ?>)" />
								</div>
							</td>
							<td class="abajo">
								Tambores<br />
								<div>
									<input type="text" class="form-control" id="resext14_<?= $k; ?>" name="resext14_<?= $k; ?>" value="<?= $manif["res_ext14"]; ?>" onblur="Manifiesto.importarSumaKilos(<?= $k; ?>)" />
								</div>
							</td>
							<td class="abajo">
								Virio Contaminado<br />
								<div>
									<input type="text" class="form-control" id="resext15_<?= $k; ?>" name="resext15_<?= $k; ?>" value="<?= $manif["res_ext15"]; ?>" onblur="Manifiesto.importarSumaKilos(<?= $k; ?>)" />
								</div>
							</td>
						</tr>
						<tr>
							<td colspan="4">
								<?php if(count($manif["warnings"])>0): ?>
									<div class="alert alert-warning">
										<?php foreach($manif["warnings"] as $item): ?>
											<strong>Warning <?= $item[0]; ?>: </strong>
											<?= $item[1]; ?><br />
										<?php endforeach; ?>
									</div>
								<?php endif; ?>
								<?php if(count($manif["errors"])>0): ?>
									<div class="alert alert-danger">
										<?php foreach($manif["errors"] as $item): ?>
											<strong>Error <?= $item[0]; ?>: </strong>
											<?= $item[1]; ?><br />
										<?php endforeach; ?>
									</div>
								<?php endif; ?>
							</td>
							<td colspan="2">
								<label class="control-label">
									<input type="checkbox" id="pso_<?= $k; ?>" name="pso_<?= $k; ?>" value="<?= $k; ?>" checked="checked" />
									<input type="hidden" id="status_<?= $k; ?>" name="status_<?= $k; ?>" value="<?= $manif["status"]; ?>" />
									<?php
									switch($manif["status"])
									{
										case 'noextiste':
											echo "Crear y Capturar Manifiesto";
											break;
										case 'porcapturar':
											echo "Capturar Manifiesto";
											break;
										case 'capturado':
											echo "Recapturar Manifiesto";
											break;
									}
									?>
								</label>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
		<div class="form-group">
			<div class="col-sm-8"></div>
			<div class="col-sm-2">
                <button type="button" class="btn btn-success" onclick="Manifiesto.importarCaptura()" >Aceptar</button>
            </div>
            <div class="col-sm-2">
                <button type="button" class="btn btn-danger" onclick="location.href='<?= base_url("manifiestos/index/$idempresa/$idsucursal"); ?>'">Cancelar</button>
            </div>
		</div>
	</form>
</div>
<script type="text/javascript">
	var gens=<?= json_encode($this->modsesion->getAllGens()); ?>;
	var empresa=<?= $idempresa; ?>;
	var sucursal=<?= $idsucursal; ?>;
</script>
<!-- Vista manifiestos/importarsimmagdl_02 End -->