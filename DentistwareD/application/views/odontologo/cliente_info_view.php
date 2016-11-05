<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Informacion Cliente
        </h1>
    </section>
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
                                            echo '<BR>';
                                            echo '<BR>';
                                            echo '<label> Informacion Basica </lable>';
                                            ?>
                                        </div>
                            
                        </div>
                        
                        <div class="box-body">
                            <div class="col-xs-4 text-center " >
                                
                                
                            </div>
                            <div class="col-xs-3 text-left " >
                                <label>
                                Nombre(s) y Apellidos:
                                <BR>
                                Documento:
                                <BR>
                                Edad:                                
                                <BR>
                                Tipo de Sandre y RH:
                                <BR>
                                Eps de Usuario:
                                <BR>
                                Ciudad:
                                <BR>
                                E-mail:
                                <BR>
                                Telefono:
                                </label>
                            </div>
                            
                                    
                            <div class="col-xs-4 text-left " >
                                <?php
                                echo ucwords($cliente_info->nombre_persona);
                                echo '<BR>';
                                echo  $cliente_info->tipo_documento . ' &nbsp &nbsp' . $cliente_info->documento_persona;
                                echo '<BR>';
                                echo  $cliente_info->edad_persona .' '. 'Años';
                                echo '<BR>';
                                echo  $cliente_info->tipo_sangre_cliente . ' ' . $cliente_info->rh_cliente;
                                echo '<BR>';
                                echo $cliente_info->eps_persona ;
                                echo '<BR>';
                                echo  ucfirst(mb_strtolower($cliente_info->nombre_ciudad, 'UTF-8')).' &nbsp &nbsp'.ucwords(strtolower($cliente_info->direccion_persona));
                                echo '<BR>';
                                echo strtolower($cliente_info->correo_persona) ;
                                echo '<BR>';
                                echo $cliente_info->telefono_persona ;
                                
                                ?>
                            </div>
                            
                                        
                                        <div class="col-xs-12 text-center">
                                        <BR>
                                        <BR>
                                            
                                            <input type="submit" value="Historia Clinica" name="Historia_clinica" class="btn btn-info "/>
                                            

                                        </div>       
                        </div>
                    </form>
                            
                            
                </div>
            </div>
        </div>
</section>
        <!-- /.content -->
</div>