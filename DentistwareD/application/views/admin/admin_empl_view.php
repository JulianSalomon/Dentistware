<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
          Empleados
      </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <button type="button" class="btn btn-info btn-small pull-right " data-toggle="modal" data-target="#modal_add_client">Agregar empleado</button>
                    </div>
                    <div class="box-body">
                        <p>En la siguiente tabla encuentra una lista de todos los empleados.</p><br>
                    <div class="table-responsive">
                        <table id="tablaCliente" class="table table-bordered table-hover">
                            <thead >
                                <tr>
                                    <th>Nombres y documento</th>
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
                            	
                            	if($empleados != NULL){
                            		 		foreach ($empleados as $empleado){
                            			echo '<tr>';
                                            echo '<td>';

                                            echo ucwords($empleado->nombre);
                                            echo '<br>';
                                            echo $empleado->t_documento . " " . $empleado->documento;
                                            echo '</td>';
                                            echo '<td>';
                                            echo $empleado->telefono;
                                            echo '</td>';
                                            echo '<td>';
                                            echo ucfirst(mb_strtolower($empleado->ciudad, 'UTF-8')) . '<br>' . ucwords(strtolower($empleado->direccion));
                                            echo '</td>';
                                            echo '<td>';
                                            echo strtolower($empleado->email);
                                            echo '</td>';
                                            echo '<td>';
                                            if($empleado->estado = 'ACT'){
                                                echo 'Activo';
                                            } else {
                                                echo 'Retirado';
                                            }
                                            echo '</td>';
                                            echo '<td>';
                                            echo ucwords($empleado->eps);
                                            echo '</td>';
                                            echo '<td>';
                                            echo ucwords($empleado->contacto) . '<br>' . ucwords($empleado->contacto_tel);
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