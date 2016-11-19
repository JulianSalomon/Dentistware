<div class="content-wrapper">
    <section class="content-header">
        <h1>
          Odontólogos
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <div class="col-xs-12">
                            <button type="button" class="btn btn-info btn-small pull-right" data-toggle="modal" data-target="#modal_add_odont">Agregar odontólogo</button>
                        </div>
                    </div>
                    <div class="box-body">                        
                    <?php 
			            $data_input = array(
			            		'id' => "odontologo_search_form",
			            		'name' => "odontologo_search_form",
			            );            
			            echo form_open('administrador/Odontologo/index', $data_input);
			                        	
		                echo '<div class="form-group col-xs-12">';
	                	 
                		echo heading('Buscar odontologo:', 2);
                		echo '<div class="input-group input-group-lg">';  
                		$word = $this->session->userdata('word_search');
		                $data_input = array(
		                    'type' => 'text',
		                    'class' => "form-control",
		                    'name' => "input_buscar_odontologo",
		                    'id' => "input_buscar_odontologo",
		                    'placeholder' => 'Buscar odontologo por nombre o identificación...',
		                	'value' => $word ? $word : set_value('input_buscar_odontologo'),
		                );
                        echo form_input($data_input);
                        	
                        echo '<span class="input-group-btn">';                        	
                        $data_input = array(
                        			'type' => 'submit',
                        			'class' => "btn btn-lg btn-primary",
                        			'name' => "btn_buscar_odontologo",
                        			'id' => "btn_buscar_odontologo",
                        			'value' => 'Buscar'
                        );
                        echo form_submit($data_input);                        	
                        echo '</span>';
	                    echo '</div>';
						
	             		echo '</div>'; 
                                             
                   		echo form_close();
                    	if($odontologos != NULL){
                    ?>
                        <div class="table-responsive">
                            <table id="tabla_odontologo" class="table table-bordered table-hover tabla-usuario">
                                <thead>
                                    <tr>
                                        <th>Documento</th>
                                        <th>Nombre y teléfono</th>
                                        <th>Correo electrónico</th>
                                        <th>Ubicación</th>
                                        <th>Estudios</th>
                                        <th>Estado</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                            foreach ($odontologos as  $odontologo){
                                                echo '<tr>';
                                                echo '<td>';
                                                 $tipo = str_split($odontologo->t_documento, 1);
                                                echo  $tipo[0] . "." . $tipo[1] . ". " . $odontologo->documento;
                                                echo '</td>';
                                                    echo '<td>';
                                                echo ucwords($odontologo->nombre);
                                                echo '<br>';
                                                echo  "<small> Tel: " .$odontologo->telefono . "</small>" ;
                                                echo '</td>';
                                                echo '<td>';
                                                echo strtolower($odontologo->email);
                                                echo '</td>';
                                                echo '<td>';
                                                echo ucfirst(mb_strtolower($odontologo->ciudad, 'UTF-8')) . " - " .  ucfirst(mb_strtolower($odontologo->depto, 'UTF-8')) . '<br>' . ucwords(strtolower($odontologo->direccion));
                                                echo '</td>';
                                                echo '<td>';
                                                
                                                echo $odontologo->estudios;
                                                
                                                echo '</td>';
                                                echo '<td class="text-center">';
                                                if($odontologo->estado == 'ACT'){
                                                    echo '<i class="fa fa-check-square-o"></i>';
                                                } else {
                                                    echo '<i class="fa fa-square-o"></i>';
                                                }
                                                echo '</td>'; 
                                                
                                                echo '<td class="text-center">';
                                                        $data_input = array(
                                                		'type' => 'button',
                                                        'class' => 'btn btn-default',
                                                		'data-toggle' => 'tooltip',
                                                		'title' => 'Editar',
                                                );                                                
                                                echo '<button class="editar-btn btn btn-default" doc="' . $odontologo->documento . '" type="button" id="edit_persona" data-toggle="tooltip" title="Editar">
                                                            <i class="fa fa-pencil"></i>';
                                                echo '<button class="borrar-btn btn btn-default" doc="' . $odontologo->documento . '" type=button id="delete_persona" data-toggle="tooltip" title="Borrar">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                      </td>';
                                            echo '</tr>';   
                                        }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Documento</th>
                                        <th>Nombre y teléfono</th>
                                        <th>Correo electrónico</th>
                                        <th>Ubicación</th>
                                        <th>Estudios</th>
                                        <th>Estado</th>
                                        <th>Opciones</th>
                                    </tr>
                                </tfoot>                                
                            </table>
                    	<div class="text-center"> 
                    		<?php echo $links;?>
                    	</div>                            
                        </div>
                    <?php 
	                    } else {
	                    	if($word != ''){
		                    	echo br(1);
			                	echo '<div class="form-group text-center">
										<i id="logo_i" class="fa fa-frown-o fa-5x"></i>';
			                   	echo heading('No se encontraron resultados.<br>Por favor intente buscar con otra opción.', 3, 'class="text-muted"');
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

<div class="modal fade modal-add" id="modal_add_odont" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <?php
            $data_input = array(
                'id' => "nuevo_odont_form",
            );
            echo form_open_multipart('',$data_input);
        ?>
        <div class="modal-content box">
            <div class="overlay hidden" id="div_waiting_new_odont">
                <i class="fa fa-refresh fa-spin" id="i_refresh"></i>
            </div>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Agregar odontólogo</h3>
            </div>
            <div class="modal-body">
                    <div class="form-group text-center">
		                <i id="i_foto" class="fa fa-image fa-5x"></i>
		                <?php
		                $data_input = array(
		                		'id' => 'foto_img',
		                		'class' => 'center-block hidden',
		                		'height' => '200',
		                );
		                echo img($data_input);		
		                echo br(1);

                        $data_input = array(
                        		'id' => "inputFoto",
                        		'name' => "inputFoto",
                        		'class' => "inputFoto"
                        );
                        echo form_upload($data_input);
                        ?>
                    </div>             
                <div class="row">                
                    <div class="col-lg-6 form-group">
                        <label  class="control-label">Tipo de Documento: *</label>
                        <div class="input-group" id="div_selectTipoDoc">
                            <span class="input-group-addon"><i class="fa fa-credit-card fa-fw"></i></span>
                            <select class="form-control" name="selectTipoDoc" id="selectTipoDoc">
                                <option value='-1' selected disabled>- Elija un tipo de documento -</option>
                                <option value='TI'>Tarjeta de identidad</option>
                                <option value='CC'>Cédula de ciudadanía</option>
                                <option value='CE'>Cédula de extranjería</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 form-group">
                        <label  class="control-label">N. de Documento: *</label>
                        <div class="input-group" id="div_inputDocumento">
                            <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                            <input type="text" class="form-control" id="inputDocumento" placeholder="Número de documento" name="inputDocumento">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputNombre" class=" control-label ">Nombre Completo: *</label>
                    <div class="input-group" id="div_inputNombre">
                        <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                        <input type="number" class="form-control" id="inputNombre" placeholder="Nombres y apellidos" name="inputNombre">
                    </div>
                </div>
                <div class="form-group">
                    <label class=" control-label">Teléfono: *</label>
                    <div class="input-group" id="div_inputTelefono">
                        <span class="input-group-addon"><i class="fa fa-phone fa-fw"></i></span>
                        <input type="text" class="form-control" id="inputTelefono" placeholder="Teléfono" name="inputTelefono">
                    </div>
                </div>
                <div class="form-group">
                    <label  class="control-label">Dirección de residencia: *</label>
                    <div class="input-group" id="div_inputDireccion">
                        <span class="input-group-addon"><i class="fa fa-home fa-fw"></i></span>
                        <input type="text" class="form-control" id="inputDireccion" placeholder="Dirección de residencia" name="inputDireccion">
                    </div>
                </div>
                <div class="row" id="div_select_ciudades">
                    <div class="col-lg-6 form-group">
                        <label class="control-label">Departamento: *</label>
                        <div class="input-group" id="div_select_depto">
                            <span class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i></span>
                            <?php
                                $data_input = array(
                                    'id' => 'select_depto',
                                    'class' => 'form-control',
                                );
                                unset($departamentos['0']);
                                $default = array('-1'  => '- Seleccione un departamento -');
                                echo form_dropdown('select_depto', $default + $departamentos, $default, $data_input);
                            ?>
                        </div>
                    </div>
                    <div class="col-lg-6 form-group" >
                        <label  class="control-label">Ciudad: *</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i></span>
                            <select class="form-control" tabindex="-1" id="select_ciudades" name="select_ciudades" disabled>
                                <option value="-1" selected disabled>- Seleccione un departamento -</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="control-label">Correo: *</label>
                    <div class="input-group" id="div_inputEmail">
                        <span class="input-group-addon"><i class="fa fa-envelope fa-fw"></i></span>
                        <input type="email" class="form-control" id="inputEmail" placeholder="Correo electrónico" name="inputEmail">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 form-group">
                        <label for="inputPassword" class="control-label">Contraseña: *</label>
                        <div class="input-group" id="div_inputPassword">
                            <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                            <input type="password" class="form-control" id="inputPassword" placeholder="Contraseña" name="inputPassword">
                        </div>
                    </div>
                    <div class="col-lg-6 form-group">
                        <label for="inputPasswordConfirm" class="control-label">Confirmar Contraseña: *</label>
                        <div class="input-group" id="div_inputPasswordConfirm">
                            <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                            <input type="password" class="form-control" id="inputPasswordConfirm" placeholder="Confirmar contraseña" name="inputPasswordConfirm">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 form-group">
                        <label class="control-label">Fecha de nacimiento: *</label>
                        <div class="input-group" id="div_inputNacimiento">
                            <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
                            <input type="text" class="form-control date-select" id="inputNacimiento" placeholder="YYYY/MM/DD" name="inputNacimiento">
                        </div>
                    </div>
                    <div class="col-lg-6 form-group">
                        <label  class="control-label">Género: *</label>
                        <div class="input-group" id="div_selectGenero">
                            <span class="input-group-addon"><i class="fa fa-venus-mars fa-fw"></i></span>
                            <select class="form-control" name="selectGenero" id="selectGenero">
                                <option value='-1' selected disabled>- Género -</option>
                                <option value='M'>Masculino</option>
                                <option value='F'>Femenino</option>
                            </select>
                        </div>
                    </div>
                </div>
                <hr>
                <h4>Información profesional:</h4>
                <div class="form-group" id="div_inputEstudios">             	
                	<?php 
                	$data_input = array(
                			'type' => "text",
                			'class' => "form-control",
                			'id' => "inputEstudios",
                			'name' => "inputEstudios",
                			'rows' => "5",
                			"maxlength" => "1000",
                	);
                	echo form_textarea($data_input);	                	
                	?>                	
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-danger pull-left">Cancelar</button>
                <input type="submit" name="submit_reg" class="btn btn-info pull-right" value="Guardar">
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>

<?php 
    $path = "Administrador/Odontologo/";
    echo '<script>
                var js_site_url = "'. site_url($path) . '";
                var tipo_usuario = "odontólogo";
          </script>';
?>