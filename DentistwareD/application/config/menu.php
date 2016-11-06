<?php
$config['menu_CLT'] = array(
		'inicio' => array(
				'id' => 'main-home',
				'title' => '<span>Inicio</span>',
				'link' => base_url('Cliente'),
				'icon' => 'fa fa-home',
		),
        'perfil' => array(
				'id' => 'main-perfil',
				'title' => '<span>Perfil</span>',
				'link' => base_url('Perfil'),
				'icon' => 'fa fa-user',
		),
		'citas' => array(
				'id' => 'main-citas',
				'title' => '<span>Citas</span>',
				'link' => '',
				'icon' => 'fa fa-calendar',
				'items' => array(
						0 => array(
								'title' => 'Agregar nueva cita',
								'link' => base_url('paciente/AgendarCita'),
								'id' => 'citas-agendar',
						),
						1 => array(
								'title' => 'Citas agendadas',
								'link' => base_url('paciente/VerCita'),
								'id' => 'citas-agendadas',
						),
				)
		),
		'multas' => array(
				'id' => 'main-multas',
				'title' => '<span>Multas</span>',
				'link' => base_url('paciente/Multa'),
				'icon' => 'fa fa-list',
		),
		'logout' => array(
				'id' => 'main-logout',
				'title' => '<span class="nav-label">Cerrar sesión</span>',
				'link' => base_url('Login/logout'),
				'icon' => 'fa fa-sign-out',
		),
);

$config['menu_ADM'] = array(
		'inicio' => array(
				'id' => 'main-home',
				'title' => '<span>Inicio</span>',
				'link' => base_url('Admin'),
				'icon' => 'fa fa-home',
		),
		'perfil' => array(
				'id' => 'main-perfil',
				'title' => '<span>Perfil</span>',
				'link' => base_url('Perfil'),
				'icon' => 'fa fa-user',
		),
        'administrador' => array(
				'id' => 'main-administrador',
				'title' => '<span>Administrador</span>',
				'link' => base_url('administrador/Admin'),
				'icon' => 'fa fa-user',
		),
		'cliente' => array(
				'id' => 'main-cliente',
				'title' => '<span>Cliente</span>',
				'link' => base_url('administrador/Cliente') ,
				'icon' => 'fa fa-user',
		),
		'empleado' => array(
				'id' => 'main-empleado',
				'title' => '<span>Empleado</span>',
				'link' => base_url('administrador/Empleado'),
				'icon' => 'fa fa-user',
		),
		'odontologo' => array(
				'id' => 'main-odontologo',
				'title' => '<span>Odontólogo</span>',
				'link' => base_url('administrador/Odontologo'),
				'icon' => 'fa fa-user-md',
		),
		'logout' => array(
				'id' => 'main-logout',
				'title' => '<span class="nav-label">Cerrar sesión</span>',
				'link' => base_url('Login/logout'),
				'icon' => 'fa fa-sign-out',
		),
);

$config['menu_ODO'] = array(
		'inicio' => array(
				'id' => 'main-home',
				'title' => '<span>Inicio</span>',
				'link' => base_url('Odonto'),
				'icon' => 'fa fa-home',
		),
		'perfil' => array(
				'id' => 'main-perfil',
				'title' => '<span>Perfil</span>',
				'link' => base_url('Perfil'),
				'icon' => 'fa fa-user',
		),
		'cliente' => array(
				'id' => 'main-cliente',
				'title' => '<span>Cliente</span>',
				'link' => '',
				'icon' => 'fa fa-book',
                'items' => array(
                    0 => array(
                                'id' => 'Informacion_Cliente',
								'title' => 'Información cliente',
								'link' => base_url('odontologo/Cliente_inf') ,
								'id' => 'citas-agendar',
						),
						1 => array(
                                'id' => 'Historia_Cliente',
								'title' => 'Historia cliente',
								'link' => base_url('odontologo/Historia_clinica'),
								'id' => 'citas-agendadas',
						),
                
                ),
		),
		'logout' => array(
				'id' => 'main-logout',
				'title' => '<span class="nav-label">Cerrar sesión</span>',
				'link' => base_url('Login/logout'),
				'icon' => 'fa fa-sign-out',
		),
);

$config['menu_EMP'] = array(
		'inicio' => array(
				'id' => 'main-home',
				'title' => '<span>Inicio</span>',
				'link' => base_url('Empl'),
				'icon' => 'fa fa-home',
		),
		'perfil' => array(
				'id' => 'main-perfil',
				'title' => '<span>Perfil</span>',
				'link' => base_url('Perfil'),
				'icon' => 'fa fa-user',
		),
		'cliente' => array(
				'id' => 'main-cliente',
				'title' => '<span>Empleado</span>',
				'link' => '',
				'icon' => 'fa fa-book',
                'items' => array(
                    0 => array(
                                'id' => 'Informacion_Empleado',
								'title' => 'Informacion Empleado',
								'link' => '' ,
								'id' => 'citas-agendar',
						),
						1 => array(
                                'id' => 'Historia_Empleado',
								'title' => 'Historia Empleado',
								'link' => '' ,
								'id' => 'citas-agendadas',
						),                
                ),
		),
		'logout' => array(
				'id' => 'main-logout',
				'title' => '<span class="nav-label">Cerrar Sesión</span>',
				'link' => base_url('Login/logout'),
				'icon' => 'fa fa-sign-out',
		),
);