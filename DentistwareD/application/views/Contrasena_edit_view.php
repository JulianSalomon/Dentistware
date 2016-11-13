<div class="content-wrapper">
    <section class="content-header">
        <h1>Editar contraseña</h1>
    </section>
    <section class="content">
        <div class="row">     
            <div class="col-xs-12">
                <div class="box box-primary text-center">
                    <div class="overlay hidden" id="div_waiting_edit_contrasena">
				        <i class="fa fa-refresh fa-spin" id="i_refresh"></i>  
                    </div>      
                    <?php 
                        $data_input = array(
                                'id' => "edit_contrasena_form",
                        );        
                        echo form_open('', $data_input);	

                        $data_input = array(
                                'id' => "idPersona",
                                'name' => "idPersona",
                                'type' => "hidden",
                                'value' => $persona_info->id_persona
                        );
                        echo form_input($data_input);
                            $tipo = $persona_info->tipo_persona;
                            $route = '';
                            switch ($tipo) {
                                case "ADM":
                                    $route = 'admin';
                                    break;
                                case "CLT":
                                    $route = 'cliente';
                                    break;
                                case "ODO":
                                    $route = 'odonto';
                                    break;
                                case "EMP":
                                	$route = 'empleado';
                                    break;
                            }
                    ?>
                	<div class="box-body">
                                       
                    <div class="row">
                        <div class="col-lg-5 form-group">
                            <label  class="control-label">Nombre(s) y Apellidos:</label>
                                <?php  
                                    echo br(1);
                                    echo "<p> " . ucwords($persona_info->nombre_persona) . "</p>";
                                ?>
                        </div>
                        
                        <div class="col-lg-3 form-group">
                            <label  class="control-label">Tipo de Documento:</label>
                            <?php
                                $tDocumento = $persona_info->tipo_documento;
                                echo "<BR>";
                                if($tDocumento == 'CC' ){
                                    echo "<p> Cédula de Ciudadania </p>";
                                }elseif($tDocumento == 'TI' ){
                                    echo "<p> Tarjeta de Identidad </p>";
                                }else{
                                    echo "<p> Cedula de Extranjeria </p>";
                                }
                            ?>
                        </div>                          
                        
                        <div class="col-lg-4 form-group">
                            <label  class="control-label">Numero de Documento:</label>
                            <?php 
                            echo "<BR>";
                            echo "<p> " . $persona_info->documento_persona . "</p>";
                            ?>
                        </div>                                                                                                  
               	    </div> 
                        
                        <hr>
                        <div class="row">
                            <div class=" col-lg-4 form-group" > 
                            </div>
                            <div class="col-lg-4 form-group ">
                                <label  class="control-label">Contraseña Actual: *</label>
                                <div class="input-group" id="div_inputPassword">
                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    <input type="password" class="form-control" id="inputPassword" placeholder="Contraseña actual" name="inputPassword" value="">
                                </div>
                            </div> 
                            <div class=" col-lg-4 form-group" > 
                            </div>
                        </div> 
                        <br>
                        <br>
                        <hr>
                        <div class="row">
                            <div class=" col-lg-4 form-group" > 
                            </div>
                            <div class="col-lg-4 form-group">
                                <label class=" control-label">Contraseña nueva: *</label>
                                <div class="input-group" id="div_inputNewPassword">
                                    <span class="input-group-addon"><i class="fa fa-unlock-alt"></i></span>
                                    <input type="password" class="form-control" id="inputNewPassword" placeholder="Contraseña nueva" name="inputNewPassword" value="">
                                </div>
                            </div>   
                            <div class=" col-lg-4 form-group" > 
                            </div>
                        </div>                                  
                        
                        <div class="row">
                            <div class=" col-lg-4 form-group" > 
                            </div>
                            <div class=" col-lg-4 form-group" >  
                                <label class="control-label">Confirmar contraseña: *</label>
                                <div class="input-group" id="div_inputPasswordConfirm">
                                    <span class="input-group-addon"><i class="fa fa-unlock-alt"></i></span>                 
                                    <input type="password" class="form-control" id="inputPasswordConfirm" placeholder="Confirmar contraseña" name="inputPasswordConfirm" value="">
                                </div>
                            </div>
                            <div class=" col-lg-4 form-group" > 
                            </div>
                        </div>
                        
                              
                                            
                    </div>    
                    <div class="box-footer text-center">
                        <?php                 
                            $data_input = array(
                                    'class' => "btn btn-danger btn-lg",
                                    'id' => "edit_cancel_btn",
                                    'name' => "cancelar_edit",
                                    'content' => "Cancelar"
                            );
                            echo anchor(base_url() . $route , 'Cancelar', $data_input);
                            $data_input = array(
                                    'class' => "btn btn-primary btn-lg",
                                    'id' => "guardar_edit",
                                    'name' => "guardar_edit",
                                    'value' => "Guardar",
                            );
                            echo form_submit($data_input);
                        ?>
                    </div>
                    <?php echo form_close();?>
                    
                </div>						   
            </div>
        </div>
    </section>
</div>
<script>
	var js_site_url = '<?php echo site_url("Perfil/");?>';
    var tipouser = "<?php echo $tipo ?>";
    var js_site_url2 = '' ;
    switch(tipouser) {
        case "ADM":
            js_site_url2 = '<?php echo site_url("Admin");?>';
            break;
        case "CLT":
            js_site_url2 = '<?php echo site_url("Cliente");?>';
            break;
        case "ODO":
            js_site_url2 = '<?php echo site_url("Odonto");?>';
            break;
        case "EMP":
            js_site_url2 = '<?php echo site_url("Empl");?>';
            break;
            
    }
</script> 
