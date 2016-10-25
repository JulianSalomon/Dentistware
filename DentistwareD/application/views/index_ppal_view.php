<!DOCTYPE html>
<html>
<head>
    <title>Dentistware</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">  
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">

  <link rel="stylesheet" href="assets/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/css/ionicons.min.css">
  <link rel="stylesheet" href="assets/css/AdminLTE.min.css">
  <link rel="stylesheet" href="assets/css/skin-blue-light.min.css">
    <style>
        .mySlides {display:none;}
    </style>
</head>
<body class="hold-transition skin-blue-light layout-top-nav">
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href=" <?php echo base_url() ?>" class="navbar-brand"><b>DENTIST</b>WARE</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="#nuestro_proyecto">Nuestro proyecto<span class="sr-only">(current)</span></a></li>
              
            <li><a href="#ventajas">Ventajas</a></li>
              <li><a href="#servicios">Servicios</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Desarrolladores <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                  <li><a href="#"><img src="assets/img/avatar.png" class="user-image" alt="User Image" width="15%"> Cristian David González Carrillo &nbsp; &nbsp; &nbsp;</a></li>
                  <li><a href="#"><img src="assets/img/avatar04.png" class="user-image" alt="User Image" width="15%"> Alex Jose Alberto Barreto           </a></li>
                  <li><a href="#"><img src="assets/img/user2-160x160.jpg" class="user-image" alt="User Image" width="15%"> Julián Esteban Salomón Torres          </a></li>
                  <li><a href="#"><img src="assets/img/avatar5.png" class="user-image" alt="User Image" width="15%"> Nicolás Restrepo Torres       </a></li>
              </ul>
            </li>
          </ul>
        </div>
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="dropdown user user-menu">
              <a href="<?php echo base_url('Login'); ?>">
                  <div class="col-md-3 col-sm-4"><i class="fa fa-fw fa-key"></i></div>
                <span class="hidden-xs">Iniciar sesión</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <div class="content-wrapper">
    <div class="container">
      <section class="content-header">
        <h1>Bienvenido a Dentistware</h1>
      </section>

      <section class="content">
        <div class="w3-content w3-section" style="max-width:100%">
            <img class="mySlides w3-animate-fading" src="assets/img/img01.jpg" style="width:100%" >
            <img class="mySlides w3-animate-fading" src="assets/img/img02.jpg" style="width:100%" >
            <img class="mySlides w3-animate-fading" src="assets/img/img03.jpg" style="width:100%" >
        </div>
        <div class="callout callout-info" id="nuestro_proyecto">
          <h4>Nuestro proyecto</h4>            
          <p>
            Es una aplicación web que está destinada a ayudar al personal de Odontología en la sistematización, control, seguridad y persistencia de la información, concerniente a algunos servicios que se prestan en esta entidad médica.<br>

            Se quiere que el personal pueda administrar todo lo relacionado a las historias odontológicas de los clientes, para tener un servicio más integral para el usuario y control de tratamientos. Se tendrán, varios roles para cada funcionalidad del sistema, cómo el de cliente, odontólogo, administrador y empleado.
            <br>   
            Se le permitirá al cliente, ver los tratamientos, planes y financiamientos prestados, donde también se permitirá que el cliente comente sobre los odontólogos, para incentivar un mejor servicio por parte de los odontólogos.
          </p>
        </div>
        <div class="callout callout-warning">
          <h4>Servicios</h4>
          <p>
              Para acceder a todos los servicios de Dentisware deberá estar previamente registrado, puede iniciar sesión desde la esquina superior derecha de la página
          </p>
        </div>
        <div class="box box-primary" id="ventajas">
          <div class="box-header with-border">
            <h3 class="box-title">Ventajas</h3>
          </div>
          <div class="box-body">
            <ul>
              <li>El odontólogo podra controlar y conocer rápidamente la historia clínica del paciente.</li>
              <li>El usuario, con un simple proceso, podrá pedir una cita, sin la necesidad de ir al consultorio.</li>
              <li>Las historias clínicas estarán a salvo, evitando el uso de papel y centros de archivos grandes.</li>
              <li>El empleado no tendrá la necesidad de llevar un cuaderno con las citas hechas, las que se cancelan y las que se realizan.</li>
            </ul>
          </div>
        </div>
        <div class="box box-primary" id="servicios">
          <div class="box-header with-border">
            <h3 class="box-title">Servicios</h3>
          </div>
          <div class="box-body">              
            <ul>
              <li>Solicitud de citas.</li>
              <li>Optimización de historias clínicas.</li>
              <li>Consulta de odontólogos.</li>
              <li>Consulta de tratamientos</li>
            </ul>
          </div>
        </div>
      </section>
    </div>
  </div>
	<footer class="main-footer">
    	<div class="form-group">
            <div class="pull-right hidden-xs">
                <small>Version</small> 1
            </div>
        	<div class="text-center">
			<strong>&COPY; 2016 
			<?php
				//echo date('Y'); 
				echo anchor('', '    Dentistware.');
			?>
			</strong>
            </div>
        </div>
    </footer>    
</div>

<script src="assets/js/jquery-3.1.1.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="assets/js/app.min.js"></script>
<script>
    var myIndex = 0;
    carousel();

    function carousel() {
        var i;
        var x = document.getElementsByClassName("mySlides");
        for (i = 0; i < x.length; i++) {
           x[i].style.display = "none";
        }
        myIndex++;
        if (myIndex > x.length) {myIndex = 1}
        x[myIndex-1].style.display = "block";
        setTimeout(carousel, 4000); // Change image every 2 seconds
    }
</script>
</body>
</html>
