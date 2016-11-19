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
        $this->db->order_by('fecha_reg', 'asc');
		$query = $this->db->get();
        if($query)
            return $query->result();        
		return false;
	}
	
    public function get_registro($id_registro = '', $id_historia = '', $fecha_reg = '') {
		$this->db->select('*');
		$this->db->from('registro');
        if($id_registro != NULL){
		  $this->db->where('id_registro', $id_registro);
        }
        if($id_historia != NULL){
		  $this->db->where('id_historia', $id_historia);
        }
        if($fecha_reg != NULL){
		  $this->db->where('fecha_reg', $fecha_reg);
        }
        $this->db->join('persona', 'persona.id_persona = registro.id_odon');
        $this->db->order_by('fecha_reg', 'asc');
		$query = $this->db->get();
        if($query)
            return $query->row();
		return false;
	}
    
	public function nuevo_registro($data) {
        return $this->insertar_nuevo('registro', $data);
	}
}