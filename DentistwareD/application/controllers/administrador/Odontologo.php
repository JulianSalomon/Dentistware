<?php

class Odontologo extends Admin_Controller {
	
	function __construct(){
		parent::__construct();	
		if(!$this->is_logged_in()){
			redirect('Login');
		}
		$this->load->model ( 'persona_model' );
	

	}   
     public function index(){
        $this->get_user_menu('main-odontologo ');
         	$this->data['clientes'] = $this->persona_model->get_odontologos();
		$this->render ( 'admin/admin_odonto_view' );	 
    }
 
}