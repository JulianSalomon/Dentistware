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
		$this->db->join('persona', 'persona.id_persona = historia_clinica.id_cliente');
		$this->db->where('id_persona', $id_cliente);
		$query = $this->db->get()->row();
		return $query;
	}
	
	public function get_registro_historia($id_historia) {
		$this->db->select('*');
		$this->db->from('registro_historia');
		$this->db->join('historia_clinica', 'historia_clinica.id_historia = registro_historia.id_historia');
		$this->db->join('persona', 'persona.id_persona = registro_historia.id_odon');
		$this->db->where('id_cliente', $id_historia);
		$query = $this->db->get()->result();
		return $query;
	}
}