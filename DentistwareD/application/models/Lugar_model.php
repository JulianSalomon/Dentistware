<?php

class Lugar_model extends MY_Model{
	
	public function __construct(){
		parent::__construct();
	}
    
    
    public function get_departamentos(){
		$this->db->select('*');
		$this->db->from('departamento');
        $this->db->order_by("nombre_dept", "asc");
		$query = $this->db->get();
		if ($query->num_rows ())
			return $query->result();
		return false;		
	}
    
      public function get_ciudades($depto){
		$this->db->select('*');
		$this->db->from('ciudad');
       //$this->db->join('departamento', 'ciudad.id_departamento =' . $depto);
          $this->db->order_by("nombre_ciudad", "asc");
		$this->db->where('id_departamento', $depto);
		$query = $this->db->get();
		if ($query->num_rows ())
			return $query->result();
		return false;	
	}
    
}