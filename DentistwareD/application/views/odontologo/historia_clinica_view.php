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
                <div class="box box-primary">
                    <form role="form">
                        <div class="box-body">                            
                            <div class="col-xs-12 text-center ">
                                <?php
                                echo '<h2>' . ucwords($cliente['nombre']) . '</h2>';
                                echo br();
                                echo '<h4> Fecha de apertura ' . ' &nbsp &nbsp' . substr($historia_clinica->fecha_apertura, 0, 10) . '</h4>';
                                echo br();
                                ?>
                            </div>
                               <table class="table-responsive">
                                   <tr>
                                       <th class="text-left" style="width:20%">
                                           Antencedentes familiares:
                                       </th>
                                       <td style="width:5%"></td>
                                       <td style="width:80%">
                                           <?php
                                                echo $historia_clinica->antecedentes_fam;
                                           ?>
                                       </td>
                                   </tr>
                                   <tr>
                                        <th class="text-left" style="width:10%" >
                                           Enfermedad actual:
                                        </th>
                                        <td style="width:5%"></td>
                                        <td style="width:45%">
                                            <?php echo $historia_clinica->enfermedad_actual; ?>
                                        </td>
                                   </tr>
                                   <tr>
                                        <th class="text-left" style="width:10%" >
                                           Observaciones:
                                        </th>
                                        <td style="width:5%"></td>
                                        <td style="width:45%">
                                            <?php echo $historia_clinica->observaciones; ?>
                                        </td>
                                   </tr>
                                </table>

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
                                            echo substr($registro->fecha_reg, 0, 10);
                                            echo '</td>';
                                            echo '<td>';
                                            echo $registro->desc_procedimiento;
                                            echo '<td class="text-center">
                                                <button class="btn verRegistro-btn" type="button" name="verRegistro" value="'. $registro->id_registro . '" >
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
        $this->data['id_registro'] = $_POST['reg'];

<!-- Modal -->
<div id="verRegistro" class="modal fade modal-add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div id="verRegistroModal" class="modal-dialog modal-lg">
        <div class="modal-content">
            <div id="verRegistro_html"></div>
        </div>
    </div>
</div>

<?php
    $path = "odontologo/";
    echo '<script>
            var js_site_url = "'. site_url($path) . '";
          </script>';
?>