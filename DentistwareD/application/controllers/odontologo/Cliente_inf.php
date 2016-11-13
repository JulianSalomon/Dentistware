<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
class Cliente_inf extends Odon_Controller {
	
	function __construct() {
		parent::__construct();
		$this->data['page_title_end'] = '| Información Cliente';
		$this->load->model('persona_model');
		$this->data['id_cliente'] = '1008648639';
		$this->data['cliente_info'] = $this->persona_model->get_persona($this->data['id_cliente']);
	}
	
	public function index() {
		$this->get_user_menu('Informacion_Cliente');
		$this->render('odontologo/cliente_info_view');
	}
}