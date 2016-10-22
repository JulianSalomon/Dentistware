<?php

class AdministradorController extends Admin_Controller {
	
	function __construct(){
		parent::__construct();	
		if(!$this->is_logged_in()){
			redirect('Login');
		}
		$this->load->model ( 'persona_model' );
	
	}
    
     public function index(){
        $this->get_user_menu('main-administrador');
         	$this->data['clientes'] = $this->persona_model->get_administradores();
		$this->render ( 'admin/admin_admin_view' );	 
    }
}