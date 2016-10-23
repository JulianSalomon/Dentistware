<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Top Navigation</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="assets/css/_all-skins.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    <style>
        .mySlides {display:none;}
    </style>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="index2.html" class="navbar-brand"><b>Dentist</b>ware</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="#nuestro_proyecto">Nuestro proyecto<span class="sr-only">(current)</span></a></li>
              
            <li><a href="#ventajas">Ventajas</a></li>
              <li><a href="#servicios">Servicios</a></li>
            <li class="dropdown">
                
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Desarrolladores <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#"></a></li>
                <li><a href="#">Cristian David González Carrillo</a></li>
                  <li><a href="#">Alex Jose Alberto Barreto</a></li>
                  <li><a href="#">Julián Esteban Salomón Torres</a></li>
                  <li><a href="#">Nicolás Restrepo Torres</a></li>
                <!-- <li class="divider"></li>
                <li><a href="#">Separated link</a></li>
                <li class="divider"></li>
                <li><a href="#">One more separated link</a></li>
                   -->
              </ul>
            </li>
          </ul>
          <form class="navbar-form navbar-left" role="search">
            <div class="form-group">
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search">
            </div>
          </form>
        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->
     
            <!-- /.messages-menu -->

            <!-- Notifications Menu -->
        
            <!-- Tasks Menu -->
     
            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href=" <?php echo base_url('login') ?>" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                  <div class="col-md-3 col-sm-4"><i class="fa fa-fw fa-key"></i></div>
                
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs">Iniciar sesión</span>
              </a>
                <!-- dropdown menu-->
            
                <!-- end dropdown-->
            </li>
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Bienvenido a Dentistware
        </h1>

      </section>

      <!-- Main content -->
      <section class="content">
                   <div class="w3-content w3-section" style="max-width:100%">
  <img class="mySlides w3-animate-fading" src="assets/img/img01.jpg" style="width:100%" >
  <img class="mySlides w3-animate-fading" src="assets/img/img02.jpg" style="width:100%" >
  <img class="mySlides w3-animate-fading" src="assets/img/img03.jpg" style="width:100%" >
</div>

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
        <div class="callout callout-info" id="nuestro_proyecto">
          <h4>Nuestro proyecto</h4>
            
          <p>      Es una aplicación web que está destinada a ayudar al personal de Odontología en la sistematización, control, seguridad y persistencia de la información, concerniente a algunos servicios que se prestan en esta entidad médica.<br>

Se quiere que el personal pueda administrar todo lo relacionado a las historias odontológicas de los clientes, para tener un servicio más integral para el usuario y control de tratamientos. Se tendrán, varios roles para cada funcionalidad del sistema, cómo el de cliente, odontólogo, administrador y empleado.
              <br>   
Se le permitirá al cliente, ver los tratamientos, planes y financiamientos prestados, donde también se permitirá que el cliente comente sobre los odontólogos, para incentivar un mejor servicio por parte de los odontólogos.</p>
        </div>
        <div class="callout callout-danger">
          <h4>Servicios</h4>

          <p>Para acceder a todos los servicios de Dentisware deberá estar previamente registrado, puede iniciar sesión desde la esquina superior derecha de la página</p>
        </div>
        
                  <div class="box box-default" id="ventajas">
          <div class="box-header with-border">
            <h3 class="box-title">Ventajas</h3>
          </div>
          <div class="box-body">
              
<ul>
  <li>El odontólogo podra controlar y conocer rápidamente la historia clínica del paciente.
</li>
    <li>El usuario, con un simple proceso, podrá pedir una cita, sin la necesidad de ir al consultorio.
</li>
    <li>Las historias clínicas estarán a salvo, evitando el uso de papel y centros de archivos grandes.
</li>
    <li>El empleado no tendrá la necesidad de llevar un cuaderno con las citas hechas, las que se cancelan y las que se realizan.</li>
    
</ul>

          </div>
                      
      
            
            
          <!-- /.box-body -->
        </div>
          
          
          <div class="box box-default" id="servicios">
          <div class="box-header with-border">
            <h3 class="box-title">Servicios</h3>
          </div>
          <div class="box-body">
              
<ul>
  <li>Solicitud de citas.
</li>
    <li>Optimización de historias clínicas.
</li>
    <li>Consulta de odontólogos.
</li>
    <li>Consulta de tratamientos</li>
    
</ul>

          </div>
                      
          
            
            
          <!-- /.box-body -->
        </div>
          
        <!-- /.box -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="container">
      <div class="pull-right hidden-xs">
        <b>Version</b> 1
      </div>
      <strong>Copyright &copy; 2016 <a href="http://almsaeedstudio.com">Dentistware</a>.</strong> Todos los derechos reservados
    </div>
    <!-- /.container -->
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
