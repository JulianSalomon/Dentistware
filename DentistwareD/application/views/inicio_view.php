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
                                Se quiere que el personal pueda administrar todo lo relacionado a las historias odontológicas de los clientes, para tener un servicio más integral para el usuario y control de tratamientos. Se tendrán, varios roles para cada funcionalidad del sistema, cómo el de cliente, odontólogo, administrador y empleado.<br>
                                Se le permitirá al cliente, ver los tratamientos, planes y financiamientos prestados, donde también se permitirá que el cliente comente sobre los odontólogos, para incentivar un mejor servicio por parte de los odontólogos.
                            </p>
                        </div>
                        <div class="callout callout-warning">
                            <h4>Servicios</h4>
                            <p>
                                Para acceder a todos los servicios de Dentisware deberá estar previamente registrado, puede iniciar sesión desde la esquina superior derecha de la página.
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
            
     	<script>
            var myIndex = 0;
            carousel();
            function carousel(){
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