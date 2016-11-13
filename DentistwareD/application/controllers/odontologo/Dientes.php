<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
class Dientes extends Odon_Controller {
        
	function __construct() {
		parent::__construct();
		$this->data['id_registro'] = '';
	}
    
    public function index() {
        $this->data['id_registro'] = $_POST['reg'];
		$this->load->model('diente_model');
		$this->data['dientes'] = $this->diente_model->get_dientes($this->data['id_registro']);        
		$this->load->view('odontologo/dientes_view', $this->data);
	}
    
    public function nuevoDiente(){
		$this->load->model('diente_model');
        $input = array(
            'id_registro'=> $_POST['reg'],
            'num_diente' => $_POST['num'],
            'ausente'    => $_POST['aus'],
			'extraer'    => $_POST['ext'],
			'carie'      => $_POST['car'],
			'obturacion' => $_POST['obt'],
			'corona'     => $_POST['cor'],
            'tramo'      => $_POST['tra']
        );
        $result = $this->diente_model->nuevo_diente($input);
    }
}