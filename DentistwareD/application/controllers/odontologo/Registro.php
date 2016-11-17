<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
class Registro extends Odon_Controller {
        
	function __construct() {
		parent::__construct();
        if(!$_POST){
            redirect('Odontologo/Historia_Clinica');
        }
        $this->load->model('registro_model');
	}
    
    public function index() {
        $id_registro = $_POST['reg'];
        $this->data['registro'] = $this->registro_model->get_registro($id_registro);
        $this->load->view('odontologo/registro_view', $this->data);
	}
    
    public function nuevo_registro() {
        $input = array(
            'id_historia' => $this->input->post('inputHistoria'),
            'fecha_reg' => date('Y-m-d H:i:s'),
            'id_odon' => $this->session->userdata('id_persona'),
            'motivo_consulta' => $this->input->post('inputMotivo'),
            'desc_procedimiento' => $this->input->post('inputDescripcion'),
            'enfermedad_actual' => $this->input->post('inputEnfermedad')
        );
        $result = $this->registro_model->nuevo_registro($input);
        if($result){
            echo $this->registro_model->get_registro('',$input['id_historia'])->id_registro;
        } else {
            echo $result;
        }
	}
}