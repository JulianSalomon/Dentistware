<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
          Clientes
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
<!--                         <div class="col-xs-6"> -->
<!--                             <h4>En la siguiente tabla encuentra una lista de todos los clientes.</h4> -->
<!--                         </div> -->
                        <div class="col-xs-12">
                            <button type="button" class="btn btn-info btn-small pull-right" data-toggle="modal" data-target="#modal_add_client">Agregar cliente</button>
                        </div>
                    </div>
                    <div class="box-body">
		            <?php 
		            $data_input = array(
		            		'id' => "cliente_search_form",
		            		'name' => "cliente_search_form",
		            );            
		            echo form_open('administrador/Cliente/', $data_input);
		            ?>            	
	                <div class="form-group col-xs-12">
	                	<?php 
	                		echo heading('Buscar cliente:', 2);
	                		echo '<div class="input-group input-group-lg">';  
	                			$word = $this->session->userdata('word_search');
			                    $data_input = array(
			                    	'type' => 'text',
			                        'class' => "form-control",
			                        'name' => "input_buscar_cliente",
			                    	'id' => "input_buscar_cliente",
			                    	'placeholder' => 'Buscar cliente por nombre o identificación...',
			                    	'required' => '',
			                    	'value' => $word_search ? $word_search : set_value('input_buscar_cliente'),
			                    );
	                        	echo form_input($data_input);
	                        	
	                        	echo '<span class="input-group-btn">';                        	
	                        	$data_input = array(
	                        			'type' => 'submit',
	                        			'class' => "btn btn-lg btn-primary",
	                        			'name' => "btn_buscar_cliente",
	                        			'id' => "btn_buscar_cliente",
	                        			'value' => 'Buscar'
	                        	);
	                        	echo form_submit($data_input);                        	
	                        	echo '</span>';
	                        echo '</div>';
						?>
	             	</div>
					<?php                 
		                echo form_close();
		             	
                    	if($clientes != NULL && $word_search != ''){                     
                    ?>
                        <div class="table-responsive">
                            <table id="tabla_cliente" type='tabla' class="table table-bordered table-hover tabla-usuario">
                                <thead>
                                    <tr>
                                        <th>Documento</th>
                                        <th>Nombre y teléfono</th>
                                        <th>Correo electrónico</th>
                                        <th>Ubicación</th>
                                        <th>EPS</th>
                                        <th>Contacto</th>
                                        <th>Estado</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                            foreach ($clientes as  $cliente){
                                                echo '<tr>';
                                                echo '<td>';
                                                 $tipo = str_split($cliente->t_documento, 1);
                                                echo  $tipo[0] . "." . $tipo[1] . ". " . $cliente->documento;
                                                echo '</td>';
                                                    echo '<td>';
                                                echo ucwords($cliente->nombre);
                                                echo '<br>';
                                                echo  "<small> Tel: " .$cliente->telefono . "</small>" ;
                                                echo '</td>';
                                                echo '<td>';
                                                echo strtolower($cliente->email);
                                                echo '</td>';
                                                echo '<td>';
                                                echo ucfirst(mb_strtolower($cliente->ciudad, 'UTF-8')) . " - " .  ucfirst(mb_strtolower($cliente->depto, 'UTF-8')) . '<br>' . ucwords(strtolower($cliente->direccion));
                                                echo '</td>';
                                                echo '<td>';
                                                echo ucwords($cliente->eps);
                                                echo '</td>';
                                                echo '<td>';
                                                echo ucwords($cliente->contacto) . '<br>' ."<small> Tel: " . $cliente->contacto_tel . "</small>" ;
                                                echo '</td>';
                                                echo '<td class="text-center">';
                                                if($cliente->estado = 'ACT'){
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
                                                echo anchor(base_url() . 'administrador/Cliente/edit_view/' . $cliente->id_persona, '<i class="fa fa-pencil"></i>', $data_input);
                                                
                                                echo '<button class="borrar-btn btn btn-default" doc="' . $cliente->documento . '" type=button id="delete_persona" data-toggle="tooltip" title="Borrar">
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
                                        <th>EPS</th>
                                        <th>Contacto</th>
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
	                    	if($word_search != ''){
		                    	echo br(1);
			                	echo '<div class="form-group text-center">
										<i id="logo_i" class="fa fa-frown-o fa-5x"></i>';
			                   	echo heading('No se encontraron resultados.<br>Intente con otra opción.', 3, 'class="text-muted"');
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

<div class="modal fade modal-add" id="modal_add_client" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <!-- Modal content-->
            <?php 
                $data_input = array(
                    'id' => "nuevo_cliente_form",
                );            
                echo form_open('',$data_input);
            ?>                                  
                <div class="modal-content box">
                    <div class="overlay hidden" id="div_waiting_new_cliente">
                        <i class="fa fa-refresh fa-spin" id="i_refresh"></i>  
                    </div>                                 
                  <div class="modal-header">
                    <button type="button" class="close cancel-btn" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title">Agregar cliente</h3>
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
                         <div class="col-lg-6 form-group" >
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
                         <div class="col-lg-4 form-group">
                             <label class="control-label">Fecha de nacimiento: *</label>
                             <div class="input-group" id="div_inputNacimiento">
                                 <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
                                 <input type="text" class="form-control date-select" id="inputNacimiento" placeholder="MM/DD/YYYY" name="inputNacimiento">
                             </div>
                          </div>
                          <div class="col-lg-8 form-group">
                             <label class=" control-label">EPS:</label>
                             <div class="input-group" id="div_inputEps">
                                 <span class="input-group-addon"><i class="fa fa-hospital-o fa-fw"></i></span>
                                 <input type="text" class="form-control" id="inputEps" placeholder="Nombre EPS" name="inputEps">
                             </div>
                         </div>
                    </div>
                      <div class="row">
                         <div class="col-lg-4 form-group">
                             <label class=" control-label">Grupo sanguíneo: *</label>
                             <div class="input-group" id="div_selectGrupo">
                                 <span class="input-group-addon"><i class="fa fa-plus-square fa-fw"></i></span>
                                 <select class="form-control select2 select2-hidden-accessible" tabindex="-1" name="selectGrupo" id="selectGrupo">
                                     <option value="A">A</option>
                                     <option value="B">B</option>
                                     <option value="AB">AB</option>
                                     <option value="O">O</option>
                                </select>
                             </div>
                          </div>
                          <div class="col-lg-4 form-group">
                             <label  class=" control-label">RH: *</label>
                             <div class="input-group" id="div_selectRH">
                                 <span class="input-group-addon"><i class="fa  fa-plus-square fa-fw"></i></span>
                                 <select class="form-control select2 select2-hidden-accessible" tabindex="-1" name="selectRH" id="selectRH">
                                     <option value="+">+</option>
                                     <option value="-">-</option>
                                </select>
                             </div>
                          </div>
                          <div class="col-lg-4 form-group">
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
                     <h4>Información de Contacto:</h4>
                      <div class="row">

                         <div class="col-lg-6 form-group">
                             <label  class="control-label">Nombres y apellidos: *</label>
                             <div class="input-group" id="div_inputNombreContacto">
                                 <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                                 <input type="text" class="form-control" id="inputNombreContacto" placeholder="Nombres y apellidos" name="inputNombreContacto">
                             </div>
                          </div>
                          <div class="col-lg-6 form-group">
                             <label class="control-label">Teléfono: *</label>
                             <div class="input-group" id="div_inputTelContacto">
                                 <span class="input-group-addon"><i class="fa fa-phone fa-fw"></i></span>
                                 <input type="text" class="form-control" id="inputTelContacto" placeholder="Teléfono" name="inputTelContacto">
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
    $path = "administrador/Cliente/";
    echo '<script>
            var js_site_url = "'. site_url($path) . '";
            var tipo_usuario = "cliente";
          </script>';
?>
