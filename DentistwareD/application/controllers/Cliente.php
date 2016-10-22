<?php

class Cliente extends Admin_Controller{
    
    function __construct(){
       parent::__construct();
       
       if (!$this->is_logged_in()) {
       	redirect ( 'Login', 'refresh' );
       }
    }
    
    function index(){
        
    	$this->get_user_menu('main-home');
        $this->render('escritorio_view');
    }    
}