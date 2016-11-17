<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
class Historia_clinica extends Odon_Controller {
    
	function __construct() {
		parent::__construct();
        $this->load->model('historia_model');
	}
	
	public function index() {
        $id = $this->session->userdata['id_cliente'];
        $this->load->model('persona_model');
		$this->load->model('historia_model');
        $this->load->model('registro_model');
        $persona = $this->persona_model->get_persona('', $id);
        $historia_clinica = $this->historia_model->get_historia_clinica($id);
        $registros = null;
        $dientes= null;
        if($historia_clinica != null){
            $registros = $this->registro_model->get_registros($historia_clinica->id_historia);
            $this->load->model('diente_model');
            $dientes = $this->diente_model->get_dientes($registros[0]->id_registro);
        }
        $data = array('historia_clinica' => $historia_clinica,
                     'registros' => $registros,
                     'persona' => $persona,
                     'dientes' => $dientes);
		$this->get_user_menu('Historia_Cliente');
		$this->load->view('odontologo/historia_clinica_view', $data);
	}
    
    public function atender_cita(){
        $this->session->set_userdata(array('id_cliente' => $_POST('id')));
    }
    
    public function crear_historia_clinica(){
        $this->load->model('persona_model');
		$this->load->model('historia_model');
        $this->load->model('pregunta_model');
        $this->load->model('registro_model');
        $preguntas = $this->pregunta_model->get_preguntas();
        $cliente_info = $this->persona_model->get_persona('', $this->session->userdata['id_cliente_cita']);
        $historia_clinica = $this->historia_model->get_historia_clinica($this->session->userdata['id_cliente_cita']);
        $registros = null;
        if($historia_clinica != null)
            $registros = $this->registro_model->get_registros($historia_clinica->id_historia);
        $data = array('historia_clinica' => $historia_clinica,
                     'registros' => $registros,
                     'cliente_info' => $cliente_info,
                     'preguntas' => $preguntas);
        $this->load->view('odontologo/crear_historia_clinica_view', $data);
    }
    
    
      public function nueva_historia_clinica(){
          $this->load->model('historia_model'); 
          $this->load->model('pregunta_model');
          $input = array (
                'id_cliente' => $this->session->userdata['id_cliente_cita'],
                'fecha_apertura' => date('Y-m-d H:i:s'),
                'antecedentes_fam' => $this->input->post ( 'input_antecedentes' ),
                'enfermedad_actual' => $this->input->post ( 'input_enfermedad' ),
                'observaciones' => $this->input->post ( 'input_observaciones' )

			); 
          
     $this->historia_model->nueva_historia($input);
          $historia_clinica = $this->historia_model->get_historia_por_cliente($this->session->userdata['id_cliente_cita'])->id_historia;
            $input = array (
                'id_pregunta' => 1,
                'id_historia' => $historia_clinica,
                    'estado_pregunta' => $this->input->post ( 'p1' )
    				
			);
           $result = $this->pregunta_model->insertar_preguntas($input); 
           // header ( 'Content-Type: application/json' );
			echo 1;
      
    }
}