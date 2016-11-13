<div class="box box-primary">
    <div class="box-header">
        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">x</button>
        <h3 class="modal-title">Dientes</h3><hr style="margin-top:10px;margin-bottom:10px;">
    </div>
    <div class="box-body">
        <div class="col-xs-8 text-right" id="teeth-diagram"></div>
        <div class="col-xs-4 text-right">
            <h4>Convenciones</h4>
            <form id="choose-stateType" action="submit">
                <input type="radio" name="state" value="A" checked> Ausente &emsp;&emsp;<i class="fa fa-times" id="i_refresh" ></i><br>
                <input type="radio" name="state" value="E"> Extraer &emsp;&emsp;&nbsp;&nbsp;&nbsp;=<i class="fa " id="i_refresh"></i><br>
                <input type="radio" name="state" value="D"> Caries  &emsp;&emsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-circle" style="color:blue" id="i_refresh"></i><br>
                <input type="radio" name="state" value="O"> Obturación &nbsp;&nbsp;&nbsp;<i class="fa fa-circle" style="color:red" id="i_refresh"></i><br>
                <input type="radio" name="state" value="C"> Corona &emsp;&emsp;&nbsp;<i class="fa fa-circle-o" id="i_refresh"></i><br>
                <input type="radio" name="state" value="T"> Tramo &emsp;&emsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-minus" id="i_refresh"></i><br>
            </form>
        </div>
    </div>
    <div class="box-footer">
        <button type="button" data-dismiss="modal" class="btn btn-danger pull-left">Cancelar</button>
        <button id="agregarDiente" type="submit" name="submit_reg" class="btn btn-info pull-right" value="<?php echo $id_registro ?>">Guardar</button>
    </div>
</div>

<?php    
    echo plugin_js('teeth-drawer');
    echo plugin_js('p5');
    echo plugin_js('assets/js/dentistware/dientes.js', true);
?>

<script>
    <?php
        echo 'var js_site_url = "'. site_url() . '";
        var teeth = [';
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