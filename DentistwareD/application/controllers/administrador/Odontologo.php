<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Odontologo extends Admin_Controller {
	
	function __construct(){
		parent::__construct();	
		$this->data ['page_title_end'] = '| Odontólogos';
        $this->load->model ( 'lugar_model' );
        $this->load->library("pagination");
        $this->data['departamentos'] = $this->lugar_model->get_departamentos();   
        $this->data['before_closing_body'] .= plugin_js('assets/js/dentistware/admin_odont.js', true);
        $this->get_user_menu('main-odontologo');        
        $this->data['odontologos'] = '';
    }
    
    public function index(){
        $_SESSION['word_search'] = '';
		$post = $this->input->post('input_buscar_odontologo');
        $_SESSION['word_search'] = mb_strtolower($post);
        $config = array();
        $config = $this->config->item('config_paginator');
        $config["total_rows"] = $this->persona_model->count_personas($_SESSION['word_search'], 'ODO');
        $config["base_url"] = base_url() . "administrador/Odontologo/index/";
        $config["per_page"] = 25;
        $config["uri_segment"] = 4;
        $page =  $this->uri->segment(4);
        if($_SESSION['word_search'] != ''){
            $odontologos = $this->persona_model->get_odontologos('nombre_persona', 'asc', $config["per_page"], $page, $_SESSION['word_search']);
        }
        else{
            $odontologos = $this->persona_model->get_odontologos('nombre_persona', 'asc', $config["per_page"], $page);
        }
        if($odontologos){
            $this->pagination->initialize($config);

            $this->data['odontologos'] = $odontologos;
            $this->data["links"] = $this->pagination->create_links();
        }
    	
    	
    	$this->render ( 'admin/admin_odonto_view' );
    }

    public function nuevo_odontologo(){
        $this->load->library ( 'form_validation' );
        
        $this->form_validation->set_rules('selectTipoDoc', 'tipo documento', 'required', array('required' => 'Seleccione un tipo de documento.'));
        $this->form_validation->set_rules('inputNombre', 'Nombre', 'required');
        $this->form_validation->set_rules('inputEmail', 'correo', 'required|valid_email');
        $this->form_validation->set_rules('inputPassword', 'contraseña', 'required');
        $this->form_validation->set_rules('inputPasswordConfirm', 'confirmar contraseña', 'required|matches[inputPassword]', array('matches' => 'Las contraseñas no coindicen'));
        $this->form_validation->set_rules('inputDocumento', 'documento', 'required|is_unique[persona.documento_persona]', array('is_unique' => 'El documento ya se encuentra registrado'));
        $this->form_validation->set_rules('inputNacimiento', 'Fecha de Nacimiento', 'required');
        $this->form_validation->set_rules('inputTelefono', 'Telefono', 'required');
        $this->form_validation->set_rules('inputDireccion', 'Direccion', 'required');
        $this->form_validation->set_rules('inputEstudios', 'estudios', 'required');
        $this->form_validation->set_rules('select_ciudades', 'ciudad', 'required', array('required' => 'Seleccione una ubicación.'));
        $this->form_validation->set_rules('selectGenero', 'género', 'required', array('required' => 'Seleccione un género.'));
                
        if ($this->form_validation->run()) {
        	
        	$doc = $this->input->post ( 'inputDocumento' );
        	$url_foto = $this->image_process('inputFoto', $doc, "odonto");
        	
			$input = array (
                    'nombre_persona' => mb_strtolower($this->input->post ( 'inputNombre' )),
    				'correo_persona' => mb_strtolower($this->input->post ( 'inputEmail' )),
					'documento_persona' => $doc,
					'tipo_documento' => $this->input->post ( 'selectTipoDoc' ),
					'clave_acceso' => password_hash($this->input->post ( 'inputPassword'), PASSWORD_BCRYPT),
	                'fecha_nacimiento' => $this->input->post ( 'inputNacimiento' ),                
	                'genero_persona' => $this->input->post ( 'selectGenero' ),
	                'id_ciudad' => $this->input->post ( 'select_ciudades' ),
					'direccion_persona' => $this->input->post ( 'inputDireccion' ),
					'telefono_persona' => $this->input->post ( 'inputTelefono' ),
					'estudios_odont' => $this->input->post ( 'inputEstudios' ),
	                'tipo_persona' => 'ODO',
	                'estado_persona' => 'ACT',
					'foto_persona' => $url_foto,
			);
			
			$input['edad_persona'] = $this->calculate_age($input['fecha_nacimiento']);
            $result = $this->persona_model->new_persona($input);
            header ( 'Content-Type: application/json' );
			echo $result;
        } else {
			header ( 'Content-Type: application/json' );
			echo json_encode ( $this->form_validation->error_array () );
		}
    }
    
    public function edit_view($id){
    	$query = $this->persona_model->get_persona('', $id);
    	$this->data['odontologo_info'] = $query;
    	$this->data['departamentos'] = $this->lugar_model->get_departamentos();
    	$this->data['ciudades'] = $this->lugar_model->get_ciudades($query->id_departamento);
    	
    	$this->render('admin/admin_odonto_edit_view');
    }
    
    public function edit_odontologo(){
        $this->load->model ( 'lugar_model' );
        
    	$this->load->library ( 'form_validation' );    	
    	$this->form_validation->set_rules('inputNombre', 'nombre', 'required');
    	$this->form_validation->set_rules('inputEmail', 'correo', 'required|valid_email');
    	$this->form_validation->set_rules('inputDocumento', 'documento', 'required');
    	$this->form_validation->set_rules('inputNacimiento', 'Fecha de Nacimiento', 'required');
    	$this->form_validation->set_rules('inputTelefono', 'Telefono', 'required');
    	$this->form_validation->set_rules('inputDireccion', 'Direccion', 'required');
    	$this->form_validation->set_rules('inputTitulosOdontologo', 'Titulos Obtenidos', 'required');
    	
    	if ($this->form_validation->run()) {
    		
    		$id = $this->input->post('idOdontologo');
    		$doc = $this->input->post ( 'inputDocumento' );
    		
    		$input = array (
                    'nombre_persona' => mb_strtolower($this->input->post ( 'inputNombre' )),
                    'correo_persona' => mb_strtolower($this->input->post ( 'inputEmail' )),
    				'documento_persona' => $doc,
    				'tipo_documento' => $this->input->post ( 'selectTipoDoc' ),
    				'fecha_nacimiento' => $this->input->post ( 'inputNacimiento' ),
    				'genero_persona' => $this->input->post ( 'selectGenero' ),
    				'id_ciudad' => $this->input->post ( 'select_ciudades' ),
    				'direccion_persona' => $this->input->post ( 'inputDireccion' ),
    				'telefono_persona' => $this->input->post ( 'inputTelefono' ),
                    'estado_persona' => $this->input->post ( 'selectEstado' ),
    				'tipo_sangre_cliente' => $this->input->post ( 'selectGrupo' ),
    				'rh_cliente' => $this->input->post ( 'selectRH' ),
    				'estudios_odont' => $this->input->post ( 'inputTitulosOdontologo' ),
    		);
    		
    		$nombre_foto = $this->image_process('inputFoto', $doc, "odonto");
    		
    		if($nombre_foto == NULL) {
    			if($this->input->post ('chkEliminarFoto')){
    				$input['foto_persona'] = NULL;
    			}
    		} else {
    			$input['foto_persona'] = $nombre_foto;
    		}
    			
    		$input['edad_persona'] = $this->calculate_age($input['fecha_nacimiento']);    		    		
    		
    		$result = $this->persona_model->update_persona($id, $input);
    		header ( 'Content-Type: application/json' );
    		echo $result;
    	}else {
    		header ( 'Content-Type: application/json' );
    		echo json_encode ( $this->form_validation->error_array () );
    	}    	
    }
}