<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Pregunta_model extends MY_Model {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function get_preguntas() {
		$this->db->select('*');
		$this->db->from('pregunta');
        $query = $this->db->get();
		if ($query->num_rows())
			return $query->result();
		return false;
	}
    
       public function insertar_preguntas($data) {
		return $this->insertar_nuevo('historia_pregunta', $data);
	}
    
    
}