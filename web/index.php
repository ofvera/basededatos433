<!DOCTYPE html>
<?php
include('head.php');
 ?>

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
        <h1>Bienvenidos a InfoBandas!! </h1>
        <p class="bannerDescription">La plataforma confiable que te informará de todos los acontecimientos importantes en el mundo de la música</p>
        <div class="button">
          <a href="#works_2" class="btn">Registrarse</a>
          <a href="#works_3" class="btn white-btn youtube-media"><i class="fa fa-play"></i> Iniciar Sesión</a>
        </div>
      </div>
                </div>
            </div> <!-- end of row -->
        </div> <!-- end of container -->
        <div class="scrolldown">
            <a href="#works_2" class="scroll_btn"></a>
        </div>
    </div>
</section>

<section id="works_2">
  <div class="subcribe_overlay">
    <div class="container">
      <div class="row">
        <div class="subscribe_heading_text center-content">
          <div class="subscribe_heading_title wow fadeIn" data-wow-duration="1s">
  <h1>Regístrate Ahora!</h1>
  <p>Así podrás acceder a todos los beneficios que trae InfoBandas</p>
          </div>

          <form action="consulta_registro.php" class="subcribe_form center-content" method="post">
            <input type="text" name="nombre" placeholder="Nombre">
            <p></p>
            <input type="text" name="edad" placeholder="Edad">
            <p></p>
            <input type="text" name="mail" placeholder="Email">
            <p></p>
            <input type="text" name="usuario" placeholder="Nombre Usuario">
            <p></p>
            <input type="text" name="clave" placeholder="Contraseña">
            <p></p>
            <input type="submit" text="Registrar"></i></input>
          </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="works_3">
  <div class="subcribe_overlay">
    <div class="container">
      <div class="row">
        <div class="subscribe_heading_text center-content">
          <div class="subscribe_heading_title wow fadeIn" data-wow-duration="1s">
  <h1>Iniciar Sesión</h1>
          </div>

          <form action="consulta_login.php" class="subcribe_form center-content" method="post">
            <input type="text" name="usuario" placeholder="Nombre Usuario">
            <input type="text" name="clave" placeholder="Contraseña">
            <input type="submit" text="Entrar"></i></input>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<?php
include('footer.php');
 ?>
