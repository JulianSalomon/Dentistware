<?php

class Notificacion extends Cliente_Controller {
    
    public function __construct(){
        parent::__construct();
        
        $this->data ['before_closing_head'] = '';
		$this->data ['before_closing_body'] = '';
		$this->data ['page_title_end'] = '| Multas';   
        
        $this->load->model('persona_model');
    }
    
    public function index(){
        $this->get_user_menu('main-notificaciones');
        $this->render ( 'cliente/notificaciones_view' );		
    }
    
    
}