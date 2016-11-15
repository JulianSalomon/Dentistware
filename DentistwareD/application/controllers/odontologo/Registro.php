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
        $this->data['id_registro'] = $_POST['reg'];
        $this->data['registro'] = $this->registro_model->get_registro($this->data['id_registro']);
        $this->load->view('odontologo/verRegistro', $this->data);
	}
    
    public function nuevoRegistro() {
        
	}
}