<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class VerCita extends Cliente_Controller {
	
	public function __construct() {
		parent::__construct();
		
		$this->data['page_title_end'] = '| Ver Citas';
		$this->data['before_closing_body'] = plugin_js('assets/js/dentistware/cliente_cita.js', true);
		
		$this->load->model('cita_model');
		$this->load->model('persona_model');
		$this->get_user_menu('main-citas', 'citas-agendadas');			
	}
	
	public function index() {
		$this->data['citas'] = $this->cita_model->get_citas_by_cliente($this->session->userdata['id_persona']);
		$this->render('cliente/ver_cita_view');
	}
	
	public function cancelar_cita($id_cita) {
		$data = array(
			"id_cliente" => null
		);
		
		echo $this->cita_model->cancelar_cita($id_cita, $data);
				
	}
}