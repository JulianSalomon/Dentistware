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
                    <div class="box-header">
                        <h3 class="box-title">Ver clientes</h3>
                        <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-center">Agregar empleado</a>
                    </div>
                    <div class="box-body">
                        <p>En la siguiente tabla encuentra una lista de todos los administradores.</p><br>
                    <div class="table-responsive">
                        <table id="tablaCliente" class="table table-bordered table-hover">
                            <thead >
                                <tr>
                                    <th>Nombres, Apellidos y Documento</th>
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
                                            echo $empleado->nombre;
                                            echo '<br>';
                                            echo $empleado->t_documento . " " . $empleado->documento;
                                            echo '</td>';
                                            echo '<td>';
                                            echo $empleado->telefono;
                                            echo '</td>';
                                            echo '<td>';
                                            echo $empleado->ciudad . '<br>' . $empleado->direccion;
                                            echo '</td>';
                                            echo '<td>';
                                            echo $empleado->email;
                                            echo '</td>';
                                            echo '<td>';
                                            echo $empleado->estado;
                                            echo '</td>';
                                            echo '<td>';
                                            echo $empleado->eps;
                                            echo '</td>';
                                            echo '<td>';
                                            echo $empleado->contacto . '<br>' . $empleado->contacto_tel;
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