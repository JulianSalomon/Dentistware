<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
class Perfil extends MY_Controller {
	
	function __construct() {
		parent::__construct();
		if (!$this->is_logged_in()) {
			redirect('Login');
		}		
		$this->load->model('persona_model');
		$this->load->model('lugar_model');
		$this->data['persona'] = $this->persona_model->get_persona($this->session->userdata('doc_persona'));
		$this->data['before_closing_head'] .= plugin_css('icheck');
		$this->data['before_closing_body'] .= plugin_js('assets/js/dentistware/perfil.js', true);
		$this->data['before_closing_body'] .= plugin_js('icheck');
	}
	
	public function index() {
		$this->get_user_menu('main-perfil');
		$this->render('perfil_view');
	}
	
	public function edit_view() {		
		$query = $this->data['persona_info'] = $this->persona_model->get_persona($this->session->userdata('doc_persona'));
		$this->data['departamentos'] = $this->lugar_model->get_departamentos();
		$this->data['ciudades'] = $this->lugar_model->get_ciudades($query->id_departamento);
		$this->get_user_menu('main-perfil');
		$this->render('perfil_edit_view');
	}
	
	public function edit_perfil() {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('inputNacimiento', 'Fecha de Nacimiento', 'required');
		$this->form_validation->set_rules('inputTelefono', 'Telefono', 'required');
		$this->form_validation->set_rules('inputDireccion', 'Direccion', 'required');
		$this->form_validation->set_rules('inputEmail', 'correo', 'required|valid_email');
				
		if ($this->form_validation->run()) {			
			$input = array(
				'fecha_nacimiento' => $this->input->post('inputNacimiento'),
				'genero_persona' => $this->input->post('selectGenero'),
				'tipo_sangre_cliente' => $this->input->post('selectGrupo'),
				'rh_cliente' => $this->input->post('selectRH'),
				'eps_persona' => $this->input->post('inputEps'),
				'direccion_persona' => $this->input->post('inputDireccion'),
				'telefono_persona' => $this->input->post('inputTelefono'),
				'correo_persona' => mb_strtolower($this->input->post('inputEmail')),
				'id_ciudad' => $this->input->post('select_ciudades'),
				'contacto_cliente' => $this->input->post('inputNombreContacto'),
				'telefono_contacto_cliente' => $this->input->post('inputTelContacto'),
				'estudios_odont' => $this->input->post('inputTitulosOdontologo')
			);
            $folder = 'cliente';
			$doc = $this->session->userdata('doc_persona');
			switch ($this->session->userdata('tipo_persona')) {
				case "ADM":
					$folder = 'admin';
					break;
				case "CLT":
					$folder = 'cliente';
					break;
				case "ODO":
					$folder = 'odonto';
					break;
				case "EMP":
					$folder = 'empleado';
					break;
			}
            
            $nombre_foto = $this->image_process('inputFoto', $doc, $folder);
            if ($nombre_foto == NULL) {
				if ($this->input->post('chkEliminarFoto')) {
					$input['foto_persona'] = NULL;
				}
			} else {
				$input['foto_persona'] = $nombre_foto;
			}
			
			$input['edad_persona'] = $this->calculate_age($input['fecha_nacimiento']);
			
			$result = $this->persona_model->update_persona($this->session->userdata('id_persona'), $input);
			header('Content-Type: application/json');
			echo $result;
		} else {
			header('Content-Type: application/json');
			echo json_encode($this->form_validation->error_array());
		}
	}
    
    public function password_view() {
        $this->data['persona_info'] = $this->persona_model->get_persona($this->session->userdata('doc_persona'));
        $this->get_user_menu();
		$this->render('password_edit_view');
	}
    
    public function edit_password() {
		$this->load->library('form_validation');
        
		$this->form_validation->set_rules('inputPassword', 'Contraseña Actual', 'required');
		$this->form_validation->set_rules('inputNewPassword', 'Contraseña nueva', 'required');
        $this->form_validation->set_rules('inputPasswordConfirm', 'Confirmar contraseña', 'required|matches[inputNewPassword]', array('matches' => 'Las contraseñas no coindicen'));
        
		if ($this->form_validation->run()) {
            $oldPassword = $this->input->post('inputPassword'); 
            $user = $this->persona_model->get_persona($this->session->userdata('doc_persona'));
            
            if(password_verify($oldPassword, $user->clave_acceso)){
                $input = array(
                    'clave_acceso' => password_hash($this->input->post ( 'inputNewPassword'), PASSWORD_BCRYPT),
                );
                $result = $this->persona_model->update_persona($this->session->userdata('id_persona'), $input);
                header('Content-Type: application/json');
                echo $result;
            }else{
                echo 2;
            }
		} else {
			header('Content-Type: application/json');
			echo json_encode($this->form_validation->error_array());
		}
	}
}