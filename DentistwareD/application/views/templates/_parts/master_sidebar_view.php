<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
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
            </div>
            <div class="pull-left info">
            	<p>
            		<?php 
 		                $nombre = explode(" ", $user_info['nombre_completo']);
                        echo $nombre[0];
                        if($length = count($nombre) > 1){
                            $pos = ceil($length/2);
                            echo " " . $nombre[$pos];
                        }
                        echo br(1);
                        echo '<small>';                      
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
                        echo '</small>';
                	?>
                </p>
            </div>
        </div>
        <ul class="sidebar-menu">
            <li class="header">MENÚ PRINCIPAL</li>
            <?php echo $menu_usuario; ?>
        </ul>
    </section>
</aside>