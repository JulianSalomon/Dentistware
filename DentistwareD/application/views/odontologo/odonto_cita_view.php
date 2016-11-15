<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Citas pendientes
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                    	<h4>A continuación se muestran sus citas del día:</h4>
                    </div>
                    <div class="box-body">
                        <?php 
                            $data_input = array(
                                    'id' => "edit_cliente_form",
                            );        
                            echo form_open('odontologo/Cita/filtrar', $data_input);
                            
                            $fecha = $this->session->userdata('fecha');                            
                            $fecha = str_replace("-", "/", $fecha);
                            
                           	$hora = $this->session->userdata('hora');
                            $odontologo = $this->session->userdata('odontologo');
                            
                        ?>
                        <div class="row">
                        	<div class="col-lg-2"></div>
							
                           	<div class="col-lg-4 form-group">
                            	<div class="bootstrap-timepicker">
									<label>Filtrar por hora:</label>
                              		<div class="input-group">
                                  		<span class="input-group-addon"><i class="fa fa-clock-o fa-fw"></i></span>
                                		<input type="text" class="form-control timepicker" id="inputHora" placeholder="HH:MM AM" name= "inputHora" value="<?php echo $hora;?>">
                              		</div>
                             	</div>
                         	</div>
                        </div>                        
                       
						<div class="form-group text-center">
						<?php
							$data_input = array(
									'class' => "btn btn-primary",
									'id' => "consultar",
									'name' => "consultar",
									'value' => "Consultar",
							);
							echo form_submit($data_input);
						?>
						</div>
						<?php
		                  	echo form_close();
		             		echo '<hr>';
                        if($citas != NULL){
                    	?>
                    	<h4>Citas disponibles:</h4>
                        <div class="table-responsive">
                            <table id="tabla_cita" type='tabla' class="table table-bordered table-hover tabla-citas">
                                <thead>
                                    <tr>
                                    	<th>Acción</th>
                                        <th>Cliente</th>
                                        <th>Fecha</th>
                                        <th>Hora</th>
                                        <th>Consultorio</th>                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
										foreach ($citas as  $cita){
                                            echo '<tr>';
                                            echo '<td class="text-center">';
                                            echo '<div align="center">
	                        						<a type="button" cita="' . $cita->id_cita . '" cliente="' . ucwords($cita->cliente) . '" class="no-asistir-btn btn" id="no_asistir" data-toggle="tooltip"  title="No asistió">
		                    							<i class="fa fa-eye-slash fa-3x"></i>
	                    							</a>
                                                    <a type="button" cita="' . $cita->id_cita . '" cliente="' . ucwords($cita->cliente) . '" id="' . $cita->id . '" class="atender-btn btn" id="atender-cita" data-toggle="tooltip"  title="Atender cita">
		                    							<i class="fa fa-sign-in fa-3x"></i>
	                    							</a>
                    							</div>';
                                            echo '</td>';
                                             echo '<td>';
                                            echo ucwords($cita->cliente);
                                             echo '</td>';
                                            echo '<td>';
                                            echo ucwords($cita->fecha);
                                            echo '</td>';
                                            echo '<td>';
                                            $hora_cita = $cita->hora;
                                            $hora_cita = strtotime($hora_cita);
                                            $hora_cita = date("g:i a", $hora_cita);
                                            echo strtoupper($hora_cita);
                                            echo '</td>';
                                            echo '<td>';
                                            echo ucwords($cita->consultorio);
                                            echo '</td>';                                                 
                                            echo '</tr>';   
                                        }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                    	<th>Acción</th>
                                        <th>Cliente</th>
                                     	<th>Fecha</th>
                                        <th>Hora</th>
                                        <th>Consultorio</th>                                          
                                    </tr>
                                </tfoot>                                
                            </table>                         
                        </div>
	                    <?php 
		                    } else {		                    	
		                    	echo br(1);
			                	echo '<div class="form-group text-center">
										<i id="logo_i" class="fa fa-frown-o fa-5x"></i>';
			                   	echo heading('No hay citas disponibles.<br>Por favor intente con otras opciones.', 3, 'class="text-muted"');
			                   	echo '</div>';		                    	
		                    }                    	
	                    ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php 
    $path = "odontologo/Cita/";
    $path2 = "odontologo/Historia_clinica/";
    echo '<script>
            var js_site_url = "'. site_url($path) . '";
            var js_site_url2 = "'. site_url($path2) . '";
          </script>';
?>