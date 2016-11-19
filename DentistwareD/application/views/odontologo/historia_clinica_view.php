<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	?>
<!DOCTYPE html>
<html>
	<head>
		<title>Dentistware | Atendiendo cita</title>
		<link rel="shortcut icon" type="image/png" href="<?php echo base_url('assets/img/logo.png')?>"/>
		<?php
			echo meta('X-UA-Compatible', 'IE=edge', 'equiv');
			echo meta('', 'text/html; charset=utf-8');
			echo meta('viewport', 'width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no');
			
			echo plugin_css('font-awesome');
			echo plugin_css('datatables');
			echo plugin_css('icons');
			echo plugin_css('bootstrap');
			echo plugin_css('sweetalert');
			echo plugin_css('adminLTE');
			echo plugin_css('skin');
			echo plugin_css('pace');
			echo plugin_css('sweetalert');         
			?>
	</head>
	<body class="hold-transition skin-blue-light sidebar-mini">
		<button type="button" class="btn btn-block btn-primary btn-lg"  > 
		<b>DENTIST</b>WARE
		</button>
		<div>
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
									<!-- Aqui -->
									<h3 class="pull-right">Tiempo transcurrido en esta cita: <br><span  class="pull-right" id="runner"> </span></h3>
									<div class="col-xs-12 text-center ">
										<?php							
											echo heading(ucwords($persona->nombre_persona), 2);
												if($persona->foto_persona){
													echo '<img id="foto_img" class="center-block" height="200" width="200" src="'.base_url() . "uploads/cliente/"  . $persona->foto_persona . '">';										
												} else {
													echo '<img id="foto_img" class="center-block" height="200" width="200" src="' . base_url("assets/img/foto-default.png") . '">';
												}
												
											  echo heading('Información Personal', 3);
											?>
									</div>
									<div class="text-align:center;">
										<table style="width:60" align="center">
											<tr>
												<th class= text-right style= width:45% >Edad:</th>
												<td style= width:10% > </td>
												<?php
													echo "<td style= width:45% > " . $persona->edad_persona .' '. 'Años' . "</td>";
													?>
											</tr>
											<tr>
												<th class= text-right style= width:45% >Genero:</th>
												<td style= width:10% > </td>
												<?php
													if ($persona->genero_persona == 'M'){
													        echo "<td style= width:45% > Masculino</td>";
													}else{
													        echo "<td style= width:45% > Femenino</td>";
													}
													?>
											</tr>
											<tr>
												<th class= text-right style= width:45% >Tipo de Sangre y RH:</th>
												<td style= width:10% > </td>
												<?php
													echo "<td style= width:45% > " . $persona->tipo_sangre_cliente . ' ' . $persona->rh_cliente . "</td>";
													?>
											</tr>
											<tr>
												<th class= text-right style= width:45% >Eps:</th>
												<td style= width:10% > </td>
												<?php
													echo "<td style= width:45% > " . $persona->eps_persona . "</td>";
													?>
											</tr>
											<tr>
												<th class= text-right style= width:45% >Nombre del Contacto:</th>
												<td style= width:10% > </td>
												<?php
													echo "<td style= width:45% > " . ucwords($persona->contacto_cliente) . "</td>";
													?>
											</tr>
											<tr>
												<th class= text-right style= width:45% >Telefono del Contacto:</th>
												<td style= width:10% > </td>
												<?php
													echo "<td style= width:45% > " . $persona->telefono_contacto_cliente . "</td>";
													?>
											</tr>
										</table>
									</div>
									<div class="col-xs-12 text-center ">
										<?php
											echo br(2);
											if($historia_clinica != null){
											echo '<h4> Fecha de apertura ' . ' &nbsp &nbsp' . substr($historia_clinica->fecha_apertura, 0, 10) . '</h4>';
											echo br();
											?>
									</div>
									<div class="form-group text-center" >
										<button type="button" class="editar-historia-btn btn btn btn-info btn-lg" id="editar_historia" data-toggle="modal" data-target="#modal_edit_story" title="Editar historia">Editar historia clínica</button>
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
										<table id="tablaRegistro" class="table table-bordered table-hover tablaRegistro">
											<thead>
												<tr>
													<th>Fecha</th>
													<th>Descripcion</th>
													<th>Ver</th>
												</tr>
											</thead>
											<tbody class="text-center">
												<?php
													if($registros != NULL){
													    foreach ($registros as $registro){
													echo '<tr>';
													echo '<td style="width:10%">';
													echo substr($registro->fecha_reg, 0, 10);
													echo '</td>';
													echo '<td class="text-left">';
													echo $registro->desc_procedimiento;
													echo '<td style="width:5%">';
													echo '<button class="btn verRegistro-btn" type="button" name="verRegistro" value="'. $registro->id_registro . '" >';
													echo '<i class="fa fa-file-text-o"></i>';
													echo '</button>';
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
													<th>Ver</th>
												</tr>
											</tfoot>
										</table>
										<?php
											} else {
											?>
										<div class="form-group text-center" >
											<button type="button" class="btn btn-info btn-lg crear-historia-btn" id="crear_historia" title="Crear historia">Crear historia clínica</button>
										</div>
										<?php
											}
											     ?>
									</div>
								</div>
								<div class="box-footer">
									<?php
										if($historia_clinica != null){
										?>
									<button type="button" cita="<?php echo $id_cita; ?>" cliente="<?php echo $persona->nombre_persona; ?>" class="btn btn-danger btn-lg pull-left asistir-btn">Terminar cita</button>
									<button type="button" class="btn btn-primary btn-lg pull-right agregarRegistro-btn" data-toggle="modal" data-target="#agregarRegistro" title="Agregar registro">Nuevo registro</button>
									<?php
										}
										  ?>
								</div>
							</form>
						</div>
					</div>
				</div>
			</section>
		</div>
        
		<!-- Modal ver registro -->
		<div id="verRegistro" class="modal fade modal-add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
												<input type="hidden" id="inputHistoria" name="inputHistoria" value=<?php echo $historia_clinica->id_historia; ?> >
											</td>
										</tr>
									</table>
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
                echo 'var teeth = teethOriginal;';
                echo 'var teethAux = teethOriginal;';
            ?>
		</script>
		<?php
			$path = "odontologo/";
            echo '<script>';
                echo 'var js_site_url = "' . site_url($path) . '";';
            echo '</script>';
            echo plugin_js();
            echo plugin_js('bootstrap');
            echo plugin_js('app');
            echo plugin_js('pace');
            echo plugin_js('timepicker');
            echo plugin_js('sweetalert');
            echo plugin_js('datatable');
            echo plugin_js('assets/js/dentistware/odontologo.js', true);
            echo plugin_js('runner');
            if($historia_clinica != null){
                echo plugin_js('teeth-drawer');
                echo plugin_js('p5');
                echo plugin_js('assets/js/dentistware/dientes.js', true);
            }
        ?>
	</body>
</html>