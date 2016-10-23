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
                                                $("#inputNacimiento").datepicker({
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
        
        $this->form_validation->set_rules('inputNombre', 'Nombre', 'required');
        $this->form_validation->set_rules('inputEmail', 'correo', 'required');
        $this->form_validation->set_rules('inputPassword', 'contraseña', 'required');
        $this->form_validation->set_rules('inputPasswordConfirm', 'confirmar contraseña', 'required|matches[inputPassword]', array('matches' => 'Las contraseñas no coindicen'));
        $this->form_validation->set_rules('inputDocumento', 'documento', 'required');
        $this->form_validation->set_rules('inputNacimiento', 'Fecha de Nacimiento', 'required');
        $this->form_validation->set_rules('inputEdad', 'Edad', 'required');
        $this->form_validation->set_rules('inputGenero', 'Genero', 'required');
        $this->form_validation->set_rules('inputTelefono', 'Telefono', 'required');
        $this->form_validation->set_rules('inputDireccion', 'Direccion', 'required');
        $this->form_validation->set_rules('inputNombreContacto', 'Nombre del Contacto', 'required');
        $this->form_validation->set_rules('inputTelContacto', 'Telefono del Contacto', 'required');        
        
        
        if ($this->form_validation->run()) {		
			
			$input = array (
                    'nombre_persona' => $this->input->post ( 'inputNombre' ),
                    'correo_persona' => $this->input->post ( 'inputEmail' ),
					'documento_persona' => $this->input->post ( 'inputDocumento' ),
					'tipo_documento' => $this->input->post ( 'selectTipoDoc' ),
					'clave_acceso' => password_hash($this->input->post ( 'inputPassword'), PASSWORD_BCRYPT),
                    'fecha_nacimiento' => $this->input->post ( 'inputNacimiento' ),
                    'edad_persona' => $this->input->post ( 'inputEdad' ),
                    'genero_persona' => $this->input->post ( 'inputGenero' ),
                    'id_ciudad' => $this->input->post ( 'select_ciudades' ),
					'direccion_persona' => $this->input->post ( 'inputDireccion' ),
					'telefono_persona' => $this->input->post ( 'inputTelefono' ),
					'tipo_sangre_cliente' => $this->input->post ( 'selectGrupo' ),					
					'rh_cliente' => $this->input->post ( 'selectRH' ),
                    'eps_persona' => $this->input->post ( 'inputEps' ),
                    'contacto_cliente' => $this->input->post ( 'inputNombreContacto' ),
                    'telefono_contacto_cliente' => $this->input->post ( 'inputTelContacto' ),
                    'tipo_persona' => 'CLT',
                    'estado_persona' => 'ACT',
			);            
            $result = $this->persona_model->new_persona($input);
            header ( 'Content-Type: application/json' );						
			echo $result;
		}else {
			header ( 'Content-Type: application/json' );
			echo json_encode ( $this->form_validation->error_array () );
		}            
    }
}