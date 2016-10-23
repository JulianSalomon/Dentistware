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
                <div class="box">
                    <form role="form">
                        <div class="box-body">
                            
                            <div class="col-xs-12 text-center ">
                                <?php
                                echo '<label>' . ucwords($historia_clinica_info->nombre_persona) . '</label>';
                                echo '<BR>';
                                echo '<label> Fecha de apertura ' . ' &nbsp &nbsp' . substr($historia_clinica_info->fecha_apertura, 0, 10) . '</label>';
                                echo '<BR>';
                                echo '<BR>';
                                ?>
                            </div>
                            <div class="col-xs-4 text-left " >
                                
                            </div>
                            <div class="col-xs-3 text-left " >
                                <label>
                                Motivo de la consulta:
                                <BR>
                                Antencedentes familiares:
                                <BR>
                                Enfermedad actual:
                                <BR>
                                Observaciones:
                                <BR>                                
                                </label>
                            </div>
                            
                                    
                            <div class="col-xs-4 text-left " >
                                <?php                                
                                echo  $historia_clinica_info->motivo_consulta;
                                echo '<BR>';
                                echo  $historia_clinica_info->antecedentes_fam;
                                echo '<BR>';
                                echo $historia_clinica_info->enfermedad_actual;
                                echo '<BR>';
                                echo $historia_clinica_info->observaciones ;
                                
                                ?>
                            </div>
                            
                                      <!--  
                                        <div class="col-xs-12 text-center">
                                        <BR>
                                        <BR>
                                            
                                            <input type="submit" value="Historia Clinica" name="Historia_clinica" class="btn btn-info "/>
                                            

                                        </div>  
                                        -->
                                            

                                            
            
           <!--                                 
            <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Email</label>

                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Password</label>

                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox"> Remember me
                      </label>
                    </div>
                  </div>
                </div>
              </div>
-->
              <!-- /.box-body -->
<!--                                            
              <div class="box-footer">
                <button type="submit" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-info pull-right">Sign in</button>
              </div>
              -->
                                            


                
                                            
                                            

                                            
                        </div>
                    </form>
                            
                            
                </div>
            </div>
        </div>
</section>
        <!-- /.content -->
</div>