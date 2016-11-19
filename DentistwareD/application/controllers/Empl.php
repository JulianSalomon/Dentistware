<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
class Empl extends Empl_Controller {
	
	function __construct() {
		parent::__construct();
		if (!$this->is_logged_in()) {
			redirect('Login', 'refresh');
		}
        $this->load->model ( 'multa_model' );
        
        $multasTotal = 0;
        $multasPagadas = 0;
        $multasSinPagar= 0;
        $multasPagadas = $this->multa_model->count_multas('',1);
        $multasSinPagar= $this->multa_model->count_multas('',0);
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
        
        $days = array("Monday" , "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
        $percentDays = array("percentMonday" , "percentTuesday", "percentWednesday", "percentThursday", "percentFriday", "percentSaturday");
        $i = 0;
        $citasDia = 0;
        $percent = 0;
        while($i < 6){
            $citasDia = $this->cita_model->count_allCitas_byWeek($days[$i]);
            $percent = ($citasDia * 100)/20;
            $this->data[$days[$i]] = $citasDia;
            $this->data[$percentDays[$i]] = $percent;
            $i++;
        }
        
	}
	
	public function index() {
		$this->get_user_menu('main-home');
		$this->render('empleado/inicio_empl_view');
	}	
}