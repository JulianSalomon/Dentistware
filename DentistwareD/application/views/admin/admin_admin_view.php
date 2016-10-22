<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
          Administradores
      </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <button type="button" class="btn btn-info btn-small pull-right " data-toggle="modal" data-target="#modal_add_client">Agregar admnistrador</button>
                    </div>
                    <div class="box-body">
                        <p>En la siguiente tabla encuentra una lista de todos los administradores.</p><br>
                    <div class="table-responsive">
                        <table id="tablaCliente" class="table table-bordered table-hover">
                            <thead >
                                <tr>
                                    <th>Nombre y documento</th>
                                    <th>Teléfono</th>
                                    <th>Ubicación</th>
                                    <th>Correo electrónico</th>
                                    <th>Estado</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                            	
                            	<?php 
                            
                            	if($admins != NULL){
                            		foreach ($admins as $administrador){
                            			echo '<tr>';
                                            echo '<td>';
                                            echo ucwords($administrador->nombre);
                                            echo '<br>';
                                            echo $administrador->t_documento . " " . $administrador->documento;
                                            echo '</td>';
                                            echo '<td>';
                                            echo $administrador->telefono;
                                            echo '</td>';
                                            echo '<td>';
                                            echo ucfirst(mb_strtolower($administrador->ciudad, 'UTF-8')) . '<br>' . ucwords(strtolower($administrador->direccion));
                                            echo '</td>';
                                            echo '<td>';
                                            echo strtolower($administrador->email);
                                            echo '</td>';
                                            echo '<td>';
                                            if($administrador->estado = 'ACT'){
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