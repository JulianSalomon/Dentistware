<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
	
class Agendar_Cita extends Empl_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->data['page_title_end'] = '| Agendar';
		$this->load->model('cita_model');
		$this->load->model('persona_model');
		$this->data['before_closing_body'] .= plugin_js('assets/js/dentistware/empl_agendar_cita.js', true);
		$this->get_user_menu('main-cita', 'citas-agendar');
	}
	
	public function index(){
		$_SESSION['fecha'] = date("Y-m-d");
		$_SESSION['hora'] = '';
		$_SESSION['odontologo'] = -1;
		
		$this->data['citas'] = $this->cita_model->get_citas_today();
		
		$adontos_array = array();
		$adontos_array['-1'] = '- Seleccione un Odontólogo -';
		$query = $this->persona_model->get_list_odontologos();
		foreach ($query as $arreglo) {
			$adontos_array[$arreglo->id_persona] = ucwords($arreglo->nombre);
		}
		
		$this->data['odontologos'] = $adontos_array;
		
		$this->render('empleado/empl_agendar_cita_view');
	}
	
	public function filtrar() {
		$fecha = $this->input->post('inputFecha');
		$hora = $this->input->post('inputHora');
		$odontologo = $this->input->post('inputOdontologo');		
		
		$_SESSION['fecha'] = $fecha;
		$_SESSION['hora'] = $hora;
		$_SESSION['odontologo'] = $odontologo;		
		
		$fecha = str_replace("/", "-", $fecha);
		
		if($hora != ''){
			$hora = strtotime($hora);
			$hora = date("H:i:s", $hora);
		}
		
		$odontos_array = array();
		$odontos_array['-1'] = '- Seleccione un Odontólogo -';
		$query = $this->persona_model->get_list_odontologos();
		foreach ($query as $arreglo) {
			$odontos_array[$arreglo->id_persona] = ucwords($arreglo->nombre);
		}
		
		$this->data['odontologos'] = $odontos_array;
		
		if($fecha == date("Y-m-d")){
			$_SESSION['fecha'] = date("Y-m-d");
			$this->data['citas'] = $this->cita_model->get_citas_today($hora, $odontologo);
		} else {
			$this->data['citas'] = $this->cita_model->get_citas($fecha, $hora, $odontologo);
		}
						
		$this->render('cliente/agendar_cita_view');		
	}
	
	public function agendar_cita($id_cita, $doc_persona) {
		$persona = $this->persona_model->get_persona($doc_persona, '');
		$data = array(
				"id_cliente" => $persona->id_persona,
		);
		echo $this->cita_model->agendar_cita($id_cita, $data);
	}
}