<?php

class Empleado extends Admin_Controller {
	
	function __construct(){
		parent::__construct();	
		if(!$this->is_logged_in()){
			redirect('Login');
		}
		$this->load->model ( 'persona_model' );
	

	}
	
    public function index(){
        $this->get_user_menu('main-empleado');
        	$this->data['clientes'] = $this->persona_model->get_empleados();
		$this->render ( 'admin/admin_empl_view' );	 
    }

}