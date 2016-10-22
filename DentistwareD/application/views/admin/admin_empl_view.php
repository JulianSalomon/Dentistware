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
                        <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-center">Agregar empleado</a>
                    </div>
                    <div class="box-body">
                        <p>En la siguiente tabla encuentra .</p><br>
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
                                            echo ucwords($cliente->contacto) . '<br>' . ucwords($cliente->contacto_tel);
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