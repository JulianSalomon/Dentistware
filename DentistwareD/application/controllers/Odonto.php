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
        if($totalCitas == 0){
            $totalCitas =1;
        }
        $porcentajeCitasNull = ($citasNull * 100)/$totalCitas;
        $porcentajeCitasAtendidas = ($citasAtendidas * 100)/$totalCitas;
        $porcentajeCitasCanceladas = ($citasCanceladas * 100)/$totalCitas;
        $this->data['totalCitas'] = $totalCitas;
        $this->data['citasNull'] = $citasNull;
        $this->data['citasAtendidas'] = $citasAtendidas;
        $this->data['citasCanceladas'] = $citasCanceladas;
        $this->data['porcentajeCitasNull'] = $porcentajeCitasNull;
        $this->data['porcentajeCitasAtendidas'] = $porcentajeCitasAtendidas;
        $this->data['porcentajeCitasCanceladas'] = $porcentajeCitasCanceladas;
        
        $days = array("Monday" , "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
        $percentDays = array("percentMonday" , "percentTuesday", "percentWednesday", "percentThursday", "percentFriday", "percentSaturday");
        $i = 0;
        $citasDia = 0;
        $percent = 0;
        while($i < 6){
            $citasDia = $this->cita_model->count_citas($this->session->userdata('id_persona'), NULL, $days[$i]);
            $percent = ($citasDia * 100)/20;
            $this->data[$days[$i]] = $citasDia;
            $this->data[$percentDays[$i]] = $percent;
            $i++;
        }

	}
	
	public function index() {
        
		$this->get_user_menu('main-home');
		$this->render('odontologo/inicio_odonto_view');
		//$this->render('inicio_view');
        
	}
}