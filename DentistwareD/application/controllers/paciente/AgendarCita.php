<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class AgendarCita extends Cliente_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->data['page_title_end'] = '| Agendar Cita';
		$this->load->library("pagination");
		$this->load->model('cita_model');
		$this->load->model('persona_model');
		$this->get_user_menu('main-citas', 'citas-agendar');
		$this->data['citas'] = $this->cita_model->get_citas();
		$this->data['before_closing_body'] = plugin_js('assets/js/dentistware/cliente_cita.js', true);
    }
	
	public function index() {
		$adontos_array = array();
		$adontos_array['-1'] = '- Seleccione un Odontólogo -';
		$query = $this->persona_model->get_odontologos();
		foreach ($query as $arreglo) {
			$adontos_array[$arreglo->id_persona] = ucwords($arreglo->nombre);
		}
		$this->data['odontologos'] = $adontos_array;
		
		$this->render('cliente/agendar_cita_view');
	}
	public function agendar_cita($cita) {
		
		/* Intentando enviar un email
		/*  $this->load->library('email');
		
		$this->email->from('your@example.com', 'Your Name');
		$this->email->to('nrestrepot@unal.edu.co');
		//$this->email->cc('another@another-example.com');
		//$this->email->bcc('them@their-example.com');
		
		$this->email->subject('Email Test');
		$this->email->message('Testing the email class.');
		
		$this->email->send();*/
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
		echo $fecha = str_replace("/", "-", $fecha);
		$hora = str_replace(" AM", "", $hora);
		$hora = str_replace(" PM", "", $hora);
		$adontos_array = array();
		$adontos_array['-1'] = '- Seleccione un Odontólogo -';
		$query = $this->persona_model->get_odontologos();
		foreach ($query as $arreglo) {
			$adontos_array[$arreglo->id_persona] = ucwords($arreglo->nombre);
		}
		$this->data['odontologos'] = $adontos_array;
		$this->data['citas'] = $this->cita_model->get_citas('hora_cita', 'asc', 0, 0, $fecha, $hora, $odontologo);
		$this->render('cliente/agendar_cita_view');		
	}
}