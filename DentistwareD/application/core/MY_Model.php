<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');
class MY_Model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}
	
	private function result_to_indexed_array($result = array(), $index = '', $value = '') {		
		$return_array = array();
		foreach ($result as $array) {
			$indice = $array->$index;
			$return_array[$indice] = $array->$value;
		}		
		return $return_array;
	}
	
	public function listas($tabla = '', $campo = '') {		
		$listas_where = array(
			'tabla' => $tabla,
			'campo' => $campo
		);
		$lista = $this->db->select('valor, texto')->where($listas_where)->from('listas')->order_by('texto')->get();
        return $this->result_to_indexed_array($lista->result(), 'valor', 'texto');
	}
	
	public function ultimo($tabla = '', $campo = '') {		
		$ultimo = $this->db->select_max($campo, 'ultimo')->get($tabla);
		return $ultimo->result_array()[0];
	}
	
	public function insertar_nuevo($tabla = '', $datos = array()) {
		if ($this->db->insert($tabla, $datos)) {
			return 1;
		} else {
			return 0;
		}
	}
	
	public function actualizar_datos($tabla = '', $datos = array(), $array_where = array()) {
		if ($this->db->update($tabla, $datos, $array_where)) {
			return 1;
		} else {
			return 0;
		}
	}
	
	public function eliminar_datos($tabla = '', $array_where = array()) {
		if ($this->db->delete($tabla, $array_where)) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	public function contar($tabla, $campo = '', $word = '') {
		if ($word) {
			$this->db->like($campo, $word);
		}		
		$query = $this->db->get($tabla);
		return count($query->result());
	}
	
	public function get_row($tabla = '', $where = array()) {
		$query = $this->db->get_where($tabla, $where);		
		if ($query->num_rows()) {
			return $query->row();
		}
		return false;
	}
}