<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Registro_model extends MY_Model {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function get_registros($id_historia = '') {
		$this->db->select('*');
		$this->db->from('registro');
		$this->db->where('id_historia', $id_historia);
        $this->db->order_by('fecha_reg', 'desc');
		$query = $this->db->get();
        if($query)
            return $query->result();        
		return false;
	}
	
    public function get_registro($id_registro = '') {
		$this->db->select('*');
		$this->db->from('registro');
		$this->db->where('id_registro', $id_registro);
        $this->db->join('persona', 'persona.id_persona = registro.id_odon');
		$query = $this->db->get();
        if($query)
            return $query->row();
		return false;
	}
    
	public function nuevo_registro($data) {
        return $this->insertar_nuevo('registro', $data);
	}
}