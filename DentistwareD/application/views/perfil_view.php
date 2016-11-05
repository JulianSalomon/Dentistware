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
                        <div class="box-body text-align:center;">
                            <div class="col-xs-12 text-center text-align:center;">
                                <?php
                                $url = base_url() . '/assets/img/avatar5.png';
                                echo '<img src="' . $url . '" class="user-image" alt="User Image">';
                                echo '<BR>';
                                echo '<BR>';
                                echo '<label>Informacion Personal </lable>';
                                echo '<BR>';
                                echo '<BR>';
                                ?>
                            </div>
                                                 
                            <div class="text-align:center;">
                               <table style="width:60" align="center">
                                   <?php

                                  echo "<tr>";                                   
                                    echo "<th class= text-right style= width:45% >Nombre(s) y Apellidos:</th>";
                                      echo "<td style= width:10% > </td>";
                                      echo "<td style= width:45% > " . ucwords($persona->nombre_persona) . "</td>";
                                  echo "</tr>";

                                  echo "<tr>";
                                    echo "<th class= text-right style= width:45% >Documento:</td>";
                                      echo "<td style= width:10% > </td>";
                                    echo "<td style= width:45% > " . $persona->tipo_documento . ' &nbsp &nbsp' . $persona->documento_persona . " </td>";
                                  echo "</tr>";

                                   echo "<tr>";
                                    echo "<th class= text-right style= width:45% >Edad:</td>";
                                      echo "<td style= width:10% > </td>";
                                    echo "<td style= width:45% > " . $persona->edad_persona .' '. 'Años' . "</td>";
                                  echo "</tr>";

                                  echo "<tr>";
                                    echo "<th class= text-right style= width:45% >Fecha de Nacimiento:</th>";
                                      echo "<td style= width:10% > </td>";
                                    echo "<td style= width:45% > " . $persona->fecha_nacimiento . "</td>";
                                  echo "</tr>";

                                echo "<tr>";
                                    echo "<th class= text-right style= width:45% >Genero:</th>";
                                      echo "<td style= width:10% > </td>";
                                    if ($persona->genero_persona == 'M'){
                                          echo "<td style= width:45% > Masculino</td>";
                                        }else{
                                            echo "<td style= width:45% > Femenino</td>";
                                        };
                                  echo "</tr>";

                                   echo "<tr>";
                                    echo "<th class= text-right style= width:45% >Tipo de Sandre y RH:</th>";
                                      echo "<td style= width:10% > </td>";
                                    echo "<td style= width:45% > " . $persona->tipo_sangre_cliente . ' ' . $persona->rh_cliente . "</td>";
                                  echo "</tr>";

                                   echo "<tr>";
                                    echo "<th class= text-right style= width:45% >Estado:</th>";
                                      echo "<td style= width:10% > </td>";
                                     if ($persona->estado_persona == 'ACT'){
                                         echo "<td style= width:45% > Activo</td>";
                                        }else{
                                         echo "<td style= width:45% > Retirado</td>";
                                        };
                                  echo "</tr>";

                                   echo "<tr>";
                                    echo "<th class= text-right style= width:45% >Eps de Usuario:</th>";
                                      echo "<td style= width:10% > </td>";
                                    echo "<td style= width:45% > " . $persona->eps_persona . "</td>";
                                  echo "</tr>";

                                   echo "<tr>";
                                    echo "<th class= text-right style= width:45% >Ciudad:</th>";
                                      echo "<td style= width:10% > </td>";
                                    echo "<td style= width:45% > " . ucfirst(mb_strtolower($persona->nombre_ciudad, 'UTF-8')) . "</td>";
                                  echo "</tr>";

                                   echo "<tr>";
                                    echo "<th class= text-right style= width:45% >Direccion:</th>";
                                      echo "<td style= width:10% > </td>";
                                    echo "<td style= width:45% > " . ucwords(strtolower($persona->direccion_persona)) . "</td>";
                                  echo "</tr>";

                                   echo "<tr>";
                                    echo "<th class= text-right style= width:45% >E-mail:</th>";
                                      echo "<td style= width:10% > </td>";
                                    echo "<td> " . strtolower($persona->correo_persona) . "</td>";
                                  echo "</tr>";

                                   echo "<tr>";
                                    echo "<th class= text-right style= width:45% >Telefono:</th>";
                                      echo "<td style= width:10% > </td>";
                                    echo "<td style= width:45% > " . $persona->telefono_persona . "</td>";
                                  echo "</tr>";

                                   ?>
                                </table>
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