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
                		$url = 'assets/img/avatar.png';
                		/*
                		if($user_info['foto'] != NULL){
                			$url = 'uploads/funcionario/' . $user_info['foto'];
                		} else {
                			$url = 'assets/images/foto-default.png';
                		}*/
                		$data_input = array(
                				'id' => '',
                				'class' => 'user-image',
                				'src' => base_url($url),
                		);
                		echo img($data_input);                		                		
                		?>
	                  	<span class="hidden-xs">Sinca ries<?php //echo $user_info['nombre_completo'];?></span>
	                	</a>
	                	<ul class="dropdown-menu">
	                  		<li class="user-header">
		                  		<?php 
			                  		$url = 'assets/img/avatar.png';
			                  		/*
			                  		if($user_info['foto'] != NULL){
			                  			$url = 'uploads/funcionario/' . $user_info['foto'];
			                  		} else {
			                  			$url = 'assets/images/foto-default.png';
			                  		}*/
			                  		$data_input = array(
			                  				'id' => '',
			                  				'class' => 'img-circle',
			                  				'src' => base_url($url),
			                  		);
			                  		echo img($data_input);	
		                  		?>
			                    <p>
			                    	Sinca ries
			                      <?php //echo $user_info['nombre_completo'];?>
			                    </p>
	                  		</li>
	                  		<li class="user-footer">
			                    <div class="pull-left">
			                    <?php echo anchor('#', 'Perfil', 'class="btn btn-default btn-flat"');?>
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