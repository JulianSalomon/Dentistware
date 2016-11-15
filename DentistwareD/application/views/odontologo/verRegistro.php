<div class="box box-primary">
            <div class="box-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2>Informacion registro </h2>         
                <hr>
            </div>
            <div class="box-body">
                <div class="text-align:center">
                   <table style="width:100%" align="center">
                       <tr>
                                   <tr>
                                       <th class="text-right" style="width:45%" >
                                           Odontólogo:
                                       </th>
                                       <td style="width:10%"></td>
                                       <td style="width:45%">
                                           <?php
                                                echo ucwords($registro->nombre_persona);
                                           ?>
                                       </td>
                                   </tr>
                                   <tr>
                                        <th class="text-right" style="width:45%" >
                                           Motivo:
                                        </th>
                                        <td style="width:10%"></td>
                                        <td style="width:45%">
                                            <?php if($registro->motivo_consulta==NULL){
                                                    echo "Ninguno";
} else {
    echo $registro->motivo_consulta;
} ?>
                                        </td>
                                   </tr>
                                   <tr>
                                        <th class="text-right" style="width:45%" >
                                           Descripción del procedimiento:
                                        </th>
                                        <td style="width:10%"></td>
                                        <td style="width:45%">
                                            <?php if($registro->desc_procedimiento==NULL){
                                                    echo "Ninguno";
} else {
    echo $registro->desc_procedimiento;
} ?>
                                        </td>
                                   </tr>
                                   <tr>
                                        <th class="text-right" style="width:45%" >
                                           Enfermedad:
                                        </th>
                                        <td style="width:10%"></td>
                                        <td style="width:45%">
                                            <?php if($registro->enfermedad_actual==NULL){
                                                    echo "Ninguna";
} else {
    echo $registro->enfermedad_actual;
} ?>
                                        </td>
                                   </tr>
                    </table>
                </div>
            </div>