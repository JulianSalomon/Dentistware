<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
	
class Crear_Cita extends Empl_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->data['page_title_end'] = '| Crear citas';
		$this->load->model('cita_model');
		$this->load->model('persona_model');
		$this->data['before_closing_body'] .= plugin_js('assets/js/dentistware/empl_crear_cita.js', true);
		$this->get_user_menu('main-cita', 'citas-crear');
		
		$odontos_array = array();
		$odontos_array['-1'] = '- Seleccione un Odontólogo -';
		$query = $this->persona_model->get_list_odontologos();
		foreach ($query as $arreglo) {
			$odontos_array[$arreglo->id_persona] = ucwords($arreglo->nombre);
		}
		
		$this->data['odontologos'] = $odontos_array;
	}
	
	public function index(){		
		$this->render('empleado/empl_crear_cita_view');
	}
	
	public function crear_citas(){
	
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('inputFecha', 'fecha', 'required');
		$this->form_validation->set_rules('inputHora', 'hora', 'required|callback_check_hour');
		$this->form_validation->set_rules('inputOdontologo', 'odontólogo', 'required');
		$this->form_validation->set_rules('inputConsultorio', 'consultorio', 'required');
		$this->form_validation->set_rules('inputNumero', 'número de citas', 'required');
		
		if ($this->form_validation->run()) {
			$fecha = $this->input->post('inputFecha');			
			$fecha = str_replace("/", "-", $fecha);
						
			$hora = $this->input->post('inputHora');
			$hora = strtotime($hora);
			$hora = date("H:i:s", $hora);
						
			$id_odonto = $this->input->post('inputOdontologo');
			$consultorio = $this->input->post('inputConsultorio');
			
			$numero = $this->input->post('inputNumero');
			$total = 0;
			
			for($i = 1; $i <= $numero; $i++){	
				
				if (strtotime($hora) <= strtotime("18:00:00")) {
					$value = $this->cita_model->same_cita('', $id_odonto, $fecha, $hora);
					
					if($value < 1){
						$input = array(
								'id_odonto' => $id_odonto,
								'fecha_cita' => $fecha,
								'hora_cita' => $hora,
								'consultorio' => $consultorio,
						);
						$result = $this->cita_model->nueva_cita($input);
						if($result == 1){
							$total++;
						}
					}
				} else {
					break;
				}
				$hora = strtotime($hora.' +30 minutes');
				$hora = date('H:i:s', $hora);
			}
			
			header('Content-Type: application/json');
			echo $total;
		} else {
			header('Content-Type: application/json');
			echo json_encode($this->form_validation->error_array());
		}
	}
	
	public function check_hour($str) {
		$str = strtotime($str);
		if ($str < strtotime("08:00:00") || $str > strtotime("18:00:00")) {
			$this->form_validation->set_message ( 'check_hour', 'La hora seleccionada debe ser mayor a las 8 AM y menor a las 6 PM.' );
			return FALSE;
		} else {
			return TRUE;
		}
	}
}