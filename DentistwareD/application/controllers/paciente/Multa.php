<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Multa extends Cliente_Controller{
    
    public function __construct(){
        parent::__construct();
		$this->data ['page_title_end'] = '| Multas';   
        
        $this->load->model('multa_model');
    }
    
    public function index(){
        $this->get_user_menu('main-multas');
        $this->data['multas'] = $this->multa_model->get_multas_cliente($this->session->userdata('doc_persona'));
		$this->render ( 'cliente/multa_view' );		
    }
    
    
}