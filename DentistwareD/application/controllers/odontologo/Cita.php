<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Cita extends Odon_Controller {
    
	function __construct() {
		parent::__construct();
		$this->data['page_title_end'] = '| Citas';
		$this->load->model('persona_model');
		$this->load->model('cita_model');
		$this->data['before_closing_body'] = plugin_js('assets/js/dentistware/odontologo.js', true) . plugin_js('runner');
		$this->get_user_menu('main-citas');
        $_SESSION['hora'] = '';
	}
    
	public function index() {
        $hora = '';
        if($_SESSION['hora']){
            $hora = $_SESSION['hora'];
        } 
        if($this->input->post()){
            $hora = $this->input->post('inputHora');            
        }
        $_SESSION['hora'] = $hora;
        if ($hora != '') {
            $hora = strtotime($hora);
            $hora = date("H:i:s", $hora);
        }
        $this->data['citas'] = $this->cita_model->get_citas_para_odontologo($hora, $this->session->userdata['id_persona']);
        $this->get_user_menu('Citas');
        $this->render('odontologo/odonto_cita_view');
        $this->session->userdata['time'] = null;
	}
    
	public function marcar_asiste() {
		$data = array(
			"estado_cita" => 1
		);
		echo $this->cita_model->marcar_cita($this->input->post('cita'), $data);
	}
    
	public function marcar_no_asiste() {
		$data = array(
			"estado_cita" => 0
		);
		echo $this->cita_model->marcar_cita($_POST['cita'], $data);
	}
}