<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
class Historia_clinica extends Odon_Controller {
    
	function __construct() {
		parent::__construct();		
		$this->data['page_title_end'] = '| Historia Cliente';
        $this->load->model('persona_model');
        $this->data['cliente'] = array(
            'id' => '2',
            'nombre' => '',
        );
        $this->data['cliente']['nombre'] = $this->persona_model->get_persona('', $this->data['cliente']['id'])->nombre_persona;
		$this->load->model('historia_model');
        $this->data['historia_clinica'] = $this->historia_model->get_historia_clinica($this->data['cliente']['id']);
		$this->data['registros'] = $this->historia_model->get_registros($this->data['historia_clinica']->id_historia);
		$this->data['before_closing_body'] = plugin_js('assets/js/dentistware/odontologo.js', true);
	}
	
	public function index() {
		$this->get_user_menu('Historia_Cliente');
		$this->render('odontologo/historia_clinica_view');
	}
    
    public function seleccionarRegistro($id_reg) {
        $reg = get_registros($id_reg);
        return $reg;
    }
}