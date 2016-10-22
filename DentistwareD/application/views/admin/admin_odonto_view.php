<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
          Odontólogos
      </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <button type="button" class="btn btn-info btn-small pull-right " data-toggle="modal" data-target="#modal_add_client">Agregar odontólogo</button>
                    </div>
                    <div class="box-body">
                        <p>En la siguiente tabla encuentra una lista de todos los odontólogos.</p><br>
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
                            	
                            	if($odontologos != NULL){
                            		 		foreach ($odontologos as $odontologo){
                            			echo '<tr>';
                                            echo '<td>';

                                            echo ucwords($odontologo->nombre);
                                            echo '<br>';
                                            echo $odontologo->t_documento . " " . $odontologo->documento;
                                            echo '</td>';
                                            echo '<td>';
                                            echo $odontologo->telefono;
                                            echo '</td>';
                                            echo '<td>';
                                            echo ucfirst(mb_strtolower($odontologo->ciudad, 'UTF-8')) . '<br>' . ucwords(strtolower($odontologo->direccion));
                                            echo '</td>';
                                            echo '<td>';
                                            echo strtolower($odontologo->email);
                                            echo '</td>';
                                            echo '<td>';
                                            if($odontologo->estado = 'ACT'){
                                                echo 'Activo';
                                            } else {
                                                echo 'Retirado';
                                            }
                                            echo '</td>';
                                            echo '<td>';
                                            echo ucwords($odontologo->eps);
                                            echo '</td>';
                                            echo '<td>';
                                            echo ucwords($odontologo->contacto) . '<br>' . ucwords($odontologo->contacto_tel);
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