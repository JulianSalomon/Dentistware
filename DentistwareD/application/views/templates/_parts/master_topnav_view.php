	<header class="main-header">
        <a href="<?php echo base_url()?>" class="logo">
        	<span class="logo-mini"><b>D</b>W</span>
          	<span class="logo-lg"><b>DENTIST</b>WARE</span>
        </a>
        <nav class="navbar navbar-static-top" role="navigation">
          	<a href="" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            	<span class="sr-only">Toggle navigation</span>
          	</a>
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
	                  	<span class="hidden-xs"><?php echo $user_info['nombre_completo'];?></span>
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
			                    	
                                    <span class="hidden-xs"><?php echo $user_info['nombre_completo'];?></span>
			                         <br>
                                    <span class="hidden-xs">
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
                                    </span>
			                    </p>
	                  		</li>
	                  		<li class="user-footer">
			                    <div class="pull-left">
			                    <?php echo anchor('', 'Perfil', 'class="btn btn-default btn-flat"');?>
			                    </div>	                      
			                    <div class="pull-right">
			                    <?php echo anchor('Login/logout', 'Cerrar Sesión', 'class="btn btn-danger btn-flat"');?>
			                    </div>
	                  		</li>
	                	</ul>
	              	</li>
            	</ul>
        	</div>
    	</nav>
	</header>