<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Historia_model extends MY_Model {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function get_historia_clinica($id_cliente) {
		$this->db->select('*');
		$this->db->from('historia_clinica');
		$this->db->where('id_cliente', $id_cliente);
		$query = $this->db->get();
        if($query)
            return $query->row();
		return false;
	}
    
    public function get_historia($id_historia) {
		$this->db->select('*');
		$this->db->from('historia_clinica');
		$this->db->where('id_historia', $id_historia);
		$query = $this->db->get()->result();
		return $query;
	}
    
    public function nueva_historia($data) {
		return $this->insertar_nuevo('historia_clinica', $data);
	}
      public function get_historia_por_cliente($id_cliente) {
		$this->db->select('*');
		$this->db->from('historia_clinica');
		$this->db->where('id_cliente', $id_cliente);
		$query = $this->db->get()->row();
		return $query;
	}
    
}