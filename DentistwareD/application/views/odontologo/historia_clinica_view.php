<div class="content-wrapper">
                <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Historia Clinica
        </h1>
    </section>

                <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <form role="form">
                        <div class="box-body">
                            
                            <div class="col-xs-12 text-center ">
                                <?php
                                echo '<label>' . ucwords($historia_clinica_info->nombre_persona) . '</label>';
                                echo '<BR>';
                                echo '<label> Fecha de apertura ' . ' &nbsp &nbsp' . substr($historia_clinica_info->fecha_apertura, 0, 10) . '</label>';
                                echo '<BR>';
                                echo '<BR>';
                                ?>
                            </div>
                            <div class="col-xs-4 text-left " >
                                
                            </div>
                            <div class="col-xs-3 text-left " >
                                <label>
                                Motivo de la consulta:
                                <BR>
                                Antencedentes familiares:
                                <BR>
                                Enfermedad actual:
                                <BR>
                                Observaciones:
                                <BR>                                
                                </label>
                            </div>
                            
                                    
                            <div class="col-xs-4 text-left " >
                                <?php                                
                                echo  $historia_clinica_info->motivo_consulta;
                                echo '<BR>';
                                echo  $historia_clinica_info->antecedentes_fam;
                                echo '<BR>';
                                echo $historia_clinica_info->enfermedad_actual;
                                echo '<BR>';
                                echo $historia_clinica_info->observaciones ;
                                
                                ?>
                            </div>
                            
                                            
                    
                        <div class="table-responsive">
                            <table id="tablaRegistro" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Descripcion</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <?php 
                            	
                            	if($registros != NULL){
                                    foreach ($registros as $registro){
                                            echo '<tr>';
                                            echo '<td>';
                                            echo  $registro->fecha;
                                            echo '</td>';
                                            echo '<td>';
                                            echo ucwords($registro->desc_procedimiento);
                                            echo '</td>';
                            			echo '</tr>';   
                            		}
                            	}
                            ?>
                            </tbody>
                        </table>
                    </div>
                    

                
                                            
                                            

                                            
                        </div>
                    </form>
                            
                            
                </div>
            </div>
        </div>
</section>
        <!-- /.content -->
</div>