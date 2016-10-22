<?php

class AdministradorController extends Admin_Controller{
	function __construct(){
        parent::__construct();
        $this->data['admins'] = $this->persona_model->get_administradores();
    }
    
    public function index(){
        $this->get_user_menu('main-administrador');
		$this->render ( 'admin/admin_admin_view' );	 
    }
}