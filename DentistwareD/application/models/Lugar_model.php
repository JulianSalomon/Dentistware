<?php

class Lugar_model extends MY_Model{
	
	public function __construct(){
		parent::__construct();
	}
    
    
    public function get_departamentos(){
		$this->db->select('*');
		$this->db->from('departamento');
        $this->db->order_by("nombre_dept", "asc");
		$query = $this->db->get()->result();
        
        $departamentos_array = array();
        foreach ($query as $arreglo) {
            $departamentos_array[$arreglo->id_departamento] = $arreglo->nombre_dept;
        }
        return $departamentos_array;	
	}
    
      public function get_ciudades($depto){
          
		$this->db->select('*');
		$this->db->from('ciudad');
        $this->db->order_by("nombre_ciudad", "asc");
		$this->db->where('id_departamento', $depto);
		$query = $this->db->get();
        $ciudades_array = array();

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $arreglo) {
                $ciudades_array[$arreglo->id_ciudad] = $arreglo->nombre_ciudad;
            }
        }
        return $ciudades_array;
	}
    
}