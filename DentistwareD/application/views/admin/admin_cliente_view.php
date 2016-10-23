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
                        <button type="button" class="btn btn-info btn-small pull-right " data-toggle="modal" data-target="#modal_add_client">Agregar cliente</button>       
                                        </div>
                 <div class="box-body">
                    <p>En la siguiente tabla encuentra una lista de todos los clientes.</p><br>
                    <div class="table-responsive">
                        <table id="tablaCliente" class="table table-bordered table-hover">
                            <thead class="">
                                <tr>
                                    <th>Documento</th>
                                    <th>Nombre y teléfono</th>
                                    <th>Ubicación</th>
                                    <th>Correo electrónico</th>
                                    <th>Estado</th>
                                    <th>EPS</th>
                                    <th>Contacto</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                            	<?php 
                            		if($clientes != NULL){
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
                                            echo ucfirst(mb_strtolower($cliente->depto, 'UTF-8')) . " - " .  ucfirst(mb_strtolower($cliente->ciudad, 'UTF-8')) . '<br>' . ucwords(strtolower($cliente->direccion));
                                            echo '</td>';
                                            echo '<td>';
                                            echo strtolower($cliente->email);
                                            echo '</td>';
                                            echo '<td>';
                                            if($cliente->estado = 'ACT'){
                                                echo 'Activo';
                                            } else {
                                                echo 'Retirado';
                                            }
                                            echo '</td>';
                                            echo '<td>';
                                            echo ucwords($cliente->eps);
                                            echo '</td>';
                                            echo '<td>';
                                            echo ucwords($cliente->contacto) . '<br>' ."<small> Tel: " .$cliente->contacto_tel . "</small>" ;
                                            echo '</td>';
                                            echo '<td><button><i class="fa fa-pencil"></i></button><button><i class="fa fa-trash"></i></button></td>';
                            			echo '</tr>';   
                            		}
                            	}                            	
                            	?>
                            </tbody>
                        </table>
                    </div>
                    </div>
            </div>
        </div>
    </div>
    </section>
    <!-- /.content -->
  </div>
