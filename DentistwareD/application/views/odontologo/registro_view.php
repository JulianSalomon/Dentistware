<div class="box box-primary">
	<div class="box-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="text-center">Informacion registro </h2>
		<hr>
	</div>
	<div class="box-body">
		<div class="text-align:left">
			<table style="width:100%" align="left">
				<tr>
					<th class="text-left" style="width:10%" >
						Odontólogo:
					</th>
					<td style="width:5%"></td>
					<td style="width:70%">
						<?php
                            echo ucwords($registro->nombre_persona);
				        ?>
					</td>
				</tr>
				<tr>
					<th class="text-left" style="width:10%" >
						Motivo:
					</th>
					<td style="width:5%"></td>
					<td style="width:70%">
						<?php 
                            if($registro->motivo_consulta==NULL){
                                echo "Ninguno";
							} else {
                                echo $registro->motivo_consulta;
							}
                        ?>
					</td>
				</tr>
				<tr>
					<th class="text-left" style="width:10%" >
						Descripción:
					</th>
					<td style="width:5%"></td>
					<td style="width:70%">
						<?php 
                            if($registro->desc_procedimiento==NULL){
                                echo "Ninguno";
                            } else {
                                echo $registro->desc_procedimiento;
							}
                        ?>
					</td>
				</tr>
				<tr>
					<th class="text-left" style="width:10%" >
						Enfermedad:
					</th>
					<td style="width:5%"></td>
					<td style="width:70%">
						<?php
                            if($registro->enfermedad_actual==NULL){
                                echo "Ninguna";
                            } else {
                                echo $registro->enfermedad_actual;
							}
                        ?>
					</td>
				</tr>
			</table>
		</div>
	</div>