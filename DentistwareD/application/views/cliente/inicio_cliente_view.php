<div class="content-wrapper">
    <div class="container">
        <section class="content-header">
            <font size= 6>Bienvenido a Dentistware</font>
        </section>
        <section class="content">
            <div class="col-xs-12">
               <div class="callout callout-info">
                    <font size= 3>
                    <p>En la primera parte te mostramos el dinero que has pago de multas, el dinero que debes a Dentistware y el porcentaje de cada una</p>
                    <p>Luego tendrás información de la asistencia a las citas de cada día durante la semana</p>
                    </font>
                </div>
            </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="info-box bg-green">
                  <span class="info-box-icon"><i class="fa fa-thumbs-o-up"></i></span>
                  <div class="info-box-content">
                    <div class="col-xs-7 ">
                        <?php    
                            echo "<span class=info-box-text>Multas pagadas </span>";
                            echo "<span class=info-box-number>" . $multasPagadas . "</span>"; 
                            echo "<div class=progress>";
                                echo "<div class=progress-bar style='width:" . $porcentajeMultasPagadas . "%'></div>";
                            echo "</div>";
                            echo "<span class=progress-description>" . $porcentajeMultasPagadas . "% del total de las multas </span>";
                        echo "</div>";
                        echo "<div class=col-xs-5 >";
                            echo "<span class=info-box-text>Valor </span>";
                            $número = $multasPagadas * 10000;
                            $valor = number_format($número, 0, ',', '.');
                            echo "<span class=info-box-number>$" . $valor . "</span>";
                        ?>
                        </div>
                  </div><!-- /.info-box-content -->
                </div>
            </div>
            <!-- /.info-box                         <span class="info-box-text">Likes <span style="display:inline-block; width: 25em;"></span> likes</span>    -->
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="info-box bg-red ">
                  <span class="info-box-icon" ><i class="fa fa-thumbs-o-down" ></i></span>
                  <div class="info-box-content">                
                        <div class="col-xs-7 ">
                        <?php    
                            echo "<span class=info-box-text>Multas sin pagar </span>";
                            echo "<span class=info-box-number>" . $multasSinPagar . "</span>"; 
                            echo "<div class=progress>";
                                echo "<div class=progress-bar style='width:" . $porcentajeMultasSinPagar . "%'></div>";
                            echo "</div>";
                            echo "<span class=progress-description>" . $porcentajeMultasSinPagar . "% del total de las multas </span>";
                        echo "</div>";
                        echo "<div class=col-xs-5 >";
                            echo "<span class=info-box-text>Valor </span>";
                            $número = $multasSinPagar * 10000;
                            $valor = number_format($número, 0, ',', '.');
                            echo "<span class=info-box-number>$" . $valor . "</span>";
                        ?>                            
                        </div>

                    <!-- The progress section is optional -->

                  </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div>
            
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Promedio de citas asistidas en cada día</h3>
                </div>
                
                <div class="box-body">
                <p>Lunes: <?php echo $Monday ?></p>
                 <div class="progress">
                    <?php 
                        echo "<div class= ". "'progress-bar progress-bar-blue'"." role=progressbar aria-valuenow=" . $Monday  . " aria-valuemin= 0 aria-valuemax=" . $citasTotal . " style= 'width: " . $percentMonday  . "%'>
                        </div>";
                    ?>
                  </div>
                <p>Martes: <?php echo $Tuesday ?></p>
                  <div class="progress">
                    <?php 
                        echo "<div class= ". "'progress-bar progress-bar-yellow'"." role=progressbar aria-valuenow=" . $Tuesday  . " aria-valuemin= 0 aria-valuemax=" . $citasTotal . " style= 'width: " . $percentTuesday  . "%'>
                        </div>";
                      
                    ?>
                  </div>
                <p>Miercoles: <?php echo $Wednesday ?></p>
                  <div class="progress">
                    <?php 
                        echo "<div class= ". "'progress-bar progress-bar-red'"." role=progressbar aria-valuenow=" . $Wednesday  . " aria-valuemin= 0 aria-valuemax=" . $citasTotal . " style= 'width: " . $percentWednesday  . "%'>
                        </div>"
                    ?>
                  </div>
                <p>Jueves: <?php echo $Thursday ?></p>
                  <div class="progress">
                    <?php 
                        echo "<div class= ". "'progress-bar progress-bar-green'"." role=progressbar aria-valuenow=" . $Thursday  . " aria-valuemin= 0 aria-valuemax=" . $citasTotal . " style= 'width: " . $percentThursday  . "%'>
                        </div>"
                    ?>
                  </div>
                <p>Viernes: <?php echo $Friday ?></p>
                  <div class="progress">
                    <?php 
                        echo "<div class= ". "'progress-bar progress-bar-yellow '"." role=progressbar aria-valuenow=" . $Friday  . " aria-valuemin= 0 aria-valuemax=" . $citasTotal . " style= 'width: " . $percentFriday  . "%'>
                        </div>"
                    ?>
                  </div>
                <p>Sabado: <?php echo $Saturday ?></p>
                  <div class="progress">
                    <?php 
                        echo "<div class= ". "'progress-bar progress-bar-orange'"." role=progressbar aria-valuenow=" . $Saturday  . " aria-valuemin= 0 aria-valuemax=" . $citasTotal . " style= 'width: " . $percentSaturday  . "%'>
                        </div>"
                        
                    ?>
                  </div>
                </div>
              </div>
            </div>
        </section>
    </div>
</div>
