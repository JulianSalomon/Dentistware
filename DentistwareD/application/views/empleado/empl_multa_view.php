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
					<h4>En la siguiente tabla encuentra las multas sin pagar de <?php echo ucwords($persona->nombre_persona); ?></h4>
				</div>
			</div>        
            <div class="box-body"> 
                <?php if ($multas) { ?> 
                <small>*Para cancelar una multa debe seleccionar la multa deseada, y esta será cancelada automaticamente.</small>
                <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="table-responsive col-lg-6">
                        <table class="table table-bordered table-hover datatable tabla-usuario">
                            <thead>
                                <tr>
                                    <th>Concepto Multa</th>
                                    <th style="width:80px">Valor multa</th>
                                    <th style="width:20px">Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($multas as $multa) {
                                    echo '<tr>';
                                        echo '<td>';
                                        echo $multa->concepto_multa;
                                        echo '</td>';
                                        echo '<td align="left">';
                                        echo "$ " . $multa->valor_multa;
                                        echo '</td>';
                                        echo '<td align="center">';
                                        echo '<div class="checkbox icheck estado_multa"><label>';
                                        $data = array(
                                                'id'            => 'estado_multa',
                                                'name'          => 'estado_multa',
                                                'value'         => $multa->id_multa,
                                                'checked'       => FALSE,
                                                'class' => 'estado_multa',
                                        );
                                        echo form_checkbox($data);
                                        echo '</label></div>';
                                        echo '</td>';  
                                    echo '</    tr>';                                  
                                    }
                                ?>                        
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Concepto</th>
                                    <th>Valor multa</th>
                                    <th>Estado</th>
                                </tr>
                            </tfoot>                    
                        </table>
                        <?php 
                            } else {
                                echo br(1);
                                echo '<div class="form-group text-center">
                                    <i id="logo_i" class="fa fa-smile-o fa-5x"></i>';
                                echo heading(ucwords($persona->nombre_persona) . ", no tiene multas por pagar.", 3, 'class="text-muted"');
                                echo '<hr>';
                                echo '</div>';                                     
                            }    
                            echo '<div class="form-group text-center">';
                            echo '<button type="button" class="volver-btn btn btn-primary btn-lg">Volver</button>';
                            echo '</div>';
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
	var js_site_url = '<?php echo site_url("empleado/Cliente/");?>';
</script>