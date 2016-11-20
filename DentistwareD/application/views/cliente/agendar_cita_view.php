<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Agendar citas
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                    	<h4>A continuación puede buscar las citas disponibles que podrá agendar:</h4>
                    </div>
                    <div class="box-body">
						<?php
		                  	echo form_close();
		             		echo '<hr>';
	                        if($cantidadDeMultas > 0){
				                echo '<div class="form-group text-center">
										<i id="logo_i" class="fa fa-warning fa-5x"></i>';
								echo heading('Usted tiene multas pendientes.<br>Por favor paguelas para poder agendar una cita.', 3, 'class="text-muted"');
				                echo '</div>';	
	                        } else if($cantidadDeCitas >= 3) { 	                        	
			                	echo '<div class="form-group text-center">
										<i id="logo_i" class="fa fa-frown-o fa-5x"></i>';
			                   	echo heading('Usted ya tiene tres citas asignadas.<br>Podrá agendar más citas cuando tenga menos de tres citas activas.', 3, 'class="text-muted"');
			                   	echo '</div>';	
                        	} else {
                    	?>
                        <?php 
                            $data_input = array(
                                'id' => "edit_cliente_form",
                            );        
                            echo form_open('paciente/AgendarCita/', $data_input);
                            
                            $fecha = $this->session->userdata('fecha');                            
                            $fecha = str_replace("-", "/", $fecha);
                            
                           	$hora = $this->session->userdata('hora');
                            $odontologo = $this->session->userdata('odontologo');
                            
                        ?>
                        <div class="row">
                        	<div class="col-lg-2"></div>
							<div class="col-lg-4 form-group">
                            	<label class="control-label">Filtrar por fecha: </label>
                                <div class="input-group" id="div_inputFecha">
                                	<span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
                                    <input type="text" class="form-control date-select" id="inputFecha" placeholder="YYYY/MM/DD" name="inputFecha" value="<?php echo $fecha;?>">
                               	</div>
                          	</div>
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
                        <div class="row"> 
                        	<div class="col-lg-2"></div>
                        	<div class="col-lg-8 form-group">
                    			<label  class="control-label">Seleccione un Odontólogo:</label>
                        		<div class="input-group" id="div_selectOdontologo">
                        			<span class="input-group-addon"><i class="fa fa-user-md"></i></span>
		                    		<?php
						                $data_input = array(
						                		'id' => 'inputOdontologo',
						                		'class' => 'form-control',
						                );
						                echo form_dropdown('inputOdontologo', $odontologos, $odontologo, $data_input);
	                        		?>
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
                            if($citas != NULL) {
                        ?>
                    	<h4>Citas disponibles:</h4>
                        <div class="table-responsive">
                            <table id="tabla_cita" class="table table-bordered table-hover tabla-citas">
                                <thead>
                                    <tr>
                                    	<th>Opción</th>
                                        <th>Fecha</th>
                                        <th>Hora</th>
                                        <th>Odontólogo</th>
                                        <th>Consultorio</th>                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
										foreach ($citas as  $cita){
                                            echo '<tr>';
                                            echo '<td class="text-center">';
                                            echo '<div align="center">
	                        						<a type="button" cita="' . $cita->id_cita . '" odonto="' . ucwords($cita->odontologo) . '" class="asignar-btn btn" id="delete_persona" data-toggle="tooltip"  title="Agendar Cita">
		                    							<i class="fa fa-fw fa-plus-square fa-3x"></i>
	                    							</a>
                    							</div>';
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
                                            echo '<a type="button"  odonto="' . ($cita->odontologo) . '"  class="informacion-btn btn" id="informacion_odonto"  title="Informacion odontologo" >' . ucwords($cita->odontologo) .  '</a>';
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
                                    	<th>Opción</th>
                                     	<th>Fecha</th>
                                        <th>Hora</th>
                                        <th>Odontólogo</th>
                                        <th>Consultorio</th>                                          
                                    </tr>
                                </tfoot>                                
                            </table>                         
                        </div>
	                    <?php 
		                    } else {
                                echo br(2);
			                	echo '<div class="form-group text-center">
										<i id="logo_i" class="fa fa-frown-o fa-5x"></i>';
			                   	echo heading('No hay citas disponibles.<br>Por favor intente con otras opciones de busqueda.', 3, 'class="text-muted"');
			                   	echo '</div>';		                    	
		                    }
                        }                    	
	                    ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php 
    $path = "paciente/AgendarCita/";
    echo '<script>
            var js_site_url = "'. site_url($path) . '";
          </script>';
?>
