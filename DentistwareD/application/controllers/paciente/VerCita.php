<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class VerCita extends Cliente_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->data ['page_title_end'] = '| Multas';
        $this->load->model('cita_model');
        $this->data['citas'] = $this->cita_model->get_citas();
        $this->get_user_menu('main-citas','citas-agendadas');
    }
    
    public function index(){
        $this->render('cliente/ver_cita_view');
    }

}