<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Multa_model extends MY_Model {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function get_multas_cliente($id_cliente = '', $order_by = 'id_multa', $order = 'asc', $limit = 0, $offset = 0) {
		$this->db->select('*');
		$this->db->from('multa');
		$this->db->where('id_cliente', $id_cliente);
		$this->db->order_by($order_by, $order);
		if ($limit) {
			$this->db->limit($limit, $offset);
		}
        $query = $this->db->get();
		if ($query->num_rows())
			return $query->result();
		return false;
	}

    public function get_multas_no_pagadas($id_cliente) {
		$this->db->select('*');
		$this->db->from('multa');
		$this->db->where('id_cliente', $id_cliente);
        $this->db->where('estado_multa', '0');
        $query = $this->db->get();

		if ($query->num_rows())
			return $query->result();
		return false;
	}

	public function update_multa($id_multa, $data = ''){
		return $this->actualizar_datos('multa', $data, array(
				'id_multa' => $id_multa,
		));
	}
	
	public function count_multas_by_cliente($id_cliente){
		$this->db->select('*');
		$this->db->from('multa');
		$this->db->where('id_cliente', $id_cliente);
		
		$query = $this->db->get();
		return count($query->result());
	}
	
    public function count_multas($estadoMulta) {
		$this->db->select('*');
        $this->db->from('multa');
        $this->db->where('estado_multa', $estadoMulta);
        
        $query = $this->db->get();
		return count($query->result());        
	}
}