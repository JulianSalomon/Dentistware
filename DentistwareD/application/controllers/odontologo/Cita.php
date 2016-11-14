<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
class Cita extends Odon_Controller {
	
	function __construct() {
		parent::__construct();
		$this->data['page_title_end'] = '| Citas';
		$this->load->model('persona_model');
        $this->load->model('cita_model');
        $this->data['before_closing_body'] = plugin_js('assets/js/dentistware/odontologo.js', true);
		//$id_cliente = '1008648639';
		//$this->data['cliente_info'] = $this->persona_model->get_persona($id_cliente);
	}
	
	public function index() {
        $_SESSION['fecha'] = date("Y-m-d");
		$_SESSION['hora'] = '';
		$_SESSION['odontologo'] = $this->session->userdata['id_persona'];
		$this->data['citas'] = $this->cita_model->get_citas_para_odontologo('', $this->session->userdata['id_persona']);
		$this->get_user_menu('Citas');
		$this->render('odontologo/odonto_cita_view');
	}
    
    	public function marcar_no_asistir($cita) {				
		$data = array(
			"estado_cita" => 0
		);
		echo $this->cita_model->marcar_cita($cita, $data);
	}
    
    	public function filtrar() {
		//$fecha = $this->input->post('inputFecha');
		$hora = $this->input->post('inputHora');
		//$odontologo = $this->input->post('inputOdontologo');		
		
		//$_SESSION['fecha'] = $fecha;
		$_SESSION['hora'] = $hora;
		//$_SESSION['odontologo'] = $odontologo;		
		$fecha = date("Y-m-d");
		//$fecha = str_replace("/", "-", $fecha);
		
		if($hora != ''){
			$hora = strtotime($hora);
			$hora = date("H:i:s", $hora);
		}
		
		/*$odontos_array = array();
		$odontos_array['-1'] = '- Seleccione un Odontólogo -';
		$query = $this->persona_model->get_list_odontologos();
		foreach ($query as $arreglo) {
			$odontos_array[$arreglo->id_persona] = ucwords($arreglo->nombre);
		}
		
		$this->data['odontologos'] = $odontos_array;*/
		
		//if($fecha == date("Y-m-d")){
			$_SESSION['fecha'] = date("Y-m-d");
			$this->data['citas'] = $this->cita_model->get_citas_para_odontologo($hora, $this->session->userdata['id_persona']);
		/*} else {
			//$this->data['citas'] = $this->cita_model->get_citas_odontologo($fecha, $hora, $this->session->userdata['id_persona']);
		}*/
            $this->get_user_menu('Citas');	
		$this->render('odontologo/odonto_cita_view');		
	}
}