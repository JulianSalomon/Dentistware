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
								'title' => 'Agendar cita',
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
		'citas' => array(
				'id' => 'main-citas',
				'title' => '<span>Citas</span>',
				'link' => base_url('odontologo/Cita'),
				'icon' => 'fa fa-calendar'
              
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
				'title' => '<span>Cliente</span>',
				'link' => '' ,
				'icon' => 'fa fa-user',
				'items' => array(
						0 => array(
								'title' => 'Administrar Clientes',
								'link' => base_url('empleado/Cliente'),
								'id' => 'admin-cliente',
						),						
						1 => array(
								'title' => 'Agendar Cita',
								'link' => base_url('empleado/Agendar_Cita'),
								'id' => 'citas-agendar',
						),				
				),
		),
		'cita' => array(
				'id' => 'main-cita',
				'title' => '<span>Cita</span>',
				'link' => '',
				'icon' => 'fa fa-calendar',
				'items' => array(
						0 => array(
								'title' => 'Crear Citas',
								'link' => base_url('empleado/Crear_Cita'),
								'id' => 'citas-crear',
						),
						1 => array(								
								'title' => 'Administrar Citas',
								'link' => base_url('empleado/Administrar_Cita'),
								'id' => 'citas-administrar',
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