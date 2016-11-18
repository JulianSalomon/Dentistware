<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
class Diente extends Odon_Controller {
        
	function __construct() {
		parent::__construct();
        if(!$_POST){
            redirect('Odontologo/Historia_Clinica');
        }
        $this->load->model('diente_model');
	}
    
    public function index() {
        $id_registro = $_POST['reg'];
        $this->data['dientes'] = $this->diente_model->get_dientes($id_registro);
        $this->load->view('odontologo/dientes_view', $this->data);
    }
    
    public function nuevoDiente() {
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