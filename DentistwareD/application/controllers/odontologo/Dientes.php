<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Dientes extends Odon_Controller {
	
	function __construct(){
		parent::__construct();	
		$this->data ['page_title_end'] = '| Dientes';
		$this->load->model ( 'persona_model' );
		$id_cliente = '1008648639';
		$this->data['cliente_info'] = $this->persona_model->get_persona($id_cliente);
	}
	
	public function index(){        
		$this->load->view('odontologo/dientes_view', $this->data);
	}
}