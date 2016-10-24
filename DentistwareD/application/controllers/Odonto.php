<?php

class Odonto extends Odon_Controller {
	
	function __construct(){
		parent::__construct();	
		if(!$this->is_logged_in()){
			redirect('Login');
		}
		$this->load->model ( 'persona_model' );
		
		$this->data['persona'] = $this->persona_model->get_persona($this->session->userdata('doc_persona'));
        
	}
	
	public function index(){
		$this->get_user_menu('main-perfil');
		$this->render ( 'perfil_view' );				
	}	
}