<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
class Admin extends Admin_Controller {
	
	function __construct() {
		parent::__construct();
		if (!$this->is_logged_in()) {
			redirect('Login', 'refresh');
		}
        $this->load->model ( 'persona_model' );
        $i = 0;
        $totalPersonas = 0;
        $porcentajePersonasADM = 0;
        $porcentajePersonasEMP = 0;
        $porcentajePersonasODO = 0;
        $porcentajePersonasCLT = 0;
        $array = array("DST" , "ACT");
        while ($i < 2){
            $personasADM = $this->persona_model->count_personas_byTypeAndState('ADM', $array[$i]);
            $personasEMP = $this->persona_model->count_personas_byTypeAndState('EMP', $array[$i]);
            $personasODO = $this->persona_model->count_personas_byTypeAndState('ODO', $array[$i]);
            $personasCLT = $this->persona_model->count_personas_byTypeAndState('CLT', $array[$i]);
            $totalPersonas = $personasADM + $personasEMP + $personasODO + $personasCLT;
            if ($totalPersonas == 0){
                $totalPersonas = 1;
            }
            $porcentajePersonasADM = ($personasADM * 100)/$totalPersonas;
            $porcentajePersonasEMP = ($personasEMP * 100)/$totalPersonas;
            $porcentajePersonasODO = ($personasODO * 100)/$totalPersonas;
            $porcentajePersonasCLT = ($personasCLT * 100)/$totalPersonas;
            if ($i == 0 ){
                $this->data['totalPersonasDes'] = $totalPersonas;
                $this->data['personasADMDes'] = $personasADM;
                $this->data['personasEMPDes'] = $personasEMP;
                $this->data['personasODODes'] = $personasODO;
                $this->data['personasCLTDes'] = $personasCLT;
                $this->data['porcentajePersonasADMDes'] = $porcentajePersonasADM;
                $this->data['porcentajePersonasEMPDes'] = $porcentajePersonasEMP;
                $this->data['porcentajePersonasODODes'] = $porcentajePersonasODO; 
                $this->data['porcentajePersonasCLTDes'] = $porcentajePersonasCLT; 
            }else{
                $this->data['totalPersonas'] = $totalPersonas;
                $this->data['personasADM'] = $personasADM;
                $this->data['personasEMP'] = $personasEMP;
                $this->data['personasODO'] = $personasODO;
                $this->data['personasCLT'] = $personasCLT;
                $this->data['porcentajePersonasADM'] = $porcentajePersonasADM;
                $this->data['porcentajePersonasEMP'] = $porcentajePersonasEMP;
                $this->data['porcentajePersonasODO'] = $porcentajePersonasODO; 
                $this->data['porcentajePersonasCLT'] = $porcentajePersonasCLT; 
            }
            $i++;
        }
	}
	
	public function index() {
		$this->get_user_menu('main-home');
		$this->render('admin/inicio_admin_view');
	}
}