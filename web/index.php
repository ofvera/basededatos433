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