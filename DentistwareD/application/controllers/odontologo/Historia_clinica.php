<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
class Historia_clinica extends Odon_Controller {
    
	function __construct() {
		parent::__construct();
        $this->load->model('historia_model');
		$this->data['page_title_end'] = '| Historia Cliente';
		$this->data['before_closing_body'] =  plugin_js('p5')
                                          . plugin_js('teeth-drawer')
                                          . plugin_js('assets/js/dentistware/odontologo.js', true)
                                          . plugin_js('assets/js/dentistware/dientes.js', true);
	}
	
	public function index() {
        $this->data['cliente'] = array(
            'id' => '2',
            'nombre' => $this->getNombreCliente('2')
        );
        $this->data['historia_clinica'] = $this->getHistoriaClinica($this->data['cliente']['id']);
		$this->data['registros'] = $this->getRegistros($this->data['historia_clinica']->id_historia);
        $this->data['dientes'] = $this->getDientes();
		$this->get_user_menu('Historia_Cliente');
		$this->render('odontologo/historia_clinica_view');
	}
    
    public function getHistoriaClinica($id){
        return $this->historia_model->get_historia_clinica($id);
    }
    
    public function getRegistros($id){
        $this->load->model('registro_model');
        return $this->registro_model->get_registros($id);
    }
    
    public function getDientes(){
        $this->load->model('diente_model');
        return $this->diente_model->get_dientes($this->data['registros'][0]->id_registro);
    }
    
    public function getNombreCliente($id){
        $this->load->model('persona_model');
        return $this->persona_model->get_persona('', $id)->nombre_persona;
    }
}