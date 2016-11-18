<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Historia_model extends MY_Model {
	
	public function __construct() {
		parent::__construct();
	}
    
    public function get_historia($id_historia = '', $id_cliente = '') {
		$this->db->select('*');
		$this->db->from('historia_clinica');
        if($id_historia != null){
		  $this->db->where('id_historia', $id_historia);
        }
        if($id_cliente != null){
		  $this->db->where('id_cliente', $id_cliente);
        }
		$query = $this->db->get();
        if($query)
            return $query->row();
		return false;
	}
    
    public function nueva_historia($data) {
		return $this->insertar_nuevo('historia_clinica', $data);
	}
    
    public function obtener_preguntas_por_historia($id_historia = ''){
        $this->db->select('*');
		$this->db->from('historia_pregunta');
        $this->db->join('pregunta', 'pregunta.id_pregunta = historia_pregunta.id_pregunta');
        $this->db->where('id_historia' , $id_historia);
        $query = $this->db->get();
		if ($query->num_rows())
			return $query->result();
		return false;
    }
    
    public function actualizar_historia($id_cliente, $data = '') {
		return $this->actualizar_datos('historia_clinica', $data, array(
			'id_cliente' => $id_cliente
		));
	}
}