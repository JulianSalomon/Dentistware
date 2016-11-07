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
        $this->data['citas'] = $this->cita_model->get_citas_cliente('id_cita', 'asc', 0, 0, $this->session->userdata['id_persona']);
        $this->data['before_closing_body'] =  plugin_js('assets/js/dentistware/cliente_cita.js', true);
    }
    
    public function index(){

       /* $adontos_array = array();
        $adontos_array['-1'] = '- Seleccione un Odontólogo -';
        $query = $this->persona_model->get_odontologos();
          foreach ($query as $arreglo) {
                $adontos_array[$arreglo->id_persona] = ucwords($arreglo->nombre);
            };
        $this->data['odontologos'] = $adontos_array;*/
        $this->render('cliente/ver_cita_view');

    }

    public function cancelar_cita($cita){
        $data = array("id_cliente" => null);
        echo $this->cita_model->cancelar_cita($cita, $data);        
    }
    
      
    
    
    
   
}