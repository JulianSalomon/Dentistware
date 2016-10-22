<?php

class Empleado extends Admin_Controller {
	
	function __construct(){
		parent::__construct();
        $this->data['empleados'] = $this->persona_model->get_empleados();
	}
	
    public function index(){
        $this->get_user_menu('main-empleado');
		$this->render ( 'admin/admin_empl_view' );	 
    }

}