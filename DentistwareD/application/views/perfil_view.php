<div class="content-wrapper">
    <section class="content-header">
        <h1>Perfil</h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                	<div class="box-body">
                 		<div class="col-xs-12 text-center ">
							<?php
								$url = base_url() . '/assets/img/avatar5.png';
                                echo '<img src="' . $url . '" class="user-image" alt="User Image">';
                                echo heading('Información Personal', 3);
							?>
						</div> 
                            <div class="col-xs-6 text-right" >
                                <label>
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
                                Tipo de Sandre y RH:
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
                                </label>                                
                            </div>
                            <div class="col-xs-6 text-left " >
                                <?php                                
                                echo ucwords($persona->nombre_persona);
                                echo '<BR>';
                                echo  $persona->tipo_documento . ' &nbsp &nbsp' . $persona->documento_persona;
                                echo '<BR>';
                                echo  $persona->edad_persona .' '. 'Años';
                                echo '<BR>';
                                echo  $persona->fecha_nacimiento;
                                echo '<BR>';
                                if ($persona->genero_persona == 'M'){
                                  echo 'Masculino';
                                }else{
                                    echo 'Femenino';
                                };
                                echo '<BR>';
                                echo  $persona->tipo_sangre_cliente . ' ' . $persona->rh_cliente;
                                echo '<BR>';
                                if ($persona->estado_persona == 'ACT'){
                                  echo 'Activo';
                                }else{
                                    echo 'Retirado';
                                };
                                echo '<BR>';
                                echo $persona->eps_persona ;
                                echo '<BR>';
                                echo  ucfirst(mb_strtolower($persona->nombre_ciudad, 'UTF-8'));
                                echo '<BR>';
                                echo  ucwords(strtolower($persona->direccion_persona));
                                echo '<BR>';
                                echo strtolower($persona->correo_persona) ;
                                echo '<BR>';
                                echo $persona->telefono_persona ;                                
                                ?>
                            </div>
							<div class="col-xs-12 text-center">
								<br>
	                            <input type="submit" value="Modificar Perfil" name="Modificar_Perfil" class="btn btn-info "/>
							</div>  						   
					</div>
                </div>
            </div>
        </div>
</section>
</div>