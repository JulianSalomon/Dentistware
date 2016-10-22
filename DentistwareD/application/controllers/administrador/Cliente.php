<?php

class Cliente extends Admin_Controller {
	
	function __construct(){
		parent::__construct();
        $this->load->library ( 'form_validation' );
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
                                             </script>
                                             <script>
                              $(function () {
                                $("#tablaCliente").DataTable({
                                  "paging": true,
                                  "lengthChange": false,
                                  "searching": false,
                                  "ordering": true,
                                  "info": true,
                                  "autoWidth": false
                                });
                              });
                            </script>';
        $this->data['before_closing_body'] .= plugin_js('assets/js/dentistware/cliente_admin.js', true);
	}
	
	public function index(){
		$this->get_user_menu('main-cliente');
		$this->render ( 'admin/admin_cliente_view' );				
	}
    
/*    public function registro(){
        if($this->input->post('submit_reg')){
            $this->form_validation->set_rules('nombre', 'Nombre', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('confirmPassword', 'cPassword', 'required|matches[password]', array('matches' => 'Las contraseñas no coindicen'));
            $this->form_validation->set_rules('tipoId', 'TipoId', 'required');
            $this->form_validation->set_rules('id', 'Id', 'required');
            $this->form_validation->set_rules('fechaNacimiento', 'FechaNacimiento', 'required');
            $this->form_validation->set_rules('edad', 'Edad', 'required');
            $this->form_validation->set_rules('fechaNacimiento', 'FechaNacimiento', 'required');
            $this->form_validation->set_rules('genero', 'Genero', 'required');
            $this->form_validation->set_rules('dept', 'Departamento', 'required');
            $this->form_validation->set_rules('ciudad', 'Ciudad', 'required');
            $this->form_validation->set_rules('telefono', 'Telefono', 'required');
            $this->form_validation->set_rules('direccion', 'Direccion', 'required');
            $this->form_validation->set_rules('gs', 'GrupoSanguineo', 'required');
            $this->form_validation->set_rules('rh', 'RH', 'required');
            $this->form_validation->set_rules('eps', 'EPS', 'required');
            $this->form_validation->set_rules('nombreContacto', 'NombreContacto', 'required');
            $this->form_validation->set_rules('telefonoContacto', 'TelefonoContacto', 'required');
        }
    }*/
        
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