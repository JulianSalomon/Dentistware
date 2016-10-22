<?php

class Odontologo extends Admin_Controller {
	
	function __construct(){
		parent::__construct();	
		$this->data['odontologo'] = $this->persona_model->get_odontologos();
    }
    
    public function index(){
        $this->get_user_menu('main-odontologo ');
		$this->render ( 'admin/admin_odonto_view' );	 
    }
 
}