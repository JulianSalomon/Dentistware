<?php

class Cliente extends Admin_Controller {
	
	function __construct(){
		parent::__construct();	
		if(!$this->is_logged_in()){
			redirect('Login');
		}
		$this->load->model ( 'persona_model' );
		
		$this->data['clientes'] = $this->persona_model->get_clientes();

	}
	
	public function index(){
		$this->get_user_menu('main-cliente');
		$this->render ( 'admin/admin_cliente_view' );				
	}	
}