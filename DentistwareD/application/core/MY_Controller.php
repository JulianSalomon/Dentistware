<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller{
    public $data = array();
    function __construct(){
        parent::__construct();
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
	
	public function calculate_age($date){
		$date = str_replace('-', '/', $date);
		list($year,$month,$day) = explode('/',$date);
		$year_dif  = date("Y") - $year;
		$month_dif = date("m") - $month;
		$day_dif   = date("d") - $day;
		if ($day_dif < 0 || $month_dif < 0)
			$year_dif--;
		return $year_dif;
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
        if($this->session->userdata('foto_persona') != NULL){
            $this->data['user_info']['foto_persona'] = "admin/" . $this->session->userdata('foto_persona');
        }
        $this->load->model('persona_model');
        $this->data['before_closing_body'] = plugin_js('assets/js/dentistware/admin.js', true);
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
    
    protected function image_process($input_file_name, $documento, $tipo_folder){
    	$this->load->library ( 'upload' );
    
    	$config ['upload_path'] = "uploads/" . $tipo_folder . "/";
    	$config ['allowed_types'] = 'jpg|png';
    	$config ['max_size'] = 20480;
    	$config ['overwrite'] = TRUE;
    
    
    	$url_foto = NULL;
    	$result_upload = array ();
    
    	if ($_FILES [$input_file_name] ['name'] != '') {
    		$config ['file_name'] = $documento;
    		$this->upload->initialize ( $config );
    
    		if (! $this->upload->do_upload ($input_file_name)) {
    			$result_upload = array ('error' => $this->upload->display_errors () );
    		} else {
    			$result_upload = array ('upload_data' => $this->upload->data ());
    			$url_foto = $result_upload ['upload_data'] ['file_name'];
    		}
    	} else {
    		return $url_foto;
    	}
    	$this->load->library('image_lib');
    
    	$config['image_library'] = 'gd2';
    	$config['source_image'] = "uploads/" . $tipo_folder . "/" . $url_foto;
    	$config['maintain_ratio'] = TRUE;
    	$config['height'] = 265;
    
    	$this->image_lib->clear();
    	$this->image_lib->initialize($config);
    	$this->image_lib->resize();
    	return $url_foto;
    }
}

class Cliente_Controller extends MY_Controller{
	function __construct(){
        parent::__construct();
        if(!$this->is_logged_in()){
			redirect('Login');
		}
        $tipo = $this->session->userdata('tipo_persona');
        if ($tipo != 'CLT'){
       	    redirect ( 'Login', 'refresh' );
        }
        if($this->session->userdata('foto_persona') != NULL){
            $this->data['user_info']['foto_persona'] = "cliente/" . $this->session->userdata('foto_persona');
        }
        $this->load->model('persona_model');
    }
    
    
}

class Odon_Controller extends MY_Controller{
	function __construct(){
        parent::__construct();
        
        $tipo = $this->session->userdata('tipo_persona');
        if ($tipo != 'ODO') {
       	    redirect ( 'Login', 'refresh' );
        }
        if($this->session->userdata('foto_persona') != NULL){
            $this->data['user_info']['foto_persona'] = "odonto/" . $this->session->userdata('foto_persona');
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
        if($this->session->userdata('foto_persona') != NULL){
            $this->data['user_info']['foto_persona'] = "cliente/" . $this->session->userdata('foto_persona');
        }
    }
}

