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
									echo br(2);
									echo '<label> Informacion Basica </lable>';
									echo br(2);
									?>
							</div>
							<div class="text-align:center;">
								<table style="width:60" align="center">
									<?php
										echo "<tr>";                                   
										  echo "<th class= text-right style= width:45% >Nombre(s) y Apellidos:</th>";
										    echo "<td style= width:10% > </td>";
										    echo "<td style= width:45% > " . ucwords($cliente_info->nombre_persona) . "</td>";
										echo "</tr>";
										
										echo "<tr>";
										  echo "<th class= text-right style= width:45% >Documento:</td>";
										    echo "<td style= width:10% > </td>";
										  echo "<td style= width:45% > " . $cliente_info->tipo_documento . ' &nbsp &nbsp' . $cliente_info->documento_persona . " </td>";
										echo "</tr>";
										
										 echo "<tr>";
										  echo "<th class= text-right style= width:45% >Edad:</td>";
										    echo "<td style= width:10% > </td>";
										  echo "<td style= width:45% > " . $cliente_info->edad_persona .' '. 'Años' . "</td>";
										echo "</tr>";
										
										 echo "<tr>";
										  echo "<th class= text-right style= width:45% >Tipo de Sandre y RH:</th>";
										    echo "<td style= width:10% > </td>";
										  echo "<td style= width:45% > " . $cliente_info->tipo_sangre_cliente . ' ' . $cliente_info->rh_cliente . "</td>";
										echo "</tr>";
										
										 echo "<tr>";
										  echo "<th class= text-right style= width:45% >Eps de Usuario:</th>";
										    echo "<td style= width:10% > </td>";
										  echo "<td style= width:45% > " . $cliente_info->eps_persona . "</td>";
										echo "</tr>";
										
										 echo "<tr>";
										  echo "<th class= text-right style= width:45% >Ciudad:</th>";
										    echo "<td style= width:10% > </td>";
										  echo "<td style= width:45% > " . ucfirst(mb_strtolower($cliente_info->nombre_ciudad, 'UTF-8')).' &nbsp &nbsp'.ucwords(strtolower($cliente_info->direccion_persona)) . "</td>";
										echo "</tr>";
										
										 echo "<tr>";
										  echo "<th class= text-right style= width:45% >E-mail:</th>";
										    echo "<td style= width:10% > </td>";
										  echo "<td style= width:45% > " . strtolower($cliente_info->correo_persona) . "</td>";
										echo "</tr>";
										
										 echo "<tr>";
										  echo "<th class= text-right style= width:45% >Telefono:</th>";
										    echo "<td style= width:10% > </td>";
										  echo "<td style= width:45% > " . $cliente_info->telefono_persona . "</td>";
										echo "</tr>";
										
										 ?>
								</table>
							</div>
							<div class="col-xs-12 text-center">
                                <br>
                                <br>
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