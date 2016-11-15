<div class="content-wrapper">
    <div class="container">
        <section class="content-header">
            <h1>Bienvenido a Dentistware</h1>
        </section>
        <section class="content">
            <?php
            /*
                $firstday = date('Y-m-d', strtotime('sunday -1 mounths'));
                echo $firstday;
                $número = 1000000000000;
                $english_format_number = number_format($número, 0, ',', '.');
                echo $english_format_number;
            */
            
            ?>
            <!-- Apply any bg-* class to to the info-box to color it -->
            <div class="info-box bg-green">
              <span class="info-box-icon"><i class="fa fa-thumbs-o-up"></i></span>
              <div class="info-box-content">
                <div class="col-xs-10 ">
                    <?php    
                        echo "<span class=info-box-text>Multas pagadas </span>";
                        echo "<span class=info-box-number>" . $multasPagadas . "</span>"; 
                        echo "<div class=progress>";
                            echo "<div class=progress-bar style='width:" . $porcentajeMultasPagadas . "%'></div>";
                        echo "</div>";
                        echo "<span class=progress-description>" . $porcentajeMultasPagadas . "% del total de las multas </span>";
                    echo "</div>";
                    echo "<div class=col-xs-2 >";
                        echo "<span class=info-box-text>Valor </span>";
                        $número = $multasPagadas * 10000;
                        $valor = number_format($número, 0, ',', '.');
                        echo "<span class=info-box-number>$" . $valor . "</span>";
                    ?>
                    </div>
              </div><!-- /.info-box-content -->
            </div><!-- /.info-box                         <span class="info-box-text">Likes <span style="display:inline-block; width: 25em;"></span> likes</span>    -->
            <div class="info-box bg-red">
              <span class="info-box-icon" ><i class="fa fa-thumbs-o-down" ></i></span>
              <div class="info-box-content">                
                    <div class="col-xs-10 ">
                    <?php    
                        echo "<span class=info-box-text>Multas sin pagar </span>";
                        echo "<span class=info-box-number>" . $multasSinPagar . "</span>"; 
                        echo "<div class=progress>";
                            echo "<div class=progress-bar style='width:" . $porcentajeMultasSinPagar . "%'></div>";
                        echo "</div>";
                        echo "<span class=progress-description>" . $porcentajeMultasSinPagar . "% del total de las multas </span>";
                    echo "</div>";
                    echo "<div class=col-xs-2 >";
                        echo "<span class=info-box-text>Valor </span>";
                        $número = $multasSinPagar * 10000;
                        $valor = number_format($número, 0, ',', '.');
                        echo "<span class=info-box-number>$" . $valor . "</span>";
                    ?>
                    </div>
                
                <!-- The progress section is optional -->
                
              </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
            
            <div class="col-md-6">
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Numero de citas disponibles por dia para la semana</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                <p>Citas para el dia Lunes: <?php echo $Monday ?></p>
                 <div class="progress">
                    <?php 
                        echo "<div class= ". "'progress-bar progress-bar-blue'"." role=progressbar aria-valuenow=" . $Monday  . " aria-valuemin= 0 aria-valuemax= 20 style= 'width: " . $percentMonday  . "%'>
                        </div>";
                    ?>
                  </div>
                <p>Citas para el dia Martes: <?php echo $Tuesday ?></p>
                  <div class="progress">
                    <?php 
                        echo "<div class= ". "'progress-bar progress-bar-yellow'"." role=progressbar aria-valuenow=" . $Tuesday  . " aria-valuemin= 0 aria-valuemax=20 style= 'width: " . $percentTuesday  . "%'>
                        </div>";
                      
                    ?>
                  </div>
                <p>Citas para el dia Miercoles: <?php echo $Wednesday ?></p>
                  <div class="progress">
                    <?php 
                        echo "<div class= ". "'progress-bar progress-bar-red'"." role=progressbar aria-valuenow=" . $Wednesday  . " aria-valuemin= 0 aria-valuemax=20 style= 'width: " . $percentWednesday  . "%'>
                        </div>"
                    ?>
                  </div>
                <p>Citas para el dia Jueves: <?php echo $Thursday ?></p>
                  <div class="progress">
                    <?php 
                        echo "<div class= ". "'progress-bar progress-bar-green'"." role=progressbar aria-valuenow=" . $Thursday  . " aria-valuemin= 0 aria-valuemax=20 style= 'width: " . $percentThursday  . "%'>
                        </div>"
                    ?>
                  </div>
                <p>Citas para el dia Viernes: <?php echo $Friday ?></p>
                  <div class="progress">
                    <?php 
                        echo "<div class= ". "'progress-bar progress-bar-yellow '"." role=progressbar aria-valuenow=" . $Friday  . " aria-valuemin= 0 aria-valuemax=20 style= 'width: " . $percentFriday  . "%'>
                        </div>"
                    ?>
                  </div>
                <p>Citas para el dia Sabado: <?php echo $Saturday ?></p>
                  <div class="progress">
                    <?php 
                        echo "<div class= ". "'progress-bar progress-bar-orange'"." role=progressbar aria-valuenow=" . $Saturday  . " aria-valuemin= 0 aria-valuemax=20 style= 'width: " . $percentSaturday  . "%'>
                        </div>"
                    ?>
                  </div>
                </div>
              </div>
            </div>
            
        </section>
    </div>
</div>
