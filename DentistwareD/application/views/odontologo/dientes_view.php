	<div class="box-header">
		<hr>
		<h3 class="modal-title">Odontodiagrama</h3>
		<hr style="margin-top:10px;margin-bottom:10px;">
	</div>
	<div class="box-body">
		<div class="text-center">
			<div class="col-xs-3 table-responsive">
				<h4>Convenciones</h4>
				<hr>
				<table style="width:80%" align="center">
					<tr>
						<th class="text-left">
							Ausente
						</th>
						<td style="width:20%"></td>
						<td class="text-right">
							<i class="fa fa-times" id="i_refresh" ></i>
						</td>
					</tr>
					<tr>
						<th class="text-left">
							Extraer
						</th>
						<td style="width:20%"></td>
						<td class="text-right">
							<b style="font-size=20">=</b>
						</td>
					</tr>
					<tr>
						<th class="text-left">
							Caries
						</th>
						<td style="width:20%"></td>
						<td class="text-right">
							<i class="fa fa-circle" style="color:blue" id="i_refresh"></i>
						</td>
					</tr>
					<tr>
						<th class="text-left">
							Obturación
						</th>
						<td style="width:20%"></td>
						<td class="text-right">
							<i class="fa fa-circle" style="color:red" id="i_refresh"></i>
						</td>
					</tr>
					<tr>
						<th class="text-left">
							Corona
						</th>
						<td style="width:20%"></td>
						<td class="text-right">
							<i class="fa fa-circle-o" id="i_refresh"></i>
						</td>
					</tr>
					<tr>
						<th class="text-left">
							Tramo
						</th>
						<td style="width:20%"></td>
						<td class="text-right">
							<i class="fa fa-minus" id="i_refresh"></i>
						</td>
					</tr>
				</table>
			</div>
		</div>
		<div class="col-xs-9 text-left" id="teeth-viewer"></div>
	</div>
	<div class="box-footer">
		<button type="button" data-dismiss="modal" class="btn btn-danger pull-left">Salir</button>
	</div>
</div>


<?php
	echo plugin_js('p5');
	echo plugin_js('assets/js/dentistware/dientes.js', true);
?>

<script>
	<?php
		echo 'var teeth = [';
		if($dientes != NULL){
		    foreach($dientes as $diente){
		    echo "[". $diente->aus . "," 
		            . $diente->ext . "," 
		            . $diente->car . "," 
		            . $diente->obt . "," 
		            . $diente->cor . "," 
		            . $diente->tra . "]," ;
		    }
		}
		echo '];';
    ?>
</script>