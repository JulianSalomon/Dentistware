<?php

class Cliente extends Admin_Controller {
	
	function __construct(){
		parent::__construct();	
		$this->load->model ( 'persona_model' );   
        $this->load->model ( 'lugar_model' );    
        $this->data['departamentos'] = $this->lugar_model->get_departamentos();
        $this->data['clientes'] = $this->persona_model->get_clientes();
        $this->data['before_closing_body'] = '<script>
                                                $("#datepicker").datepicker({
                                                    language: "es",
                                                    autoclose: true,
                                                }).on(
                                                    "show", function() {
                                                    var zIndexModal = $("#modal_add_client").css("z-index");
                                                    var zIndexFecha = $(".datepicker").css("z-index");
                                                    $(".datepicker").css("z-index",zIndexModal+1);
                                                });
                                             </script>';
        
        $this->data['before_closing_body'] .= plugin_js('assets/js/dentistware/cliente_admin.js', true);
		
		

	}
	
	public function index(){
		$this->get_user_menu('main-cliente');
		$this->render ( 'admin/admin_cliente_view' );				
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
}