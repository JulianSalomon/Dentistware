<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Administrar citas
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                    	<h4>A continuación puede buscar todas las citas:</h4>
                    </div>
                    <div class="box-body">
                        <?php 
                            $data_input = array(
                                    'id' => "edit_cliente_form",
                            );        
                            echo form_open('empleado/Administrar_Cita/', $data_input);
                            
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
		                  	echo form_close();
		             		echo '<hr>';
                        	if($citas != NULL){
                    	?>
                    	<h4>Citas encontradas:</h4>
                        <div class="table-responsive">
                            <table id="tabla_cita" class="table table-bordered table-hover tabla-citas">
                                <thead>
                                    <tr>                                    	
                                        <th>Fecha</th>
                                        <th>Hora</th>
                                        <th>Odontólogo</th>
                                        <th>Consultorio</th>
                                        <th>Opciones</th>                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
										foreach ($citas as  $cita){
                                            echo '<tr>';                                                                                        
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
                                            echo ucwords($cita->odontologo);
                                            echo '</td>';
                                            echo '<td>';
                                            echo ucwords($cita->consultorio);
                                            echo '</td>';
                                            echo '<td class="text-center">'; 
                                            
                                            $value = 0;
                                            if($cita->id_cliente){
                                            	$value = 1;
                                            }
                                            
                                            $data_input = array(
                                            		'type' => 'button',
                                            		'class' => 'editar-btn btn btn-default',
                                            		'data-toggle' => "modal",
                                            		'data-target' => "#modal_edit_cita",
                                            		'content' => '<i class="fa fa-pencil"></i>',
                                            		'data-id' => $cita->id_cita,
                                            		'data-hora' => strtoupper($hora_cita),
                                            		'data-fecha' => str_replace("-", "/", $cita->fecha),
                                            		'data-odonto' => $cita->id_odonto,
                                            		'data-cliente' => $value,
                                            		'data-consultorio' => $cita->consultorio,
                                            );                                           
                                            echo form_button($data_input);                                            
                                            $habilitar = '';
                                            if($cita->id_cliente){
                                            	$habilitar = 'disabled= "true"';
                                            }                                            
                                            echo '<button class="borrar-btn btn btn-default" type=button data-toggle="tooltip" title="Borrar cita" data-id="' . $cita->id_cita . '" ' . $habilitar . '>
                                                            <i class="fa fa-trash"></i>
                                                        </button>';
                                            echo '</td>';                                            
                                            echo '</tr>';   
                                        }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>                                    	
                                     	<th>Fecha</th>
                                        <th>Hora</th>
                                        <th>Odontólogo</th>
                                        <th>Consultorio</th>
                                        <th>Opciones</th>                                          
                                    </tr>
                                </tfoot>                                
                            </table>                         
                        </div>
	                    <?php 
		                    } else {		                    	
		                    	echo br(1);
			                	echo '<div class="form-group text-center">
										<i id="logo_i" class="fa fa-frown-o fa-5x"></i>';
			                   	echo heading('No hay citas disponibles.<br>Por favor intente con otras opciones de busqueda.', 3, 'class="text-muted"');
			                   	echo '</div>';		                    	
		                    }                    	
	                    ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade modal-edit" id="modal_edit_cita" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <?php
            $data_input = array(
                'id' => "edit_cita_form",
            );
            echo form_open('',$data_input);
        ?>
        <div class="modal-content box">
            <div class="overlay hidden" id="div_waiting_edit_cita">
                <i class="fa fa-refresh fa-spin" id="i_refresh"></i>
            </div>
            <div class="modal-header">
                <button type="button" class="close cancel-btn" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Editar Cita</h3>
            </div>
            <div class="modal-body">
				<?php 
				$data_input = array(
						'id' => "idCita",
						'name' => "idCita",
						'type' => "hidden",
						'value' => ''
				);
				echo form_input($data_input);
				?>                       
                <div class="row">
                    <div class="col-lg-6 form-group" id="fecha">
                        <label class="control-label">Fecha cita: *</label>
                        <div class="input-group" id="div_inputEditFecha">
                            <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
                            <input type="hidden" id="inputHideFecha"name="inputHideFecha">
                            <input type="text" class="form-control date-select" id="inputEditFecha" placeholder="YYYY/MM/DD" name="inputEditFecha">
                        </div>
                    </div>
                    <div class="col-lg-6 form-group" id="hora">
                     	<div class="bootstrap-timepicker">
							<label>Hora cita: *</label>
                          	<div class="input-group" id="div_inputEditHora">
                                <span class="input-group-addon"><i class="fa fa-clock-o fa-fw"></i></span>
                                <input type="hidden" id="inputHideHora"name="inputHideHora">
                            	<input type="text" class="form-control timepicker" id="inputEditHora" placeholder="HH:MM AM" name= "inputEditHora" value="<?php echo $hora;?>">
                        	</div>
						</div>                    

                    </div>
                </div>
                <div class="row">
	                <div class="col-lg-6 form-group">
	                	<label class="control-label">Odontólogo: *</label>
	                    <div class="input-group" id="div_selectEditOdonto">
	                    	<span class="input-group-addon"><i class="fa fa-user-md fa-fw"></i></span>
	                        <?php 
				                $data_input = array(
				                		'id' => 'selectEditOdontologo',
				                		'class' => 'form-control',
				                );
				                echo form_dropdown('selectEditOdontologo', $odontologos, '-1', $data_input);                   
	                        
	                        ?>
						</div>
					</div>   
                    <div class="col-lg-6 form-group">
                        <label class="control-label">Consultorio:</label>
                        <div class="input-group" id="div_inputConsultorio">
                            <span class="input-group-addon"><i class="fa fa-hospital-o fa-fw"></i></span>
                            <input type="text" class="form-control" id="inputConsultorio" placeholder="Consultorio" name="inputConsultorio">
                        </div>
                    </div>					                              
                </div>               
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-danger pull-left cancel-btn">Cancelar</button>
                <input type="submit" name="submit_reg" class="btn btn-info pull-right" value="Guardar">
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>

<?php 
    $path = "empleado/Administrar_Cita/";
    echo '<script>
            var js_site_url = "'. site_url($path) . '";
          </script>';
?>
