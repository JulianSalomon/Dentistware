<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Diente_model extends MY_Model {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function get_dientes($id_cliente) {
		$this->db->select('diente.num_diente as num, diente.ausente as aus, diente.extraer as ext, diente.carie as car, diente.obturacion as obt, diente.corona as cor, diente.tramo as tra');
		$this->db->from('historia_diente');
		$this->db->join('historia_clinica', 'historia_clinica.id_historia = historia_diente.id_historia');
		$this->db->join('diente', 'diente.id_diente = historia_diente.id_diente');
        $this->db->order_by('num_diente');
		$query = $this->db->get()->result();
		return $query;
	}
    
    public function nuevo_diente($data) {
		return $this->insertar_nuevo('diente', $data);
	}
}