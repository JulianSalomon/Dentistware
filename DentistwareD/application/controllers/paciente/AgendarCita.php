<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class AgendarCita extends Cliente_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->data['page_title_end'] = '| Agendar Cita';
		$this->load->model('cita_model');
		$this->load->model('persona_model');
        $this->load->model('multa_model');
		$this->get_user_menu('main-citas', 'citas-agendar');		
		$this->data['before_closing_body'] = plugin_js('assets/js/dentistware/cliente_cita.js', true);
        $multas = $this->multa_model->get_multas_no_pagadas($this->session->userdata['id_persona']);
        
        $cantidadDeMultas= 0;         
        $cantidadDeCitas = 0;
        if($multas){
        	$cantidadDeMultas = count($multas);
        }
        
        $citasActuales = $this->cita_model->get_citas_by_cliente($this->session->userdata['id_persona']);
        if($citasActuales){
        	$cantidadDeCitas = count($citasActuales);
        }
        
        $odontos_array = array();
        $odontos_array['-1'] = '- Seleccione un Odontólogo -';
        $query = $this->persona_model->get_list_odontologos();
        foreach ($query as $arreglo) {
        	$odontos_array[$arreglo->id_persona] = ucwords($arreglo->nombre);
        }
        
        $this->data['odontologos'] = $odontos_array;
        
        $this->data['cantidadDeMultas'] = $cantidadDeMultas;
        $this->data['cantidadDeCitas'] = $cantidadDeCitas;
    }
	
	public function index() {
        $fecha = date("Y-m-d");
        $hora = '';
        $odontologo = -1;
        if($this->input->post()){
            $fecha = $this->input->post('inputFecha');
            $hora = $this->input->post('inputHora');
            $odontologo = $this->input->post('inputOdontologo');
        }
        $fecha = str_replace("/", "-", $fecha);
        if($hora != ''){
			$hora = strtotime($hora);
			$hora = date("H:i:s", $hora);
		}
        $_SESSION['fecha'] = $fecha;
        $_SESSION['hora'] = $hora;
        $_SESSION['odontologo'] = $odontologo;
        if($fecha == date("Y-m-d")){
			$this->data['citas'] = $this->cita_model->get_citas_today($hora, $odontologo);
		} else {
			$this->data['citas'] = $this->cita_model->get_citas($fecha, $hora, $odontologo);
		}		
		$this->render('cliente/agendar_cita_view');
	}
	
	public function agendar_cita($id_cita) {
        
        
        $cita = $this->cita_model->get_cita($id_cita);
        $id_cliente = $this->session->userdata('id_persona');
		
		$data = array(
				"id_cliente" => $id_cliente
		);
		
    
		
		$value = $this->cita_model->same_cita($id_cliente, '', $cita->fecha_cita, $cita->hora_cita);
		
		if($value >= 1){
			echo 2;
		} else { 
        $odontologo = $this->persona_model->get_persona('', $cita->id_odonto);
        $odontologo = $odontologo->nombre_persona;
        $cliente = $this->persona_model->get_persona('', $id_cliente);
        $correo_persona = $cliente->correo_persona;
        $cliente = $cliente->nombre_persona;
        
        setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish'); 
        $string = $cita->fecha_cita;
        $convertir = DateTime::createFromFormat("Y-m-d", $string);
        $fecha = strftime("%A %d de %B %Y",$convertir->getTimestamp());
        $hora = date('h:i a', strtotime($cita->hora_cita));
        $consultorio = $cita->consultorio;
        $url= 'https://raw.githubusercontent.com/JulianSalomon/Dentistware/development/DentistwareD/assets/img/Banner.jpg';
        $mensaje = "
            <html>
            <head>
            <title>HTML email</title>
            <style>
            p {
                font-size: 16px;
            }
            h2 {
                text-align:center;
            }
            img {
                display: block;
                margin-left: auto;
                margin-right: auto;
            }
            </style>
            </head>
            <body>
            <img src= '" . $url . "' width='100%'>
            <p>Apreciado ". ucwords($cliente) .": <br> <br> Su cita se ha asignado para el día <b> " . $fecha ."</b>, con el odontólogo <b>". ucwords($odontologo) . "</b>, a las <b>" . $hora . "</b>, en el consultorio <b>".$consultorio."</b>.
            " . br(2) . " Recuerde que para cancelar la cita puede hacerlo con cinco horas de antelación, si no asiste a la cita tendrá una multa de <b>$10.000 COP</b>. El día de su cita deberá llegar quince minutos antes de la hora asignada.
            " . br(5) . "
            Enviado desde Dentistware.  </p>
            </body>
            </html>
            ";
        $configs = array(
        'protocol'=>'smtp',
        'smtp_host'=>'ssl://smtp.gmail.com',
        'smtp_user'=>'dentistware@gmail.com',
        'smtp_pass'=>"dentistwar",
        'smtp_port' =>  '465'
        );
        $this->load->library("email", $configs);
        $this->email->set_mailtype("html");
        $this->email->set_newline("\r\n");
        $this->email->to($correo_persona);
        $this->email->from("dentistware@gmail.com", "Dentistware");
        $asunto = "Asignación de cita para el " . $string . " " . $hora;
        $this->email->subject($asunto);
        $this->email->message($mensaje);
            if($this->email->send())
                {
            //echo "Correo enviado!"; 
                echo $this->cita_model->agendar_cita($id_cita, $data);
                }
            else
                {
            echo 3;
        //echo $this->email->print_debugger();    
                }
        
		}		
	}

    public function informacion_odontologo($id = ''){
		$id = rawurldecode($id);
        $this->load->model('persona_model');
        $this->data['persona'] = $this->persona_model->get_odontologo($id);
        $this->load->view('cliente/informacion_odontologo_view', $this->data); 
  	}    
}