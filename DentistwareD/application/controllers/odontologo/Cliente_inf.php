<?php

class Cliente_inf extends Odon_Controller {
	
	function __construct(){
		parent::__construct();	
		if(!$this->is_logged_in()){
			redirect('Login');
		}
		$this->load->model ( 'persona_model' );
		$id_cliente = '56129365';
		$this->data['cliente_info'] = $this->persona_model->get_persona($id_cliente);
	}
	
	public function index(){
		$this->get_user_menu('Informacion_Cliente');
		$this->render ( 'odontologo/cliente_info_view' );				
	}	
}