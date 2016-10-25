<?php

class Admin extends Empl_Controller {
	
	function __construct(){
		parent::__construct();	
		if(!$this->is_logged_in()){
			redirect('Login');
		}        
	}
	
    public function index(){
		$this->get_user_menu('main-home');
		$this->render ( 'inicio_view' );				
	}
    
}