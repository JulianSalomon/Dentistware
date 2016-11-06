<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Persona_model extends MY_Model{
	
	public function __construct(){
		parent::__construct();
	}
	
	public function get_persona($documento = '', $id = ''){
		$this->db->select('*');
		$this->db->from('persona');
        $this->db->join('ciudad', 'ciudad.id_ciudad = persona.id_ciudad');
        if($documento)
			$this->db->where('documento_persona', $documento);
        else
        	$this->db->where('id_persona', $id);
        	
		$query = $this->db->get()->row();
		return $query;		
	}
	
	public function get_clientes($order_by = 'id_persona', $order = 'asc', $limit = 0, $offset = 0, $word_like = '') {
		$array_termino = array('nombre_persona' => $word_like, 'documento_persona' => $word_like);
	
		$this->db->select('id_persona, documento_persona as documento, tipo_documento as t_documento, nombre_persona as nombre, ciudad.nombre_ciudad as ciudad, departamento.nombre_dept as depto, direccion_persona as direccion, telefono_persona as telefono, correo_persona as email, contacto_cliente as contacto, telefono_contacto_cliente as contacto_tel, estado_persona as estado, eps_persona as eps');
		$this->db->from('persona');
		$this->db->join('ciudad', 'ciudad.id_ciudad = persona.id_ciudad');
		$this->db->join('departamento', 'departamento.id_departamento = ciudad.id_departamento');
		
		$this->db->order_by ( $order_by, $order );
		if ($limit) {
			$this->db->limit ( $limit, $offset );
		}
		$this->db->group_start();
		$this->db->or_like($array_termino);
		$this->db->group_end();
		$this->db->where('tipo_persona', 'CLT');
		$query = $this->db->get ();
		if ($query)
			return $query->result();
		return false;
	}	
	
	
	public function count_personas($word = '', $tipoPersona) {
		$array_termino = array('nombre_persona' => $word, 'documento_persona' => $word);
		$this->db->group_start();
		$this->db->or_like($array_termino);
		$this->db->group_end();
		$query = $this->db->get_where ( 'persona', array ('tipo_persona' => $tipoPersona) );
		return count($query->result());
	}
	
    
    public function get_odontologos($order_by = 'id_persona', $order = 'asc', $limit = 0, $offset = 0, $word_like = '') {
		$array_termino = array('nombre_persona' => $word_like, 'documento_persona' => $word_like);
	
		$this->db->select('id_persona, documento_persona as documento, tipo_documento as t_documento, nombre_persona as nombre, ciudad.nombre_ciudad as ciudad, departamento.nombre_dept as depto, direccion_persona as direccion, telefono_persona as telefono, correo_persona as email, estado_persona as estado, estudios_odont as estudios');
		$this->db->from('persona');
		$this->db->join('ciudad', 'ciudad.id_ciudad = persona.id_ciudad');
		$this->db->join('departamento', 'departamento.id_departamento = ciudad.id_departamento');
		
		$this->db->order_by ( $order_by, $order );
		if ($limit) {
			$this->db->limit ( $limit, $offset );
		}
		$this->db->group_start();
		$this->db->or_like($array_termino);
		$this->db->group_end();
		$this->db->where('tipo_persona', 'ODO');
		$query = $this->db->get ();
		if ($query->num_rows())
			return $query->result();
		return false;
	}	
    
    
    public function get_empleados($order_by = 'id_persona', $order = 'asc', $limit = 0, $offset = 0, $word_like = '') {
		$array_termino = array('nombre_persona' => $word_like, 'documento_persona' => $word_like);
	
		$this->db->select('id_persona, documento_persona as documento, tipo_documento as t_documento, nombre_persona as nombre, ciudad.nombre_ciudad as ciudad, departamento.nombre_dept as depto, direccion_persona as direccion, telefono_persona as telefono, correo_persona as email, estado_persona as estado');
		$this->db->from('persona');
		$this->db->join('ciudad', 'ciudad.id_ciudad = persona.id_ciudad');
		$this->db->join('departamento', 'departamento.id_departamento = ciudad.id_departamento');
		
		$this->db->order_by ( $order_by, $order );
		if ($limit) {
			$this->db->limit ( $limit, $offset );
		}
		$this->db->group_start();
		$this->db->or_like($array_termino);
		$this->db->group_end();
		$this->db->where('tipo_persona', 'EMP');
		$query = $this->db->get ();
		if ($query->num_rows())
			return $query->result();
		return false;
	}
    
    public function get_administradores($order_by = 'id_persona', $order = 'asc', $limit = 0, $offset = 0, $word_like = '') {
		$array_termino = array('nombre_persona' => $word_like, 'documento_persona' => $word_like);
	
		$this->db->select('id_persona, documento_persona as documento, tipo_documento as t_documento, nombre_persona as nombre, ciudad.nombre_ciudad as ciudad, departamento.nombre_dept as depto, direccion_persona as direccion, telefono_persona as telefono, correo_persona as email, estado_persona as estado');
		$this->db->from('persona');
		$this->db->join('ciudad', 'ciudad.id_ciudad = persona.id_ciudad');
		$this->db->join('departamento', 'departamento.id_departamento = ciudad.id_departamento');
		
		$this->db->order_by ( $order_by, $order );
		if ($limit) {
			$this->db->limit ( $limit, $offset );
		}
		$this->db->group_start();
		$this->db->or_like($array_termino);
		$this->db->group_end();
		$this->db->where('tipo_persona', 'ADM');
		$query = $this->db->get ();
		if ($query->num_rows())
			return $query->result();
		return false;
	}
    
    public function delete_persona($documento){
        $array = array('documento_persona' => $documento);
        return $this->eliminar_datos('persona', $array);
    }
    
    public function new_persona($data) {
		return $this->insertar_nuevo('persona', $data);
	}
	
	public function update_persona($id_persona, $data = ''){
		return $this->actualizar_datos('persona', $data, array('id_persona' => $id_persona));
	}
}