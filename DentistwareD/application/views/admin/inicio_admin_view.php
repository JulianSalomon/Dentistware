<div class="content-wrapper">
    <div class="container">
        <section class="content-header">
            <h1>Bienvenido a Dentistware</h1>
        </section>
        <section class="content">
            <div class="col-md-6">
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Personas activas dentro del sitema</h3>
                </div>
                <div class="box-body">
                <p>Administradores: <?php echo $personasADM ?></p>
                 <div class="progress">
                    <?php 
                        echo "<div class= ". "'progress-bar progress-bar-yellow'"." role=progressbar aria-valuenow=" . $personasADM  . " aria-valuemin= 0 aria-valuemax=" . $totalPersonas . " style= 'width: " . $porcentajePersonasADM  . "%'>
                        </div>"
                    ?>
                  </div>
                <p>Empleados: <?php echo $personasEMP ?></p>
                  <div class="progress">
                    <?php 
                        echo "<div class= ". "'progress-bar progress-bar-green'"." role=progressbar aria-valuenow=" . $personasEMP  . " aria-valuemin= 0 aria-valuemax=" . $totalPersonas . " style= 'width: " . $porcentajePersonasEMP  . "%'>
                        </div>"
                    ?>
                  </div>
                <p>Odontologos: <?php echo $personasODO ?></p>
                  <div class="progress">
                    <?php 
                        echo "<div class= ". "'progress-bar progress-bar-red'"." role=progressbar aria-valuenow=" . $personasODO  . " aria-valuemin= 0 aria-valuemax=" . $totalPersonas . " style= 'width: " . $porcentajePersonasODO  . "%'>
                        </div>"
                    ?>
                  </div>
                <p>Clientes: <?php echo $personasCLT ?></p>
                  <div class="progress">
                    <?php 
                        echo "<div class= ". "'progress-bar progress-bar-blue'"." role=progressbar aria-valuenow=" . $personasCLT  . " aria-valuemin= 0 aria-valuemax=" . $totalPersonas . " style= 'width: " . $porcentajePersonasCLT  . "%'>
                        </div>"
                    ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Personas inactivas dentro del sitema</h3>
                </div>
                <div class="box-body">
                <p>Administradores: <?php echo $personasADMDes ?></p>
                 <div class="progress">
                    <?php 
                        echo "<div class= ". "'progress-bar progress-bar-yellow'"." role=progressbar aria-valuenow=" . $personasADMDes  . " aria-valuemin= 0 aria-valuemax=" . $totalPersonasDes . " style= 'width: " . $porcentajePersonasADMDes  . "%'>
                        </div>"
                    ?>
                  </div>
                <p>Empleados: <?php echo $personasEMPDes ?></p>
                  <div class="progress">
                    <?php 
                        echo "<div class= ". "'progress-bar progress-bar-green'"." role=progressbar aria-valuenow=" . $personasEMPDes  . " aria-valuemin= 0 aria-valuemax=" . $totalPersonasDes . " style= 'width: " . $porcentajePersonasEMPDes  . "%'>
                        </div>"
                    ?>
                  </div>
                <p>Odontologs: <?php echo $personasODODes ?></p>
                  <div class="progress">
                    <?php 
                        echo "<div class= ". "'progress-bar progress-bar-red'"." role=progressbar aria-valuenow=" . $personasODODes  . " aria-valuemin= 0 aria-valuemax=" . $totalPersonasDes . " style= 'width: " . $porcentajePersonasODODes  . "%'>
                        </div>"
                    ?>
                  </div>
                <p>Clientes: <?php echo $personasCLTDes ?></p>
                  <div class="progress">
                    <?php 
                        echo "<div class= ". "'progress-bar progress-bar-blue'"." role=progressbar aria-valuenow=" . $personasCLTDes  . " aria-valuemin= 0 aria-valuemax=" . $totalPersonasDes . " style= 'width: " . $porcentajePersonasCLTDes  . "%'>
                        </div>"
                    ?>
                  </div>
                </div>
              </div>
            </div>
        </section>
    </div>
</div>
