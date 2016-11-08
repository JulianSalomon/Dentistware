<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class VerCita extends Cliente_Controller{
    
    public function __construct(){
        parent::__construct();

        $this->data ['page_title_end'] = '| Ver Citas';
        $this->load->library("pagination"); 
        $this->load->model ( 'cita_model' );  
        $this->load->model ( 'persona_model' ); 
        $this->get_user_menu('main-citas','citas-agendadas');
        $this->data['citas'] = $this->cita_model->get_citas_cliente('hora_cita', 'asc', 0, 0, $this->session->userdata['id_persona']);
        $this->data['before_closing_body'] =  plugin_js('assets/js/dentistware/cliente_cita.js', true);
    }
    
    public function index(){
    $datetime1 = date_create('2009-10-11 08:00:00');
    $datetime2 = date_create('2009-10-13 08:00:00');
    $interval = date_diff($datetime1, $datetime2);
    echo $interval->format('%R%a días');
    $this->render('cliente/ver_cita_view');

    }

    public function cancelar_cita($cita){
        $data = array("id_cliente" => null);
        echo $this->cita_model->cancelar_cita($cita, $data); 
        
    }
    
    public function calcular_horas($cita){
        $query = $this->cita_model->get_cita($cita);
        echo $query->fecha_cita;
        echo $query->hora_cita;
        $datetime1 = date_create($query->fecha_cita . " " . $query->hora_cita);
        $datetime2 = date_create(date('Y-m-d H:i:s'));
        $interval = date_diff($datetime1, $datetime2);
        //echo $interval->format('%a Day and %h hours');
        return $interval->format('%h');
        
    }
      
    
    
    
   
}