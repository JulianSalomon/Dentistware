<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
class Registro extends Odon_Controller {
        
	function __construct() {
		parent::__construct();
	}
    
    public function index() {
        $this->data['id_registro'] = $_POST['reg'];
		$this->load->model('registro_model');
        $this->data['registro'] = $this->registro_model->get_registro($this->data['id_registro']);
        $this->load->view('odontologo/registro_view', $this->data);
	}
}