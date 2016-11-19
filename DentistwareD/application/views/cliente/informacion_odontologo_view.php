<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
    <head>
		<title>Dentistware | Información odontólogo</title>
        <link rel="shortcut icon" type="image/png" href="<?php echo base_url('assets/img/logo.png')?>"/>
        <?php
	    	echo meta('X-UA-Compatible', 'IE=edge', 'equiv');
	    	echo meta('', 'text/html; charset=utf-8');
			echo meta('viewport', 'width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no');
			
			echo plugin_css('font-awesome');
			echo plugin_css('icons');
			echo plugin_css('bootstrap');
			echo plugin_css('adminLTE');
			echo plugin_css('skin');
			echo plugin_css('pace');			
		?>
	</head>
	<body class="hold-transition skin-blue-light sidebar-mini">		           
		<button type="button" class="btn btn-block btn-primary btn-lg"  onclick="window.open('', '_self', ''); window.close();">         
        	<b>DENTIST</b>WARE
       	</button>         
	    <section class="content">
	        <div class="row">
	            <div class="col-xs-12">
	                <div class="box box-primary">
	                	<div class="box-header with-border">
	                		<?php echo heading(ucwords($persona->nombre_persona), 3); ?>
	                	</div>
	                	<div class="box-body">
	                 		<div class="col-xs-12 text-center">
							<?php																	
								if($persona->foto_persona){
									echo '<img id="foto_img" class="center-block" height="200" width="200" src="'.base_url() . "uploads/" . $route . '/'  . $persona->foto_persona . '">';										
								} else {
									echo '<img id="foto_img" class="center-block" height="200" width="200" src="' . base_url("assets/img/foto-default.png") . '">';
								}
								
                                echo heading('Información Académica', 3);
							?>
							</div>                 
                            <div class="text-align:center;">								
								<p><?php echo $persona->estudios_odont; ?></p>
                            </div>	                                                                                                                                                                  
	                    </div>                                     
	                </div>						   
	            </div>
	        </div>
	    </section>
		<?php 
			echo plugin_js();
			echo plugin_js('bootstrap');
			echo plugin_js('fastclick');
			echo plugin_js('app');
			echo plugin_js('pace');
	        echo $before_closing_body;
		?>
	</body>
</html>

