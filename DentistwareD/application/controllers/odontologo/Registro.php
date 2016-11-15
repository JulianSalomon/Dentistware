<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
class Registro extends Odon_Controller {
        
	function __construct() {
		parent::__construct();
        if(!$_POST){
            redirect('Odontologo/Historia_Clinica', 'refresh');
        }
        $this->load->model('registro_model');
	}
    
    public function index() {
        $id_registro = $_POST['reg'];
        $this->data['registro'] = $this->registro_model->get_registro($id_registro);
        $this->load->view('odontologo/registro_view', $this->data);
	}
    
    public function agregar_registro() {
        $this->load->view('odontologo/nuevo_registro_view', true);
    }
    
    public function nuevo_registro() {
		$this->load->library('form_validation');
        
		$this->form_validation->set_rules('inputMotivo', 'Motivo', 'required');
		$this->form_validation->set_rules('inputDescripcion', 'Descripcion', 'required');
		$this->form_validation->set_rules('inputEnfermedad', 'Enfermedad', 'required');
		
		if ($this->form_validation->run()) {
			$input = array(
				'id_historia' => $this->input->post('inputHistoria'),
				'fecha_reg' => date('Y-m-d H:i:s'),
				'id_odon' => $this->session->userdata('id_persona'),
				'motivo_consulta' => $this->input->post('inputMotivo'),
				'desc_procedimiento' => $this->input->post('inputDescripcion'),
                'enfermedad_actual' => $this->input->post('inputEnfermedad'),
			);
			$result = $this->registro_model->nuevo_registro($input);
            if($result){
			     echo $this->registro_model->get_registro($this->input->post('inputHistoria'))->id_registro;
            } else {
                 echo $result;
            }
		} else {
			header('Content-Type: application/json');
			echo json_encode($this->form_validation->error_array());
		}
	}
}