<?php
$config['menu_CLT'] = array(
		'inicio' => array(
				'id' => 'main-home',
				'title' => '<span>Inicio</span>',
				'link' => '',
				'icon' => 'fa fa-home',
		),
		'citas' => array(
				'id' => 'main-citas',
				'title' => '<span>Citas</span>',
				'link' => '',
				'icon' => 'fa fa-list',
				'items' => array(
						0 => array(
								'title' => 'Agregar nueva cita',
								'link' => '',
								'id' => 'citas-agendar',
						),
						1 => array(
								'title' => 'Citas agendadas',
								'link' => '',
								'id' => 'citas-agendadas',
						),
				)
		),
		'multas' => array(
				'id' => 'main-multas',
				'title' => '<span>Multas</span>',
				'link' => '',
				'icon' => 'fa fa-file-text-o',
		),
		'notificaciones' => array(
				'id' => 'main-notificaciones',
				'title' => '<span>Notificaciones</span>',
				'link' => '',
				'icon' => 'fa fa-search',
		),
		'logout' => array(
				'id' => 'main-logout',
				'title' => '<span class="nav-label">Cerrar Sesión</span>',
				'link' => 'Login/logout',
				'icon' => 'fa fa-sign-out',
		),
);

$config['menu_ADM'] = array(
		'inicio' => array(
				'id' => 'main-home',
				'title' => '<span>Inicio</span>',
				'link' => '',
				'icon' => 'fa fa-home',
		),
		'perfil' => array(
				'id' => 'main-perfil',
				'title' => '<span>Perfil</span>',
				'link' => '',
				'icon' => 'fa fa-user',
		),
		'cliente' => array(
				'id' => 'main-cliente',
				'title' => '<span>Cliente</span>',
				'link' => '',
				'icon' => 'fa fa-user',
		),
		'empleado' => array(
				'id' => 'main-empleado',
				'title' => '<span>Empleado</span>',
				'link' => '',
				'icon' => 'fa fa-user',
		),
		'odontologo' => array(
				'id' => 'main-odontologo',
				'title' => '<span>Odontologo</span>',
				'link' => '',
				'icon' => 'fa fa-user',
		),
		'logout' => array(
				'id' => 'main-logout',
				'title' => '<span class="nav-label">Cerrar Sesión</span>',
				'link' => 'Login/logout',
				'icon' => 'fa fa-sign-out',
		),
);

$config['menu_ODO'] = array(
		'inicio' => array(
				'id' => 'main-home',
				'title' => '<span>Inicio</span>',
				'link' => '',
				'icon' => 'fa fa-home',
		),
		'perfil' => array(
				'id' => 'main-perfil',
				'title' => '<span>Perfil</span>',
				'link' => '',
				'icon' => 'fa fa-user',
		),
		'cliente' => array(
				'id' => 'main-cliente',
				'title' => '<span>Cliente</span>',
				'link' => '',
				'icon' => 'fa fa-book',
                'items' => array(
                    0 => array(
								'title' => 'Informacion Cliente',
								'link' => '',
								'id' => 'citas-agendar',
						),
						1 => array(
								'title' => 'Historia Cliente',
								'link' => '',
								'id' => 'citas-agendadas',
						),
                
                ),
		),
		'logout' => array(
				'id' => 'main-logout',
				'title' => '<span class="nav-label">Cerrar Sesión</span>',
				'link' => 'Login/logout',
				'icon' => 'fa fa-sign-out',
		),
);