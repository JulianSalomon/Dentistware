<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
	
class Administrar_Cita extends Empl_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->data['page_title_end'] = '| Administrar';
		$this->load->model('cita_model');
		$this->load->model('persona_model');
		$this->data['before_closing_body'] .= plugin_js('assets/js/dentistware/empl_administrar_cita.js', true);
		$this->get_user_menu('main-cita', 'citas-administrar');
	}
	
	public function index(){
		$fecha = date("Y-m-d");
		$_SESSION['fecha'] = $fecha;
		$_SESSION['hora'] = '';
		$_SESSION['odontologo'] = -1;
		
		$this->data['citas'] = $this->cita_model->get_all_citas($fecha);
		
		$adontos_array = array();
		$adontos_array['-1'] = '- Seleccione un Odontólogo -';
		$query = $this->persona_model->get_list_odontologos();
		foreach ($query as $arreglo) {
			$adontos_array[$arreglo->id_persona] = ucwords($arreglo->nombre);
		}
		
		$this->data['odontologos'] = $adontos_array;
		
		$this->render('empleado/empl_administrar_cita_view');
	}
	
	public function filtrar() {
		$fecha = $this->input->post('inputFecha');
		$hora = $this->input->post('inputHora');
		$odontologo = $this->input->post('inputOdontologo');		
		
		if($fecha == ''){
			$fecha = date("Y/m/d");
		}
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
		$this->data['citas'] = $this->cita_model->get_all_citas($fecha, $hora, $odontologo);
						
		$this->render('empleado/empl_administrar_cita_view');		
	}
	
	public function borrar_cita($id_cita) {
		echo $this->cita_model->borrar_cita($id_cita);
	}
}