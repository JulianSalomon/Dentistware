<?php

class Multa_model extends MY_Model{
    
    public function __construct(){
        parent::__construct();               
    }
    
    public function get_multas_cliente($id_cliente){
		$this->db->select('*');
		$this->db->from('multa');
		$this->db->where('id_cliente', $id_cliente);
		
		$query = $this->db->get();
		if ($query->num_rows ())
			return $query->result();
		return false;
	}
}