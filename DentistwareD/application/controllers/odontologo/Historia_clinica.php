<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
class Historia_clinica extends Odon_Controller {
    
	function __construct() {
		parent::__construct();
        $this->load->model('historia_model');
	}
	

	public function index($id = '', $id_cita = '') {
    
        $this->session->set_userdata(array('id_cliente_cita' => $id));
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
       //     $dientes = $this->diente_model->get_dientes($registros[0]->id_registro);
        }
        $data = array('historia_clinica' => $historia_clinica,
                     'registros' => $registros,
                     'persona' => $persona,
                     'dientes' => $dientes,
                     'id_cita' => $id_cita);
		$this->get_user_menu('Historia_Cliente');
		$this->load->view('odontologo/historia_clinica_view', $data);
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
        $data = array('historia_clinica' => $historia_clinica,
                     'registros' => $registros,
                     'cliente_info' => $cliente_info,
                     'preguntas' => $preguntas);
        $this->load->view('odontologo/crear_historia_clinica_view', $data);
    }
    
    
        public function editar_historia_clinica(){
        $this->load->model('persona_model');
		$this->load->model('historia_model');
        $this->load->model('pregunta_model');
        $this->load->model('registro_model');
        $cliente_info = $this->persona_model->get_persona('', $this->session->userdata['id_cliente_cita']);
        $historia_clinica = $this->historia_model->get_historia_clinica($this->session->userdata['id_cliente_cita']);
        $registros = $this->registro_model->get_registros($historia_clinica->id_historia);
        $preguntas = $this->historia_model->obtener_preguntas_por_historia($historia_clinica->id_historia);
        $data = array('historia_clinica' => $historia_clinica,
                     'registros' => $registros,
                     'cliente_info' => $cliente_info,
                     'preguntas' => $preguntas);
        $this->load->view('odontologo/editar_historia_clinica_view', $data);
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
          $num_preguntas = $this->pregunta_model->contar_preguntas();
          $preguntas_ingresadas = 1;
          for($i =1; $i <= $num_preguntas ; $i++){
              $entrada = 'p' . $i;
             if( $this->input->post ( $entrada ) == null){
                $input = array (
                'id_pregunta' => $i,
                'id_historia' => $historia_clinica,
                    'estado_pregunta' => 0
    				
			);
             }else {
                   $input = array (
                'id_pregunta' => $i,
                'id_historia' => $historia_clinica,
                    'estado_pregunta' => $this->input->post ( $entrada ) 
    				
			);
                 
             }
           $result = $this->pregunta_model->insertar_preguntas($input);
              
              if ($result == false) {$preguntas_ingresadas = 0; break;}
          }
          echo $preguntas_ingresadas;
          //redirect('/account/login', 'refresh');
           // header ( 'Content-Type: application/json' );
			
      
    }
    
    
    
        
      public function historia_clinica_editada(){
          $this->load->model('historia_model'); 
          $this->load->model('pregunta_model');
          $input = array (
                'antecedentes_fam' => $this->input->post ( 'input_antecedentes' ),
                'enfermedad_actual' => $this->input->post ( 'input_enfermedad' ),
                'observaciones' => $this->input->post ( 'input_observaciones' )

			); 
          
          $this->historia_model->actualizar_historia($this->session->userdata['id_cliente_cita'], $input);
          $historia_clinica = $this->historia_model->get_historia_por_cliente($this->session->userdata['id_cliente_cita'])->id_historia;
          $num_preguntas = $this->pregunta_model->contar_preguntas();
          $preguntas_ingresadas = 1;
          for($i =1; $i <= $num_preguntas ; $i++){
              $entrada = 'p' . $i;
                   $input = array (
                    'estado_pregunta' => $this->input->post ( $entrada ) 
			);
                 
           $result = $this->pregunta_model->actualizar_preguntas($historia_clinica, $i, $input);
              
             // if ($result == false) {$preguntas_ingresadas = 0; break;}
          }
          echo $preguntas_ingresadas;
          //redirect('/account/login', 'refresh');
           // header ( 'Content-Type: application/json' );
			
      
    }
    
    
    
    
}