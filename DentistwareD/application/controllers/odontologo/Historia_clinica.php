<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
class Historia_clinica extends Odon_Controller {
    
	function __construct() {
		parent::__construct();		
		$this->data['page_title_end'] = '| Historia Cliente';
	}
	
	public function index($id = '', $nombre = '') {
        $nombre = urldecode($nombre);
        $this->load->model('persona_model');
		$this->load->model('historia_model');
        $persona = $this->persona_model->get_persona('', $id);
        $historia_clinica = $this->historia_model->get_historia_clinica($id);
        $registros = null;
        if($historia_clinica != null)
            $registros = $this->historia_model->get_registros($historia_clinica->id_historia);
        $data = array('nombre' => $nombre,
                     'historia_clinica' => $historia_clinica,
                     'registros' => $registros,
                     'persona' => $persona);

        
        /* $this->data['cliente'] = array(
            'id' => $id,
            'nombre' => '',
        );
        $this->data['cliente']['nombre'] = $this->persona_model->get_persona('', $this->data['cliente']['id'])->nombre_persona;
        
        $this->data['historia_clinica'] = $this->historia_model->get_historia_clinica($this->data['cliente']['id']);
		$this->data['registros'] = $this->historia_model->get_registros($this->data['historia_clinica']->id_historia);*/
		$this->get_user_menu('Historia_Cliente');
		$this->load->view('odontologo/historia_clinica_view', $data);
	}
    
}