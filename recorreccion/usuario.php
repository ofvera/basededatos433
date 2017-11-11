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

    <br />
    <form action="bandas_pertenece_artista_e2.php" method="post">
      Ingresa un artista para saber sus bandas:
      <input type="text" name="artista">
      <input type="submit" value="buscar">
    </form>
    <br />
    <form action="disco_bandas_involucradas_e2.php" method="post">
      Ingresa un disco para saber las bandas involucradas:
      <input type="text" name="disco">
      <input type="submit" value="buscar">
    </form>



    <br />
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

    <form action="consulta_concierto_banda.php" method="post">
      Busca los conciertos de tus bandas favoritas!
      <p></p>
      Fecha inicio:
      <input type="text" name="fecha_inicio">
      <p></p>
      Fecha fin:
      <input type="submit" value="fehca_termino">
      <input type="submit" value="buscar">
    </form>

    <form action="consultas_noticia_etiqueta.php" method="post">
      Busca las noticias de tu banda!
      <p></p>
      Fecha inicio:
      <input type="text" name="Fecha1">
      <p></p>
      Fecha fin:
      <input type="text" name="Fecha2">
      <p></p>
      Etiqueta
      <input type="submit" value="Etiqueta">
    </form>



<?php
include('footer.php');
 ?>
