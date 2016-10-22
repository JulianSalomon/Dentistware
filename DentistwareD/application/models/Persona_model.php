<?php

class Persona_model extends MY_Model{
	
	public function __construct(){
		parent::__construct();
	}
	
	public function get_persona($documento){
		$this->db->select('*');
		$this->db->from('persona');
        $this->db->join('ciudad', 'ciudad.id_ciudad = persona.id_ciudad');
		$this->db->where('documento_persona', $documento);
		$query = $this->db->get()->row();
		return $query;		
	}
	
	public function get_clientes(){
		$this->db->select('id_persona, documento_persona as documento, tipo_documento as t_documento, nombre_persona as nombre, ciudad.nombre_ciudad as ciudad, departamento.nombre_dept as depto, direccion_persona as direccion, telefono_persona as telefono, correo_persona as email, contacto_cliente as contacto, estado_persona as estado, eps_persona as eps');
		$this->db->from('persona');
		$this->db->join('ciudad', 'ciudad.id_ciudad = persona.id_ciudad');
		$this->db->join('departamento', 'departamento.id_departamento = ciudad.id_departamento');
		$this->db->where('tipo_persona', 'CLT');
		
		$query = $this->db->get();
		if ($query->num_rows ())
			return $query->result();
		return false;
	}
    /*
    public function get_odontologos($doc){
		 $this->db->select('documento_persona as documento, tipo_documento as t_documento, nombre_persona as nombre, ciudad.nombre_ciudad as ciudad, direccion_persona as direccion, telefono_persona as telefono, correo_persona as email, eps_persona as eps, edad_persona as edad');
        //$this->db->select('*');
		$this->db->from('persona');
		$this->db->join('ciudad', 'ciudad.id_ciudad = persona.id_ciudad');
		$this->db->where('documento_persona', $doc);
		
		$query = $this->db->get();
		if ($query->num_rows ())
			return $query->result();
		return false;
	}*/
}