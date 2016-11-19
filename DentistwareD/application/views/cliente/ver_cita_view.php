<div class="content-wrapper">
    <section class="content-header">
      <h1>Citas agendadas</h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                         <h4>A continación puede ver sus citas que se encuentran activas:</h4>
                         <small>*Recuerde que solo podrá cancelar sus citas con una anterioridad mayor a 5 horas.</small>
                    </div>
                    <div class="box-body">                        
						<?php  
	                        if($citas){                                         
	                    ?>
	                   	<div class="table-responsive">
	                    	<table id="tabla_cita" class="table table-bordered table-hover tabla-citas">
	                        	<thead>
	                            	<tr>
	                            		<th>Opción</th>
	                                	<th>Fecha</th>
	                                    <th>Hora</th>
	                                    <th>Odontólogo</th>	                                    
	                              	</tr>
								</thead>
	                            <tbody>
	                            	<?php 
	                                foreach ($citas as  $cita){                                        
                                        $hora_cita = date_create($cita->fecha . " " . $cita->hora);
                                        $hora_actual = date_create(date('Y-m-d H:i:s'));
                                        $interval = date_diff($hora_cita, $hora_actual);
                                        $dias_para_la_cita = intval($interval->format('%a'));
                                        $horas_para_la_cita = intval($interval->format('%h'));
	                                	
                                        echo '<tr>';                                        
                                        echo '<td class="text-center">';
                                        $habilitar = "";
                                        if($dias_para_la_cita <= 0 && $horas_para_la_cita <=5) {
                                        	$habilitar = 'disabled= "true"';
                                        }
                                        echo '<button class="cancelar-btn btn btn-danger" ' .  $habilitar . ' cita="' . $cita->id_cita . '" odonto="' . ucwords($cita->odontologo) .'" type=button data-toggle="tooltip"  title="Cancelar Cita">
	                                    		<i class="fa fa-times fa-2x"></i></button>';
                                        echo '</td>';                                        
	                                    echo '<td>';
	                                    echo $cita->fecha;
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
									</tr>
								</tfoot>                                
							</table>                           
						</div>
	                    <?php 
		                    } else {                    	
		                    	echo br(1);
			                	echo '<div class="form-group text-center">
										<i id="logo_i" class="fa fa-warning fa-5x"></i>';
			                   	echo heading('Hasta el momento no tiene citas activas.<br>Para agendar una cita, dirijase a la opción "Agendar cita" .', 3, 'class="text-muted"');
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
    $path = "paciente/VerCita/";
    echo '<script>
            var js_site_url = "'. site_url($path) . '";
          </script>';
?>