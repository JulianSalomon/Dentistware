<div class="content-wrapper">
    <div class="container">
        <section class="content-header">
            <h1>Bienvenido a Dentistware</h1>
        </section>
        <section class="content">
            <div class="col-md-7">
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Citas por dia</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                <p>Lunes: <?php echo $Monday ?></p>
                 <div class="progress">
                    <?php 
                        echo "<div class= ". "'progress-bar progress-bar-yellow'"." role=progressbar aria-valuenow=" . $Monday  . " aria-valuemin= 0 aria-valuemax= 20 style= 'width: " . $percentMonday  . "%'>
                        </div>";
                    ?>
                  </div>
                <p>Martes: <?php echo $Tuesday ?></p>
                  <div class="progress">
                    <?php 
                        echo "<div class= ". "'progress-bar progress-bar-green'"." role=progressbar aria-valuenow=" . $Tuesday  . " aria-valuemin= 0 aria-valuemax=20 style= 'width: " . $percentTuesday  . "%'>
                        </div>";
                      
                    ?>
                  </div>
                <p>Miercoles: <?php echo $Wednesday ?></p>
                  <div class="progress">
                    <?php 
                        echo "<div class= ". "'progress-bar progress-bar-red'"." role=progressbar aria-valuenow=" . $Wednesday  . " aria-valuemin= 0 aria-valuemax=20 style= 'width: " . $percentWednesday  . "%'>
                        </div>"
                    ?>
                  </div>
                <p>Jueves: <?php echo $Thursday ?></p>
                  <div class="progress">
                    <?php 
                        echo "<div class= ". "'progress-bar progress-bar-red'"." role=progressbar aria-valuenow=" . $Thursday  . " aria-valuemin= 0 aria-valuemax=20 style= 'width: " . $percentThursday  . "%'>
                        </div>"
                    ?>
                  </div>
                <p>Viernes: <?php echo $Friday ?></p>
                  <div class="progress">
                    <?php 
                        echo "<div class= ". "'progress-bar progress-bar-red'"." role=progressbar aria-valuenow=" . $Friday  . " aria-valuemin= 0 aria-valuemax=20 style= 'width: " . $percentFriday  . "%'>
                        </div>"
                    ?>
                  </div>
                <p>Sabado: <?php echo $Saturday ?></p>
                  <div class="progress">
                    <?php 
                        echo "<div class= ". "'progress-bar progress-bar-red'"." role=progressbar aria-valuenow=" . $Saturday  . " aria-valuemin= 0 aria-valuemax=20 style= 'width: " . $percentSaturday  . "%'>
                        </div>"
                    ?>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="col-md-7">
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Progreso de citas</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                <p>Citas asignadas: <?php echo $citasNull ?></p>
                 <div class="progress">
                    <?php 
                        echo "<div class= ". "'progress-bar progress-bar-yellow'"." role=progressbar aria-valuenow=" . $citasNull  . " aria-valuemin= 0 aria-valuemax=" . $totalCitas . " style= 'width: " . $porcentajeCitasNull  . "%'>
                        </div>";
                    ?>
                  </div>
                <p>Citas Atendidas: <?php echo $citasAtendidas ?></p>
                  <div class="progress">
                    <?php 
                        echo "<div class= ". "'progress-bar progress-bar-green'"." role=progressbar aria-valuenow=" . $citasAtendidas  . " aria-valuemin= 0 aria-valuemax=" . $totalCitas . " style= 'width: " . $porcentajeCitasAtendidas  . "%'>
                        </div>";
                      
                    ?>
                  </div>
                <p>Citas no atendidas: <?php echo $citasCanceladas ?></p>
                  <div class="progress">
                    <?php 
                        echo "<div class= ". "'progress-bar progress-bar-red'"." role=progressbar aria-valuenow=" . $citasCanceladas  . " aria-valuemin= 0 aria-valuemax=" . $totalCitas . " style= 'width: " . $porcentajeCitasCanceladas  . "%'>
                        </div>"
                    ?>
                  </div>
                </div>
              </div>
            </div>
        </section>
    </div>
</div>
