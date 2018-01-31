<?php
class Modsucursal extends CI_Model
{
	private $idsucursal;
	private $nombre;
	private $calle;
	private $numexterior;
	private $numinterior;
	private $colonia;
	private $municipio;
	private $estado;
	private $cp;
	private $telefono;
	private $autsemarnat;
	private $registrosct;
	private $representante;
	private $cargorepresentante;
	private $numregamb;
	private $idempresa;
	private $iniciales;
	private $fac_serie;
	private $fac_folio_incial;
	private $fac_folio_final;
	private $fac_folio_actual;
	private $nc_serie;
	private $nc_folio_incial;
	private $nc_folio_final;
	private $nc_folio_actual;
	private $pago_serie;
	private $pago_folio_incial;
	private $pago_folio_final;
	private $pago_folio_actual;
	public function __construct()
	{
		parent::__construct();
		$this->idsucursal=0;
		$this->nombre="";
		$this->calle="";
		$this->numexterior="";
		$this->numinterior="";
		$this->colonia="";
		$this->municipio="";
		$this->estado="";
		$this->cp="";
		$this->telefono="";
		$this->autsemarnat="";
		$this->registrosct="";
		$this->representante="";
		$this->cargorepresentante="";
		$this->numregamb="";
		$this->idempresa=0;
		$this->iniciales="";
		$this->fac_serie="";
		$this->fac_folio_incial=0;
		$this->fac_folio_final=0;
		$this->fac_folio_actual=0;
		$this->nc_serie="";
		$this->nc_folio_incial=0;
		$this->nc_folio_final=0;
		$this->nc_folio_actual=0;
		$this->pago_serie="";
		$this->pago_folio_incial=0;
		$this->pago_folio_final=0;
		$this->pago_folio_actual=0;
	}
	public function getIdsucursal() { return $this->idsucursal; }
	public function getNombre() { return $this->nombre; }
	public function getCalle() { return $this->calle; }
	public function getNumexterior() { return $this->numexterior; }
	public function getNuminterior() { return $this->numinterior; }
	public function getColonia() { return $this->colonia; }
	public function getMunicipio() { return $this->municipio; }
	public function getEstado() { return $this->estado; }
	public function getCp() { return $this->cp; }
	public function getTelefono() { return $this->telefono; }
	public function getAutsemarnat() { return $this->autsemarnat; }
	public function getRegistrosct() { return $this->registrosct; }
	public function getRepresentante() { return $this->representante; }
	public function getCargorepresentante() { return $this->cargorepresentante; }
	public function getNumregamb() { return $this->numregamb; }
	public function getIdempresa() { return $this->idempresa; }
	public function getIniciales() { return $this->iniciales; }
	public function getFac_serie(){ return $this->fac_serie; }
	public function getFac_folio_incial(){ return $this->fac_folio_incial; }
	public function getFac_folio_final(){ return $this->fac_folio_final; }
	public function getFac_folio_actual(){ return $this->fac_folio_actual; }
	public function getNc_serie(){ return $this->nc_serie; }
	public function getNc_folio_incial(){ return $this->nc_folio_incial; }
	public function getNc_folio_final(){ return $this->nc_folio_final; }
	public function getNc_folio_actual(){ return $this->nc_folio_actual; }
	public function getPago_serie(){ return $this->pago_serie; }
	public function getPago_folio_incial(){ return $this->pago_folio_incial; }
	public function getPago_folio_final(){ return $this->pago_folio_final; }
	public function getPago_folio_actual(){ return $this->pago_folio_actual; }
	public function setIdsucursal($valor) { $this->idsucursal= intval($valor); }
	public function setNombre($valor) { $this->nombre= "".$valor; }
	public function setCalle($valor) { $this->calle= "".$valor; }
	public function setNumexterior($valor) { $this->numexterior= "".$valor; }
	public function setNuminterior($valor) { $this->numinterior= "".$valor; }
	public function setColonia($valor) { $this->colonia= "".$valor; }
	public function setMunicipio($valor) { $this->municipio= "".$valor; }
	public function setEstado($valor) { $this->estado= "".$valor; }
	public function setCp($valor) { $this->cp= "".$valor; }
	public function setTelefono($valor) { $this->telefono= "".$valor; }
	public function setAutsemarnat($valor) { $this->autsemarnat= "".$valor; }
	public function setRegistrosct($valor) { $this->registrosct= "".$valor; }
	public function setRepresentante($valor) { $this->representante= "".$valor; }
	public function setCargorepresentante($valor) { $this->cargorepresentante= "".$valor; }
	public function setNumregamb($valor) { $this->numregamb= "".$valor; }
	public function setIdempresa($valor) { $this->idempresa= intval($valor); }
	public function setIniciales($valor) { $this->iniciales= "".$valor; }
	public function setFac_serie($valor) { $this->fac_serie="".$valor; }	
	public function setFac_folio_incial($valor) { $this->fac_folio_incial="".$valor; }
	public function setFac_folio_final($valor) { $this->fac_folio_final="".$valor; }	
	public function setFac_folio_actual($valor) { $this->fac_folio_actual="".$valor; }
	public function setNc_serie($valor) { $this->nc_serie="".$valor; }
	public function setNc_folio_incial($valor) { $this->nc_folio_incial="".$valor; }
	public function setNc_folio_final($valor) { $this->nc_folio_final="".$valor; }
	public function setNc_folio_actual($valor) { $this->nc_folio_actual="".$valor; }
	public function setPago_serie($valor) { $this->pago_serie="".$valor; }
	public function setPago_folio_incial($valor) { $this->pago_folio_incial="".$valor; }	
	public function setPago_folio_final($valor) { $this->pago_folio_final="".$valor; }
	public function setPago_folio_actual($valor) { $this->pago_folio_actual="".$valor; }	
	public function getFromDatabase($id=0)
	{
		if($this->idsucursal==""||$this->idsucursal==0)
		{
			if($id>0)
				$this->idsucursal=$id;
			else
				return false;
		}
		$this->db->where('idsucursal',$this->idsucursal);
		$regs=$this->db->get('sucursal');
		$this->db->reset_query();
		if($regs->num_rows()==0)
			return false;
		$reg=$regs->row_array();
		$this->setIdsucursal($reg["idsucursal"]);
		$this->setNombre($reg["nombre"]);
		$this->setCalle($reg["calle"]);
		$this->setNumexterior($reg["numexterior"]);
		$this->setNuminterior($reg["numinterior"]);
		$this->setColonia($reg["colonia"]);
		$this->setMunicipio($reg["municipio"]);
		$this->setEstado($reg["estado"]);
		$this->setCp($reg["cp"]);
		$this->setTelefono($reg["telefono"]);
		$this->setAutsemarnat($reg["autsemarnat"]);
		$this->setRegistrosct($reg["registrosct"]);
		$this->setRepresentante($reg["representante"]);
		$this->setCargorepresentante($reg["cargorepresentante"]);
		$this->setNumregamb($reg["numregamb"]);
		$this->setIniciales($reg["iniciales"]);
		$this->setFac_serie($reg["fac_serie"]);
		$this->setFac_folio_incial($reg["fac_folio_incial"]);
		$this->setFac_folio_final($reg["fac_folio_final"]);
		$this->setFac_folio_actual($reg["fac_folio_actual"]);
		$this->setNc_serie($reg["nc_serie"]);
		$this->setNc_folio_incial($reg["nc_folio_incial"]);
		$this->setNc_folio_final($reg["nc_folio_final"]);
		$this->setNc_folio_actual($reg["nc_folio_actual"]);
		$this->setPago_serie($reg["pago_serie"]);
		$this->setPago_folio_incial($reg["pago_folio_incial"]);
		$this->setPago_folio_final($reg["pago_folio_final"]);
		$this->setPago_folio_actual($reg["pago_folio_actual"]);
		$this->db->where('idsucursal',$this->idsucursal);
		$regs=$this->db->get('relempsuc');
		$this->db->reset_query();
		if($regs->num_rows()==0)
			return false;
		$reg=$regs->row_array();
		$this->setIdempresa($reg["idempresa"]);
		return true;
	}
	public function getFromInput()
	{
		$this->setIdsucursal($this->input->post("frm_sucursal_idsucursal"));
		$this->setNombre($this->input->post("frm_sucursal_nombre"));
		$this->setCalle($this->input->post("frm_sucursal_calle"));
		$this->setNumexterior($this->input->post("frm_sucursal_numexterior"));
		$this->setNuminterior($this->input->post("frm_sucursal_numinterior"));
		$this->setColonia($this->input->post("frm_sucursal_colonia"));
		$this->setMunicipio($this->input->post("frm_sucursal_municipio"));
		$this->setEstado($this->input->post("frm_sucursal_estado"));
		$this->setCp($this->input->post("frm_sucursal_cp"));
		$this->setTelefono($this->input->post("frm_sucursal_telefono"));
		$this->setAutsemarnat($this->input->post("frm_sucursal_autsemarnat"));
		$this->setRegistrosct($this->input->post("frm_sucursal_registrosct"));
		$this->setRepresentante($this->input->post("frm_sucursal_representante"));
		$this->setCargorepresentante($this->input->post("frm_sucursal_cargorepresentante"));
		$this->setNumregamb($this->input->post("frm_sucursal_numregamb"));
		$this->setIdempresa($this->input->post("frm_sucursal_idempresa"));
		$this->setIniciales($this->input->post("frm_sucursal_iniciales"));
		$this->setFac_serie($this->input->post("frm_sucursal_fac_serie"));
		$this->setFac_folio_incial($this->input->post("frm_sucursal_fac_folio_incial")); 
		$this->setFac_folio_final($this->input->post("frm_sucursal_fac_folio_final")); 
		$this->setFac_folio_actual($this->input->post("frm_sucursal_fac_folio_actual")); 
		$this->setNc_serie($this->input->post("frm_sucursal_nc_serie")); 
		$this->setNc_folio_incial($this->input->post("frm_sucursal_nc_folio_incial")); 
		$this->setNc_folio_final($this->input->post("frm_sucursal_nc_folio_final")); 
		$this->setNc_folio_actual($this->input->post("frm_sucursal_nc_folio_actual")); 
		$this->setPago_serie($this->input->post("frm_sucursal_pago_serie")); 
		$this->setPago_folio_incial($this->input->post("frm_sucursal_pago_folio_incial")); 
		$this->setPago_folio_final($this->input->post("frm_sucursal_pago_folio_final")); 
		$this->setPago_folio_actual($this->input->post("frm_sucursal_pago_folio_actual"));  

		return true;
	}
	public function addToDatabase()
	{
		$data=array(
			"nombre"=>$this->nombre,
			"calle"=>$this->calle,
			"numexterior"=>$this->numexterior,
			"numinterior"=>$this->numinterior,
			"colonia"=>$this->colonia,
			"municipio"=>$this->municipio,
			"estado"=>$this->estado,
			"cp"=>$this->cp,
			"telefono"=>$this->telefono,
			"autsemarnat"=>$this->autsemarnat,
			"registrosct"=>$this->registrosct,
			"representante"=>$this->representante,
			"cargorepresentante"=>$this->cargorepresentante,
			"numregamb"=>$this->numregamb,
			"iniciales"=>$this->iniciales,
			"fac_serie"=>$this->fac_serie,
			"fac_folio_incial"=>$this->fac_folio_incial,
			"fac_folio_final"=>$this->fac_folio_final,
			"fac_folio_actual"=>$this->fac_folio_actual,

			"nc_serie"=>$this->nc_serie,
			"nc_folio_incial"=>$this->nc_folio_incial,
			"nc_folio_final"=>$this->nc_folio_final,
			"nc_folio_actual"=>$this->nc_folio_actual,

			"pago_serie"=>$this->pago_serie,
			"pago_folio_incial"=>$this->pago_folio_incial,
			"pago_folio_final"=>$this->pago_folio_final,
			"pago_folio_actual"=>$this->pago_folio_actual,
		);
		$this->db->insert('sucursal',$data);
		$this->setIdsucursal($this->db->insert_id());
		$this->db->reset_query();
		$this->db->insert('relempsuc',array(
			"idsucursal"=>$this->idsucursal,
			"idempresa"=>$this->idempresa
			));
		$this->db->reset_query();
	}
	public function updateToDatabase($id=0)
	{
		if($this->idsucursal==""||$this->idsucursal==0)
		{
			if($id>0)
				$this->idsucursal=$id;
			else
				return false;
		}
		$data=array(
			"nombre"=>$this->nombre,
			"calle"=>$this->calle,
			"numexterior"=>$this->numexterior,
			"numinterior"=>$this->numinterior,
			"colonia"=>$this->colonia,
			"municipio"=>$this->municipio,
			"estado"=>$this->estado,
			"cp"=>$this->cp,
			"telefono"=>$this->telefono,
			"autsemarnat"=>$this->autsemarnat,
			"registrosct"=>$this->registrosct,
			"representante"=>$this->representante,
			"cargorepresentante"=>$this->cargorepresentante,
			"numregamb"=>$this->numregamb,
			"iniciales"=>$this->iniciales,
			"fac_serie"=>$this->fac_serie,
			"fac_folio_incial"=>$this->fac_folio_incial,
			"fac_folio_final"=>$this->fac_folio_final,
			"fac_folio_actual"=>$this->fac_folio_actual,
			"nc_serie"=>$this->nc_serie,
			"nc_folio_incial"=>$this->nc_folio_incial,
			"nc_folio_final"=>$this->nc_folio_final,
			"nc_folio_actual"=>$this->nc_folio_actual,
			"pago_serie"=>$this->pago_serie,
			"pago_folio_incial"=>$this->pago_folio_incial,
			"pago_folio_final"=>$this->pago_folio_final,
			"pago_folio_actual"=>$this->pago_folio_actual,
		);
		$this->db->where('idsucursal',$this->idsucursal);
		$this->db->update('sucursal',$data);
		$this->db->reset_query();
		return true;
	}
	public function getAll($idempresa=0)
	{
		if($idempresa>0)
			$this->db->where("idsucursal in (select idsucursal from relempsuc where idempresa=$idempresa)");
		$this->db->order_by('nombre');
		$regs=$this->db->get('sucursal');
		$this->db->reset_query();
		if($regs->num_rows()==0)
			return false;
		return $regs->result_array();
	}
	public function delete($id=0)
	{
		//Elimina la relacion con la empresa pero la deja viva
		//Elimina la relacion con el grupo pero la deja viva
		$this->load->model( 'modruta' );
		$this->load->model( 'modvehiculo' );
		$this->load->model( 'modoperador' );
		$this->load->model( 'modcliente' );
		$this->load->model( 'modresiduo' );
		if($this->idsucursal==""||$this->idsucursal==0)
		{
			if($id>0)
				$this->idsucursal=$id;
			else
				return false;
		}
		$regs=$this->getRutas();
		if($regs!==false) foreach($regs as $reg)
		{
			$this->modruta->setIdruta($reg["idruta"]);
			$this->modruta->delete();
		}
		$regs=$this->getVehiculos();
		if($regs!==false) foreach($regs as $reg)
		{
			$this->modvehiculo->setIdvehiculo($reg["idvehiculo"]);
			$this->modvehiculo->delete();
		}
		$regs=$this->getOperadores();
		if($regs!==false) foreach($regs as $reg)
		{
			$this->modoperador->setIdoperador($reg["idoperador"]);
			$this->modoperador->delete();
		}
		$regs=$this->getClientes();
		if($regs!==false) foreach($regs as $reg)
		{
			$this->modcliente->setIdcliente($reg["idcliente"]);
			$this->modcliente->delete();
		}
		$regs=$this->getResiduos();
		if($regs!==false) foreach($regs as $reg)
		{
			$this->modresiduo->setIdresiduo($reg["idresiduo"]);
			$this->modresiduo->delete();
		}
		$this->db->where('idsucursal',$this->idsucursal);
		$this->db->delete( array( 'relgrusuc', 'relsucbit', 'relempsuc', 'sucursal' ) );
		$this->db->reset_query();
	}
	public function getResiduos()
	{
		if($this->idsucursal==""||$this->idsucursal==0)
			return false;
		$this->db->select('idresiduo');
		$this->db->where('idsucursal',$this->idsucursal);
		$regs=$this->db->get('relsucres');
		$this->db->reset_query();
		if($regs->num_rows()==0)
			return false;
		return $regs->result_array();
	}
	public function getClientes()
	{
		if($this->idsucursal==""||$this->idsucursal==0)
			return false;
		$this->db->select('idcliente');
		$this->db->where('idsucursal',$this->idsucursal);
		$regs=$this->db->get('relsuccli');
		$this->db->reset_query();
		if($regs->num_rows()==0)
			return false;
		return $regs->result_array();
	}
	public function getVehiculos()
	{
		if($this->idsucursal==""||$this->idsucursal==0)
			return false;
		$this->db->select('idvehiculo');
		$this->db->where('idsucursal',$this->idsucursal);
		$regs=$this->db->get('relsucveh');
		$this->db->reset_query();
		if($regs->num_rows()==0)
			return false;
		return $regs->result_array();
	}
	public function getRutas()
	{
		if($this->idsucursal==""||$this->idsucursal==0)
			return false;
		$this->db->select('idruta');
		$this->db->where('idsucursal',$this->idsucursal);
		$regs=$this->db->get('relsucrut');
		$this->db->reset_query();
		if($regs->num_rows()==0)
			return false;
		return $regs->result_array();
	}
	public function getOperadores()
	{
		if($this->idsucursal==""||$this->idsucursal==0)
			return false;
		$this->db->select('idoperador');
		$this->db->where('idsucursal',$this->idsucursal);
		$regs=$this->db->get('relsucope');
		$this->db->reset_query();
		if($regs->num_rows()==0)
			return false;
		return $regs->result_array();
	}
	public function getFromCampo($idempresa,$campo,$valor)
	{
		$this->db->where("$campo ='$valor' and idsucursal in (select idsucursal from relempsuc where idempresa=$idempresa)");
		$regs=$this->db->get('sucursal');
		$this->db->reset_query();
		if($regs->num_rows()==0)
			return false;
		return $regs->result_array();
	}
}
?>