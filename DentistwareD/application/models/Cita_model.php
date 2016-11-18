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
			$this->db->where('hora_cita =', $horaSolicitada);
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
			$this->db->where('hora_cita =', $horaSolicitada);
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
    
    public function get_citas_odontologo($fechaActual = '', $horaSolicitada = '', $odontologoActual = '') {
    
		$this->db->select('id_cita, fecha_cita as fecha, hora_cita as hora, estado_cita as estado, cliente.nombre_persona  as cliente, consultorio');
		$this->db->from('cita');
		$this->db->join('persona as cliente', 'odonto.id_persona = cita.id_odonto');
		$this->db->where('cita.id_cliente is NULL', NULL, FALSE);
		$this->db->group_start();

		$this->db->where('fecha_cita', $fechaActual);
		if ($horaSolicitada != '') {
			$this->db->where('hora_cita =', $horaSolicitada);
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
    
    public function get_citas_para_odontologo($horaSolicitada = '', $odontologoActual = ''){
		$fechaActual = date("Y-m-d");
		$horaActual = date('H:i:s');
		
		$this->db->select('id_cita, fecha_cita as fecha, hora_cita as hora, estado_cita as estado, cliente.nombre_persona  as cliente, consultorio, cliente.id_persona as id');
		$this->db->from('cita');
		$this->db->join('persona as cliente', 'cliente.id_persona = cita.id_cliente');
		$this->db->where('cita.id_cliente is not NULL', NULL, FALSE);		
		$this->db->where('hora_cita >=', $horaActual);
		$this->db->where('fecha_cita', $fechaActual);
        $this->db->group_start();
        $this->db->where('estado_cita ', NULL);
        $this->db->group_end();
		
		if ($horaSolicitada != '') {
			$this->db->where('hora_cita =', $horaSolicitada);          
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
	
	public function get_all_citas($fechaActual = '', $horaSolicitada = '', $odontologoActual = '') {
	
		$this->db->select('id_cita, fecha_cita as fecha, hora_cita as hora, estado_cita as estado, odonto.nombre_persona  as odontologo, consultorio, id_cliente, id_odonto');
		$this->db->from('cita');
		$this->db->join('persona as odonto', 'odonto.id_persona = cita.id_odonto');
		$this->db->group_start();
		$this->db->where('fecha_cita', $fechaActual);
		if ($horaSolicitada != '') {
			$this->db->where('hora_cita', $horaSolicitada);
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
    
    public function marcar_cita($id_cita, $data = '') {
		return $this->actualizar_datos('cita', $data, array(
			'id_cita' => $id_cita
		));
	}


    public function count_citas($idPersona, $estadoCita ='', $day = '') {
		$this->db->select('*');
        $this->db->from('cita');
		$this->db->where('id_odonto', $idPersona);
		$this->db->where('estado_cita', $estadoCita);
        if($day == ''){
            $firstday = date('Y-m-d', strtotime('sunday -1 weeks'));
            $this->db->where('fecha_cita >', $firstday);
        }else{
            $firstday = date('Y-m-d', strtotime($day));
            $this->db->where('fecha_cita', $firstday);
        }
        
        $query = $this->db->get();
		return count($query->result());        
	}
    
    public function count_allCitas_byWeek($day = '') {
		$this->db->select('*');
        $this->db->from('cita');
		$this->db->where('id_cliente', null);
        $firstday = date('Y-m-d', strtotime($day));
        $this->db->where('fecha_cita', $firstday);
        
        
        $query = $this->db->get();
		return count($query->result());        
	}
	
	public function delete_cita($id_cita) {
		$array = array(
				'id_cita' => $id_cita,
		);
		return $this->eliminar_datos('cita', $array);
	}
	
	public function update_cita($id_cita, $data = '') {
		return $this->actualizar_datos('cita', $data, array(
				'id_cita' => $id_cita
		));
	}
	
	public function nueva_cita($data) {
		return $this->insertar_nuevo('cita', $data);
	}
	
	public function same_cita($id_cliente = '', $id_odonto = '', $fecha = '', $hora = ''){
		$this->db->select('*');
		$this->db->from('cita');
		$this->db->where('fecha_cita', $fecha);
		$this->db->where('hora_cita', $hora);
		if($id_cliente){
			$this->db->where('id_cliente', $id_cliente);
		}
		if($id_odonto)
			$this->db->where('id_odonto', $id_odonto);
		
		return count($this->db->get()->result());
	}
}