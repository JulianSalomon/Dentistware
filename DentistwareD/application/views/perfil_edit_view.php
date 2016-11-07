<div class="content-wrapper">
    <section class="content-header">
        <h1>Editar Perfil</h1>
    </section>
    <section class="content">
        <div class="row">     
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="overlay hidden" id="div_waiting_edit_perfil">
				        <i class="fa fa-refresh fa-spin" id="i_refresh"></i>  
                    </div>      
                    <?php 
                        $data_input = array(
                                'id' => "edit_perfil_form",
                        );        
                        echo form_open('', $data_input);	

                        $data_input = array(
                                'id' => "idPersona",
                                'name' => "idPersona",
                                'type' => "hidden",
                                'value' => $persona_info->id_persona
                        );
                        echo form_input($data_input);
                    ?>
                	<div class="box-body">
                        
                 		<div class="form-group text-center">
		                <?php 
						if($persona_info->foto_persona){
                            
                            $route = $persona_info->tipo_persona;
                            
                            switch ($route) {
                                case "ADM":
                                    echo '<img id="foto_img" class="center-block" height="240" width="240" src="'.base_url() . "uploads/admin/" . $persona_info->foto_persona . '">';
                                    break;
                                case "CLT":
                                    echo '<img id="foto_img" class="center-block" height="240" width="240" src="'.base_url() . "uploads/cliente/" . $persona_info->foto_persona . '">';
                                    break;
                                case "ODO":
                                    echo '<img id="foto_img" class="center-block" height="240" width="240" src="'.base_url() . "uploads/odonto/" . $persona_info->foto_persona . '">';
                                    break;
                                case "EMP":
                                    echo '<img id="foto_img" class="center-block" height="240" width="240" src="'.base_url() . "uploads/empleado/" . $persona_info->foto_persona . '">';
                                    break;
                            }
                            
							echo '<i id="i_foto" class="fa fa-image fa-5x hidden"></i>';
							
						} else {
							echo '<i id="i_foto" class="fa fa-image fa-5x"></i>';
							echo '<img id="foto_img" class="center-block hidden" height="240" width="240">';
						}
						
						echo br(1);
						echo '<label>Seleccione una imagen para el perfil.</label>';
						if($persona_info->foto_persona){
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
                        		'value' => $persona_info->foto_persona,
                        );
                        echo form_upload($data_input); 
                        ?>
                    </div>     
                        
                    <hr>
                        
                    <div class="row">
                        <div class="col-lg-5 form-group">
                            <label  class="control-label">Nombre(s) y Apellidos:</label>
                                <?php  
                                    echo "<BR>";
                                    echo "<p> " . ucwords($persona_info->nombre_persona) . "</p>";
                                ?>
                        </div>
                        
                        <div class="col-lg-3 form-group">
                            <label  class="control-label">Tipo de Documento:</label>
                            <?php
                                $tDocumento = $persona_info->tipo_documento;
                                echo "<BR>";
                                if($tDocumento == 'CC' ){
                                    echo "<p> Cédula de Ciudadania </p>";
                                }elseif($tDocumento == 'TI' ){
                                    echo "<p> Tarjeta de Identidad </p>";
                                }else{
                                    echo "<p> Cedula de Extranjeria </p>";
                                }
                            ?>
                        </div>                          
                        
                        <div class="col-lg-4 form-group">
                            <label  class="control-label">Numero de Documento:</label>
                            <?php 
                            echo "<BR>";
                            echo "<p> " . $persona_info->documento_persona . "</p>";
                            ?>
                        </div>                                                                                                  
               	    </div>  
                        
                    <div class="row">
                        <div class="col-lg-5 form-group">
                            <label class="control-label">Fecha de nacimiento: *</label>
                            <div class="input-group" id="div_inputNacimiento">
                                <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
                                <?php $date = str_replace('-', '/', $persona_info->fecha_nacimiento);?>
                                <input type="text" class="form-control date-select" id="inputNacimiento" placeholder="YYYY/MM/DD" name="inputNacimiento" value="<?php echo $date;?>">
                            </div>
                        </div>
                        <div class="col-lg-7 form-group">
                            <label class=" control-label">Edad:</label>
                            <?php 
                                echo "<BR>";
                                echo "<p> " . $persona_info->edad_persona . ' '." Años</p>";
                            ?>
                        </div>                  	                  	
                    </div>	    
                        
                        
                        
                        <div class="row">    
                            <div class="col-lg-5 form-group">
                                <label  class="control-label">Género: *</label>
                                <div class="input-group" id="div_inputGenero">
                                    <span class="input-group-addon"><i class="fa fa-venus-mars fa-fw"></i></span>
                                    <select class="form-control select2 select2-hidden-accessible" name="selectGenero" id="selectGenero" value="<?php echo $persona_info->genero_persona;?>">
                                        <option value='M'>Masculino</option>
                                        <option value='F'>Femenino</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-7 form-group">
                                <label class=" control-label">Estado:</label>
                                <?php 
                                    echo "<BR>";
                                    if ($persona_info->estado_persona == 'ACT'){
                                         echo "<p> Activo</p>";
                                    }else{
                                         echo "<p> Retirado</p>";
                                    };
                                ?>
                            </div>      	                                              
                        </div> 
                        
                        
                        <?php
                            if($persona_info->tipo_persona != 'ADM'){
                                $valueADM = '';
                            } else 
                                    $valueADM = 'hidden';
                        ?>
                            <div class="row" <?php echo $valueADM?> >    
                                <div class="col-lg-4 form-group">
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
                                            echo form_dropdown('selectGrupo', $tipos_sangre, $persona_info->tipo_sangre_cliente, $data_input);
                                        ?>                          	
                                    </div>
                                </div>
                                <div class="col-lg-4 form-group">
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
                                                    'class' => 'form-control select2 select2-hidden-accessible',
                                                    'tabindex' => "-1",
                                            );
                                            echo form_dropdown('selectRH', $tipos_rh, $persona_info->rh_cliente, $data_input);
                                        ?>                         	
                                    </div>
                                </div>
                                <?php
                                    if($persona_info->tipo_persona != 'ODO' && $persona_info->tipo_persona != 'EMP'){
                                          $valueODO = '';
                                    } else 
                                            $valueODO = 'hidden';
                                ?>
                                <div class="col-lg-4 form-group" <?php echo $valueODO?> >    
                                    <label class=" control-label">EPS:</label>
                                    <div class="input-group" id="div_inputEps">
                                        <span class="input-group-addon"><i class="fa fa-hospital-o fa-fw"></i></span>
                                        <input type="text" class="form-control" id="inputEps" placeholder="Nombre EPS" name="inputEps" value="<?php echo $persona_info->eps_persona;?>">
                                    </div>
                                </div>
                            </div>
                        
                        <div class="row">
                            <div class="col-lg-4 form-group ">
                                <label  class="control-label">Dirección de residencia: *</label>
                                <div class="input-group" id="div_inputDireccion">
                                    <span class="input-group-addon"><i class="fa fa-home fa-fw"></i></span>
                                    <input type="text" class="form-control" id="inputDireccion" placeholder="Dirección de residencia" name="inputDireccion" value="<?php echo $persona_info->direccion_persona;?>">
                                </div>
                            </div> 
                            
                            <div class="col-lg-4 form-group">
                                <label class=" control-label">Teléfono: *</label>
                                <div class="input-group" id="div_inputTelefono">
                                    <span class="input-group-addon"><i class="fa fa-phone fa-fw"></i></span>
                                    <input type="text" class="form-control" id="inputTelefono" placeholder="Teléfono" name="inputTelefono" value="<?php echo $persona_info->telefono_persona;?>">
                                </div>
                            </div>                                  
                            
                            <?php
                                if($persona_info->tipo_persona != 'ADM'){
                                    $valueADM = '';
                                } else 
                                    $valueADM = 'hidden';
                            ?>
                            <div class="col-lg-4 form-group" <?php echo $valueADM?> >  
                                <label for="inputEmail" class="control-label">Correo: *</label>
                                <div class="input-group" id="div_inputEmail">
                                    <span class="input-group-addon"><i class="fa fa-envelope fa-fw"></i></span>                 
                                    <input type="email" class="form-control" id="inputEmail" placeholder="Correo electrónico" name="inputEmail" value="<?php echo $persona_info->correo_persona;?>">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-6 form-group" >
                                <label class="control-label">Departamento: *</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i></span>                         
                                         <?php 
                                            $data_input = array(
                                                    'id' => 'select_depto',
                                                    'class' => 'form-control select2 select2-hidden-accessible',
                                            );
                                            echo form_dropdown('select_depto', $departamentos, $persona_info->id_departamento, $data_input); 	
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
                                            echo form_dropdown('select_ciudades', $ciudades, $persona_info->id_ciudad, $data_input); 	
                                        ?>                            
                                </div>
                            </div>                                                                          
                        </div>           
                        <?php
                            if($persona_info->tipo_persona == 'ODO' || $persona_info->tipo_persona == 'CLT'){
                                echo '<hr>';
                            }
                        ?>
                            
                        <?php
                            if($persona_info->tipo_persona == 'ODO'){
                                echo '<h4>INFORMACIÓN ACADEMICA:</h4>';
                            }elseif($persona_info->tipo_persona == 'CLT'){
                                echo '<h4>INFORMACIÓN DE CONTACTO:</h4>';
                            }
                        ?>
                        
                        <?php
                            if($persona_info->tipo_persona != 'CLT'){
                                $valueCLT = 'hidden';
                            } else 
                                $valueCLT = '';
                        ?>
                        
                                <div class="row" <?php echo $valueCLT?> >  
                                    <div class="col-lg-6 form-group">
                                        <label  class="control-label">Nombres y apellidos: *</label>
                                        <div class="input-group" id="div_inputNombreContacto">
                                            <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span> 
                                            <input type="text" class="form-control" id="inputNombreContacto" placeholder="Nombres y apellidos" name="inputNombreContacto" value="<?php echo $persona_info->contacto_cliente;?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label class="control-label">Teléfono: *</label>
                                        <div class="input-group" id="div_inputTelContacto">
                                            <span class="input-group-addon"><i class="fa fa-phone fa-fw"></i></span>
                                            <input type="text" class="form-control" id="inputTelContacto" placeholder="Teléfono" name="inputTelContacto" value="<?php echo $persona_info->telefono_contacto_cliente;?>">
                                        </div>
                                    </div>                                  
                                </div>	
                        <?php
                            if($persona_info->tipo_persona != 'ODO'){
                                $valueODO = 'hidden';
                            } else 
                                $valueODO = '' ;
                        ?>
                        
                                <div class=" form-group" <?php echo $valueODO ?> >  
                                    <label  class="control-label">Estudios: *</label>
                                    <div class="input-group" id="div_estudiosOdontologo">
                                        <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span> 
                                        <input type="text" class="form-control" id="inputTitulosOdontologo" placeholder="Titulos Obtenidos" name="inputTitulosOdontologo" value="<?php echo $persona_info->estudios_odont;?>">
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
                            echo anchor(base_url() . 'Perfil/', 'Cancelar', $data_input);
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
            </div>
        </div>
    </section>
</div>
<script>
	var js_site_url = '<?php echo site_url("Perfil/");?>';
</script> 
