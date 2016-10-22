<?php

class Admin extends Admin_Controller {
	
	function __construct(){
		parent::__construct();	
		if(!$this->is_logged_in()){
			redirect('Login');
		}
		$this->load->model ( 'persona_model' );
	

	}
	
    public function index(){
		$this->get_user_menu('main-cliente');
		$this->render ( 'admin/admin_index' );				
	}
    
	public function cliente(){
		$this->get_user_menu('main-cliente');
        $this->data['clientes'] = $this->persona_model->get_clientes();
		$this->render ( 'admin/admin_cliente_view' );				
	}
    
    public function empleado(){
        $this->get_user_menu('main-cliente');
        	$this->data['clientes'] = $this->persona_model->get_empleados();
		$this->render ( 'admin/admin_empl_view' );	 
    }
    
     public function odontologo(){
        $this->get_user_menu('main-cliente');
         	$this->data['clientes'] = $this->persona_model->get_odontologos();
		$this->render ( 'admin/admin_odonto_view' );	 
    }
    
     public function administrador(){
        $this->get_user_menu('main-cliente');
         	$this->data['clientes'] = $this->persona_model->get_administradores();
		$this->render ( 'admin/admin_odonto_view' );	 
    }
}