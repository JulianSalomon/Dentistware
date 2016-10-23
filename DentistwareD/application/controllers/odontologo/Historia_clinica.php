<?php

class Historia_clinica extends Odon_Controller {
	
	function __construct(){
		parent::__construct();	
		if(!$this->is_logged_in()){
			redirect('Login');
		}
		$this->load->model ( 'historia_model' );
		$id_cliente = '104621433';
		$this->data['historia_clinica_info'] = $this->historia_model->get_historia_clinica($id_cliente);
	}
	
	public function index(){
		$this->get_user_menu('Historia_Cliente');
		$this->render ( 'odontologo/historia_clinica_view' );				
	}	
    
    //public function listar_registros(){
    //    $ciudades = $this->historia_model->get_registro_historia($idHistoria);			
	//}	
}