<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
    <head>
    	<title>Dentistware | Login</title>
	    <?php
	    	echo meta('X-UA-Compatible', 'IE=edge', 'equiv');
	    	echo meta('', 'text/html; charset=utf-8');
			echo meta('viewport', 'width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no');
			
			echo plugin_css('font-awesome');
			echo plugin_css('icons');
			echo plugin_css('bootstrap');
			echo plugin_css('adminLTE');
			echo plugin_css('skins');
			echo plugin_css('icheck');
	    ?>
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-box-body">
            	<?php             
            	$data_input = array(
            			'src' => base_url() . 'assets/img/avatar.png',
            			'class' => 'img-responsive img-circle',
            			'style' => 'margin:0 auto',
            	);            	
            	echo anchor('http://projectengeneer.wixsite.com/dentistware', img($data_input), array('target' => '_blank', 'class' => 'margin'));

                if ($error) {
                    echo '<p class="alert alert-error text-center">' . $error . '</p>';
                }                
                echo br(1);                
                echo form_open(); 
                ?>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <?php
                    $data_input = array(
                        'type' => "text",
                        'class' => "form-control",
                        'placeholder' => "Documento",
                        'name' => "documento",
                    	'value' => set_value('documento'),
                    );
                    echo form_input($data_input);
                    ?>
                </div>
                <?php 
                echo br(1);
                echo form_error('documento', '<p class="alert alert-warning">','</p>'); 
                ?>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <?php
                    $data_input = array(
                        'type' => "password",
                        'class' => "form-control",
                        'placeholder' => "Contraseña",
                        'name' => "password",
                    );
                    echo form_input($data_input);
                    ?>            
                </div>
                <?php 
                echo br(1);                
                echo form_error('password', '<p class="alert alert-warning">','</p>'); 
                ?>
                <div class="row text-center">
                    <div class="col-xs-8">
                        <div class="checkbox icheck pull-left">
                       	<?php 
                       	$data_input = array(
                       			'type' => "checkbox",
                       			'name' => "recordame_check",
                       			'id' => 'recordame_check',
                       	);                       	                       	
                       	echo form_label(form_input($data_input) . 'Recordarme')                       	
                       	?>
                        </div>
                    </div>
                    <div class="social-auth-links text-center col-xs-12">
                        <?php
                        $data_input = array(
                            'type' => "submit",
                            'class' => "btn btn-block btn-primary",
                            'value' => "Ingresar",
                            'name' => "ingresar"
                        );
                        echo form_input($data_input);
                        ?>
                    </div>
                </div>
                <?php echo form_close() ?>
                <div class="m-t text-center">
                    <strong>&COPY; 
                    	<?php
                    	echo date('Y'); 
                    	echo anchor(base_url(), ' Dentistware');

                    	?>
                    </strong>
                </div>
            </div>
        </div>
        <?php 
        echo plugin_js();
        echo plugin_js('bootstrap');
        echo plugin_js('icheck');
        
        ?>
        <script>
            $(function () {
                $('#recordame_check').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                });
            });
        </script>
    </body>
</html>