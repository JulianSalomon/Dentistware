<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Cita extends Odon_Controller {
    
	function __construct() {
		parent::__construct();
		$this->data['page_title_end'] = '| Citas';
		$this->load->model('persona_model');
		$this->load->model('cita_model');
		$this->data['before_closing_body'] = plugin_js('assets/js/dentistware/odontologo.js', true) . plugin_js('runner');
		$this->get_user_menu('main-citas');
	}
    
	public function index() {
		$_SESSION['fecha']      = date("Y-m-d");
		$_SESSION['hora']       = '';
		$_SESSION['odontologo'] = $this->session->userdata['id_persona'];
		$this->data['citas']    = $this->cita_model->get_citas_para_odontologo('', $this->session->userdata['id_persona']);
		$this->render('odontologo/odonto_cita_view');
	}
    
	public function marcar_asiste() {
		$data = array(
			"estado_cita" => 1
		);
		echo $this->cita_model->marcar_cita($this->input->post('cita'), $data);
	}
    
	public function marcar_no_asiste() {
		$data = array(
			"estado_cita" => 0
		);
		echo $this->cita_model->marcar_cita($_POST['cita'], $data);
	}
    
	public function filtrar() {
		$hora             = $this->input->post('inputHora');
		$_SESSION['hora'] = $hora;
		$fecha            = date("Y-m-d");
		if ($hora != '') {
			$hora = strtotime($hora);
			$hora = date("H:i:s", $hora);
		}
		$_SESSION['fecha']   = date("Y-m-d");
		$this->data['citas'] = $this->cita_model->get_citas_para_odontologo($hora, $this->session->userdata['id_persona']);
		$this->get_user_menu('Citas');
		$this->render('odontologo/odonto_cita_view');
	}
}