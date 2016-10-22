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
                                            ?>
                                        </div>
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
                        </div>
                        <div class="box-body">
                            <div class="col-xs-12  " >
                                <?php
                                
                                
                                echo '<label> Nombre(s) y Apellidos:</label>'.'        ' ;
                                echo $odontologo->nombre_persona;
                                echo '<BR>';
                                echo '<label> Tipo ID:</label>'.'        ' ;
                                echo  $odontologo->tipo_documento;
                                echo '<BR>';
                                echo '<label> ID:</label>'.'        ' ;
                                echo $odontologo->documento_persona ;
                                echo '<BR>';
                                echo '<label> Edad:</label>'.'        ' ;
                                echo  $odontologo->edad_persona;
                                echo '<BR>';
                                echo '<label> Nombre de usuario:</label>'.'        ' ;
                                echo  $odontologo->documento_persona ;
                                echo '<BR>';
                                echo '<label> Ciudad:</label>'.'        ' ;
                                echo  $odontologo->nombre_ciudad ;
                                echo '<BR>';
                                echo '<label> Direccion:</label>'.'        ' ;
                                echo $odontologo->direccion_persona ;
                                echo '<BR>';
                                echo '<label> E-mail: </label>'.'        ' ;
                                echo $odontologo->correo_persona ;
                                echo '<BR>';
                                echo '<label> Telefono:</label>'.'        ' ;
                                echo $odontologo->telefono_persona ;
                                echo '<BR>';
                                echo '<label> Eps de Usuario:</label>'.'        ' ;
                                echo $odontologo->eps_persona ;
                               
                                
                                ?>
                            </div>
                            
                                        
                                        <div class="col-xs-6 text-center">
                                            <input type="submit" value="Modificar Perfil" name="Modificar_Perfil" />

                                        </div>       
                        </div>
                    </form>
                            
                            
                </div>
            </div>
        </div>
</section>
        <!-- /.content -->
</div>