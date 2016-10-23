<?php

class Cliente extends Admin_Controller {
	
	function __construct(){
		parent::__construct();
        $this->load->library ( 'form_validation' );
        $this->load->model ( 'lugar_model' );
        $this->data['departamentos'] = $this->lugar_model->get_departamentos();
        $this->data['clientes'] = $this->persona_model->get_clientes();
        $this->data['before_closing_body'] = plugin_js('assets/js/dentistware/admin.js', true);
	}
	
	public function index(){
		$this->get_user_menu('main-cliente');
		$this->render ( 'admin/admin_cliente_view' );
    }
    
}
