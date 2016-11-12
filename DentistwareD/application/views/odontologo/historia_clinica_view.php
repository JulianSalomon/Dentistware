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
                                echo br(1);
                                echo '<label> Fecha de apertura ' . ' &nbsp &nbsp' . substr($historia_clinica_info->fecha_apertura, 0, 10) . '</label>';
                                echo br(2);
                                ?>
                            </div>
                            
                            <div class="text-align:center;">
                               <table style="width:100%" align="center">
                                   <?php

                                  echo "<tr>";                                   
                                    echo "<th class= text-right style= width:30% >Motivo de la consulta:</th>";
                                      echo "<td style= width:10% > </td>";
                                   echo "<td style= width:60% > " . "<input type= text class= form-control id= inputNombre placeholder= Nombres y apellidos  name= inputNombre >" . "</td>";
                                  echo "</tr>";

                                  echo "<tr>";
                                    echo "<th class= text-right style= width:45% >Antencedentes familiares:</td>";
                                      echo "<td style= width:10% > </td>";
                                    echo "<td style= width:45% > " . $historia_clinica_info->antecedentes_fam . " </td>";
                                  echo "</tr>";

                                   echo "<tr>";
                                    echo "<th class= text-right style= width:45% >Enfermedad actual:</td>";
                                      echo "<td style= width:10% > </td>";
                                    echo "<td style= width:45% > " . $historia_clinica_info->enfermedad_actual . "</td>";
                                  echo "</tr>";
                                  
                                   echo "<tr>";
                                    echo "<th class= text-right style= width:45% >Observaciones:</th>";
                                      echo "<td style= width:10% > </td>";
                                    echo "<td style= width:45% > " . $historia_clinica_info->observaciones . "</td>";
                                  echo "</tr>";

                                   ?>
                                </table>
                            </div>

                        <div class="table-responsive">
                            <table id="tablaRegistro" type='tabla' class="table table-bordered table-hover tabla-usuario " style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width:20%">Fecha</th>
                                        <th style="width:60%">Descripcion</th>
                                        <th style="width:20%">Seleccionar</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <?php 
                            	
                            	if($registros != NULL){
                                    foreach ($registros as $registro){
                                            echo '<tr>';
                                            echo '<td>';
                                            echo  substr($registro->fecha_reg, 0, 10);
                                            echo '</td>';
                                            echo '<td>';
                                            echo ucwords($registro->desc_procedimiento);
                                            echo '<td class="text-center">
                                                <button class="btn verRegistro-btn" type="submit" data-toggle="modal" data-target="#modal_add_odont" name="verRegistro" value="'. $registro->fecha_reg . '" >
                                                    <i class="fa fa-file-text-o"></i>
                                                </button>
                                                
                                                </td>';
                                            echo '</td>';
                            			echo '</tr>';   
                            		}
                            	}
                            ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Descripcion</th>
                                    <th>Seleccionar</th>
                                </tr>
                            </tfoot>
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





<!-- Modal -->
<div class="modal fade modal-add" id="modal_add_odont" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <!-- Modal content-->
        <div class="modal-content box">
            <div class="overlay hidden" id="div_waiting_new_odont">
                <i class="fa fa-refresh fa-spin" id="i_refresh"></i>
            </div>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                
                 <h3 class="modal-title">Informacion registro </h3>
                
            </div>
            <div class="modal-body">
                
                
                <div class="text-align:center;">
                   <table style="width:100%" align="center">
                       <pre>
                       <?php 
                       print_r ($_POST);
                        ?>
                       </pre>
                       
                       <?php      
                       echo $_REQUEST['verRegistro'];
                       foreach ($registros as $registro){
                           if($registro->fecha_reg == $_POST){
                               echo "<tr>";
                                echo "<th class= text-right style= width:45% >Odontologo:</td>";
                                  echo "<td style= width:10% > </td>";
                                echo "<td style= width:45% > " . ucwords($registro->nombre_persona) . "</td>";
                              echo "</tr>";

                                echo "<tr>";
                                echo "<th class= text-right style= width:45% >Descripcion:</td>";
                                  echo "<td style= width:10% > </td>";
                                echo "<td style= width:45% > " . substr($registro->fecha_reg, 0, 10) .  "</td>";
                              echo "</tr>";

                               echo "<tr>";
                                echo "<th class= text-right style= width:45% >Observaciones:</th>";
                                  echo "<td style= width:10% > </td>";
                                echo "<td style= width:45% > " . $historia_clinica_info->observaciones . "</td>";
                              echo "</tr>";
                            }
                       }
                       ?>
                    </table>
                </div>
                
                
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>