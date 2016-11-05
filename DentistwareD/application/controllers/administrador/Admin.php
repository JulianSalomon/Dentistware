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
        //$this->form_validation->set_rules('selectDepto', 'departamento', 'required', array('required' => 'Seleccione un departamento.'));
//          $this->form_validation->set_rules('select_ciudades', 'ciudad', 'required', array('required' => 'Seleccione una ciudad.'));
//         $this->form_validation->set_rules('selectGenero', 'género', 'required', array('required' => 'Seleccione un género.'));
                
        if ($this->form_validation->run()) {
        	
        	$url_foto = $this->image_process('inputFoto');
        	
            $input = array (
                    'nombre_persona' => $this->input->post ( 'inputNombre' ),
                    'correo_persona' => $this->input->post ( 'inputEmail' ),
					'documento_persona' => $this->input->post ( 'inputDocumento' ),
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
    
    private function image_process($input_file_name){
    	$this->load->library ( 'upload' );
    	$config ['upload_path'] = $this->config->item ( 'upload_admin_folder' );
    	$config ['allowed_types'] = 'jpg|png';
    	$config ['max_size'] = 1024;
    	$config ['max_width'] = 256;
    	$config ['max_height'] = 256;
    		
    	$url_foto = NULL;
    	$result_upload = array ();
    		
    	if ($_FILES [$input_file_name] ['name'] != '') {
    		$config ['file_name'] = $this->rename_file ( $_FILES [$input_file_name] ['name'] );
    		$this->upload->initialize ( $config );
    
    		if (! $this->upload->do_upload ($input_file_name)) {
    			$result_upload = array ('error' => $this->upload->display_errors () );
    		} else {
    			$result_upload = array ('upload_data' => $this->upload->data ());
    			$url_foto = $result_upload ['upload_data'] ['file_name'];
    		}
    	}
    	return $url_foto;
    }
    
    private function rename_file($filename = null){
    	$new_temp_ext = explode(".", $filename);
    	$extension = end($new_temp_ext);
    	$new_filename = "admin-" . rand(10, 99) . rand(10, 99) . "." . $extension;
    
    	return $new_filename;
    }
}