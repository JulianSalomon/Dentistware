<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
          Multas
      </h1>
    </section>
    <section class="content">
        <div class="box box-primary">
            <div class="box-body"> 
                <?php if ($multas) { ?> 
                <div class="form-group col-xs-12 table-responsive">
                    <table id="tiposDeEquipo" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Concepto</th>
                                <th>Valor</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                echo '<tr>';
                                foreach ($multas as $multa) {
                                    echo '<td>';
                                    echo $multa->concepto_multa;
                                    echo '</td>';
                                    echo '<td>';
                                        echo $multa->valor_multa;
                                    echo '</td>';
                                    echo '<td align="center">';                                                                   
                                    echo '<div class="checkbox icheck" data-id = ' /*. $funcionario->idTercero */. '><label>';
                                    $valor = FALSE;
                                    if(strtoupper($multa->estado_multa) == 'ACT'){
                                    	$valor = TRUE;
                                    }
                                    $data = array(
                                    		'name'          => 'estado_func',
                                    		'id'            => 'estado_func',
                                    		'value'         => '',
                                    		'checked'       => $valor,
                                    		'data-id' =>  /*$funcionario->idTercero*/'',
                                    		'class' => 'check',
                                    );
                                    echo form_checkbox($data);
                                    echo '<span style="visibility:hidden">'. $multa->estado_multa .'</span>';
                                    echo '</label></div>';
                                    echo '</td>';
                                  echo '</div>
   
                           				 </tr>';
                                }
                            ?>
                        
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Concepto</th>
                                <th>Valor</th>
                                <th>Estado</th>
                            </tr>
                        </tfoot>                    
                    </table>
                    <?php 
                        } else {
                            if(true/*isset($error_search)*/){
                                echo br(1);
                                echo '<div class="form-group text-center">
                                <i id="logo_i" class="fa fa-frown-o fa-5x"></i>';
                                echo heading(/*$error_search*/'No hay multas', 3, 'class="text-muted"');
                                echo '</div>';
                            }
                        }              
                    ?>
                </div>
            
            
            </div>
            
            
        
        
        </div>
    </section>
</div>