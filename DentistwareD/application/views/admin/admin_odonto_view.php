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
                        <div class="col-xs-6">
                            <h4>En la siguiente tabla encuentra una lista de todos los odontólogos.</h4>
                        </div>
                        <div class="col-xs-6">
                            <button type="button" class="btn btn-info btn-small pull-right" data-toggle="modal" data-target="#modal_add_odont">Agregar odontólogo</button>
                        </div>
                    </div>
                    <div class="box-body">
                    <?php 
                    	if($odontologos != NULL){
                    ?>
                        <div class="table-responsive">
                            <table id="tabla_odon" type='tabla' class="table table-bordered table-hover tabla-usuario">
                                <thead>
                                    <tr>
                                        <th>Documento</th>
                                        <th>Nombre y teléfono</th>
                                        <th>Correo electrónico</th>
                                        <th>Ubicación</th>
                                        <th>Estado</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        
                            		 		foreach ($odontologos as $odontologo){
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
                                                echo '<td class="text-center">';
                                                if($odontologo->estado = 'ACT'){
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
                                                echo anchor('', '<i class="fa fa-pencil"></i>', $data_input);
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
                                        <th>Estado</th>
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
	                    	echo heading('No hay odontologos registrados', 3, 'class="text-muted"');
	                    	echo '</div>';
	                    }                    	
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade modal-add" id="modal_add_odont" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <!-- Modal content-->
        <?php
            $data_input = array(
                'id' => "nuevo_odont_form",
            );
            echo form_open('',$data_input);
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
                <div class="row">
                    <div class="col-lg-6 form-group">
                        <label  class="control-label">Tipo de Documento: *</label>
                        <div class="input-group" id="div_selectTipoDoc">
                            <span class="input-group-addon"><i class="fa fa-credit-card fa-fw"></i></span>
                            <select class="form-control select2 select2-hidden-accessible" tabindex="-1" name="selectTipoDoc" id="selectTipoDoc">
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
                        <input type="text" class="form-control" id="inputNombre" placeholder="Nombres y apellidos" name="inputNombre">
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
                <div class="row">
                    <div class="col-lg-6 form-group">
                        <label class="control-label">Departamento: *</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i></span>
                            <?php
                                $data_input = array(
                                    'id' => 'select_depto',
                                    'class' => 'form-control select2 select2-hidden-accessible',
                                );
                                echo form_dropdown('select_depto', $departamentos, '', $data_input);
                            ?>
                        </div>
                    </div>
                    <div class="col-lg-6 form-group" >
                        <label  class="control-label">Ciudad: *</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i></span>
                            <select class="form-control select2 select2-hidden-accessible" tabindex="-1" id="select_ciudades" name="select_ciudades" disabled>
                                <option value="-1"> Seleccione un Departamento</option>
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
                        <div class="input-group" id="div_inputGenero">
                            <span class="input-group-addon"><i class="fa fa-venus-mars fa-fw"></i></span>
                            <select class="form-control select2 select2-hidden-accessible" tabindex="-1" name="selectGenero" id="selectGenero">
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
    $path = "administrador/Odontologo/";
    echo '<script>
                var js_site_url = "'. site_url($path) . '";
                var tipo_usuario = "odontólogo";
          </script>';
?>