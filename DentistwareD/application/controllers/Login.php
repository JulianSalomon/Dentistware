<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_Controller {
	
	public function __construct(){
		parent::__construct();

		$this->load->model('persona_model');
	}
	
	public function index(){		
	    if ($this->is_logged_in()) {
        	$this->redirect_user();    
        } else {
    		$this->login();
    	}						
	}	
	
	public function login() {
		if ($this->is_logged_in()) {
			$this->redirect_user();
		}
	
		$this->load->library('form_validation');
		$data ['error'] = false;
	
		$this->form_validation->set_rules('documento', 'Documento', 'required');
		$this->form_validation->set_rules('password', 'Contraseña', 'required');
		if ($this->form_validation->run()) {
			 
			$doc = $this->input->post('documento');
			$pass = $this->input->post('password');
			 
			$result = $this->authenticate($doc, $pass);
			 
			switch ($result) {
				case 1 :
					$data ['error'] = 'Te encuentras inactivo en el sistema. Comuniquese con el administrador';
					break;
				case 2 :
					$this->redirect_user ();
					break;
				case 3 :
					$data ['error'] = 'Tu contraseña es incorrecta. Revisa los datos y vuelve a intentar.';
					break;
				case 4 :
					$data ['error'] = 'Tu documento no se encuentra en el sistema.';
					break;
			}
		}
		$this->load->view('login_view', $data);
	}
	
	public function logout() {
		if (!$this->is_logged_in()) {
			redirect('Login');
		}
		$this->session->sess_destroy ();
		redirect ( '/', 'refresh' );
	}

	private function authenticate($document, $password) {
	
		$user = $this->persona_model->get_persona ($document);
		if ($user != NULL) {
            if ($user->estado_persona === 'RET') {
                return 1;
            }
			if (password_verify($password, $user->clave_acceso)) {
				unset($user->clave_acceso);
				$this->session->set_userdata ( array (
						'logged_in' => TRUE,
						'nombre_completo' => $user->nombre_persona,
						'tipo_persona' => $user->tipo_persona, 
                        'id_persona' => $user->id_persona,
                        'doc_persona' => $user->documento_persona,
                        'foto_persona' => $user->foto_persona,
				) );
				return 2;
			} else {
				return 3;
			}
		} else {
			return 4;
		}
	}
	
	private function redirect_user() {
		$this->tipo_persona = $this->session->userdata('tipo_persona');
		switch (mb_strtoupper($this->tipo_persona)) {
			case "ADM" :
				redirect('Admin');
				break;
			case "CLT" :
				redirect('Cliente');
				break;
			case "ODO" :
				redirect('Odonto');
				break;
			case "EMP" :
				redirect('Empl');
				break;
		}
	}
}