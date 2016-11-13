<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Registro_model extends MY_Model {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function get_registro($id_registro) {
		$this->db->select('*');
		$this->db->from('registro');
        $this->db->join('persona', 'persona.id_persona = registro.id_odon');
		$this->db->where('id_registro', $id_registro);
		$query = $this->db->get();
        if($query)
            return $query->row();        
		return false;
	}
}