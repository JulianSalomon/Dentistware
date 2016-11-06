<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
    <head>
		<title><?php echo $page_title_start . $page_title_end; ?></title>
        <link rel="shortcut icon" type="image/png" href="<?php echo base_url('assets/img/logo.png')?>"/>
        <?php
	    	echo meta('X-UA-Compatible', 'IE=edge', 'equiv');
	    	echo meta('', 'text/html; charset=utf-8');
			echo meta('viewport', 'width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no');
			
			echo plugin_css('font-awesome');
			echo plugin_css('icons');
			echo plugin_css('bootstrap');
			echo plugin_css('adminLTE');
			echo plugin_css('skins');
            echo plugin_css('datatables');
			echo plugin_css('pace');
            echo plugin_css('datepicker3');
            echo plugin_css('sweetalert');
              echo plugin_css('timepicker');
			
			echo $before_closing_head; ?>
	</head>
	<body class="hold-transition skin-blue-light sidebar-mini">
		<div class="wrapper">
