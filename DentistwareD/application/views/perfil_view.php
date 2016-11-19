<div class="content-wrapper">
    <section class="content-header">
        <h1>Perfil</h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                	<div class="box-body">
                 		<div class="col-xs-12 text-center ">
							<?php							
								$tipo = $persona->tipo_persona;
								$route = '';
								switch ($tipo) {
									case "ADM":
										$route = 'admin';
										break;
									case "CLT":
										$route = 'cliente';
										break;
									case "ODO":
										$route = 'odonto';
										break;
									case "EMP":
										$route = 'empleado';
										break;
								}
								if($persona->foto_persona){
									echo '<img id="foto_img" class="center-block" height="200" src="'.base_url() . "uploads/" . $route . '/'  . $persona->foto_persona . '">';										
								} else {
									echo '<img id="foto_img" class="center-block" height="200" width="200" src="' . base_url("assets/img/foto-default.png") . '">';
								}
								
                                echo heading('Información Personal', 3);
							?>
						</div>                 
                            <div class="text-align:center;">
                               <table style="width:60" align="center">
                             	<?php
                                   echo "<tr>";
                                   echo "<th class= text-right style= width:45% >Nombre(s) y Apellidos:</th>";
                                   echo "<td style= width:10% > </td>";
                                   echo "<td style= width:45% > " . ucwords($persona->nombre_persona) . "</td>";
                                   echo "</tr>";

                                  echo "<tr>";
                                  echo "<th class= text-right style= width:45% >Documento:</td>";
                                  echo "<td style= width:10% > </td>";
                                  echo "<td style= width:45% > " . $persona->tipo_documento . '. &nbsp' . $persona->documento_persona . " </td>";
                                  echo "</tr>";
                                  
                                  echo "<tr>";
                                  echo "<th class= text-right style= width:45% >Telefono:</th>";
                                  echo "<td style= width:10% > </td>";
                                  echo "<td style= width:45% > " . $persona->telefono_persona . "</td>";
                                  echo "</tr>";
                                  
                                  echo "<tr>";
                                  echo "<th class= text-right style= width:45% >Ubicación:</th>";
                                  echo "<td style= width:10% > </td>";
                                  echo "<td style= width:45% > " . ucwords(strtolower($persona->direccion_persona)) . "</td>";
                                  echo "</tr>";
                                  
                                  echo "<tr>";
                                  echo "<th class= text-right style= width:45% >Ciudad:</th>";
                                  echo "<td style= width:10% > </td>";
                                  echo "<td style= width:45% > " . ucfirst(mb_strtolower($persona->nombre_ciudad, 'UTF-8')) . " - " . ucfirst(mb_strtolower($persona->nombre_dept, 'UTF-8')) . "</td>";
                                  echo "</tr>";
                                  
                                  echo "<tr>";
                                  echo "<th class= text-right style= width:45% >Fecha de Nacimiento:</th>";
                                  echo "<td style= width:10% > </td>";
                                  echo "<td style= width:45% > " . $persona->fecha_nacimiento . "</td>";
                                  echo "</tr>";
                                  
                                  echo "<tr>";
                                  echo "<th class= text-right style= width:45% >Edad:</td>";
                                  echo "<td style= width:10% > </td>";
                                  echo "<td style= width:45% > " . $persona->edad_persona .' '. 'Años' . "</td>";
                                  echo "</tr>";
                                  
                                  echo "<tr>";
                                  echo "<th class= text-right style= width:45% >Genero:</th>";
                                  echo "<td style= width:10% > </td>";
                                  
                                  if ($persona->genero_persona == 'M'){
                                  		echo "<td style= width:45% > Masculino</td>";
								  }else{
                                  		echo "<td style= width:45% > Femenino</td>";
                                  }
                                  echo "</tr>";
                                   
                                   if($persona->tipo_persona != 'ADM' && $persona->tipo_persona != 'EMP'){
	                                   	echo "<tr>";
	                                   	echo "<th class= text-right style= width:45% >Tipo de Sangre y RH:</th>";
	                                   	echo "<td style= width:10% > </td>";
	                                   	echo "<td style= width:45% > " . $persona->tipo_sangre_cliente . ' ' . $persona->rh_cliente . "</td>";
	                                   	echo "</tr>";
                                   }

                                   if($persona->tipo_persona == 'CLT'){
	                                   	echo "<tr>";
	                                   	echo "<th class= text-right style= width:45% >Eps:</th>";
	                                   	echo "<td style= width:10% > </td>";
	                                   	echo "<td style= width:45% > " . $persona->eps_persona . "</td>";
	                                   	echo "</tr>";
                                   }
                                   

                                   echo "<tr>";
                                   echo "<th class= text-right style= width:45% >E-mail:</th>";
                                   echo "<td style= width:10% > </td>";
                                   echo "<td> " . strtolower($persona->correo_persona) . "</td>";
                                   echo "</tr>";                                      
                                   
                                   
                                   if($persona->tipo_persona == 'CLT'){
                                       echo "<tr>";                                   
                                        echo "<th class= text-right style= width:45% >Nombre del Contacto:</th>";
                                          echo "<td style= width:10% > </td>";
                                          echo "<td style= width:45% > " . ucwords($persona->contacto_cliente) . "</td>";
                                      echo "</tr>";

                                        echo "<tr>";
                                        echo "<th class= text-right style= width:45% >Telefono del Contacto:</th>";
                                          echo "<td style= width:10% > </td>";
                                        echo "<td style= width:45% > " . $persona->telefono_contacto_cliente . "</td>";
                                      echo "</tr>";
                                    }
                                   
                                   if($persona->tipo_persona == 'ODO'){
                                       echo "<tr>";
                                            echo "<th class= text-right style= width:45% >Estudios:</th>";
                                              echo "<td style= width:10% > </td>";
                                            echo "<td style= width:45% > " . $persona->estudios_odont . "</td>";
                                          echo "</tr>";
                                    }
                                   ?>
                                </table>
                            </div>
                            <div class="col-xs-12 text-center"> 
                            	<br>                               
                            	<a href="<?php echo base_url("Perfil/edit_view/")?>" class="btn btn-primary"> Modificar Perfil</a>                                
                            </div>                                                                                                                                          
                    </div>                                     
                </div>						   
            </div>
        </div>
    </section>
</div>