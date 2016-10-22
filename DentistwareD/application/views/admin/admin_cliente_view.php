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
                        <h1 class="box-title">Ver clientes</h1>
                        <button type="button" class="btn btn-info btn-small pull-right " data-toggle="modal" data-target="#modal_add_client">Agregar cliente</button>
                        <!-- Modal -->
                        <div id="modal_add_client" class="modal fade with-border " role="dialog">
                          <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h3 class="modal-title">Agregar cliente</h3>
                              </div>
                              <div class="modal-body">
                                 <form class="form-horizontal">
                                        <div class="form-group">
                                          <label for="inputNombre" class="col-sm-2 control-label ">Nombres y apellidos</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputNombre" placeholder="Nombres y apellidos">
                                          </div>
                                        </div>
                                            <div class="form-group">
                                                <label for="inputEmail" class="col-sm-2 control-label">Correo electrónico</label>
                                                <div class="col-sm-10">
                                                    <input type="email" class="form-control" id="inputEmail" placeholder="Correo electrónico">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                            <label for="inputPassword" class="col-sm-2 control-label">Contraseña</label>
                                            <div class="col-sm-5">
                                              <input type="password" class="form-control" id="inputPassword" placeholder="Contraseña">
                                            </div>
                                            <div class="col-sm-5">
                                              <input type="password" class="form-control" id="inputPasswordConfirm" placeholder="Confirmar contraseña">
                                            </div>
                                     </div>
                                     <div class="form-group">
                                          <label  class="col-sm-2 control-label">Tipo de Documento</label>
                                            <div class="col-sm-5">
                                                <select class="form-control select2 select2-hidden-accessible" tabindex="-1">
                                                    <option>Tarjeta de identidad</option>
                                                    <option>Cédula de ciudadanía</option>
                                                    <option>Cédula de extranjería</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" id="inputDocumento" placeholder="Número de documento">
                                            </div>
                                     </div>
                                     <div class="form-group">
                                         <label class="col-sm-2 control-label">Fecha de nacimiento</label>
                                         <div class="col-sm-4">
                                             <input type="text" class="form-control" id="datepicker" placeholder="Fecha de nacimiento">
                                         </div>
                                         <label  class="col-sm-1 control-label">Edad</label>
                                         <div class="col-sm-2">
                                             <input type="text" class="form-control" id="inputEdad" placeholder="Edad">
                                         </div>
                                         <label  class="col-sm-1 control-label">Género</label>
                                         <div class="col-sm-2">
                                             <input type="text" class="form-control" id="inputGenero" placeholder="Género">
                                         </div>
                                     </div>
                                     <div class="form-group">
                                         <label class="col-sm-2 control-label">Departamento</label>
                                         <div class="col-sm-4">
                                             <select class="form-control select2 select2-hidden-accessible" tabindex="-1">
                                                 <option>CUNDINAMARCA</option>
                                                 <option>ANTIOQUIA</option>
                                                 <option>BOYACÁ</option>
                                            </select>
                                         </div>
                                         <label  class="col-sm-2 control-label">Ciudad</label>
                                         <div class="col-sm-4">
                                             <select class="form-control select2 select2-hidden-accessible" tabindex="-1">
                                                 <option>BOGOTÁ DC</option>
                                                 <option>MEDELLÍN</option>
                                                 <option>TUNJA</option>
                                            </select>
                                         </div>
                                     </div>
                                     <div class="form-group">
                                         <label class="col-sm-2 control-label">Teléfono</label>
                                         <div class="col-sm-4">
                                             <input type="text" class="form-control" id="inputTelefono" placeholder="Teléfono">
                                         </div>
                                         <label  class="col-sm-2 control-label">Dirección de residencia</label>
                                         <div class="col-sm-4">
                                             <input type="text" class="form-control" id="inputDireccion" placeholder="Dirección de residencia">
                                         </div>
                                     </div>
                                     <div class="form-group">
                                         <label class="col-sm-2 control-label">Grupo sanguíneo</label>
                                         <div class="col-sm-2">
                                             <select class="form-control select2 select2-hidden-accessible" tabindex="-1">
                                                 <option>A</option>
                                                 <option>B</option>
                                                 <option>AB</option>
                                                 <option>O</option>
                                            </select>
                                         </div>
                                         <label  class="col-sm-1 control-label">RH</label>
                                         <div class="col-sm-2">
                                             <select class="form-control select2 select2-hidden-accessible" tabindex="-1">
                                                 <option>+</option>
                                                 <option>-</option>
                                            </select>
                                         </div>
                                         <label class="col-sm-1 control-label">EPS</label>
                                         <div class="col-sm-4">
                                             <input type="text" class="form-control" id="inputEps" placeholder="Nombre EPS">
                                         </div>
                                     </div>
                                     <hr>
                                     <h4>Información de contacto</h4>
                                     <div class="form-group">
                                         <label  class="col-sm-2 control-label">Nombres y apellidos</label>
                                         <div class="col-sm-4">
                                             <input type="text" class="form-control" id="inputNombreContacto" placeholder="Nombres y apellidos">
                                         </div>
                                         <label class="col-sm-2 control-label">Teléfono</label>
                                         <div class="col-sm-4">
                                             <input type="text" class="form-control" id="inputTelefono" placeholder="Teléfono">
                                         </div>
                                     </div>
                                  </form>
                              <div class="modal-footer">
                                <button type="button" data_dismiss="modal" class="btn btn-default pull-left">Cancelar</button>
                                <button type="submit" class="btn btn-info pull-right">Agregar</button>
                              </div>
                            </div>
                              
                          </div>
                        </div>
                    </div>
                    </div>
                    <div class="box-body">
                        <p>En la siguiente tabla encuentra una lista de todas sus citas agendadas actualmente, si desea cancelar una cita, haga click sobre el espacio en blanco de la columna cancelar de las citas y posteriormente presione Cancelar citas.</p><br>
                    <div class="table-responsive">
                        <table id="tablaCliente" class="table table-bordered table-hover">
                            <thead class="text-center">
                                <tr>
                                    <th>Nombre y documento</th>
                                    <th>Teléfono</th>
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
                            		 		foreach ($clientes as $cliente){
                            			echo '<tr>';
                                            echo '<td>';
                                            echo ucwords($cliente->nombre);
                                            echo '<br>';
                                            echo $cliente->t_documento . " " . $cliente->documento;
                                            echo '</td>';
                                            echo '<td>';
                                            echo $cliente->telefono;
                                            echo '</td>';
                                            echo '<td>';
                                            echo ucfirst(mb_strtolower($cliente->ciudad, 'UTF-8')) . '<br>' . ucwords(strtolower($cliente->direccion));
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
<<<<<<< HEAD
                                            echo $cliente->contacto . '<br>' . $cliente->contacto_tel;
=======
                                            echo ucwords($cliente->contacto);
>>>>>>> a078931393b46470b60bf60237462601d4bed078
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