<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class AgendarCita extends Cliente_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->data['page_title_end'] = '| Agendar Cita';
		$this->load->model('cita_model');
		$this->load->model('persona_model');
        $this->load->model('multa_model');
		$this->get_user_menu('main-citas', 'citas-agendar');		
		$this->data['before_closing_body'] = plugin_js('assets/js/dentistware/cliente_cita.js', true);
        $multas = $this->multa_model->get_multas_no_pagadas_cliente($this->session->userdata['id_persona']);
        $cantidadDeMultas= 0; $cantidadDeCitas = 0;
        if($multas){
            foreach($multas as $multa){
                $cantidadDeMultas++;
            }}
        $citasActuales = $this->cita_model->get_citas_by_cliente($this->session->userdata['id_persona']);
        if($citasActuales){
            foreach($citasActuales as $citaActual){
                $cantidadDeCitas++;
            }}
        $this->data['cantidadDeMultas'] = $cantidadDeMultas;
        $this->data['cantidadDeCitas'] = $cantidadDeCitas;
    }
	
	public function index() {
		/* Hacer esto en agendarCitas, aqui esta para probarlo
        // Se necesitan los headers
        $msg = "First line of text\nSecond line of text";
        $headers =  'MIME-Version: 1.0' . "\r\n"; 
        $headers .= 'From: Your name <info@address.com>' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
        // send email
        mail("nrestrepot@unal.edu.co","My subject",$msg, $headers);*/
        
		$_SESSION['fecha'] = date("Y-m-d");
		$_SESSION['hora'] = '';
		$_SESSION['odontologo'] = -1;
		
		$this->data['citas'] = $this->cita_model->get_citas_today();
		
		$adontos_array = array();
		$adontos_array['-1'] = '- Seleccione un Odontólogo -';
		$query = $this->persona_model->get_list_odontologos();
		foreach ($query as $arreglo) {
			$adontos_array[$arreglo->id_persona] = ucwords($arreglo->nombre);
		}
		
		$this->data['odontologos'] = $adontos_array;
		
		$this->render('cliente/agendar_cita_view');
	}
	public function agendar_cita($cita) {				
		$doc = $this->session->userdata['id_persona'];
		$data = array(
			"id_cliente" => $doc
		);
		echo $this->cita_model->agendar_cita($cita, $data);
	}
	
	public function filtrar() {
		$fecha = $this->input->post('inputFecha');
		$hora = $this->input->post('inputHora');
		$odontologo = $this->input->post('inputOdontologo');		
		
		$_SESSION['fecha'] = $fecha;
		$_SESSION['hora'] = $hora;
		$_SESSION['odontologo'] = $odontologo;		
		
		$fecha = str_replace("/", "-", $fecha);
		
		if($hora != ''){
			$hora = strtotime($hora);
			$hora = date("H:i:s", $hora);
		}
		
		$odontos_array = array();
		$odontos_array['-1'] = '- Seleccione un Odontólogo -';
		$query = $this->persona_model->get_list_odontologos();
		foreach ($query as $arreglo) {
			$odontos_array[$arreglo->id_persona] = ucwords($arreglo->nombre);
		}
		
		$this->data['odontologos'] = $odontos_array;
		
		if($fecha == date("Y-m-d")){
			$_SESSION['fecha'] = date("Y-m-d");
			$this->data['citas'] = $this->cita_model->get_citas_today($hora, $odontologo);
		} else {
			$this->data['citas'] = $this->cita_model->get_citas($fecha, $hora, $odontologo);
		}
						
		$this->render('cliente/agendar_cita_view');		
	}
        public function mostrar_informacion($id = '')
            {
            $id = strtolower(str_replace("%20", " ", $id));
            $this->load->model('persona_model');
            $this->load->model('lugar_model');
            $this->data['persona'] = $this->persona_model->get_odontologo( $id);
            $this->load->view('cliente/informacion_odontologo', $this->data); 
            }
    
}