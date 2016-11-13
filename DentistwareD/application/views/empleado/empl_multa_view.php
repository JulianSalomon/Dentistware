<div class="content-wrapper">
    <section class="content-header">
      <h1>
          Multas
      </h1>
    </section>
    <section class="content">
        <div class="box box-primary">
			<div class="box-header with-border">
				<div>
					<h4>En la siguiente tabla encuentra las multas sin pagar de <?php echo $persona->nombre_persona?></h4>
				</div>
			</div>        
            <div class="box-body"> 
                <?php if ($multas) { ?> 
                <div class="table-responsive">
                    <table type='tabla' class="table table-bordered table-hover datatable">
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
                                    echo '<div class="checkbox icheck"><label>';
                                    $data = array(
                                    		'name'          => 'estado_multa',
                                    		'id'            => 'estado_multa',
                                    		'value'         => '',
                                    		'checked'       => FALSE,
                                    		'data-id' =>  $multa->id_multa,
                                    		'class' => 'check',
                                    );
                                    echo form_checkbox($data);
                                    echo '</label></div>';
                                    echo '</td>';                                    
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
                          	echo br(1);
                            echo '<div class="form-group text-center">
                            	<i id="logo_i" class="fa fa-smile-o fa-5x"></i>';
                            echo heading('No tiene un registro de multas por pagar', 3, 'class="text-muted"');
                            echo br(1);
                            echo '<hr>';
                            $data_input = array(
                            		'type' => 'button',
                            		'class' => 'btn btn-primary',
                            );
                            echo anchor(base_url() . 'empleado/Cliente/search/', 'Volver', $data_input);
                            
                            echo '</div>';
                           
                        }              
                    ?>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
var js_site_url = '<?php echo site_url("empleado/Cliente/");?>';
</script>