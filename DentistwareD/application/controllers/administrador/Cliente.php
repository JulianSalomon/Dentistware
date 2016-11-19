<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Cliente extends Admin_Controller {
    
	function __construct() {
		parent::__construct();
		$this->data['page_title_end'] = '| Clientes';
		$this->load->model('lugar_model');
		$this->load->library("pagination");
		$this->data['departamentos'] = $this->lugar_model->get_departamentos();
        $this->data['before_closing_head'] .= plugin_css('icheck');
        $this->data['before_closing_body'] .= plugin_js('icheck');
		$this->data['before_closing_body'] .= plugin_js('assets/js/dentistware/admin_cliente.js', true);
		$this->get_user_menu('main-cliente');
		$this->data['clientes'] = '';
	}
	
	public function index() {
		$_SESSION['word_search'] = '';
		$this->render('admin/admin_cliente_view');
	}
    
	public function search() {
		$post = $this->input->post('input_buscar_cliente');
		$_SESSION['word_search'] = mb_strtolower($post);
		$config = array();
		$config = $this->config->item('config_paginator');
		$config["total_rows"] = $this->persona_model->count_personas($_SESSION['word_search'], 'CLT');
		$config["base_url"] = base_url() . "administrador/Cliente/search/";
		$config["per_page"] = 25;
		$config["uri_segment"] = 4;
		$page = $this->uri->segment(4);
		if ($_SESSION['word_search'] != '') {
			$clientes = $this->persona_model->get_clientes('nombre_persona', 'asc', $config["per_page"], $page, $_SESSION['word_search']);
		} else {
			$clientes = $this->persona_model->get_clientes('nombre_persona', 'asc', $config["per_page"], $page);
		}
		
		if ($clientes) {
			$this->pagination->initialize($config);			
			$this->data['clientes'] = $clientes;
			$this->data["links"] = $this->pagination->create_links();
		}
		$this->render('admin/admin_cliente_view');
	}
	
	public function nuevo_cliente() {
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('selectTipoDoc', 'tipo documento', 'required', array(
			'required' => 'Seleccione un tipo de documento.'
		));
		$this->form_validation->set_rules('inputNombre', 'Nombre', 'required');
		$this->form_validation->set_rules('inputEmail', 'correo', 'required|valid_email');
		$this->form_validation->set_rules('inputPassword', 'contraseña', 'required');
		$this->form_validation->set_rules('inputPasswordConfirm', 'confirmar contraseña', 'required|matches[inputPassword]', array(
			'matches' => 'Las contraseñas no coindicen'
		));
		$this->form_validation->set_rules('inputDocumento', 'documento', 'required|is_unique[persona.documento_persona]', array(
			'is_unique' => 'El documento ya se encuentra registrado'
		));
		$this->form_validation->set_rules('inputNacimiento', 'Fecha de Nacimiento', 'required');
		$this->form_validation->set_rules('inputTelefono', 'Telefono', 'required');
		$this->form_validation->set_rules('inputDireccion', 'Direccion', 'required');
		$this->form_validation->set_rules('inputNombreContacto', 'Nombre del Contacto', 'required');
		$this->form_validation->set_rules('inputTelContacto', 'Telefono del Contacto', 'required');
		$this->form_validation->set_rules('select_ciudades', 'ciudad', 'required', array(
			'required' => 'Seleccione una ubicación.'
		));
		$this->form_validation->set_rules('selectGenero', 'género', 'required', array(
			'required' => 'Seleccione un género.'
		));
		$this->form_validation->set_rules('selectGrupo', 'grupo', 'required', array(
			'required' => 'Seleccione un tipo de sangre.'
		));
		$this->form_validation->set_rules('selectRH', 'RH', 'required', array(
			'required' => 'Seleccione el RH'
		));
		
		if ($this->form_validation->run()) {
			
			$doc = $this->input->post('inputDocumento');
			$url_foto = $this->image_process('inputFoto', $doc, "cliente");
			
			$input = array(
				'nombre_persona' => mb_strtolower($this->input->post('inputNombre')),
				'correo_persona' => mb_strtolower($this->input->post('inputEmail')),
				'documento_persona' => $doc,
				'tipo_documento' => $this->input->post('selectTipoDoc'),
				'clave_acceso' => password_hash($this->input->post('inputPassword'), PASSWORD_BCRYPT),
				'fecha_nacimiento' => $this->input->post('inputNacimiento'),
				'genero_persona' => $this->input->post('selectGenero'),
				'id_ciudad' => $this->input->post('select_ciudades'),
				'direccion_persona' => $this->input->post('inputDireccion'),
				'telefono_persona' => $this->input->post('inputTelefono'),
				'tipo_sangre_cliente' => $this->input->post('selectGrupo'),
				'rh_cliente' => $this->input->post('selectRH'),
				'eps_persona' => $this->input->post('inputEps'),
				'contacto_cliente' => $this->input->post('inputNombreContacto'),
				'telefono_contacto_cliente' => $this->input->post('inputTelContacto'),
				'tipo_persona' => 'CLT',
				'estado_persona' => 'ACT',
				'foto_persona' => $url_foto
			);
			
			$input['edad_persona'] = $this->calculate_age($input['fecha_nacimiento']);
			
			$result = $this->persona_model->new_persona($input);
			header('Content-Type: application/json');
			echo $result;
		} else {
			header('Content-Type: application/json');
			echo json_encode($this->form_validation->error_array());
		}
	}
    
    public function seleccionar_cliente(){
        $this->session->set_userdata(array(
            'id_cliente' => $this->input->post('id')
        ));
    }
    
    public function liberar_cliente(){
        $this->session->set_userdata(array(
            'id_cliente' => null
        ));
        redirect('Administrador/Cliente');
    }
	
	public function edit_view() {
        $id = $this->session->userdata('id_cliente');
        if($id){
            $this->data['cliente_info'] = $this->persona_model->get_persona($id);
            $this->data['departamentos'] = $this->lugar_model->get_departamentos();
            $this->data['ciudades'] = $this->lugar_model->get_ciudades($this->data['cliente_info']->id_departamento);

            $this->render('admin/admin_cliente_edit_view');
        } else {
            redirect('Administrador/Cliente');
        }
	}
	
	public function edit_cliente() {
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('inputNombre', 'nombre', 'required');
		$this->form_validation->set_rules('inputEmail', 'correo', 'required|valid_email');
		$this->form_validation->set_rules('inputDocumento', 'documento', 'required');
		$this->form_validation->set_rules('inputNacimiento', 'Fecha de Nacimiento', 'required');
		$this->form_validation->set_rules('inputTelefono', 'Telefono', 'required');
		$this->form_validation->set_rules('inputDireccion', 'Direccion', 'required');
		$this->form_validation->set_rules('inputNombreContacto', 'Nombre del Contacto', 'required');
		$this->form_validation->set_rules('inputTelContacto', 'Telefono del Contacto', 'required');
		
		if ($this->form_validation->run()) {
			
			$id = $this->input->post('idCliente');
			$doc = $this->input->post('inputDocumento');
			
			$input = array(
				'nombre_persona' => mb_strtolower($this->input->post('inputNombre')),
				'correo_persona' => mb_strtolower($this->input->post('inputEmail')),
				'documento_persona' => $doc,
				'tipo_documento' => $this->input->post('selectTipoDoc'),
				'fecha_nacimiento' => $this->input->post('inputNacimiento'),
				'genero_persona' => $this->input->post('selectGenero'),
				'id_ciudad' => $this->input->post('select_ciudades'),
				'direccion_persona' => $this->input->post('inputDireccion'),
				'telefono_persona' => $this->input->post('inputTelefono'),
                'estado_persona' => $this->input->post ( 'selectEstado' ),
				'tipo_sangre_cliente' => $this->input->post('selectGrupo'),
				'rh_cliente' => $this->input->post('selectRH'),
				'eps_persona' => $this->input->post('inputEps'),
				'contacto_cliente' => $this->input->post('inputNombreContacto'),
				'telefono_contacto_cliente' => $this->input->post('inputTelContacto')
			);
			
			$nombre_foto = $this->image_process('inputFoto', $doc, "cliente");
			
			if ($nombre_foto == NULL) {
				if ($this->input->post('chkEliminarFoto')) {
					$input['foto_persona'] = NULL;
				}
			} else {
				$input['foto_persona'] = $nombre_foto;
			}
			
			$input['edad_persona'] = $this->calculate_age($input['fecha_nacimiento']);
			
			$result = $this->persona_model->update_persona($id, $input);
			header('Content-Type: application/json');
			echo $result;
		} else {
			header('Content-Type: application/json');
			echo json_encode($this->form_validation->error_array());
		}
	}
}
