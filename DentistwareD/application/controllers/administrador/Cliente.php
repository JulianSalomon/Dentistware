<?php

class Cliente extends Admin_Controller {
	
	function __construct(){
		parent::__construct();	
		if(!$this->is_logged_in()){
			redirect('Login');
		}
		$this->load->model ( 'persona_model' );        
        $this->data['clientes'] = $this->persona_model->get_clientes();
        $this->data['before_closing_body'] = '<script>$("#datepicker").datepicker({
                                                    language: "es",
                                                    autoclose: true,
                                                }).on(
                                                    "show", function() {
                                                    var zIndexModal = $("#modal_add_client").css("z-index");
                                                    var zIndexFecha = $(".datepicker").css("z-index");
                                                    $(".datepicker").css("z-index",zIndexModal+1);
                                                });</script>';
        
		
		

	}
	
	public function index(){
		$this->get_user_menu('main-cliente');
		$this->render ( 'admin/admin_cliente_view' );				
	}
}