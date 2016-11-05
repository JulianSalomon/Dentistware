<div class="content-wrapper">
    <section class="content-header">
      <h1>
          Multas
      </h1>
    </section>
    <section class="content">
        <div class="box box-primary">
			<div class="box-header with-border">
				<div class="col-xs-6">
					<h4>En la siguiente tabla encuentra el historia de sus multas.</h4>
				</div>
			</div>        
            <div class="box-body"> 
                <?php if ($multas) { ?> 
                <div class="form-group col-xs-12 table-responsive">
                    <table id="multasCliente" class="table table-bordered table-striped">
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
									if($multa->estado_multa = 'ACT'){
                                    	echo '<i class="fa fa-check-square-o"></i>';
									} else {
                                    	echo '<i class="fa fa-square-o"></i>';
                                  	}
                                    echo '</td>';
                           			echo '</tr>';
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
                            echo heading('No tiene un registro de multas', 3, 'class="text-muted"');
                            echo '</div>';
                        }              
                    ?>
                </div>
            </div>
        </div>
    </section>
</div>