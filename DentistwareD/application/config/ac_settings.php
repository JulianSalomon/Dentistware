<?php

// $config['upload_marca_folder'] = 'uploads/marca/';
$config['upload_admin_folder'] = 'uploads/admin/';

$pag = array();
$pag["full_tag_open"] = '<ul class="pagination">';
$pag["full_tag_close"] = '</ul>';
$pag["first_link"] = "&laquo;";
$pag["first_tag_open"] = "<li>";
$pag["first_tag_close"] = "</li>";
$pag["last_link"] = "&raquo;";
$pag["last_tag_open"] = "<li>";
$pag["last_tag_close"] = "</li>";
$pag['next_link'] = 'Siguiente';
$pag['next_tag_open'] = '<li>';
$pag['next_tag_close'] = '<li>';
$pag['prev_link'] = 'Anterior';
$pag['prev_tag_open'] = '<li>';
$pag['prev_tag_close'] = '<li>';
$pag['cur_tag_open'] = '<li class="active"><a href="#">';
$pag['cur_tag_close'] = '<span class="sr-only"></span></a></li>';
$pag['num_tag_open'] = '<li>';
$pag['num_tag_close'] = '</li>';
$pag["num_links"] = 5;
$config['config_paginator'] = $pag;