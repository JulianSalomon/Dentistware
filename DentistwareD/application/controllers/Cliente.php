<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Cliente extends Cliente_Controller {
    
    function __construct(){
        parent::__construct();
        if(!$this->is_logged_in()){
            redirect('Login', 'refresh');
        }
    }
    
    public function index(){
        $this->get_user_menu('main-home');
        $this->render ( 'inicio_view' );
    }

}