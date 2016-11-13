<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Diente_model extends MY_Model {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function get_dientes($id_registro) {
		$this->db->select('num_diente as num, ausente as aus, extraer as ext, carie as car, obturacion as obt, corona as cor, tramo as tra');
		$this->db->from('diente');
        $this->db->where('id_registro', $id_registro);
        $this->db->order_by('num_diente');
		$query = $this->db->get();
        if($query)
		  return $query->result();
        return false;
	}
    
    public function nuevo_diente($data) {
		return $this->insertar_nuevo('diente', $data);
	}
    
}