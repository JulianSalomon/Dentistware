<div class="content-wrapper">
    <section class="content-header">
        <h1>Cambiar contraseña</h1>
    </section>
    <section class="content">
        <div class="row">     
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="overlay hidden" id="div_waiting_edit_pass">
				        <i class="fa fa-refresh fa-spin" id="i_refresh"></i>  
                    </div>      
                    <?php 
                        $data_input = array(
                                'id' => "edit_password_form",
                        );        
                        echo form_open('', $data_input);	

                        $data_input = array(
                                'id' => "idPersona",
                                'name' => "idPersona",
                                'type' => "hidden",
                                'value' => $persona_info->id_persona
                        );
                        echo form_input($data_input);
                    ?>
                    <div class="box-header">
                    	<h4>En el siguiente formulario podrá cambiar su contraseña:</h4>
                    </div>
                    <hr>
                	<div class="box-body">                                                               
                        <div class="row">
                            <div class=" col-lg-4 form-group" > 
                            </div>
                            <div class="col-lg-4 form-group ">
                                <label  class="control-label">Contraseña Actual: *</label>
                                <div class="input-group" id="div_inputPassword">
                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    <input type="password" class="form-control" id="inputPassword" placeholder="Contraseña actual" name="inputPassword">
                                </div>
                            </div> 
                        </div> 
                        <div class="row">
                            <div class=" col-lg-4 form-group" > 
                            </div>
                            <div class="col-lg-4 form-group">
                                <label class=" control-label">Contraseña nueva: *</label>
                                <div class="input-group" id="div_inputNewPassword">
                                    <span class="input-group-addon"><i class="fa fa-unlock-alt"></i></span>
                                    <input type="password" class="form-control" id="inputNewPassword" placeholder="Contraseña nueva" name="inputNewPassword">
                                </div>
                            </div>   
                        </div>                                                          
                        <div class="row">
                            <div class=" col-lg-4 form-group" > 
                            </div>
                            <div class=" col-lg-4 form-group" >  
                                <label class="control-label">Confirmar contraseña: *</label>
                                <div class="input-group" id="div_inputPasswordConfirm">
                                    <span class="input-group-addon"><i class="fa fa-unlock-alt"></i></span>                 
                                    <input type="password" class="form-control" id="inputPasswordConfirm" placeholder="Confirmar contraseña" name="inputPasswordConfirm">
                                </div>
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
                            echo anchor(base_url("Perfil") , 'Cancelar', $data_input);
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
</script> 
