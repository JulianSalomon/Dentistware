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
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <div class="col-xs-6">
                            <h4>En la siguiente tabla encuentra una lista de todos los empleados.</h4>
                        </div>
                        <div class="col-xs-6">
                            <button type="button" class="btn btn-info btn-small pull-right" data-toggle="modal" data-target="#modal_add_empl">Agregar empleado</button>
                        </div>
                    </div>
                    <div class="box-body">                    
                        <div class="table-responsive">
                            <table id="tablaEmpl" class="table table-bordered table-hover">
                                <thead>                                
                                    <tr>
                                        <th>Documento</th>
                                        <th>Nombre y teléfono</th>
                                        <th>Ubicación</th>
                                        <th>Correo electrónico</th>
                                        <th>Estado</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <?php
                                        if($empleados != NULL){
                            		 		foreach ($empleados as $empleado){
                            			 echo '<tr>';
                                            echo '<td>';
                                            $tipo = str_split($empleado->t_documento, 1);
                                            echo  $tipo[0] . "." . $tipo[1] . ". " . $empleado->documento;
                                            echo '</td>';
                                            echo '<td>';
                                            echo ucwords($empleado->nombre);
                                            echo '<br>';
                                            echo  "<small> Tel: " .$empleado->telefono . "</small>" ;
                                            echo '</td>';
                                            echo '<td>';
                                            echo ucfirst(mb_strtolower($empleado->depto, 'UTF-8')) . " - " . ucfirst(mb_strtolower($empleado->ciudad, 'UTF-8')) . '<br>' . ucwords(strtolower($empleado->direccion));
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