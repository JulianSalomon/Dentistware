<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
class Historia_clinica extends Odon_Controller {
    
	function __construct() {
		parent::__construct();		
		$this->data['page_title_end'] = '| Historia Cliente';
		$this->load->model('historia_model');
		$id_cliente = '2';
		$this->data['historia_clinica_info'] = $this->historia_model->get_historia_clinica($id_cliente);
		$this->data['registros'] = $this->historia_model->get_registro_historia($this->data['historia_clinica_info']->id_persona);
		$this->data['before_closing_body'] = plugin_js('assets/js/dentistware/odontologo.js', true);
	}
	
	public function index() {
		$this->get_user_menu('Historia_Cliente');
		$this->render('odontologo/historia_clinica_view');
	}
}