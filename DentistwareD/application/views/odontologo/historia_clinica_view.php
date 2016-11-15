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
								<a type="button" class="btn pull-right agregarRegistro-btn" data-toggle="modal" data-target="#agregarRegistro" title="Agregar registro">
								<i class="fa fa-fw fa-plus-square fa-3x"></i>
								</a>
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
											                   <button class="btn btn-primary verRegistro-btn" type="button" name="verRegistro" value="'. $registro->id_registro . '" >
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

<!-- Modal ver registro -->
<div id="verRegistro" class="modal fade modal-add" role="dialog" aria-labelledby="verRegistroLabel">
	<div id="verRegistroModal" class="modal-dialog modal-lg">
		<div class="modal-content">
			<div id="verRegistro_html"></div>
		</div>
	</div>
</div>

<!-- Modal agregar registro -->
<div id="agregarRegistro" class="modal fade modal-add" role="dialog" aria-labelledby="agregarRegistroLabel">
	<div id="agregarRegistroModal" class="modal-dialog modal-lg">
		<div class="modal-content">
            <form id="nuevoRegistro_form">
                <div class="box box-primary">
                    <div class="box-header">
                        <button type="button" class="close salir-btn" data-dismiss="modal">&times;</button>
                        <h2>Agregar un nuevo registro </h2>
                        <hr>
                    </div>
                    <div class="box-body">
                        <div class="text-align:center">
                            <table style="width:100%" align="left">
                                <tr>
                                    <th class="text-left" style="width:10%" >
                                        Motivo:
                                    </th>
                                    <td style="width:5%"></td>
                                    <td style="width:70%">
                                        <input type="text" class="form-control" id="inputMotivo" placeholder="Motivo de consulta" name="inputMotivo">
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-left" style="width:10%" >
                                        Descripción:
                                    </th>
                                    <td style="width:5%"></td>
                                    <td style="width:70%">                                  
                                        <input type="text" class="form-control" id="inputDescripcion" placeholder="Descripción del procedimiento" name="inputDescripcion">
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-left" style="width:10%" >
                                        Enfermedad:
                                    </th>
                                    <td style="width:5%"></td>
                                    <td style="width:70%">
                                        <input type="text" class="form-control" id="inputEnfermedad" placeholder="Enfermedad actual del paciente" name="inputEnfermedad">
                                    </td>
                                </tr>
                            </table>
                            <input type="hidden" id="inputHistoria" name="inputHistoria" value=<?php echo $historia_clinica->id_historia; ?> >
                        </div>
                    </div>
                    <div class="box-header">
                        <hr>
                        <h3 class="modal-title">Odontodiagrama</h3>
                        <hr style="margin-top:10px;margin-bottom:10px;">
                    </div>
                    <div class="box-body">
                        <div class="text-center">
                            <div id="" class="col-xs-3 table-responsive">
                                <h4>Convenciones</h4>
                                <hr>
                                <table style="width:80%" align="center">
                                    <tr>
                                        <td>
                                            <input type="radio" name="state" value="A" checked>
                                        </td>
                                        <th class="text-left">
                                            Ausente
                                        </th>
                                        <td style="width:20%"></td>
                                        <td class="text-right">
                                            <i class="fa fa-times" id="i_refresh" ></i>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="radio" name="state" value="E">
                                        </td>
                                        <th class="text-left">
                                            Extraer
                                        </th>
                                        <td style="width:20%"></td>
                                        <td class="text-right">
                                            <b style="font-size=20">=</b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="radio" name="state" value="D">
                                        </td>
                                        <th class="text-left">
                                            Caries
                                        </th>
                                        <td style="width:20%"></td>
                                        <td class="text-right">
                                            <i class="fa fa-circle" style="color:blue" id="i_refresh"></i>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="radio" name="state" value="O">
                                        </td>
                                        <th class="text-left">
                                            Obturación
                                        </th>
                                        <td style="width:20%"></td>
                                        <td class="text-right">
                                            <i class="fa fa-circle" style="color:red" id="i_refresh"></i>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="radio" name="state" value="C">
                                        </td>
                                        <th class="text-left">
                                            Corona
                                        </th>
                                        <td style="width:20%"></td>
                                        <td class="text-right">
                                            <i class="fa fa-circle-o" id="i_refresh"></i>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="radio" name="state" value="T">
                                        </td>
                                        <th class="text-left">
                                            Tramo
                                        </th>
                                        <td style="width:20%"></td>
                                        <td class="text-right">
                                            <i class="fa fa-minus" id="i_refresh"></i>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        <div class="col-xs-9" id="teeth-editor"></div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-danger pull-left salir-btn">Salir</button>
                        <input type="submit" name="submit_reg" class="btn btn-info pull-right" value="Guardar">
                    </div>
                </div>
            </form>
		</div>
	</div>
</div>

<?php
	$path = "odontologo/";
	echo '<script>
	        var js_site_url = "'. site_url($path) . '";
	      </script>';
?>

<script>
	<?php
		echo 'var teethOriginal = [';
		if($dientes != NULL){
		    foreach($dientes as $diente){
		    echo "[". $diente->aus . "," 
		            . $diente->ext . "," 
		            . $diente->car . "," 
		            . $diente->obt . "," 
		            . $diente->cor . "," 
		            . $diente->tra . "]," ;
		    }
		}
		echo '];';
        echo 'var teeth = [';
		if($dientes != NULL){
		    foreach($dientes as $diente){
		    echo "[". $diente->aus . "," 
		            . $diente->ext . "," 
		            . $diente->car . "," 
		            . $diente->obt . "," 
		            . $diente->cor . "," 
		            . $diente->tra . "]," ;
		    }
		}
		echo '];';
        echo 'var teethAux = [';
		if($dientes != NULL){
		    foreach($dientes as $diente){
		    echo "[". $diente->aus . "," 
		            . $diente->ext . "," 
		            . $diente->car . "," 
		            . $diente->obt . "," 
		            . $diente->cor . "," 
		            . $diente->tra . "]," ;
		    }
		}
		echo '];';
    ?>
</script>