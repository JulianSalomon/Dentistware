<?php

class Cliente extends Cliente_Controller{
    
    function __construct(){
       parent::__construct();       
       if (!$this->is_logged_in()) {
       	redirect ( 'Login', 'refresh' );
       }
        $this->load->model ( 'persona_model' );
		
		$this->data['persona'] = $this->persona_model->get_persona($this->session->userdata('id_persona'));
    }
    
    function index(){
        
    	$this->get_user_menu('main-perfil');
        $this->render('perfil_view');
    }    
}