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
        $totalCitas = 0;
        $citasNull = 0;
        $citasAtendidas = 0;
        $citasCanceladas = 0;
        $citasNull = $this->cita_model->count_citas($this->session->userdata('id_persona'), NULL);
        $citasAtendidas = $this->cita_model->count_citas($this->session->userdata('id_persona'), 1);
        $citasCanceladas = $this->cita_model->count_citas($this->session->userdata('id_persona'), 0);
        $totalCitas = $citasNull + $citasAtendidas + $citasCanceladas;
        $this->data['totalCitas'] = $totalCitas;
        $porcentajeCitasNull = 0;
        $porcentajeCitasAtendidas = 0;
        $porcentajeCitasCanceladas = 0;
	}
	
	public function index() {
        
		$this->get_user_menu('main-home');
		$this->render('odontologo/inicio_odonto_view');
		//$this->render('inicio_view');
        
	}
}