<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends Admin_Controller{
	
    function __construct(){
        parent::__construct();
        $this->load->model ( 'lugar_model' );
        
        $this->data ['page_title_end'] = '| Administradores';        
        $this->data['departamentos'] = $this->lugar_model->get_departamentos();
        $this->data['admins'] = $this->persona_model->get_administradores();     
        $this->data['before_closing_body'] .= plugin_js('assets/js/dentistware/admin_admin.js', true);
        $this->get_user_menu('main-administrador');
    }
    
    public function index(){
		$this->render ( 'admin/admin_admin_view' );	 
    }
    
    public function nuevo_admin(){
        $this->load->library ( 'form_validation' );
        
        $this->form_validation->set_rules('selectTipoDoc', 'tipo documento', 'required', array('required' => 'Seleccione un tipo de documento.'));
        $this->form_validation->set_rules('inputDocumento', 'documento', 'required|is_unique[persona.documento_persona]', array('is_unique' => 'El documento ya se encuentra registrado'));
        $this->form_validation->set_rules('inputNombre', 'nombres completo', 'required');
        $this->form_validation->set_rules('inputEmail', 'correo', 'required|valid_email');
        $this->form_validation->set_rules('inputPassword', 'contraseña', 'required');
        $this->form_validation->set_rules('inputPasswordConfirm', 'confirmar contraseña', 'required|matches[inputPassword]', array('matches' => 'Las contraseñas no coindicen'));
        $this->form_validation->set_rules('inputNacimiento', 'fecha de nacimiento', 'required');
        $this->form_validation->set_rules('inputTelefono', 'teléfono', 'required');
        $this->form_validation->set_rules('inputDireccion', 'dirección', 'required');
        //$this->form_validation->set_rules('select_depto', 'departamento', 'required', array('required' => 'Seleccione un departamento.'));
        //$this->form_validation->set_rules('select_ciudades', 'ciudad', 'required', array('required' => 'Seleccione una ciudad.'));
        //$this->form_validation->set_rules('selectGenero', 'género', 'required', array('required' => 'Seleccione un género.'));
                
        if ($this->form_validation->run()) {
        	$doc = $this->input->post ( 'inputDocumento' );
        	$url_foto = $this->image_process('inputFoto', $doc, "admin");
        	
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
                    'tipo_persona' => 'ADM',
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
}