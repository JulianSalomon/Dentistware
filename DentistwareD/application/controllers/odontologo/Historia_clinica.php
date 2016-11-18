<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Historia_clinica extends Odon_Controller {
    
	function __construct() {
		parent::__construct();
		$this->load->model('historia_model');
	}
    
	public function index() {
		if ($this->session->userdata['id_cliente'] == null) {
			redirect('Odontologo/Cita');
		}
		$id_cliente = $this->session->userdata['id_cliente'];
		$id_cita    = $this->session->userdata['id_cita'];
		$this->load->model('persona_model');
		$this->load->model('historia_model');
		$persona          = $this->persona_model->get_persona('', $id_cliente);
		$historia_clinica = $this->historia_model->get_historia('', $id_cliente);
		$registros        = null;
		$dientes          = null;
		if ($historia_clinica != null) {
			$this->load->model('registro_model');
			$registros = $this->registro_model->get_registros($historia_clinica->id_historia);
			if ($registros != null) {
				$this->load->model('diente_model');
				$dientes = $this->diente_model->get_dientes($registros[0]->id_registro);
			}
		}
		$data = array(
			'historia_clinica' => $historia_clinica,
			'registros' => $registros,
			'persona' => $persona,
			'dientes' => $dientes,
			'id_cita' => $id_cita
		);
		$this->get_user_menu('Historia_Cliente');
		$this->load->view('odontologo/historia_clinica_view', $data);
	}
    
	public function seleccionar_cita() {
		$this->session->set_userdata(array(
			'id_cliente' => $_POST['id_cliente'],
			'id_cita' => $_POST['id_cita']
		));
	}
    
	public function eliminar_seleccion() {
		$this->session->set_userdata(array(
			'id_cliente' => null,
			'id_cita' => null
		));
		if ($this->session->userdata['id_cliente'] == null) {
			redirect('Odontologo/Cita');
		}
	}
    
	public function crear_historia_clinica() {
		if ($this->session->userdata['id_cliente'] == null) {
			redirect('Odontologo/Cita');
		}
		$this->load->model('persona_model');
		$this->load->model('historia_model');
		$this->load->model('pregunta_model');
		$this->load->model('registro_model');
		$preguntas        = $this->pregunta_model->get_preguntas();
		$cliente_info     = $this->persona_model->get_persona('', $this->session->userdata['id_cliente']);
		$historia_clinica = $this->historia_model->get_historia('', $this->session->userdata['id_cliente']);
		$registros        = null;
		$data             = array(
			'historia_clinica' => $historia_clinica,
			'registros' => $registros,
			'cliente_info' => $cliente_info,
			'preguntas' => $preguntas
		);
		$this->load->view('odontologo/crear_historia_clinica_view', $data);
	}
    
	public function nueva_historia_clinica() {
		if ($this->session->userdata['id_cliente'] == null) {
			redirect('Odontologo/Cita');
		}
		$this->load->library('form_validation');
		$this->form_validation->set_rules('input_cliente', 'cliente', 'is_unique[historia_clinica.id_cliente]');
		$this->form_validation->set_rules('input_antecedentes', 'antecedentes', 'required', array(
			'required' => 'Escriba los antecedentes familiares.'
		));
		$this->form_validation->set_rules('input_enfermedad', 'enfermedad', 'required', array(
			'required' => 'Escriba las enfermedades que padece el paciente.'
		));
		$this->form_validation->set_rules('input_observaciones', 'observaciones', 'required', array(
			'required' => 'Escriba las observaciones que haya realizado.'
		));
		if ($this->form_validation->run()) {
			$this->load->model('historia_model');
			$input  = array(
				'id_cliente' => $this->input->post('input_cliente'),
				'fecha_apertura' => date('Y-m-d H:i:s'),
				'antecedentes_fam' => $this->input->post('input_antecedentes'),
				'enfermedad_actual' => $this->input->post('input_enfermedad'),
				'observaciones' => $this->input->post('input_observaciones')
			);
			$result = $this->historia_model->nueva_historia($input);
			if ($result) {
				$id_historia = $this->historia_model->get_historia('', $this->session->userdata['id_cliente'])->id_historia;
				$this->load->model('pregunta_model');
				for ($i = 1; $i <= 36; $i++) {
					$input = array(
						'id_pregunta' => $i,
						'id_historia' => $id_historia,
						'estado_pregunta' => $this->input->post('p' . $i)
					);
					if ($input['estado_pregunta'] == NULL) {
						$input['estado_pregunta'] = 0;
					}
					$result = $this->pregunta_model->insertar_preguntas($input);
					if (!$result) {
						return 0;
					}
				}
			}
			header('Content-Type: application/json');
			echo $result;
		} else {
			header('Content-Type: application/json');
			echo json_encode($this->form_validation->error_array());
		}
	}
    
	public function editar_historia_clinica() {
		$this->load->model('persona_model');
		$this->load->model('historia_model');
		$this->load->model('pregunta_model');
		$this->load->model('registro_model');
		$cliente_info     = $this->persona_model->get_persona('', $this->session->userdata['id_cliente']);
		$historia_clinica = $this->historia_model->get_historia('', $this->session->userdata['id_cliente']);
		$registros        = $this->registro_model->get_registros($historia_clinica->id_historia);
		$preguntas        = $this->historia_model->obtener_preguntas_por_historia($historia_clinica->id_historia);
		$data             = array(
			'historia_clinica' => $historia_clinica,
			'registros' => $registros,
			'cliente_info' => $cliente_info,
			'preguntas' => $preguntas
		);
		$this->load->view('odontologo/editar_historia_clinica_view', $data);
	}
    
	public function historia_clinica_editada() {
		$this->load->model('historia_model');
		$this->load->model('pregunta_model');
		$input = array(
			'antecedentes_fam' => $this->input->post('input_antecedentes'),
			'enfermedad_actual' => $this->input->post('input_enfermedad'),
			'observaciones' => $this->input->post('input_observaciones')
		);
		$this->historia_model->actualizar_historia($this->session->userdata['id_cliente'], $input);
		$historia_clinica     = $this->historia_model->get_historia_por_cliente($this->session->userdata['id_cliente'])->id_historia;
		$num_preguntas        = $this->pregunta_model->contar_preguntas();
		$preguntas_ingresadas = 1;
		for ($i = 1; $i <= $num_preguntas; $i++) {
			$entrada = 'p' . $i;
			$input   = array(
				'estado_pregunta' => $this->input->post($entrada)
			);
			$result  = $this->pregunta_model->actualizar_preguntas($historia_clinica, $i, $input);
			if ($result == false) {
				$preguntas_ingresadas = 0;
				break;
			}
		}
		echo $preguntas_ingresadas;
	}
}