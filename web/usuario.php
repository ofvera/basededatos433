<!DOCTYPE html>
<?php
include('head.php');
 ?>

    <br />
        <h1>
          La plataforma confiable que te informará de todos los acontecimientos importantes en el mundo de la musica
        </h1>
    <br />

    <p>Preguntas</p>
    <form action="consulta_busqueda_bandas.php" method="post">
      Ingresa el concierto a buscar:
      <p></p>
      <input type="text" name="nombre">
      <input type="submit" value="buscar">
    </form>

<?php
include('footer.php');
 ?>