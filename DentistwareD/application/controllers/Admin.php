<?php

class Admin extends Admin_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model ( 'persona_model' );
    }
	
    public function index(){
		$this->get_user_menu('main-cliente');
		$this->render ( 'admin/admin_index' );				
	}
    
}