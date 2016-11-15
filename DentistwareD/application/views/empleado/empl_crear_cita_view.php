<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Crear citas
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                    <h4>Con el siguiente formulario puede generar las citas para los diferentes días:</h4>
                    </div>
                    <div class="box-body">
                        <?php 
                            $data_input = array(
                                    'id' => "crear_citas_form",
                            );        
                            echo form_open('empleado/Crear_cita/', $data_input);                            
                        ?>
                        <div class="row">
                        	<div class="col-lg-2"></div>
							<div class="col-lg-4 form-group">
                            	<label class="control-label">Fecha: *</label>
                                <div class="input-group" id="div_inputFecha">
                                	<span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
                                    <input type="text" class="form-control date-select" id="inputFecha" placeholder="YYYY/MM/DD" name="inputFecha">
                               	</div>
                          	</div>
                           	<div class="col-lg-4 form-group">
                            	<div class="bootstrap-timepicker" id="div_inputHora">
									<label>Hora: *</label>
                              		<div class="input-group">
                                  		<span class="input-group-addon"><i class="fa fa-clock-o fa-fw"></i></span>
                                		<input type="text" class="form-control timepicker" id="inputHora" placeholder="HH:MM AM" name= "inputHora">
                              		</div>
                             	</div>
                         	</div>
                        </div>                        
                        <div class="row"> 
                        	<div class="col-lg-2"></div>
                        	<div class="col-lg-4 form-group">
                    			<label  class="control-label">Seleccione un Odontólogo: *</label>
                        		<div class="input-group" id="div_inputOdontologo">
                        			<span class="input-group-addon"><i class="fa fa-user-md"></i></span>
		                    		<?php
						                $data_input = array(
						                		'id' => 'inputOdontologo',
						                		'class' => 'form-control',
						                );
						                echo form_dropdown('inputOdontologo', $odontologos, '-1', $data_input);
	                        		?>
								</div>
							</div>
							<div class="col-lg-4 form-group">
								<label  class="control-label">Consultorio: *</label>
                              	<div class="input-group" id="div_inputConsultorio">
                                	<span class="input-group-addon"><i class="fa fa-hospital-o fa-fw"></i></span>
                                	<input type="text" class="form-control" id="inputConsultorio" placeholder="Consultorio" name= "inputConsultorio">
								</div>								
							</div>
						</div>
						<hr>
						<h5>A continuación, escriba el numero de citas que quiere generar en lote a partir de la hora seleccionada:</h5>
						<div class="row">
							<div class="col-lg-4"></div>
							<div class="col-lg-4 form-group">
								<label  class="control-label">Número de citas en lote: *</label>
	                            <div class="input-group" id="div_inputNumero">
	                            	<span class="input-group-addon"><i class="fa fa-repeat fa-fw"></i></span>
	                                <input type="number" class="form-control" id="inputNumero" placeholder="Número" name= "inputNumero" min="1" max="20">
								</div>												
							</div>												
						</div>
						<div class="form-group text-center">
						<?php
							$data_input = array(
									'class' => "btn btn-primary",
									'id' => "crear-btn",
									'name' => "crear-btn",
									'value' => "Crear citas",
							);
							echo form_submit($data_input);
						?>
						</div>
						<?php
		                  	echo form_close();
                    	?>                   
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php 
    $path = "empleado/Crear_Cita/";
    echo '<script>
            var js_site_url = "'. site_url($path) . '";
          </script>';
?>
