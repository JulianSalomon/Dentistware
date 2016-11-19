<?php
   defined('BASEPATH') OR exit('No direct script access allowed');
   ?>
<!DOCTYPE html>
<html>
   <head>
      <title>Dentistware | Editando historia clinica</title>
      <link rel="shortcut icon" type="image/png" href="<?php echo base_url('assets/img/logo.png')?>"/>
      <?php
         echo meta('X-UA-Compatible', 'IE=edge', 'equiv');
         echo meta('', 'text/html; charset=utf-8');
         echo meta('viewport', 'width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no');
         
         echo plugin_css('font-awesome');
         echo plugin_css('icons');
         echo plugin_css('bootstrap');
         echo plugin_css('adminLTE');
         echo plugin_css('skin');
         echo plugin_css('pace');
         echo plugin_css('sweetalert');
         echo plugin_css('datatables');
         
         ?>
   </head>
   <body class="hold-transition skin-blue-light sidebar-mini">
      <button type="button" class="btn btn-block btn-primary btn-lg"  > 
      <b>DENTIST</b>WARE
      </button>
      <div >
         <section class="content-header">
            <?php echo heading('Editar historia clínica',1);?>
         </section>
         <section class="content">
            <div class="box box-primary">
               <div class="overlay hidden" id="div_waiting_edit_story">
                  <i class="fa fa-refresh fa-spin" id="i_refresh"></i>  
               </div>
               <?php 
                  $data_input = array(
                  		'id' => "editar_historia_form",
                      'cliente' => $cliente_info->id_persona,
                  );        
                  echo form_open('', $data_input);	
                  ?>
               
               <!-- /.box-header -->
               <div class="box-body">
                  <div class="col-xs-12 form-group" >
                     <label  class="control-label">Antecedentes: *</label>
                     <div class="col-xs-12 input-group" id="div_input_antecedentes"> 
                        <?php 
                           $data_input = array(
                           		'type' => "text",
                           		'class' => "form-control",
                           		'id' => "input_antecedentes",
                           		'name' => "input_antecedentes",
                           		'rows' => "3",
                           		"maxlength" => "1000",
                               'value' => $historia_clinica->antecedentes_fam,
                           );
                           echo form_textarea($data_input);	                	
                           ?>  
                     </div>
                  </div>
                     <div class="col-xs-12 form-group" >
                     <label  class="control-label">Enfermedad actual: *</label>
                     <div class="col-xs-12 input-group" id="div_input_enfermedad"> 
                        <?php 
                           $data_input = array(
                           		'type' => "text",
                           		'class' => "form-control",
                           		'id' => "input_enfermedad",
                           		'name' => "input_enfermedad",
                           		'rows' => "1",
                           		"maxlength" => "100",
                               'value' => $historia_clinica->enfermedad_actual,
                           );
                           echo form_textarea($data_input);	                	
                           ?>  
                     </div>
                  </div>
                     <div class="col-xs-12 form-group" >
                     <label  class="control-label">Observaciones: *</label>
                     <div class="col-xs-12 input-group" id="div_input_observaciones"> 
                        <?php 
                           $data_input = array(
                           		'type' => "text",
                           		'class' => "form-control",
                           		'id' => "input_observaciones",
                           		'name' => "input_observaciones",
                           		'rows' => "3",
                           		"maxlength" => "2000",
                               'value' => $historia_clinica->observaciones,
                           );
                           echo form_textarea($data_input);	                	
                           ?>  
                     </div>
                  </div>                   
                   <hr>
                  <h3 class="box-title">Información medica *</h3>
                  <small><i class="fa fa-warning"></i> Si no selecciona un pregunta, esta quedara marcada como no.</small>
                  <div class="row">
                  <?php $num_preguntas = count($preguntas);?>
                  	<div class="col-lg-6">
	                  <table class="table table-bordered">
	                     <tr>
	                        <th style="width: 10px">#</th>
	                        <th>Pregunta</th>
	                        <th>Sí</th>
	                        <th>No</th>
	                     </tr>
	                     <?php 
		                     for($i = 1; $i <= $num_preguntas / 2; $i++){
		                     	$pregunta = $preguntas[$i -1];
		                     	$checked = 'checked ="checked"';
		                     	$si = ''; $no = '';
		                     	if(($pregunta->estado_pregunta) == 1 )
		                     		$si = $checked;
		                     	else
		                     		$no = $checked;
		                     
                     			echo '<tr>';
                     			echo '<td>' . $i . '.</td>';
                     			echo '<td>' . $pregunta->desc_pregunta . '</td>';
                     			echo '<td><input type="radio" name="p' . $i .'"  value="1" ' . $si . '> </td>';
                     			echo '<td> <input type="radio" name="p' . $i .'"  value="0" ' . $no . '> </td>';                     			 
                     			echo '</tr>';
		                     }
	                      ?>
	                   </table>                  	
                  	</div>
                  	<div class="col-lg-6">
	                  <table class="table table-bordered">
	                     <tr>
	                        <th style="width: 10px">#</th>
	                        <th>Pregunta</th>
	                        <th>Sí</th>
	                        <th>No</th>
	                     </tr>
	                     <?php 
		                     for($i = $num_preguntas / 2 + 1; $i <= $num_preguntas; $i++){
		                     	$pregunta = $preguntas[$i -1];
		                     	$checked = 'checked ="checked"';
		                     	$si = ''; $no = '';
		                     	if(($pregunta->estado_pregunta) == 1 )
		                     		$si = $checked;
								else
		                     		$no = $checked;
		                     			 
                     			echo '<tr>';
                     			echo '<td>' . $i . '.</td>';
                     			echo '<td>' . $pregunta->desc_pregunta . '</td>';
                     			echo '<td><input type="radio" name="p' . $i .'"  value="1" ' . $si . '> </td>';
                     			echo '<td> <input type="radio" name="p' . $i .'"  value="0" ' . $no . '> </td>';
                     			echo '</tr>';
		                     }
	                      ?>
	                   </table>                  	
                  	</div>                  
                  </div>                   
               </div>
               <div class="box-footer text-center">
                  <?php                 
                     $data_input = array(
                     		'class' => "btn btn-danger btn-lg pull-left",
                     		'id' => "edit_cancel_btn",
                     		'name' => "cancelar_edit",
                     		'content' => "Cancelar"
                     );
                     $redirigir = 'odontologo/Historia_clinica/index/' . $cliente_info->id_persona;
                     echo anchor(base_url() . $redirigir, 'Cancelar', $data_input);
                     $data_input = array(
                     		'class' => "btn btn-primary btn-lg pull-right",
                     		'id' => "guardar_edit",
                     		'name' => "guardar_edit",
                     		'value' => "Guardar",
                     );
                     echo form_submit($data_input);
                     ?>
               </div>
               <?php echo form_close();?>
            </div>
         </section>
      </div>

      <?php
         $path = "odontologo/Historia_clinica/";
         echo '<script>
                 var js_site_url = "'. site_url($path) . '";
               </script>';
                  echo plugin_js();
             echo plugin_js('bootstrap');
             echo plugin_js('app');
             echo plugin_js('pace');
             echo plugin_js('timepicker');
             echo plugin_js('runner');
             echo plugin_js('sweetalert');
             echo plugin_js('datatable');            
             echo plugin_js('assets/js/dentistware/odontologo.js', true);
         ?>
   </body>
</html>