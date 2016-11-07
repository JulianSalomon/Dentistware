<div class="content-wrapper">
    <!-- Content Header (Page header) -->
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
                         <h4>A continuación puede buscar las citas disponibles y agendar una, recuerde que al agendar una cita y no poder asistir a la misma tendrá una multa y será inhabilitado de los servicios, no agende dos citas en el mismo horario y verifique sus citas antes de agendar una, el horario predeterminado en que se muestran las citas es del día actual.</h4>
                    </div>
                    <div class="box-body">
                        <!-- Dropdowns -->
                        <?php 
                            $data_input = array(
                                    'id' => "edit_cliente_form",
                            );        
                            echo form_open('paciente/AgendarCita/filtrar', $data_input);
                        ?>
                        <div class="row">
                                               <div class="col-lg-4 form-group">
                                         <label class="control-label">Filtrar por fecha: </label>
                                         <div class="input-group" id="div_inputFecha">
                                             <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
                                             <input type="text" class="form-control date-select" id="inputFecha" placeholder="<?php echo date("Y-m-d")?>" name="inputFecha">
                                         </div>
                                      </div>
                                    <div class="col-lg-4 form-group">

                                                  <div class="bootstrap-timepicker">
                            <div class="form-group">
                              <label>Filtrar por hora:</label>

                              <div class="input-group">
                                  <div class="input-group-addon">
                                  <i class="fa fa-clock-o"></i>
                                </div>
                                <input type="text" class="form-control timepicker" id="inputHora" name= "inputHora">


                              </div>
                              <!-- /.input group -->
                            </div>
                            <!-- /.form group -->
                                        </div>
                                      </div>
                        </div>
                        
                        					<div class="col-lg-6 form-group">
                    	<label  class="control-label">Seleccione un odontólogo</label>
                        <div class="input-group" id="div_selectOdontologo">
                        	<span class="input-group-addon"><i class="fa fa-user-md"></i></span>
		                    <?php   
		                   
				                $data_input = array(
				                		'id' => 'inputOdontologo',
				                		'class' => 'form-control',
				                		'tabindex' => "-1",
				                );
				                echo form_dropdown('inputOdontologo', $odontologos, '-1', $data_input);
	                        ?>                          	
						</div>
					</div>
                         
					<?php  
                        
                            	$data_input = array(
                			'class' => "btn btn-primary btn-lg",
                			'id' => "consultar",
                			'name' => "consultar",
                			'value' => "Consultar",
                	               );
                	   echo form_submit($data_input);
		                  echo form_close();
		             	
                        if($citas != NULL){                     
                    
                    ?>
                        <div class="table-responsive">
                            <table id="tabla_cita" type='tabla' class="table table-bordered table-hover tabla-citas">
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Hora</th>
                                        <th>Odontólogo</th>
                                        <th>Consultorio</th>
                                        <th>Acción</th>
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
                                                $hora = DateTime::createFromFormat('H:i:s', $cita->hora);
                                                 echo $hora->format("H:i A"); 
                                                echo '</td>';
                                                  echo '<td>';
                                                echo ucwords($cita->odontologo);
                                                echo '</td>';
                                                  echo '<td>';
                                                echo ucwords($cita->consultorio);
                                                echo '</td>';
                                                echo '<td class="text-center">';
                                                echo '<button class="asignar-btn btn btn-info" cita="' . $cita->id_cita . '" odonto="' . ucwords($cita->odontologo) . '" type=button id="delete_persona" data-toggle="tooltip"  title="Asignar">
                                                            <i class="fa fa-calendar-check-o"></i>
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
                                          <th>Acción</th>
                                    </tr>
                                </tfoot>                                
                            </table>
                    	<div class="text-center"> 
                    		<?php // echo $links;?>
                    	</div>                            
                        </div>
                    <?php 
	                    } else {
	                    	
		                    	echo br(1);
			                	echo '<div class="form-group text-center">
										<i id="logo_i" class="fa fa-frown-o fa-5x"></i>';
			                   	echo heading('No se encontraron resultados.<br>Intente con otra opción.', 3, 'class="text-muted"');
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
    $path = "paciente/AgendarCita/";
    echo '<script>
            var js_site_url = "'. site_url($path) . '";
          </script>';
?>