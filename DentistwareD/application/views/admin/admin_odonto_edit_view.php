<div class="content-wrapper">
 	<section class="content-header">
      	<?php echo heading('Editar Odontologo',1);?>
   	</section>
  	<section class="content">
      	<div class="box box-primary">
	   		<div class="overlay hidden" id="div_waiting_edit_odontologo">
				<i class="fa fa-refresh fa-spin" id="i_refresh"></i>  
	        </div>            
            <?php 
		        $data_input = array(
		        		'id' => "edit_odontologo_form",
		        );        
		        echo form_open_multipart('', $data_input);	
		        
		        $data_input = array(
		        		'id' => "idOdontologo",
		        		'name' => "idOdontologo",
		        		'type' => "hidden",
		        		'value' => $odontologo_info->id_persona
		        );
		        echo form_input($data_input);
		   	?>
         	<div class="box-body">
                    <div class="form-group text-center">
		                <?php 
						if($odontologo_info->foto_persona){
							echo '<img id="foto_img" class="center-block" height="240" src="'.base_url() . "uploads/odonto/" . $odontologo_info->foto_persona . '">';
							echo '<i id="i_foto" class="fa fa-image fa-5x hidden"></i>';
							
						} else {
							echo '<i id="i_foto" class="fa fa-image fa-5x"></i>';
							echo '<img id="foto_img" class="center-block hidden" height="240" width="240">';
                            echo br(1);
                            echo '<label>Seleccione una imagen para el odontologo.</label>';
						}
						
						echo br(1);
						if($odontologo_info->foto_persona){
							echo form_label('Eliminar foto: ', '', array('class' => 'control-label'));
							echo '&lrm; &lrm;&lrm; &lrm;&lrm; &lrm;&lrm;';
							$data = array(
									'name'          => 'chkEliminarFoto',
									'id'            => 'chkEliminarFoto',
									'value'         => 'on',
									'checked'       => FALSE,
							);
							echo form_checkbox($data);
						}
						echo br(1);

                        $data_input = array(
                        		'id' => "inputFoto",
                        		'name' => "inputFoto",
                        		'value' => $odontologo_info->foto_persona,
                        );
                        echo form_upload($data_input); 
                        ?>
                    </div>         	
            	<div class="row">
					<div class="col-lg-6 form-group">
                    	<label  class="control-label">Tipo de Documento: *</label>
                        <div class="input-group" id="div_selectTipoDoc">
                        	<span class="input-group-addon"><i class="fa fa-credit-card fa-fw"></i></span>
		                    <?php   
		                    	$generos = array(
						    			'CC' => 'Cédula de Ciudadania',
						    			'TI' => 'Tarjeta de Identidad',
						    			'CE' => 'Cedula de Extranjeria',
								);
		                    	
		                    	$data_input = array(
		                    			'id' => 'selectTipoDoc',
		                    			'class' => 'form-control',
		                    	);
		                    	
		                    	$selected = $odontologo_info->tipo_documento;		                    	
		                    	echo form_dropdown('selectTipoDoc', $generos, $selected, $data_input);
	                        ?>                          	
						</div>
					</div>
					<div class="col-lg-6 form-group">
						<label  class="control-label">N. de Documento: *</label>
                        <div class="input-group" id="div_inputDocumento">
                        	<span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                            <input type="number" class="form-control" id="inputDocumento" placeholder="Número de documento" name="inputDocumento" value="<?php echo $odontologo_info->documento_persona;?>">
                      	</div>
                 	</div>                                                                                                  
               	</div>  
				<div class="form-group">
					<label for="inputNombre" class=" control-label ">Nombre Completo: *</label>
                    <div class="input-group" id="div_inputNombre">
                    	<span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                        <input type="text" class="form-control" id="inputNombre" placeholder="Nombres y apellidos" name="inputNombre" value="<?php echo $odontologo_info->nombre_persona;?>">
					</div>
				</div>
                <div class="row">
                    <div class="col-lg-6 form-group">
                        <label class=" control-label">Teléfono: *</label>
                        <div class="input-group" id="div_inputTelefono">
                            <span class="input-group-addon"><i class="fa fa-phone fa-fw"></i></span>
                            <input type="text" class="form-control" id="inputTelefono" placeholder="Teléfono" name="inputTelefono" value="<?php echo $odontologo_info->telefono_persona;?>">
                        </div>
                    </div> 
                    <div class="col-lg-6 form-group">
                    	<label  class="control-label">Estado: *</label>
                        <div class="input-group" id="div_selectEstado">
                        	<span class="input-group-addon"><i class="fa fa-check-square-o"></i></span>
		                    <?php   
		                    	$estados = array(
						    			'ACT' => 'Activo',
						    			'DST' => 'Desactivado',						    			
								);
		                    	
		                    	$data_input = array(
		                    			'id' => 'selectEstado',
		                    			'class' => 'form-control',
		                    	);
		                    	
		                    	$selected = $odontologo_info->estado_persona;		                    	
		                    	echo form_dropdown('selectEstado', $estados, $selected, $data_input);
	                        ?>                         	
						</div>
					</div>
                </div>
        		<div class="form-group">
                  	<label  class="control-label">Dirección de residencia: *</label>
                    <div class="input-group" id="div_inputDireccion">
                    	<span class="input-group-addon"><i class="fa fa-home fa-fw"></i></span>
                        <input type="text" class="form-control" id="inputDireccion" placeholder="Dirección de residencia" name="inputDireccion" value="<?php echo $odontologo_info->direccion_persona;?>">
                	</div>
				</div>   
				<div class="row" id="div_select_ciudades">
                	<div class="col-lg-6 form-group" >
                    	<label class="control-label">Departamento: *</label>
                        <div class="input-group">
                        	<span class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i></span>                         
                                 <?php 
                                    $data_input = array(
                                            'id' => 'select_depto',
                                            'class' => 'form-control',
                                    );
                                    echo form_dropdown('select_depto', $departamentos, $odontologo_info->id_departamento, $data_input); 	
                                ?>
                      	</div>
					</div>
					<div class="col-lg-6 form-group" >
                    	<label  class="control-label">Ciudad: *</label>
                        <div class="input-group">
                        	<span class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i></span>                 
                                 <?php 
                                    $data_input = array(
                                            'id' => 'select_ciudades',
                                            'class' => 'form-control select2 select2-hidden-accessible',
                                    );
                                    echo form_dropdown('select_ciudades', $ciudades, $odontologo_info->id_ciudad, $data_input); 	
                                ?>                            
						</div>
					</div>                                                                          
               	</div>                                    	                  
             	<div class="form-group">
                	<label for="inputEmail" class="control-label">Correo: *</label>
                    <div class="input-group" id="div_inputEmail">
                    	<span class="input-group-addon"><i class="fa fa-envelope fa-fw"></i></span>                 
                        <input type="email" class="form-control" id="inputEmail" placeholder="Correo electrónico" name="inputEmail" value="<?php echo $odontologo_info->correo_persona;?>">
                  	</div>
             	</div>              	                                                                           
               	<div class="row">
                	<div class="col-lg-6 form-group">
                    	<label class="control-label">Fecha de nacimiento: *</label>
                        <div class="input-group" id="div_inputNacimiento">
                        	<span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
                        	<?php $date = str_replace('-', '/', $odontologo_info->fecha_nacimiento);?>
                            <input type="text" class="form-control date-select" id="inputNacimiento" placeholder="YYYY/MM/DD" name="inputNacimiento" value="<?php echo $date;?>">
						</div>
                  	</div>
                    <div class="col-lg-6 form-group">
                    	<label  class="control-label">Género: *</label>
                        <div class="input-group" id="div_selectGenero">
                        	<span class="input-group-addon"><i class="fa fa-venus-mars fa-fw"></i></span>
		                    <?php   
		                    	$generos = array(
						    			'M' => 'Masculino',
						    			'F' => 'Femenino',						    			
								);
		                    	
		                    	$data_input = array(
		                    			'id' => 'selectGenero',
		                    			'class' => 'form-control',
		                    	);
		                    	
		                    	$selected = $odontologo_info->genero_persona;		                    	
		                    	echo form_dropdown('selectGenero', $generos, $selected, $data_input);
	                        ?>                         	
						</div>
					</div>                  	                  	
           		</div>	
               	<div class="row">
					<div class="col-lg-6 form-group">
                    	<label class=" control-label">Grupo sanguíneo: *</label>
                        <div class="input-group" id="div_selectGrupo">
                        	<span class="input-group-addon"><i class="fa fa-plus-square fa-fw"></i></span>
		                    <?php 
		                    	$tipos_sangre = array(
		                    			'A' => 'A',
		                    			'B' => 'B',
		                    			'AB' => 'AB',
		                    			'O' => 'O',
		                    	);
		                    
				                $data_input = array(
				                		'id' => 'selectGrupo',
				                		'class' => 'form-control',
				                );
				                echo form_dropdown('selectGrupo', $tipos_sangre, $odontologo_info->tipo_sangre_cliente, $data_input);
	                        ?>                          	
                     	</div>
                 	</div>
                    <div class="col-lg-6 form-group">
                    	<label  class=" control-label">RH: *</label>
                        <div class="input-group" id="div_selectRH">
                        	<span class="input-group-addon"><i class="fa  fa-plus-square fa-fw"></i></span>
		                    <?php 
		                    	$tipos_rh = array(
		                    			'+' => '+',
		                    			'-' => '-',
		                    	);
		                    
				                $data_input = array(
				                		'id' => 'selectRH',
				                		'class' => 'form-control',
				                );
				                echo form_dropdown('selectRH', $tipos_rh, $odontologo_info->rh_cliente, $data_input);
	                        ?>                         	
                      	</div>
                 	</div>					               	                                              
				</div> 
               	<hr>
                <h4>INFORMACIÓN ACADEMICA:</h4>
                <div class=" form-group">  
                    <label  class="control-label">Estudios: *</label>
                    <div class="input-group" id="div_estudiosOdontologo">
	                	<?php 
	                	$data_input = array(
	                			'type' => "text",
	                			'class' => "form-control",
	                			'id' => "inputTitulosOdontologo",
	                			'name' => "inputTitulosOdontologo",
	                			'rows' => "5",
	                			'placeholder' => "Titulos Obtenidos",
	                			"maxlength" => "1000",
	                			'value' => $odontologo_info->estudios_odont,
	                	);
	                	echo form_textarea($data_input);	                	
	                	?>                                                 
                    </div>
                </div>		          					                 	
     		</div>
			<div class="box-footer text-center">
				<?php                 
	                $data_input = array(
	                		'class' => "btn btn-danger btn-lg",
	                		'id' => "edit_cancel_btn",
	                		'name' => "cancelar_edit",
	                		'content' => "Cancelar"
	                );
	                echo anchor(base_url() . 'administrador/Odontologo/', 'Cancelar', $data_input);
                	$data_input = array(
                			'class' => "btn btn-primary btn-lg",
                			'id' => "guardar_edit",
                			'name' => "guardar_edit",
                			'value' => "Guardar",
                	);
                	echo form_submit($data_input);
              	?>
       		</div>
          	<?php echo form_close();?>
      	</div>
   	</section> 
</div>
<script>
	var js_site_url = '<?php echo site_url("administrador/Odontologo/");?>';
</script> 
