<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	?>
<!DOCTYPE html>
<html>
	<header class="main-header">
		<title><?php echo $page_title_start . $page_title_end; ?></title>
		<link rel="shortcut icon" type="image/png" href="<?php echo base_url('assets/img/logo.png')?>"/>
		<?php
			echo meta('X-UA-Compatible', 'IE=edge', 'equiv');
			echo meta('', 'text/html; charset=utf-8');
			echo meta('viewport', 'width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no');
			
			echo plugin_css('skin');
			echo plugin_css('bootstrap');
			echo plugin_css('adminLTE');
            echo plugin_css('font-awesome');
        ?>
		<a href="<?php echo base_url()?>" class="logo">
		<span class="logo-mini"><b>D</b>W</span>
		<span class="logo-lg"><b>DENTIST</b>WARE</span>
		</a>
		<nav class="navbar navbar-static-top" role="navigation">
			<div class="navbar-custom-menu">
				<ul class="nav navbar-nav">
					<li class="dropdown user user-menu">
						<a href="" class="dropdown-toggle" data-toggle="dropdown">
						<?php                 		
							if($user_info['foto_persona'] != NULL){
							    $url = 'uploads/' . $user_info['foto_persona'];
							} else {
							    $url = 'assets/img/foto-default.png';
							}                
							$data_input = array(
							        'id' => '',
							        'class' => 'user-image',
							        'src' => base_url($url),
							);
							echo img($data_input);                		                		
							?>
						<span class="hidden-xs"><?php echo ucwords($user_info['nombre_completo']);?></span>
						</a>
						<ul class="dropdown-menu">
							<li class="user-header">
								<?php 
									if($user_info['foto_persona'] != NULL){
									    $url = 'uploads/' . $user_info['foto_persona'];
									} else {
									    $url = 'assets/img/foto-default.png';
									}    
									$data_input = array(
									'id' => '',
									'class' => 'img-circle',
									'src' => base_url($url),
									);
									echo img($data_input);	
									?>
								<p>
									<span><?php echo ucwords($user_info['nombre_completo']);?></span>
									<br>
									<span>
									<small>
									<?php 
										switch ($user_info['tipo_persona']) {
										case "ADM" :
										    echo 'Administrador';
										    break;
										case "CLT" :
										    echo 'Cliente';
										    break;
										case "ODO" :
										    echo 'Odontólogo';
										    break;
										case "EMP" :
										    echo 'Empleado';
										    break;
										}
										?>
									</small>
									</span>
								</p>
							</li>
							<li class="user-footer">
								<div class="pull-left">
									<?php echo anchor('Perfil', 'Perfil', 'class="btn btn-default btn-flat"');?>
								</div>
								<div class="pull-right">
									<?php echo anchor('Login/logout', 'Cerrar sesión', 'class="btn btn-danger btn-flat"');?>
								</div>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</nav>
	</header>
	<body class="hold-transition skin-blue-light">
		<div class="wrapper">
				<section class="content-header">
					<h1>
						Odontodiagrama
					</h1>
				</section>
				<section class="content">
					<div class="row">
						<div class="col-xs-12">
							<div class="box">
									<div class="box-body">
										<div class="col-xs-8 text-right" id="teeth-diagram">
										</div>
                                        <div class="col-xs-4 text-right">
                                            <h4>Convenciones</h4>
                                            <form id="choose-stateType" action="submit">
                                                <input type="radio" name="state" value="A" checked> Ausente &emsp;&emsp;<i class="fa fa-times" id="i_refresh" ></i><br>
                                                <input type="radio" name="state" value="E"> Extraer &emsp;&emsp;&nbsp;&nbsp;&nbsp;=<i class="fa " id="i_refresh"></i><br>
                                                <input type="radio" name="state" value="D"> Caries  &emsp;&emsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-circle" style="color:blue" id="i_refresh"></i><br>
                                                <input type="radio" name="state" value="O"> Obturación &nbsp;&nbsp;&nbsp;<i class="fa fa-circle" style="color:red" id="i_refresh"></i><br>
                                                <input type="radio" name="state" value="C"> Corona &emsp;&emsp;&nbsp;<i class="fa fa-circle-o" id="i_refresh"></i><br>
                                                <input type="radio" name="state" value="T"> Tramo &emsp;&emsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-minus" id="i_refresh"></i><br>
                                            </form>
                                        </div>
									</div>
                                    <div class="box-footer">
                                        <button id="cancel_diente" type="button" data-dismiss="modal" class="btn btn-danger pull-left">Cancelar</button>
                                        <input id="agregar_diente" type="submit" name="submit_reg" class="btn btn-info pull-right" value="Guardar">
                                </div>
							</div>
						</div>
					</div>
				</section>
				<!-- /.content -->
			
			<footer class="main-footer">
				<div class="form-group">
					<div class="text-center">
						<strong>&COPY; 
						<?php
							echo date('Y'); 
							echo anchor(base_url(), '    Dentistware.', 'target="_blank"');
							?>
						</strong>
					</div>
					<div class="text-center">
						<?php 
							$anchor = array(
									'target' => '_blank',
									'style' => 'color: #3B5998; margin-left: 4px;',
							);
				        ?>
					</div>
				</div>
			</footer>
		</div>
		<?php         
			echo plugin_js('jquery');
			echo plugin_js('bootstrap');
			echo plugin_js('p5');
            echo plugin_js('teeth-drawer');
            echo plugin_js('assets/js/dentistware/diente.js', true);
        ?>
        <script>
        <?php
            echo 'var js_site_url = "'. site_url() . '";
        var teeth = [';
            if($dientes != NULL){
                foreach($dientes as $diente){
                echo "[". $diente->aus . "," 
                        . $diente->ext . "," 
                        . $diente->car . "," 
                        . $diente->obt . "," 
                        . $diente->cor . "," 
                        . $diente->tra . "]," ;
                }
            }
            echo '];';
        ?>
        </script>
      
	</body>
</html>