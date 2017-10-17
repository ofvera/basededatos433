<!DOCTYPE html>
<?php
include('head.php');
 ?>

    <br />
        <h1>
          La plataforma confiable que te informará de todos los acontecimientos importantes en el mundo de la musica
        </h1>
    <br />

    <p>Aquí podrás encontrar todo lo que buscas!</p>
    <form action="consulta_busqueda_bandas.php" method="post">
      Ingresa la banda a buscar:
      <input type="text" name="nombre">
      <input type="submit" value="buscar">
    </form>

    <br />

    <form action="consulta_disco.php" method="post">
      Ingresa el disco a buscar:
      <input type="text" name="Disco">
      <input type="submit" value="buscar">
    </form>

    <br />

    <form action="consulta_genero.php" method="post">
      Ingresa el genero a buscar:
      <input type="text" name="Genero">
      <input type="submit" value="buscar">
    </form>

    <br />

    <form action="agregar_favorito.php" method="post">
      Agrega tu artista o Banda favorita!:
      <input type="text" name="Banda">
      <input type="submit" value="buscar">
    </form>

    <br />

    <form action="consulta_favoritas.php" method="post">
      Busca tus bandas favoritas!
      <input type="submit" value="buscar">
    </form>

<?php
include('footer.php');
 ?>
