<?php

class Admin extends Admin_Controller {
	
	function __construct(){
		parent::__construct();	
		if(!$this->is_logged_in()){
			redirect('Login');
		}

		$this->load->model ( 'persona_model' );
		
		

	}
	
    public function index(){
		$this->get_user_menu('main-perfil');
		$this->render ( 'admin/admin_index' );				
	}
    
}