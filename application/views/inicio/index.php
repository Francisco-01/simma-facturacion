<!-- Vista inicio/index -->
<?= $menumain; ?>
<div class="container">
	<hr />
	<div class="row">
		<?php
		$inds = array();
		$indicadores = array();
		$path_inds = $this->config->item('ruta_templates').'indicadores/indicadores.json';
		if( file_exists( $path_inds ) ) {
			$inds = json_decode( file_get_contents( $path_inds ), true );
		}
		$total_rows = 0;
		foreach( $inds as $kind => $indicador ){
			$this->modreporte->setIdreporte(15000);
			$this->modreporte->setParametros('abc');
			$this->modreporte->setSQL($indicador["sql"]);
			$ind=array(
				"archivo"=>$kind,
				"nombre"=>$indicador["nombre"],
				"idpanel"=>'indicador_' . $kind,
				"idcanvas"=>'canvas_' . $kind,
				"tipo"=>$indicador["tipo"],
				"data"=>$this->modreporte->execute(),
				"basicSQL"=>$indicador["sql"],
				"execSQL"=>$this->db->last_query()
				);
			foreach($ind["data"] as $k=>$elem)
			{
				$ind["data"][$k]["Item"]=ReplaceMonth($elem["Item"]);
			}
			array_push( $indicadores, $ind );
			$rows=(isset($indicador["rows"])?$indicador["rows"]:4);
			if( $total_rows + $rows > 12)
			{
				$total_rows = 0;
				?>
				</div>
				<div class="row">
				<?php
			}
			$total_rows += $rows;
			?>
			<div class="col-md-<?= $rows; ?>">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title">
							<?php if(isset($indicador["idreporte"]) && $indicador["idreporte"]): ?>
							<a target="winreporte" href="<?= base_url('reporte/ver/'.$indicador["idreporte"])?>">
							<?php endif; ?>
							<?= ReplaceMonth($indicador["nombre"]); ?>
							<?php if(isset($indicador["idreporte"]) && $indicador["idreporte"]): ?>
							</a>
							<?php endif; ?>
						</h3>
					</div>
					<div class="panel-body" id="indicador_<?= $kind; ?>">
						<div class="center-block">Cargando Indicador</div>
						<div class="progress progress-striped active">
							<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
								<span class="sr-only">Obteniendo Indicador</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
		}
		?>
	</div>
</div>
<?php if(count($inds)>0): ?>
	<script type="text/javascript" src="<?= base_url( "project_files/js/chart.js" ); ?>"></script>
	<script type="text/javascript" src="<?= base_url( "project_files/js/indicador.js" ); ?>"></script>
	<script type="text/javascript">
		var indicadores=<?= json_encode($indicadores)?>;
		indicadores.reverse();
		$(document).ready(function(){
			GenerarIndicador();
		});
	</script>
<?php endif; ?>
<!-- Vista inicio/index  End-->