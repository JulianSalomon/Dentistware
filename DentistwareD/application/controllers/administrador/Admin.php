<?php

class Admin extends Admin_Controller{
	
    function __construct(){
        parent::__construct();
        $this->load->library ( 'form_validation' );
        $this->load->model ( 'lugar_model' );
        $this->data['departamentos'] = $this->lugar_model->get_departamentos();
        $this->data['admins'] = $this->persona_model->get_administradores();
        $this->data['before_closing_body'] = plugin_js('assets/js/dentistware/admin.js', true);
    }
    
    public function index(){
        $this->get_user_menu('main-administrador');
		$this->render ( 'admin/admin_admin_view' );	 
    }
}