<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Cita_model extends MY_Model{
	
	public function __construct(){
		parent::__construct();
	}
	
	public function get_cita($id = '' ){
		
     
        $this->db->select('*');
		$this->db->from('cita');
			$this->db->where('id_cita', $id);
        
		$query = $this->db->get()->row();
		return $query;		
	}
	
	public function get_citas($order_by = 'hora_cita', $order = 'asc', $limit = 0, $offset = 0, 
                              $fechaActual = '', $horaSolicitada = '', $odontologoActual = '') {
        $horaActual = date('H:i:s');
	    if($fechaActual == ''){
        $fechaActual = date("Y-m-d");
            }
		$this->db->select('id_cita, fecha_cita as fecha, hora_cita as hora, estado_cita as estado, odonto.nombre_persona  as odontologo, consultorio');
		$this->db->from('cita');
        $this->db->join('persona as odonto', 'odonto.id_persona = cita.id_odonto');
        $this->db->where('cita.id_cliente is NULL', NULL, FALSE);
        $this->db->group_start();
        $this->db->where('hora_cita >', $horaActual);
        $this->db->where('fecha_cita', $fechaActual);
            if($horaSolicitada != ''){
                $this->db->where('hora_cita', $horaSolicitada);
            }
               if($odontologoActual != '' && $odontologoActual != '-1') {
                   $this->db->where('id_odonto', $odontologoActual);
               }
        $this->db->group_end();
		$this->db->order_by ( $order_by, $order );
        if ($limit) {
			$this->db->limit ( $limit, $offset );
		}
        
        $query = $this->db->get ();
		if ($query)
			return $query->result();
		return false;
	}
    
    
    public function get_citas_cliente($order_by = 'hora_cita', $order = 'asc', 
                                      $limit = 0, $offset = 0, $idCliente = '') {

        
      
	
	        
        /*$data_in = new DateTime('2015-03-05 09:25:00');
 /* $data_out = new DateTime('2015-03-09 11:25:03');
  $interval = date_diff($data_in, $data_out);
  $days = $interval->days;
  $hours=$interval->format('%h');
  echo "days ".$days." hours: ".$hours;*/
        
      
    
		$this->db->select('id_cita, fecha_cita as fecha, hora_cita as hora, estado_cita as estado, odonto.nombre_persona  as odontologo, consultorio');
		$this->db->from('cita');
        $this->db->join('persona as odonto', 'odonto.id_persona = cita.id_odonto');
        
       if($idCliente != '') {
           $this->db->where('id_cliente', $idCliente);
        $this->db->where('estado_cita is NULL', NULL, FALSE);
        }
        $this->db->order_by ( $order_by, $order );
		if ($limit) {
			$this->db->limit ( $limit, $offset );
		}
        
        $query = $this->db->get ();
		if ($query)
			return $query->result();
		return false;
	}
    
    
    public function agendar_cita($id_cita, $data =''){
		return $this->actualizar_datos('cita', $data, array('id_cita' => $id_cita));
	}
    
    public function cancelar_cita($id_cita, $data =''){
		return $this->actualizar_datos('cita', $data, array('id_cita' => $id_cita));
     }      
}