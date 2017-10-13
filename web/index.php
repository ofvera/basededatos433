<!DOCTYPE html>
<?php
include('head.php');
 ?>

    <br />
        <h1>
          La plataforma confiable que te informará de todos los acontecimientos importantes en el mundo de la musica
        </h1>
        <h2>
            A continuación podrás revisar las distintas secciones de la plataforma
        </h2>
    <br />

    <p>Busqueda de bandas</p>
    <form action="consulta_busqueda_bandas.php" method="post">
      Ingresa el concierto a buscar:
      <p></p>
      <input type="text" name="nombre">
      <input type="submit" value="buscar">
    </form>

<?php
include('footer.php');
 ?>
