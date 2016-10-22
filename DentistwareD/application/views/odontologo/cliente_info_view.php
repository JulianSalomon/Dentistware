<div class="content-wrapper">
                <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Perfil
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
                                            $url = base_url() . '/assets/img/avatar5.png';
                                            echo '<img src="' . $url . '" class="user-image" alt="User Image">';
                                            /*
                                        <div class="text-center">
                                            <BR>
                                            <BR>

                                            <a class="fa fa-exchange" href="../cliente/multas.html">
                                                <input type="button" value="Cambiar foto de perfil" >
                                            </a>

                                            <BR>
                                            <BR>

                                            <a class="fa fa-trash" href="../cliente/multas.html">
                                                <input type="button" value="Eliminar foto de perfil"  >
                                            </a>

                                        </div>
                                                */
                                            ?>
                                        </div>
                            
                        </div>
                        <div class="box-body">
                            <div class="col-xs-4 text-right " >
                                <BR>
                                <BR>
                                Nombre(s) y Apellidos:
                                <BR>
                                Documento:
                                <BR>
                                Edad:
                                <BR>
                                Fecha de Nacimiento:
                                <BR>
                                Genero:
                                <BR>
                                Estado:
                                <BR>
                                Eps de Usuario:
                                <BR>
                                Ciudad:
                                <BR>
                                Direccion:
                                <BR>
                                E-mail:
                                <BR>
                                    Telefono:
                            </div>
                            <div class="col-xs-3 text-center " >
                                
                                
                            </div>
                                    
                            <div class="col-xs-3 text-left " >
                                <?php
                                echo '<BR>';
                                echo '<BR>';
                                echo ucwords($cliente_info->nombre_persona);
                                echo '<BR>';
                                echo  $cliente_info->tipo_documento . ' &nbsp &nbsp' . $cliente_info->documento_persona;
                                echo '<BR>';
                                echo  $cliente_info->edad_persona .' '. 'Años';
                                echo '<BR>';
                                echo  $cliente_info->fecha_nacimiento;
                                echo '<BR>';
                                if ($cliente_info->genero_persona == 'M'){
                                  echo 'Masculino';
                                }else{
                                    echo 'Femenino';
                                };
                                echo '<BR>';
                                if ($cliente_info->estado_persona == 'ACT'){
                                  echo 'Activo';
                                }else{
                                    echo 'Retirado';
                                };
                                echo '<BR>';
                                echo $cliente_info->eps_persona ;
                                echo '<BR>';
                                echo  ucfirst(mb_strtolower($cliente_info->nombre_ciudad, 'UTF-8'));
                                echo '<BR>';
                                echo  ucwords(strtolower($cliente_info->direccion_persona));
                                echo '<BR>';
                                echo strtolower($cliente_info->correo_persona) ;
                                echo '<BR>';
                                echo $cliente_info->telefono_persona ;
                                
                                ?>
                            </div>
                            
                                        
                                        <div class="col-xs-12 text-center">
                                        <BR>
                                        <BR>
                                            
                                            <input type="submit" value="Modificar Perfil" name="Modificar_Perfil" class="btn btn-info "/>
                                            

                                        </div>       
                        </div>
                    </form>
                            
                            
                </div>
            </div>
        </div>
</section>
        <!-- /.content -->
</div>