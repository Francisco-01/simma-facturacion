<?php
class ModManifiesto extends CI_Model
{
	private $idmanifiesto;
	private $identificador;
	private $instruccionesespeciales;
	private $fecha;
	private $fechaembarque;
	private $fecharecepcion;
	private $observacionesdestinofinal;
	private $idgenerador;
	private $idruta;
	private $recolecciones;
	private $motivo;
	private $noexterno;
	private $facturable;
	private $tipo_cobro;
	private $uuid;
	private $uuid_excedente;
	private $fecha_captura;
	private $capturista;
	public function __construct()
	{
		parent::__construct();
		$this->idmanifiesto=0;
		$this->identificador="";
		$this->instruccionesespeciales="";
		$this->fecha="";
		$this->fechaembarque="";
		$this->fecharecepcion="";
		$this->observacionesdestinofinal="";
		$this->idgenerador=0;
		$this->idruta=0;
		$this->recolecciones=array();
		$this->motivo="";
		$this->noexterno="";
		$this->facturable=0;
		$this->tipo_cobro=0;
		$this->uuid="";
		$this->uuid_excedente="";
		$this->fecha_captura="";
		$this->capturista="";
	}
	public function getIdmanifiesto() { return $this->idmanifiesto; }
	public function getIdentificador() { return $this->identificador; }
	public function getInstruccionesespeciales() { return $this->instruccionesespeciales; }
	public function getFecha() { return $this->fecha; }
	public function getFechaembarque() { return $this->fechaembarque; }
	public function getFecharecepcion() { return $this->fecharecepcion; }
	public function getObservacionesdestinofinal() { return $this->observacionesdestinofinal; }
	public function getIdgenerador() { return $this->idgenerador; }
	public function getIdruta() { return $this->idruta; }
	public function getRecolecciones() { return $this->recolecciones; }
	public function getMotivo() { return $this->motivo; }
	public function getNoexterno() { return $this->noexterno; }
	public function getFacturable() { return $this->facturable; }
	public function getTipo_cobro() { return $this->tipo_cobro; }
	public function getUuid() { return $this->uuid; }
	public function getUuid_excedente() { return $this->uuid_excedente; }
	public function getFecha_captura() { return $this->fecha_captura; }
	public function getCapturista() { return $this->capturista; }
	public function setIdmanifiesto($valor) { $this->idmanifiesto= intval($valor); }
	public function setIdentificador($valor) { $this->identificador= "".$valor; }
	public function setInstruccionesespeciales($valor) { $this->instruccionesespeciales= "".$valor; }
	public function setFecha($valor) { $this->fecha= "".$valor; }
	public function setFechaembarque($valor) { $this->fechaembarque= "".$valor; }
	public function setFecharecepcion($valor) { $this->fecharecepcion= "".$valor; }
	public function setObservacionesdestinofinal($valor) { $this->observacionesdestinofinal= "".$valor; }
	public function setIdgenerador($valor) { $this->idgenerador= intval($valor); }
	public function setIdruta($valor) { $this->idruta= intval($valor); }
	public function setRecolecciones($valor) { if(is_array($valor)) $this->recolecciones=$valor; else array_push($this->recolecciones,$valor); }
	public function setMotivo($valor) { $this->motivo= "".$valor; }
	public function setNoexterno($valor) { $this->noexterno= "".$valor; }
	public function setFacturable($valor) { $this->facturable= intval( $valor ); }
	public function setTipo_cobro($valor) { $this->tipo_cobro= intval( $valor ); }
	public function setUuid($valor) { $this->uuid= "".$valor; }
	public function setUuid_excedente($valor) { $this->uuid_excedente= "".$valor; }
	public function setFecha_captura($valor) { $this->fecha_captura= "".$valor; }
	public function setCapturista($valor) { $this->capturista= "".$valor; }
	public function getFromDatabase($id=0)
	{
		if($this->idmanifiesto==""||$this->idmanifiesto==0)
		{
			if($id>0)
				$this->idmanifiesto=$id;
			else
				return false;
		}
		$this->db->where('idmanifiesto',$this->idmanifiesto);
		$regs=$this->db->get('manifiesto');
		$this->db->reset_query();
		if($regs->num_rows()==0)
			return false;
		$reg=$regs->row_array();
		$this->setIdmanifiesto($reg["idmanifiesto"]);
		$this->setIdentificador($reg["identificador"]);
		$this->setInstruccionesespeciales($reg["instruccionesespeciales"]);
		$this->setFecha($reg["fecha"]);
		$this->setFechaembarque($reg["fechaembarque"]);
		$this->setFecharecepcion($reg["fecharecepcion"]);
		$this->setObservacionesdestinofinal($reg["observacionesdestinofinal"]);
		$this->setMotivo($reg["motivo"]);
		$this->setNoexterno($reg["noexterno"]);
		$this->setFacturable($reg["facturable"]);
		$this->setTipo_cobro($reg["tipo_cobro"]);
		$this->setUuid($reg["uuid"]);
		$this->setUuid_excedente($reg["uuid_excedente"]);
		$this->setFecha_captura($reg["fecha_captura"]);
		$this->setCapturista($reg["capturista"]);
		$this->db->where('idmanifiesto',$this->idmanifiesto);
		$regs=$this->db->get('relgenman');
		$this->db->reset_query();
		if($regs->num_rows()>0)
		{
			$reg=$regs->row_array();
			$this->setIdgenerador($reg["idgenerador"]);
		}
		$this->db->where('idmanifiesto',$this->idmanifiesto);
		$regs=$this->db->get('relmanrut');
		$this->db->reset_query();
		if($regs->num_rows()>0)
		{
			$reg=$regs->row_array();
			$this->setIdruta($reg["idruta"]);
		}
		$this->setRecolecciones(array());
		$this->db->where('idmanifiesto',$this->idmanifiesto);
		$regs=$this->db->get('relmanrec');
		$this->db->reset_query();
		if($regs->num_rows()>0)
		{
			$reg=$regs->row_array();
			$this->setRecolecciones($reg["idrecoleccion"]);
		}
		return true;
	}
	public function getFromInput()
	{
		$this->setIdmanifiesto($this->input->post("frm_manifiesto_idmanifiesto"));
		$this->setIdentificador($this->input->post("frm_manifiesto_identificador"));
		$this->setInstruccionesespeciales($this->input->post("frm_manifiesto_instruccionesespeciales"));
		$this->setFecha($this->input->post("frm_manifiesto_fecha"));
		$this->setFechaembarque($this->input->post("frm_manifiesto_fechaembarque"));
		$this->setFecharecepcion($this->input->post("frm_manifiesto_fecharecepcion"));
		$this->setObservacionesdestinofinal($this->input->post("frm_manifiesto_observacionesdestinofinal"));
		$this->setIdgenerador($this->input->post("frm_manifiesto_idgenerador"));
		$this->setIdruta($this->input->post("frm_manifiesto_idruta"));
		$this->setRecolecciones(explode(",",$this->input->post("frm_manifiesto_recolecciones")));
		$this->setMotivo($this->input->post("frm_manifiesto_motivo"));
		$this->setNoexterno($this->input->post("frm_manifiesto_noexterno"));
		$this->setFacturable($this->input->post("frm_manifiesto_facturable"));
		$this->setTipo_cobro($this->input->post("frm_manifiesto_tipo_cobro"));
		$this->setUuid($this->input->post("frm_manifiesto_uuid"));
		$this->setUuid_excedente($this->input->post("frm_manifiesto_uuid_excedente"));
		$this->setFecha_captura($this->input->post("frm_manifiesto_fecha_captura"));
		$this->setCapturista($this->input->post("frm_manifiesto_capturista"));
		return true;
	}
	public function addToDatabase()
	{
		$data=array(
			"identificador"=>$this->identificador,
			"instruccionesespeciales"=>$this->instruccionesespeciales,
			"fecha"=>$this->fecha,
			"fechaembarque"=>$this->fechaembarque,
			"fecharecepcion"=>$this->fecharecepcion,
			"observacionesdestinofinal"=>$this->observacionesdestinofinal,
			"motivo"=>$this->motivo,
			"noexterno"=>$this->noexterno,
			"facturable"=>$this->facturable,
			"tipo_cobro"=>$this->tipo_cobro,
			"uuid"=>$this->uuid,
			"uuid_excedente"=>$this->uuid_excedente,
			"fecha_captura"=>$this->fecha_captura,
			"capturista"=>$this->capturista
		);
		$this->db->insert('manifiesto',$data);
		$this->setIdmanifiesto($this->db->insert_id());
		$this->db->reset_query();
		$this->db->insert('relgenman',array(
			'idgenerador'=>$this->idgenerador,
			'idmanifiesto'=>$this->idmanifiesto
		));
		$this->db->reset_query();
		if($this->idruta!="" && $this->idruta>0) {
			$this->db->insert('relmanrut',array(
				'idruta'=>$this->idruta,
				'idmanifiesto'=>$this->idmanifiesto
			));
			$this->db->reset_query();
		}
	}
	public function updateToDatabase()
	{
		if($this->idmanifiesto==""||$this->idmanifiesto==0)
		{
			return false;
		}
		$data=array(
			"identificador"=>$this->identificador,
			"instruccionesespeciales"=>$this->instruccionesespeciales,
			"fecha"=>$this->fecha,
			"fechaembarque"=>$this->fechaembarque,
			"fecharecepcion"=>$this->fecharecepcion,
			"observacionesdestinofinal"=>$this->observacionesdestinofinal,
			"motivo"=>$this->motivo,
			"noexterno"=>$this->noexterno,
			"facturable"=>$this->facturable,
			"tipo_cobro"=>$this->tipo_cobro,
			"uuid"=>$this->uuid,
			"uuid_excedente"=>$this->uuid_excedente,
			"fecha_captura"=>$this->fecha_captura,
			"capturista"=>$this->capturista
		);
		$this->db->where('idmanifiesto',$this->idmanifiesto);
		$this->db->update('manifiesto',$data);
		$this->db->reset_query();
		$this->db->where('idmanifiesto',$this->idmanifiesto);
		$this->db->update('relgenman',array('idgenerador'=>$this->idgenerador));
		$this->db->reset_query();
		$this->db->where('idmanifiesto',$this->idmanifiesto);
		$this->db->update('relmanrut',array('idruta'=>$this->idruta));
		$this->db->reset_query();
		return true;
	}
	public function delete($id=0)
	{
		//Elimina la relacion con la bitacora pero la deja viva
		if($this->idmanifiesto==""||$this->idmanifiesto==0)
		{
			if($id>0)
				$this->idmanifiesto=$id;
			else
				return false;
		}
		$regs=$this->getRecoleccionesDatabase();
		if($regs!==false) foreach($regs as $reg)
		{
			$this->load->model( 'modrecoleccion' );
			$this->modrecoleccion->setIdrecoleccion($reg["idrecoleccion"]);
			$this->modrecoleccion->delete();
		}
		$this->db->where('idmanifiesto',$this->idmanifiesto);
		$this->db->delete(array('relbitman','relmanrut','relmanrec','relgenman','manifiesto'));
		$this->db->reset_query();
		return true;
	}
	public function getRecoleccionesDatabase()
	{
		if($this->idmanifiesto==""||$this->idmanifiesto==0)
		{
			return false;
		}
		$this->db->select('idrecoleccion');
		$this->db->where('idmanifiesto',$this->idmanifiesto);
		$regs=$this->db->get("relmanrec");
		$this->db->reset_query();
		if($regs->num_rows()==0)
			return false;
		return $regs->result_array();
	}
	public function nextIdentificador($idsucursal=0)
	{
		$idsuc=$idsucursal;
		if($this->idgenerador!=0 && $this->idgenerador>0)
		{
			$this->modgenerador->setIdgenerador($this->idgenerador);
			$this->modgenerador->getFromDatabase();
			$idsuc=$this->modgenerador->getIdsucursal();
		}
		$suc=new Modsucursal();
		$suc->setIdsucursal($idsuc);
		$suc->getFromDatabase();
		$regs=$this->db->query("SELECT MAX(CAST(REPLACE( identificador, '{$suc->getIniciales()}', '') AS UNSIGNED)) AS identificador FROM (`manifiesto`) WHERE `identificador` like '{$suc->getIniciales()}%'");
		$max=($regs->num_rows()>0?intval($regs->row_array()["identificador"]):0);
		return $suc->getIniciales().($max+1);
	}
	public function getAll($idsucursal,$filtros)
	{
		$whr="";
		if($idsucursal>0)
			$whr.="idmanifiesto in (select idmanifiesto from relmanrut where idruta in (select idruta from relsucrut where idsucursal = $idsucursal))";
		if(count($this->modsesion->getAllGens())>0)
		{
			$whr.=($whr!=""?" and ":"")."idmanifiesto in (select idmanifiesto from relgenman where idgenerador in (".implode(",",$this->modsesion->getAllGens())."))";
		}
		if(is_array($filtros))
		{
			$takePrefs=false;
			if(isset($filtros["identificador"]) && trim($filtros["identificador"])!="")
			{
				$whr.=($whr!=""?" and ":"")."identificador like '%{$filtros["identificador"]}%'";
				$takePrefs=true;
			}
			if(isset($filtros["numruta"]) && trim($filtros["numruta"])!="")
			{
				$whr.=($whr!=""?" and ":"")."idmanifiesto in (select idmanifiesto from relmanrut where idruta in (select idruta from ruta where identificador like '%{$filtros["numruta"]}%'))";
				$takePrefs=true;
			}
			if(isset($filtros["nombreruta"]) && trim($filtros["nombreruta"])!="")
			{
				$whr.=($whr!=""?" and ":"")."idmanifiesto in (select idmanifiesto from relmanrut where idruta in (select idruta from ruta where nombre like '%{$filtros["nombreruta"]}%'))";
				$takePrefs=true;
			}
			if(isset($filtros["fecha_inicio"]) && trim($filtros["fecha_inicio"])!="")
			{
				$whr.=($whr!=""?" and ":"")."fecha >= '{$filtros["fecha_inicio"]}'";
				$takePrefs=true;
			}
			if(isset($filtros["fecha_fin"]) && trim($filtros["fecha_fin"])!="")
			{
				$whr.=($whr!=""?" and ":"")."fecha <= '{$filtros["fecha_fin"]}'";
				$takePrefs=true;
			}
			if(isset($filtros["identificadorcliente"]) && trim($filtros["identificadorcliente"])!="")
			{
				$whr.=($whr!=""?" and ":"")."idmanifiesto in (select idmanifiesto from relgenman where idgenerador in (select idgenerador from relcligen where idcliente in (select idcliente from cliente where identificador like '%{$filtros["identificadorcliente"]}%')))";
				$takePrefs=true;
			}
			if(isset($filtros["identificadorgenerador"]) && trim($filtros["identificadorgenerador"])!="")
			{
				$whr.=($whr!=""?" and ":"")."idmanifiesto in (select idmanifiesto from relgenman where idgenerador in (select idgenerador from generador where identificador like '%{$filtros["identificadorgenerador"]}%'))";
				$takePrefs=true;
			}
			if(isset($filtros["nra"]) && trim($filtros["nra"])!="")
			{
				$whr.=($whr!=""?" and ":"")."idmanifiesto in (select idmanifiesto from relgenman where idgenerador in (select idgenerador from generador where numregamb like '%{$filtros["nra"]}%'))";
				$takePrefs=true;
			}
			if(isset($filtros["razonsocial"]) && trim($filtros["razonsocial"])!="")
			{
				$whr.=($whr!=""?" and ":"")."idmanifiesto in (select idmanifiesto from relgenman where idgenerador in (select idgenerador from generador where razonsocial like '%{$filtros["razonsocial"]}%'))";
				$takePrefs=true;
			}
			if(isset($filtros["rfc"]) && trim($filtros["rfc"])!="")
			{
				$whr.=($whr!=""?" and ":"")."idmanifiesto in (select idmanifiesto from relgenman where idgenerador in (select idgenerador from generador where rfc like '%{$filtros["rfc"]}%'))";
				$takePrefs=true;
			}
			if(isset($filtros["transportista"]) && trim($filtros["transportista"])!="")
			{
				$whr.=($whr!=""?" and ":"")."idmanifiesto in (select idmanifiesto from relmanrut where idruta in (select idruta from ruta where empresatransportista = {$filtros["transportista"]}))";
				$takePrefs=true;
			}
			if(isset($filtros["destinofinal"]) && trim($filtros["destinofinal"])!="")
			{
				$whr.=($whr!=""?" and ":"")."idmanifiesto in (select idmanifiesto from relmanrut where idruta in (select idruta from ruta where empresadestinofinal = {$filtros["destinofinal"]}))";
				$takePrefs=true;
			}
			if(isset($filtros["fechaembarque_inicio"]) && trim($filtros["fechaembarque_inicio"])!="")
			{
				$whr.=($whr!=""?" and ":"")."fechaembarque >= '{$filtros["fechaembarque_inicio"]}'";
				$takePrefs=true;
			}
			if(isset($filtros["fechaembarque_fin"]) && trim($filtros["fechaembarque_fin"])!="")
			{
				$whr.=($whr!=""?" and ":"")."fechaembarque <= '{$filtros["fechaembarque_fin"]}'";
				$takePrefs=true;
			}
			if(isset($filtros["fecharecepcion_inicio"]) && trim($filtros["fecharecepcion_inicio"])!="")
			{
				$whr.=($whr!=""?" and ":"")."fecharecepcion >= '{$filtros["fecharecepcion_inicio"]}'";
				$takePrefs=true;
			}
			if(isset($filtros["fecharecepcion_fin"]) && trim($filtros["fecharecepcion_fin"])!="")
			{
				$whr.=($whr!=""?" and ":"")."fecharecepcion <= '{$filtros["fecharecepcion_fin"]}'";
				$takePrefs=true;
			}
			if($whr!="" && ($takePrefs||true))
			{
				$this->db->where($whr);
				$this->db->order_by('identificador');
				$regs=$this->db->get('manifiesto');
				$this->db->reset_query();
				if($regs->num_rows()==0)
					return false;
				return $regs->result_array();
			}
		}
	}
	public function getFromIdentificador($identificador)
	{
		$this->db->where("identificador",$identificador);
		$this->db->order_by('identificador');
		$regs=$this->db->get('manifiesto');
		$this->db->reset_query();
		if($regs->num_rows()==0)
			return false;
		return $regs->result_array();
	}
}
?>
