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
    
    public function nuevo_cliente(){
        $this->load->library ( 'form_validation' );
        
        $this->form_validation->set_rules ('inputNombre', 'nombre', 'required');                
        
		$this->form_validation->set_rules ( 'inputDocumento', 'documento', 'required|is_unique[persona.documento_persona]', array (
				'is_unique' => 'Ya se encuentra registrada una persona con el mismo documento'
		) );	
		$this->form_validation->set_rules ( 'inputEmail', 'E-mail', 'required|valid_email');
        $this->form_validation->set_rules ( 'inputPassword', 'contraseña', 'required');
		$this->form_validation->set_rules('input_conf_password', 'Confirmación de Contraseña', 'trim|matches[input_password]', array (
				'matches' => 'Las contraseñas no coinciden'
		) );        
        $this->form_validation->set_rules ( 'inputPasswordConfirm', 'contraseña', 'required');
		
		$this->form_validation->set_rules ( 'select_tipo_documento', 'Tipo de documento', 'required|callback_check_select');
		$this->form_validation->set_rules ( 'select_tipo_cliente', 'Tipo de cliente', 'required|callback_check_select');			
		$this->form_validation->set_rules ( 'select_dept_cliente', 'Departamento', 'required|callback_check_select');
		$this->form_validation->set_rules ( 'select_ciudad_cliente', 'Municipio', 'required|callback_check_select');
		
		if ($this->form_validation->run ()) {		
			
			$input = array (
					'documento' => $this->input->post ( 'input_documento' ),
					'tipoDocumento' => $this->input->post ( 'select_tipo_documento' ),
					'nombreCompleto' => mb_strtoupper($this->input->post ( 'input_nombre' )),
					'contacto' => mb_strtoupper($this->input->post ( 'input_contacto' )),
					'direccion' => $this->input->post ( 'input_direccion' ),
					'telefonos' => $this->input->post ( 'input_telefono' ),
					'fidCiudad' => $this->input->post ( 'select_ciudad_cliente' ),
					'email' => $this->input->post ( 'input_email' ),
					'tipoTercero' => 'CLT',
					'estado' => 'ACT',
					'tipoCliente' => $this->input->post ( 'select_tipo_cliente' ),
			);
			$result = $this->terceros_model->new_tercero ( $input );
			header ( 'Content-Type: application/json' );
			echo $result;
		}else {
			header ( 'Content-Type: application/json' );
			echo json_encode ( $this->form_validation->error_array () );
		}
    }
}