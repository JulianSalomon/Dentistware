<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Multa_model extends MY_Model {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function get_multas_cliente($id_cliente) {
		$this->db->select('*');
		$this->db->from('multa');
		$this->db->where('id_cliente', $id_cliente);
        $query = $this->db->get();
		if ($query->num_rows())
			return $query->result();
		return false;
	}
	
	public function get_active_multas($id_cliente) {
		$this->db->select('*');
		$this->db->from('multa');
		$this->db->where('id_cliente', $id_cliente);
		$this->db->where('estado_multa', '0');
		$query = $this->db->get();
		if ($query->num_rows())
			return $query->result();
		return false;
	}
	
// 	public function get_multa($id){
// 		$this->db->select('*');
// 		$this->db->from('multa');
// 		$this->db->where('id_multa', $id);
// 		$query = $this->db->get();
// 		if ($query->num_rows())
// 			return $query->row();
// 		return false;
// 	}
	
	public function update_multa($id_multa, $data = ''){
		return $this->actualizar_datos('multa', $data, array(
				'id_multa' => $id_multa,
		));
	}
}