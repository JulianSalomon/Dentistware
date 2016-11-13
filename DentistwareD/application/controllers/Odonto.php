<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
class Odonto extends Odon_Controller {
	
	function __construct() {
		parent::__construct();
		if (!$this->is_logged_in()) {
			redirect('Login', 'refresh');
		}
        $this->load->model ( 'cita_model' );
        $this->data['totalCitas'] = $this->cita_model->count_citas($this->session->userdata('id_persona'), '1');
	}
	
	public function index() {
        
		$this->get_user_menu('main-home');
		$this->render('odontologo/inicio_odonto_view');
	}
}