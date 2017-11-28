<!DOCTYPE html>
<?php
include('head.php');
 ?>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#favoritos" class="">Mis Favoritos</a></li>
            <li><a href="#buscar_banda" class="">Buscar Bandas</a></li>
            <li><a href="#genero" class="">Buscar por Género</a></li>
            <li><a href="#discos" class="">Discos</a></li>
            <li><a href="#noticias" class="">Noticias</a></li>
            <li><a href="#mgs" class="">Mensajes Filtrados</a></li>
          </ul>
        </div>
    </div>
  </div> <!-- end of navbar -->
</header>

<section id="home">
  <div id="bgimage" class="header-image">
    <div class="container">
      <div class="row">
        <div class="col-sm-5 col-xs-12">
          <div class="iphone center-content wow fadeInLeft" data-wow-duration="1s">
            <img src="images/iphone.png" alt="" />
          </div>
        </div>
        <div class="col-sm-7 col-xs-12 heading-text">
          <div class="single_home_content wow zoomIn" data-wow-duration="1s">
            <h1>Bienvenid@ a InfoBandas!
            !! </h1>
            <p class="bannerDescription">La plataforma confiable que te informará de todos los acontecimientos importantes en el mundo de la música</p>
            <div class="button">
              <a href="/~grupo4/entrega4/" class="btn white-btn youtube-media"><i class="fa fa-play"></i> Cerrar Sesión</a>
            </div>
          </div>
        </div>
      </div> <!-- end of row -->
    </div> <!-- end of container -->
  </div>
</section>

<section id='relleno'>
  <div class="subcribe_overlay">
    <div class="container">
      <div class="row">
        <div class="subscribe_heading_text center-content">
          <div class="subscribe_heading_title wow fadeIn" data-wow-duration="1s">
            <h1>InfoBandas</h1>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="favoritos">
  <div class="container">
    <div class="row">
      <h1>Aquí podrás buscar todo dentro de tus favoritos!</h1>
      <div class="pricing_heading_text center-content center-content">
        <form action="consulta_favoritas.php" class="subcribe_form center-content" method="post">
          <p>Quieres revisar tus favoritos??</p>
          <input type="submit" value="Ingresa Aquí!">
        </form>
      </div>
      <div class="pricing_heading_text center-content center-content">
        <form action="agregar_favorito.php" class="subcribe_form center-content" method="post">
          <p>Agrega a tus favoritos:</p>
          <input type="text" name="Banda" placeholder="Nombre de la Banda">
          <input type="submit" value="agregar">
        </form>
      </div>
    </div>
  </div>
</section>

<section id="buscar_banda">
  <div class="container">
    <div class="row">
      <h1>Buscar Bandas</h1>
      <p>Aquí podrás encontrar a todas las bandas que quieras :)</p>
      <div class="download_heading_text center-content">
        <p>Por favor, ingresa una banda a buscar:</p>
        <form action="consulta_busqueda_bandas.php" class="subcribe_form center-content" method="post">
          <input type="text" name="nombre" placeholder="Nombre Banda a Buscar">
          <input type="submit" value="buscar">
        </form>
      </div>
      <div class="download_heading_text center-content">
        <p>Bandas donde pertenece ó perteneció un artista:</p>
        <form action="bandas_pertenece_artista_e2.php" class="subcribe_form center-content" method="post">
          <input type="text" name="artista" placeholder="Artista">
          <input type="submit" value="buscar">
        </form>
      </div>
      <div class="download_heading_text center-content">
        <p>EX-Integrantes de una banda:</p>
        <form action="ex_integrantes_banda_e2.php" class="subcribe_form center-content" method="post">
          <input type="text" name="banda" placeholder="Banda">
          <input type="submit" value="buscar">
        </form>
      </div>
      <div class="download_heading_text center-content">
        <p>Busca el concierto de tu banda favorita :)</p>
        <p>Debes anotar el formato de fechas de la siguiente forma: 'YYYY-MM-DD'</p>
        <p>Además la fecha de término debe ser mayor que la de inicio</p>
        <form action="consulta_concierto_banda.php" class="subcribe_form center-content" method="post">
          <input type="text" name="banda" placeholder="Nombre de la Banda">
          <input type="text" name="fecha_inicio" placeholder="Fecha Inicio">
          <input type="text" name="fecha_termino" placeholder="Fecha Término">
          <input type="submit" value="buscar">
        </form>
      </div>
      <div class="download_heading_text center-content">
        <p>Buscar correo de una banda:</p>
        <form action="correo_banda_e2.php" class="subcribe_form center-content" method="post">
          <input type="text" name="banda" placeholder="Nombre Banda">
          <input type="submit" value="buscar">
        </form>
      </div>
    </div>
  </div>
</section>

