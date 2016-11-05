<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Cita_model extends MY_Model{
	
	public function __construct(){
		parent::__construct();
	}
	
	public function get_cita($documento = '', $id = ''){
		$this->db->select('*');
		$this->db->from('cita');
			$this->db->where('id_cita', $id);
		$query = $this->db->get()->row();
		return $query;		
	}
	
	public function get_citas($order_by = 'id_persona', $order = 'asc', $limit = 0, $offset = 0, $word_like = '') {
		$array_termino = array('nombre_persona' => $word_like, 'documento_persona' => $word_like);
	
		$this->db->select('id_cita, fecha_cita as fecha, hora_cita as hora, estado_cita as estado, id_cliente as cliente, id_odonto as odontologo, consultorio');
		$this->db->from('cita');
		
		$this->db->order_by ( $order_by, $order );
		if ($limit) {
			$this->db->limit ( $limit, $offset );
		}
		$this->db->group_start();
		$this->db->or_like($array_termino);
		$this->db->group_end();
		$this->db->where('tipo_persona', 'CLT');
		$query = $this->db->get ();
		if ($query->num_rows())
			return $query->result();
		return false;
	}