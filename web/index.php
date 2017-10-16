<!DOCTYPE html>
<?php
include('head.php');
 ?>

    <br />
        <h1>
          La plataforma confiable que te informará de todos los acontecimientos importantes en el mundo de la musica
        </h1>
        <h2>
            Para poder acceder a todos los beneficios de la página, primero deberás registrarte :)
        </h2>
    <br />

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        Start Bootstrap
                    </a>
                </li>
                <li>
                    <a href="#">Dashboard</a>
                </li>
                <li>
                    <a href="#">Shortcuts</a>
                </li>
                <li>
                    <a href="#">Overview</a>
                </li>
                <li>
                    <a href="#">Events</a>
                </li>
                <li>
                    <a href="#">About</a>
                </li>
                <li>
                    <a href="#">Services</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <h1>Simple Sidebar</h1>
                <p>This template has a responsive menu toggling system. The menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will appear/disappear. On small screens, the page content will be pushed off canvas.</p>
                <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>.</p>
                <a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle">Toggle Menu</a>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

    <!--aquiiiiiiiiiiiiiiiiiiiiiiiii-->

    <p>Registro</p>
    <form action="consulta_registro.php" method="post">
      <p>Nombre: 			<input type="text" name="nombre"></p>
      <p>Edad: 			<input type="text" name="edad"></p>
      <p>Correo: 			<input type="text" name="mail"></p>
      <p>Nombre Usuario: 	<input type="text" name="usuario"></p>
      <p>Contraseña:		<input type="text" name="clave"></p>
      <p><input type="submit" value="registrar">
    </form>

    Si ya estás registrado:
    <form action="consulta_login.php" method="post">
      Nombre Usuario: 	<input type="text" name="usuario">
      Contraseña:		<input type="text" name="clave">
      <input type="submit" value="inicio">
    </form>

<?php
include('footer.php');
 ?>
