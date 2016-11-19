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
		
		$odontos_array = array();
		$odontos_array['-1'] = '- Seleccione un Odontólogo -';
		$query = $this->persona_model->get_list_odontologos();
		foreach ($query as $arreglo) {
			$odontos_array[$arreglo->id_persona] = ucwords($arreglo->nombre);
		}
		
		$this->data['odontologos'] = $odontos_array;
	}
	
	public function index(){
        $fecha = date("Y-m-d");
        $hora = '';
        $odontologo = -1;
        $_SESSION['fecha'] = $fecha;
        $_SESSION['hora'] = $hora;
        $_SESSION['odontologo'] = $odontologo;
        if($this->input->post()){
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
		}        
        $this->data['citas'] = $this->cita_model->get_all_citas($fecha, $hora, $odontologo);
		$this->render('empleado/empl_administrar_cita_view');
	}
	
	public function borrar_cita($id_cita) {
		echo $this->cita_model->delete_cita($id_cita);
	}
	
	public function editar_cita(){
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('inputEditFecha', 'fecha', 'required');
		$this->form_validation->set_rules('inputEditHora', 'hora', 'required|callback_check_hour');
		$this->form_validation->set_rules('selectEditOdontologo', 'odontólogo', 'required');
		
		if ($this->form_validation->run()) {
		
			$id_cita = $this->input->post('idCita');
			$fecha = $this->input->post('inputEditFecha');			
			$fecha = str_replace("/", "-", $fecha);
			
			$fecha_inicial = $this->input->post('inputHideFecha');
			$fecha_inicial = str_replace("/", "-", $fecha_inicial);
			
			$hora = $this->input->post('inputEditHora');
			$hora = strtotime($hora);
			$hora = date("H:i:s", $hora);
			
			$hora_inicial = $this->input->post('inputHideHora');
			$hora_inicial = strtotime($hora_inicial);
			$hora_inicial = date("H:i:s", $hora_inicial);				
			
			$id_odonto = $this->input->post('selectEditOdontologo');
			$value = 0;
			if(strtotime($hora) != strtotime($hora_inicial) || $fecha != $fecha_inicial){
				$value = $this->cita_model->same_cita('', $id_odonto, $fecha, $hora);
			}
			if($value >= 1){
				echo 2;
			} else {				
				$input = array(
						'id_odonto' => $id_odonto,
						'fecha_cita' => $fecha,
						'hora_cita' => $hora,
						'consultorio' => $this->input->post('inputConsultorio'),
				);				
				$result = $this->cita_model->update_cita($id_cita, $input);
				header('Content-Type: application/json');
				echo $result;
			}
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