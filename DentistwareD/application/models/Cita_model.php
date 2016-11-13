<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Cita_model extends MY_Model {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function get_cita($id = '') {
        $this->db->select('*');
		$this->db->from('cita');
		$this->db->where('id_cita', $id);
        $query = $this->db->get()->row();
		return $query;
	}
	
	public function get_citas_today($horaSolicitada = '', $odontologoActual = ''){
		$fechaActual = date("Y-m-d");
		$horaActual = date('H:i:s');
		
		$this->db->select('id_cita, fecha_cita as fecha, hora_cita as hora, estado_cita as estado, odonto.nombre_persona  as odontologo, consultorio');
		$this->db->from('cita');
		$this->db->join('persona as odonto', 'odonto.id_persona = cita.id_odonto');
		$this->db->where('cita.id_cliente is NULL', NULL, FALSE);		
		$this->db->where('hora_cita >=', $horaActual);
		$this->db->where('fecha_cita', $fechaActual);
		if ($horaSolicitada != '') {
			$this->db->where('hora_cita >=', $horaSolicitada);
		}
		if ($odontologoActual != '' && $odontologoActual != '-1') {
			$this->db->where('id_odonto', $odontologoActual);
		}
		
		$this->db->order_by('hora_cita', 'asc');
		
		$query = $this->db->get();
		if ($query)
			return $query->result();
		return false;
	}
	
	public function get_citas($fechaActual = '', $horaSolicitada = '', $odontologoActual = '') {
		
		$this->db->select('id_cita, fecha_cita as fecha, hora_cita as hora, estado_cita as estado, odonto.nombre_persona  as odontologo, consultorio');
		$this->db->from('cita');
		$this->db->join('persona as odonto', 'odonto.id_persona = cita.id_odonto');
		$this->db->where('cita.id_cliente is NULL', NULL, FALSE);
		$this->db->group_start();

		$this->db->where('fecha_cita', $fechaActual);
		if ($horaSolicitada != '') {
			$this->db->where('hora_cita >=', $horaSolicitada);
		}
		if ($odontologoActual != '' && $odontologoActual != '-1') {
			$this->db->where('id_odonto', $odontologoActual);
		}
		$this->db->group_end();
		$this->db->order_by('hora_cita', 'asc');
		
		$query = $this->db->get();
		if ($query)
			return $query->result();
		return false;
	}
		
	public function get_citas_by_cliente($idCliente = '') {
        $this->db->select('id_cita, fecha_cita as fecha, hora_cita as hora, estado_cita as estado, odonto.nombre_persona  as odontologo, consultorio');
		$this->db->from('cita');
		$this->db->join('persona as odonto', 'odonto.id_persona = cita.id_odonto');
		
		if ($idCliente != '') {
			$this->db->where('id_cliente', $idCliente);
			$this->db->where('estado_cita is NULL', NULL, FALSE);
		}
		$this->db->order_by('hora_cita', 'asc');
		
		$query = $this->db->get();
		if ($query)
			return $query->result();
		return false;
	}
	
	
	public function agendar_cita($id_cita, $data = '') {
		return $this->actualizar_datos('cita', $data, array('id_cita' => $id_cita));
	}
	
	public function cancelar_cita($id_cita, $data = '') {
		return $this->actualizar_datos('cita', $data, array(
			'id_cita' => $id_cita
		));
	}
    
    public function count_citas($idPersona, $estadoCita) {
		$this->db->select('id_cita, fecha_cita as fecha, hora_cita as hora, estado_cita as estado, odonto.nombre_persona  as odontologo, consultorio');
		$this->db->from('cita');
        $this->db->where('id_odonto', $idPersona);
        $query = $this->db->get();
		return count($query->result());
	}
}