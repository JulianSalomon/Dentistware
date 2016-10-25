<?php

class Notificacion extends Cliente_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->data ['page_title_end'] = '| Notificaciones';
        $this->load->model('persona_model');
    }
    
    public function index(){
        $this->get_user_menu('main-notificaciones');
        $this->render('cliente/notificaciones_view');
    }
    
}