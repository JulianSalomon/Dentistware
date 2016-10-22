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
                    <div class="box-header">
                        <h3 class="box-title">Ver odontólogo</h3>
                        <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-center">Agregar odontólogo</a>
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
                            	
                            	if($odontologos != NULL){
                            		 		foreach ($odontologos as $odontologo){
                            			echo '<tr>';
                                            echo '<td>';
                                            echo $odontologo->nombre;
                                            echo '<br>';
                                            echo $odontologo->t_documento . " " . $odontologo->documento;
                                            echo '</td>';
                                            echo '<td>';
                                            echo $odontologo->telefono;
                                            echo '</td>';
                                            echo '<td>';
                                            echo $odontologo->ciudad . '<br>' . $odontologo->direccion;
                                            echo '</td>';
                                            echo '<td>';
                                            echo $odontologo->email;
                                            echo '</td>';
                                            echo '<td>';
                                            echo $odontologo->estado;
                                            echo '</td>';
                                            echo '<td>';
                                            echo $odontologo->eps;
                                            echo '</td>';
                                            echo '<td>';
                                            echo $odontologo->contacto . '<br>' . $odontologo->contacto_tel;
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