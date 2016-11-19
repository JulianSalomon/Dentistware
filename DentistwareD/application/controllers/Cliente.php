<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
class Cliente extends Cliente_Controller {
	
	function __construct() {
		parent::__construct();
		if (!$this->is_logged_in()) {
			redirect('Login', 'refresh');
		}
        
        $this->load->model ( 'multa_model' );
        $multasTotal = 0;
        $multasPagadas = 0;
        $multasSinPagar= 0;
        $multasPagadas = $this->multa_model->count_multas($this->session->userdata('id_persona'),1);
        $multasSinPagar= $this->multa_model->count_multas($this->session->userdata('id_persona'),0);
        $multasTotal = $multasPagadas + $multasSinPagar;
        if($multasTotal == 0){
            $multasTotal = 1;
        }
        $porcentajeMultasPagadas = ($multasPagadas * 100)/$multasTotal;
        $porcentajeMultasSinPagar= ($multasSinPagar * 100)/$multasTotal;        
        $this->data['multasPagadas'] = $multasPagadas;
        $this->data['multasSinPagar'] = $multasSinPagar;
        $this->data['porcentajeMultasPagadas'] = $porcentajeMultasPagadas;
        $this->data['porcentajeMultasSinPagar'] = $porcentajeMultasSinPagar;
        
        $this->load->model ( 'cita_model' );
        $citasTotal = $this->cita_model->get_and_count_citas_by_assistance($this->session->userdata('id_persona'),'');
        $citasAsistidas = $this->cita_model->get_and_count_citas_by_assistance($this->session->userdata('id_persona'),1);
        
        $days = array("Monday" , "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
        $DateDay = array(0,0,0,0,0,0);
        $percentDays = array("percentMonday" , "percentTuesday", "percentWednesday", "percentThursday", "percentFriday", "percentSaturday");
        
        $i = 0;
        $percent = 0;
        while($i < $citasTotal){            
            $diaSemana = date('l', strtotime($citasAsistidas[$i]->fecha_cita));            
            switch ($diaSemana) {
                case "Monday":
                    $DateDay[0] = $DateDay[0] + 1;
                    break;
                case "Tuesday":
                    $DateDay[1] = $DateDay[1] + 1;
                    break;
                case "Wednesday":
                    $DateDay[2] = $DateDay[2] + 1;
                    break;
                case "Thursday":
                    $DateDay[3] = $DateDay[3] + 1;
                    break;
                case "Friday":
                    $DateDay[4] = $DateDay[4] + 1;
                    break;
                case "Saturday":
                    $DateDay[5] = $DateDay[5] + 1;
                    break;
            }
            $i++;
        }
        
        $this->data['citasTotal'] = $citasTotal;
        $i = 0;
        while($i < 6){
            $percent = ($DateDay[$i] * 100)/$citasTotal;
            $this->data[$days[$i]] = $DateDay[$i];
            $this->data[$percentDays[$i]] = $percent;
            $i++;
        }
        
	}
	
	public function index() {
		$this->get_user_menu('main-home');
		$this->render('cliente/inicio_cliente_view');
	}
}