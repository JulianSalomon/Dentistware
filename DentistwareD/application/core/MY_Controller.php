<?php
class MY_Controller extends CI_Controller{
    public $data = array();
    function __construct(){
        parent::__construct();
        $this->data ['page_title'] = 'Dentistware ';
		$this->data ['before_closing_head'] = '';
		$this->data ['before_closing_body'] = '';
		$this->data ['page_title_end'] = '';
		$this->data['page_title_start'] = "Dentistware ";		
		$this->data['user_info'] = $this->session->userdata();
    }
    
    public function is_logged_in() {
    	return $this->session->userdata ( 'logged_in' );
    }
    
	public function render($the_view = NULL) {
        $this->data ['the_view_content'] = (is_null ( $the_view )) ? '' : $this->load->view ( $the_view, $this->data, TRUE );
        $this->load->view ( 'templates/master_view', $this->data );
	}
	
	public function get_user_menu($branch_selected = '', $leaf_selected = '') {
		$this->load->config('menu');
		$tipo = $this->session->userdata('tipo_persona');
		$menu_config = array(
				'branch_select' => $branch_selected,
				'leaf_select' => $leaf_selected,
		);
		$this->data['menu_usuario'] = menu_nav($this->config->item('menu_' . $tipo), $menu_config);
	}
}



class Admin_Controller extends MY_Controller{
	function __construct(){
        parent::__construct();
        if(!$this->is_logged_in()){
			redirect('Login');
		}
        $tipo = $this->session->userdata('tipo_persona');
        if ($tipo != 'ADM'){
       	    redirect ( 'Login', 'refresh' );
        }        
        $this->load->model('persona_model');
    }
    
    public function listar_ciudades($idDepartamento = 0, $flag = TRUE) {
		$ciudades = $this->lugar_model->get_ciudades($idDepartamento);
	
		if($flag){
			header('Content-Type: application/json');
			echo json_encode($ciudades);
		} else {
			return $ciudades;
		}
	}
    
    public function eliminar_usuario($docPersona){
        echo $this->persona_model->delete_persona($docPersona);
    }
}

class Cliente_Controller extends MY_Controller{
	function __construct(){
        parent::__construct();
        
        $tipo = $this->session->userdata('tipo_persona');
        if ($tipo != 'CLT') {
       	    redirect ( 'Login', 'refresh' );
       }            
    }
}

class Odon_Controller extends MY_Controller{
	function __construct(){
        parent::__construct();
        
        $tipo = $this->session->userdata('tipo_persona');
        if ($tipo != 'ODO') {
       	    redirect ( 'Login', 'refresh' );
       }            
    }
}

class Empl_Controller extends MY_Controller{
	function __construct(){
        parent::__construct();
        
        $tipo = $this->session->userdata('tipo_persona');
        if ($tipo != 'EMP') {
       	    redirect ( 'Login', 'refresh' );
       }            
    }
}