<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
	
class Agendar_Cita extends Empl_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->data['page_title_end'] = '| Agendar';
		$this->load->model('cita_model');
		$this->load->model('persona_model');
		$this->data['before_closing_body'] .= plugin_js('assets/js/dentistware/empl_agendar_cita.js', true);
		$this->get_user_menu('main-cliente', 'citas-agendar');
	}
	
	public function index(){
        $_SESSION['fecha'] = date("Y-m-d");
        $_SESSION['hora'] = '';
        $_SESSION['odontologo'] = -1;
        if($this->input->post()){
            $fecha = $this->input->post('inputFecha');
            $hora = $this->input->post('inputHora');
            $odontologo = $this->input->post('inputOdontologo');		

            $_SESSION['fecha'] = $fecha;
            $_SESSION['hora'] = $hora;
            $_SESSION['odontologo'] = $odontologo;		

            $fecha = str_replace("/", "-", $fecha);

            if($hora != ''){
                $hora = strtotime($hora);
                $hora = date("H:i:s", $hora);
            }            

            if($fecha == date("Y-m-d")){
                $_SESSION['fecha'] = date("Y-m-d");
                $this->data['citas'] = $this->cita_model->get_citas_today($hora, $odontologo);
            } else {
                $this->data['citas'] = $this->cita_model->get_citas($fecha, $hora, $odontologo);
            }
        } else {
            $this->data['citas'] = $this->cita_model->get_citas_today();
        }
        $odontos_array = array();
        $odontos_array['-1'] = '- Seleccione un Odontólogo -';
        $query = $this->persona_model->get_list_odontologos();
        foreach ($query as $arreglo) {
            $odontos_array[$arreglo->id_persona] = ucwords($arreglo->nombre);
        }
        $this->data['odontologos'] = $odontos_array;
		$this->render('empleado/empl_agendar_cita_view');
	}
	
	public function agendar_cita($id_cita, $doc_persona) {
		$persona = $this->persona_model->get_persona($doc_persona, '');
		
		if($persona){
			$data = array(
					"id_cliente" => $persona->id_persona,
			);
			$this->load->model('multa_model');
			
			$multas = $this->multa_model->get_multas_no_pagadas($persona->id_persona);
			
			$numMultas= 0;
			$numCitas = 0;
			if($multas){
				$numMultas = count($multas);
			}
			
			$citasActuales = $this->cita_model->get_citas_by_cliente($persona->id_persona);
			if($citasActuales){
				$numCitas = count($citasActuales);
			}
			
			$cita = $this->cita_model->get_cita($id_cita);
			
			$count = $this->cita_model->same_cita($persona->id_persona, '', $cita->fecha_cita, $cita->hora_cita);
			
			if($numMultas > 0){
				echo "Este cliente tiene multas por pagar, no puede agendarle citas.";
			} else if ($numCitas >= 3){
				echo "Este cliente ya tiene agendadas más de tres citas.";
			} else if($count){
				echo "Este cliente ya tiene asignada una cita en el mismo horario, por favor elija otra opción.";
			} else {
                            $odontologo = $this->persona_model->get_persona('', $cita->id_odonto);
                            $odontologo = $odontologo->nombre_persona;
                            $cliente = $this->persona_model->get_persona('', $persona->id_persona);
                            $correo_persona = $persona->correo_persona;
                            $cliente = $persona->nombre_persona;

                            setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish'); 
                            $string = $cita->fecha_cita;
                            $convertir = DateTime::createFromFormat("Y-m-d", $string);
                            $fecha = strftime("%A %d de %B %Y",$convertir->getTimestamp());
                            $hora = date('h:i a', strtotime($cita->hora_cita));
                            $consultorio = $cita->consultorio;
                            $mensaje_plano = "Su cita se ha asignado para el día " . $fecha . $correo_persona . " a las " . $hora . ". Recuerde que puede ingresar con su usuario al sistema para cancelar esta cita si esta no es en menos de cinco horas, si no asiste a la cita tendrá una multa de $10.000 COP. Para el día de su cita deberá llegar con una anterioridad de quince minutos. Enviado desde Dentistware.";
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
                                <h2> Asignación de cita en Dentistware: </h2>
                                <img src= 'https://raw.githubusercontent.com/NicolasRestrepoTorres/Dentistware/development/DentistwareD/assets/img/logo_grande2.png' height='350' width='350' >
                                <p>Apreciado ". ucwords($cliente) .": <br> <br> Su cita se ha asignado para el día <b> " . $fecha .", </b> con el odontólogo <b>". ucwords($odontologo) .   ", </b> a las <b>" . $hora . " </b>,en el consultorio <b>".$consultorio." </b>. <br> Recuerde que para cancelar la cita puede hacerlo con cinco horas de antelación, si no asiste a la cita tendrá una multa de $10.000 COP. Para el día de su cita deberá llegar con una anterioridad de quince minutos.
                                <br> <br> <br> <br> <br>
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
                                    echo $result = $this->cita_model->agendar_cita($id_cita, $data);
                                    }
                                else
                                    {
                                echo 3;
                               // echo $this->email->print_debugger();    
                                    }
				
			}
		} else {
			echo "El cliente no se encuentra registrado, por favor verifique el documento.";
		}
	}
}