<section id="genero">
  <div class="container">
    <div class="row">
      <h1>Búsqueda por Género Musical</h1>
      <p>Ingresa el género musical a buscar:</p>
      <div class="pricing_heading_text center-content">
        <form action="consulta_genero.php" class="subcribe_form center-content" method="post">
          <input type="text" name="Genero" placeholder="Género">
          <input type="submit" value="buscar">
        </form>
      </div>
    </div>
  </div>
</section>

<section id="discos">
  <div class="container">
    <div class="row">
      <h1>Búsqueda por Discos</h1>
      <div class="download_heading_text center-content">
        <p>Ingresa el disco a buscar:</p>
        <form action="consulta_disco.php" class="subcribe_form center-content" method="post" >
          <input type="text" name="Disco" placeholder="Disco">
          <input type="submit" value="buscar">
        </form>
      </div>
      <div class="download_heading_text center-content">
        <p>Bandas Involucradas en un Disco</p>
        <form action="disco_bandas_involucradas_e2.php" class="subcribe_form center-content" method="post" >
          <input type="text" name="disco" placeholder="Disco">
          <input type="submit" value="buscar">
        </form>
      </div>
    </div>
  </div>
</section>

<section id="noticias">
  <div class="container">
    <div class="row">
      <h1>Puedes encontrar las noticias las bandas que más te gustan!</h1>
      <p>Ingresa la etiqueta de la noticia que buscas:</p>
        <p>Debes anotar el formato de fechas de la siguiente forma: 'YYYY-MM-DD'</p>
        <p>Además la fecha de término debe ser mayor que la de inicio</p>
      <div class="pricing_heading_text center-content">
        <form action="consulta_concierto_banda.php" class="subcribe_form center-content" method="post">
          <input type="text" name="Etiqueta" placeholder="Etiqueta Noticia">
          <input type="text" name="Fecha1" placeholder="Fecha Inicio">
          <input type="text" name="Fecha2" placeholder="Fecha Término">
          <input type="submit" value="buscar">
        </form>
      </div>
    </div>
  </div>
</section>

<section id="mgs">
  <div class="container">
    <div class="row">
      <h1>Mensajes</h1>
      <div class="download_heading_text center-content">
        <p>Ingresa el id de un usuario para saber sus mensajes e información:</p>
        <form action="uid.php" class="subcribe_form center-content" method="post" >
          <input type="text" name="uid" placeholder="ID Usuario">
          <input type="submit" value="buscar">
        </form>
      </div>
      <div class="download_heading_text center-content">
        <p>Ingresa el id de un mensaje para saber toda su información:</p>
        <form action="mid.php" class="subcribe_form center-content" method="post" >
          <input type="text" name="mid" placeholder="ID Mensaje">
          <input type="submit" value="buscar">
        </form>
      </div>
      <div class="download_heading_text center-content">
        <p>Ingresa el nombre de usuario que quieres ver todos los mensajes:</p>
        <form action="nombre_usuario.php" class="subcribe_form center-content" method="post" >
          <input type="text" name="nombre_usuario" placeholder="Usuario">
          <input type="submit" value="buscar">
        </form>
      </div>
      <div class="download_heading_text center-content">
        <p>Mensajes compartidos entre 2 usuarios:</p>
        <form action="uid1_uid2.php" class="subcribe_form center-content" method="post" >
          <input type="text" name="uid1" placeholder="Usuario 1">
          <input type="text" name="uid2" placeholder="Usuario 2">
          <input type="submit" value="buscar">
        </form>
      </div>
      <div class="download_heading_text center-content">
        <p>Busca los mensajes que contengan:</p>
        <form action="consulta_mgs_condiciones.php" class="subcribe_form center-content" method="post" >
          <input type="text" name="must" placeholder="Palabra o Frase Obligatoria">
          <input type="text" name="may" placeholder="Palabra o Frase">
          <input type="text" name="not" placeholder="Palabra o Frase Prohibida">
          <input type="submit" value="buscar">
        </form>
      </div>
      <div class="pricing_heading_text center-content">
        <p>Quieres saber por dónde pasaron tus artistas?</p>
        <p>Debes anotar el formato de fechas de la siguiente forma: 'YYYY-MM-DD'</p>
        <p>Además la fecha de término debe ser mayor que la de inicio</p>
        <form action="usuario_fecha_inicio_fecha_termino.php" class="subcribe_form center-content" method="post">
          <input type="text" name="artista" placeholder="Artista">
          <input type="text" name="fecha_inicio" placeholder="Fecha Inicio">
          <input type="text" name="fecha_termino" placeholder="Fecha Término">
          <input type="submit" value="buscar">
        </form>
      </div>
    </div>
  </div>
</section>

<?php
include('footer.php');
 ?>
