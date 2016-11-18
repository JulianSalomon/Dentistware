<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Multa extends Cliente_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->data['page_title_end'] = '| Multas';
		$this->load->model('multa_model');
		$this->load->library("pagination");
		
		$this->get_user_menu('main-multas');
	}
	
	public function index() {
		
		$id_cliente = $this->session->userdata('id_persona');

		$config = array();
		$config = $this->config->item('config_paginator');
		$config["total_rows"] = $this->multa_model->count_multas_by_cliente($id_cliente);
		$config["base_url"] = base_url() . "paciente/Multa/index/";
		$config["per_page"] = 20;
		$config["uri_segment"] = 4;
		$page = $this->uri->segment(4);
		
		$multas = $this->multa_model->get_multas_cliente($id_cliente, 'estado_multa', 'asc', $config["per_page"], $page);
		$this->data['multas'] = '';
		if ($multas) {
			$this->pagination->initialize($config);
			$this->data['multas'] = $multas;
			$this->data["links"] = $this->pagination->create_links();
		}
		
		$this->render('cliente/multa_view');
	}
}