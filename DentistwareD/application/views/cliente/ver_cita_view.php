<div class="content-wrapper">
    <section class="content-header">
      <h1>Citas</h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                         <h4>asdas</h4>
                    </div>
                    <div class="box-body">                        
						<?php  
	                        if(isset($citas)){                                         
	                    ?>
	                   	<div class="table-responsive">
	                    	<table id="tabla_cita" type='tabla' class="table table-bordered table-hover tabla-citas">
	                        	<thead>
	                            	<tr>
	                                	<th>Fecha</th>
	                                    <th>Hora</th>
	                                    <th>Odontólogo</th>
	                                    <th>Acción</th>
	                              	</tr>
								</thead>
	                            <tbody>
	                            	<?php 
	                                foreach ($citas as  $cita){
	                                	echo '<tr>';
	                                    echo '<td>';
	                                    echo $cita->fecha;
	                                    echo '</td>';
	                                    echo '<td>';
										$hora = DateTime::createFromFormat('H:i:s', $cita->hora);
	                                    echo $hora->format("H:i A"); 
	                                    echo '</td>';
	                                    echo '<td>';
	                                    echo ucwords($cita->odontologo);
	                                    echo '</td>';
										echo '<td class="text-center">';
	                                    echo '<button class="asignar-btn btn btn-danger" cita="' . $cita->id_cita . '" odonto="' . ucwords($cita->odontologo) . '" type=button id="delete_persona" data-toggle="tooltip"  title="Asignar">
	                                    		<i class="fa fa-times-o"></i></button>';
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
	                                    <th>Acción</th>
									</tr>
								</tfoot>                                
							</table>                           
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