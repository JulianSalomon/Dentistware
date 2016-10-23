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
	
	public function get_clientes($data = ''){
		$this->db->select('id_persona, documento_persona as documento, tipo_documento as t_documento, nombre_persona as nombre, ciudad.nombre_ciudad as ciudad, departamento.nombre_dept as depto, direccion_persona as direccion, telefono_persona as telefono, correo_persona as email, contacto_cliente as contacto, telefono_contacto_cliente as contacto_tel, estado_persona as estado, eps_persona as eps');
		$this->db->from('persona');
		$this->db->join('ciudad', 'ciudad.id_ciudad = persona.id_ciudad');
		$this->db->join('departamento', 'departamento.id_departamento = ciudad.id_departamento');
		$this->db->where('tipo_persona', 'CLT');
		
		$query = $this->db->get();
		if ($query->num_rows ())
			return $query->result();
		return false;
	}
    
    public function get_odontologos($data = ''){
		 $this->db->select('id_persona, documento_persona as documento, tipo_documento as t_documento, nombre_persona as nombre, ciudad.nombre_ciudad as ciudad, departamento.nombre_dept as depto, direccion_persona as direccion, telefono_persona as telefono, correo_persona as email, estado_persona as estado, estudios_odont as estudios');
		$this->db->from('persona');
		$this->db->join('ciudad', 'ciudad.id_ciudad = persona.id_ciudad');
		$this->db->join('departamento', 'departamento.id_departamento = ciudad.id_departamento');
		$this->db->where('tipo_persona', 'ODO');
		
		$query = $this->db->get();
		if ($query->num_rows ())
			return $query->result();
		return false;
    }
       public function get_empleados($data = ''){
		$this->db->select('id_persona, documento_persona as documento, tipo_documento as t_documento, nombre_persona as nombre, ciudad.nombre_ciudad as ciudad, departamento.nombre_dept as depto, direccion_persona as direccion, telefono_persona as telefono, correo_persona as email, estado_persona as estado');
		$this->db->from('persona');
		$this->db->join('ciudad', 'ciudad.id_ciudad = persona.id_ciudad');
		$this->db->join('departamento', 'departamento.id_departamento = ciudad.id_departamento');
		$this->db->where('tipo_persona', 'EMP');
		
		$query = $this->db->get();
		if ($query->num_rows ())
			return $query->result();
		return false;
	}
    
     public function get_administradores($data = ''){
		$this->db->select('id_persona, documento_persona as documento, tipo_documento as t_documento, nombre_persona as nombre, ciudad.nombre_ciudad as ciudad, departamento.nombre_dept as depto, direccion_persona as direccion, telefono_persona as telefono, correo_persona as email, estado_persona as estado');
		$this->db->from('persona');
		$this->db->join('ciudad', 'ciudad.id_ciudad = persona.id_ciudad');
		$this->db->join('departamento', 'departamento.id_departamento = ciudad.id_departamento');
		$this->db->where('tipo_persona', 'ADM');
		
		$query = $this->db->get();
		if ($query->num_rows ())
			return $query->result();
		return false;
	}
    
        public function new_persona($data) {
		return $this->insertar_nuevo('persona', $data);
	}
}