<div class="modal fade" id="modal_add_client" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <!-- Modal content-->
            <?php 
            $data_input = array(
            		'id' => "nuevo_cliente_form",
            );            
            echo form_open('',$data_input);?>                  
                
                <div class="modal-content box">
                    <div class="overlay hidden" id="div_waiting_new_cliente">
                        <i class="fa fa-refresh fa-spin" id="i_refresh"></i>  
                    </div>                                 
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title">Agregar cliente</h3>
                  </div>
                  <div class="modal-body">
                      <div class="row">
                         <div class="col-lg-6 form-group">
                              <label  class="control-label">Tipo de Documento</label>
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
                              <label  class="control-label">N. de Documento</label>
                            <div class="input-group" id="div_inputDocumento">
                                <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                                <input type="text" class="form-control" id="inputDocumento" placeholder="Número de documento" name="inputDocumento">
                            </div>
                        </div>                                                                                                  
                      </div>
                        <div class="form-group">
                          <label for="inputNombre" class=" control-label ">Nombres y apellidos</label>
                          <div class="input-group" id="div_inputNombre">
                              <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                            <input type="text" class="form-control" id="inputNombre" placeholder="Nombres y apellidos" name="inputNombre">
                          </div>
                        </div>
                         <div class="form-group">
                             <label class=" control-label">Teléfono(s)</label>
                             <div class="input-group" id="div_inputTelefono">
                                 <span class="input-group-addon"><i class="fa fa-phone fa-fw"></i></span>
                                 <input type="text" class="form-control" id="inputTelefono" placeholder="Teléfono" name="inputTelefono">
                             </div>
                         </div>                                  
                      <div class="form-group">
                             <label  class="control-label">Dirección de residencia</label>
                             <div class="input-group" id="div_inputDireccion">
                                 <span class="input-group-addon"><i class="fa fa-home fa-fw"></i></span>
                                 <input type="text" class="form-control" id="inputDireccion" placeholder="Dirección de residencia" name="inputDireccion">
                             </div>                                  
                      </div>                                                                  
                        <div class="row">
                         <div class="col-lg-6 form-group" >
                             <label class="control-label">Departamento</label>
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
                             <label  class="control-label">Ciudad</label>
                             <div class="input-group">
                                 <span class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i></span>                 
                                 <select class="form-control select2 select2-hidden-accessible" tabindex="-1" id="select_ciudades" name="select_ciudades" disabled>
                                     <option value="-1"> Seleccione un Departamento</option>
                                 </select>
                             </div>
                         </div>                                                                          
                      </div>  
                        <div class="form-group">
                            <label for="inputEmail" class="control-label">Correo electrónico</label>
                            <div class="input-group" id="div_inputEmail">
                                <span class="input-group-addon"><i>@</i></span>                 
                                <input type="email" class="form-control" id="inputEmail" placeholder="Correo electrónico" name="inputEmail">
                            </div>
                        </div>                                  
                    <div class="row">
                        <div class="col-lg-6 form-group">
                            <label for="inputPassword" class="control-label">Contraseña</label>
                            <div class="input-group" id="div_inputPassword">
                                <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                                <input type="password" class="form-control" id="inputPassword" placeholder="Contraseña" name="inputPassword">
                            </div>
                        </div>
                        <div class="col-lg-6 form-group">
                            <label for="inputPasswordConfirm" class="control-label">Confirmar Contraseña</label>
                            <div class="input-group" id="div_inputPasswordConfirm">
                                <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                              <input type="password" class="form-control" id="inputPasswordConfirm" placeholder="Confirmar contraseña" name="inputPasswordConfirm">
                            </div>
                        </div>                                                                    
                      </div>                                  
                      <div class="row">
                         <div class="col-lg-4 form-group">
                             <label class="control-label">Fecha de nacimiento</label>
                             <div class="input-group" id="div_inputNacimiento">
                                 <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
                                 <input type="text" class="form-control" id="inputNacimiento" placeholder="MM/DD/YYYY" name="inputNacimiento">
                             </div>
                          </div>
                          <div class="col-lg-4 form-group">
                             <label  class="control-label">Edad</label>
                             <div class="input-group" id="div_inputEdad">
                                 <span class="input-group-addon"><i class="fa fa-birthday-cake fa-fw"></i></span>
                                 <input type="text" class="form-control" id="inputEdad" placeholder="Edad" name="inputEdad">
                             </div>
                          </div>
                          <div class="col-lg-4 form-group">
                             <label  class="control-label">Género</label>
                             <div class="input-group" id="div_inputGenero">
                                 <span class="input-group-addon"><i class="fa fa-venus-mars fa-fw"></i></span>
                                 <input type="text" class="form-control" id="inputGenero" placeholder="Género" name="inputGenero">
                             </div>
                         </div>                                  
                      </div>
                      <div class="row">
                         <div class="col-lg-4 form-group">
                             <label class=" control-label">Grupo sanguíneo</label>
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
                             <label  class=" control-label">RH</label>
                             <div class="input-group" id="div_selectRH">
                                 <span class="input-group-addon"><i class="fa  fa-plus-square fa-fw"></i></span>
                                 <select class="form-control select2 select2-hidden-accessible" tabindex="-1" name="selectRH" id="selectRH">
                                     <option value="+">+</option>
                                     <option value="-">-</option>
                                </select>
                             </div>
                          </div>
                          <div class="col-lg-4 form-group">
                             <label class=" control-label">EPS</label>
                             <div class="input-group" id="div_inputEps">
                                 <span class="input-group-addon"><i class="fa fa-hospital-o fa-fw"></i></span>
                                 <input type="text" class="form-control" id="inputEps" placeholder="Nombre EPS" name="inputEps">
                             </div>
                         </div>                                  


                      </div>
                     <hr>
                     <h4>Información de contacto</h4>
                      <div class="row">

                         <div class="col-lg-6 form-group">
                             <label  class="control-label">Nombres y apellidos</label>
                             <div class="input-group" id="div_inputNombreContacto">
                                 <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                                 <input type="text" class="form-control" id="inputNombreContacto" placeholder="Nombres y apellidos" name="inputNombreContacto">
                             </div>
                          </div>
                          <div class="col-lg-6 form-group">
                             <label class="control-label">Teléfono</label>
                             <div class="input-group" id="div_inputTelContacto">
                                 <span class="input-group-addon"><i class="fa fa-phone fa-fw"></i></span>
                                 <input type="text" class="form-control" id="inputTelContacto" placeholder="Teléfono" name="inputTelContacto">
                             </div>
                         </div>                                  

                      </div>                                 
                         </div>
                         <div class="modal-footer">

                        <button type="button" data-dismiss="modal" class="btn btn-default pull-left">Cancelar</button>

                        <input type="submit" name="submit_reg" class="btn btn-info pull-right" value="Guardar">

                    </div>                                                                
                </div>
              <?php echo form_close(); ?>
        </div>
</div>
<script>
	var js_site_url = '<?php echo site_url();?>';
</script> 