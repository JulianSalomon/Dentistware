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
			echo plugin_css('icons');
			echo plugin_css('bootstrap');
			echo plugin_css('adminLTE');
			echo plugin_css('skin');
			echo plugin_css('pace');
			
			 ?>
	</head>
	<body class="hold-transition skin-blue-light sidebar-mini">
		
            
           <button type="button" class="btn btn-block btn-primary btn-lg"  > 
        	
          <b>DENTIST</b>WARE
       </button>
          



<div>
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
                            <!-- Aqui -->
                            
  
   
                 		<div class="col-xs-12 text-center ">
							<?php							
							echo heading($nombre, 2);
								if($persona->foto_persona){
									echo '<img id="foto_img" class="center-block" height="200" width="200" src="'.base_url() . "uploads/" . $route . '/'  . $persona->foto_persona . '">';										
								} else {
									echo '<img id="foto_img" class="center-block" height="200" width="200" src="' . base_url("assets/img/foto-default.png") . '">';
								}
								
                                echo heading('Información Personal', 3);
							?>
						</div>                 
                            <div class="text-align:center;">
                               <table style="width:60" align="center">
                             	<?php
        
                                  
                                  echo "<tr>";
                                  echo "<th class= text-right style= width:45% >Edad:</td>";
                                  echo "<td style= width:10% > </td>";
                                  echo "<td style= width:45% > " . $persona->edad_persona .' '. 'Años' . "</td>";
                                  echo "</tr>";
                                  
                                  echo "<tr>";
                                  echo "<th class= text-right style= width:45% >Genero:</th>";
                                  echo "<td style= width:10% > </td>";
                                  
                                  if ($persona->genero_persona == 'M'){
                                  		echo "<td style= width:45% > Masculino</td>";
								  }else{
                                  		echo "<td style= width:45% > Femenino</td>";
                                  }
                                  echo "</tr>";
                                   
                                
	                                   	echo "<tr>";
	                                   	echo "<th class= text-right style= width:45% >Tipo de Sangre y RH:</th>";
	                                   	echo "<td style= width:10% > </td>";
	                                   	echo "<td style= width:45% > " . $persona->tipo_sangre_cliente . ' ' . $persona->rh_cliente . "</td>";
	                                   	echo "</tr>";
                                   

                                   
	                                   	echo "<tr>";
	                                   	echo "<th class= text-right style= width:45% >Eps:</th>";
	                                   	echo "<td style= width:10% > </td>";
	                                   	echo "<td style= width:45% > " . $persona->eps_persona . "</td>";
	                                   	echo "</tr>";
                                   
                                            
                                   
                                   
                                  
                                       echo "<tr>";                                   
                                        echo "<th class= text-right style= width:45% >Nombre del Contacto:</th>";
                                          echo "<td style= width:10% > </td>";
                                          echo "<td style= width:45% > " . ucwords($persona->contacto_cliente) . "</td>";
                                      echo "</tr>";

                                        echo "<tr>";
                                        echo "<th class= text-right style= width:45% >Telefono del Contacto:</th>";
                                          echo "<td style= width:10% > </td>";
                                        echo "<td style= width:45% > " . $persona->telefono_contacto_cliente . "</td>";
                                      echo "</tr>";
                                    
                                   
                                
                                   ?>
                                </table>
                            </div>                                                                                                                                      
                            <!-- hasta aca -->
                            <div class="col-xs-12 text-center ">
                                <?php
                                    echo br();    echo br();
                                if($historia_clinica != null){
                                echo '<h4> Fecha de apertura ' . ' &nbsp &nbsp' . substr($historia_clinica->fecha_apertura, 0, 10) . '</h4>';
                                echo br();
                                ?>
                            </div>
                              <div class="form-group text-center" >
                            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modal_add_client">Editar historia clínica</button>
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
                                } else { ?>
                                     
                        <div class="form-group text-center" >
                            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modal_add_client">Crear historia clínica</button>
                        </div>
                    
                                         <?php 
                                }
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
                                <?php if($historia_clinica != null){ ?>
                            <tfoot>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Descripcion</th>
                                    <th>Seleccionar</th>
                                </tr>
                            </tfoot>
                                <?php }  ?>
                        </table>
                            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-danger btn-lg pull-left cancel-btn">Terminar cita</button>
                <button type="button" class="btn btn-info btn-lg pull-right" data-toggle="modal" data-target="#modal_anadir_registro">Nuevo registro</button>
            </div>
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
             echo plugin_js();
	        echo plugin_js('bootstrap');
	        echo plugin_js('app');
	        echo plugin_js('pace');
        echo plugin_js('timepicker');
        echo plugin_js('assets/js/dentistware/odontologo.js', true);
?>
            
          
       
    </body>
</html>
            