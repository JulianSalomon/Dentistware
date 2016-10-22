<?php

class Odonto extends Odon_Controller {
	
	function __construct(){
		parent::__construct();	
		if(!$this->is_logged_in()){
			redirect('Login');
		}
		$this->load->model ( 'persona_model' );
		
		$this->data['odontologo'] = $this->persona_model->get_persona($this->session->userdata('id_persona'));
        
	}
	
	public function index(){
		$this->get_user_menu('main-perfil');
		$this->render ( 'odontologo/odontologo_view' );				
	}	
}