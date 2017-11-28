<!DOCTYPE html>

<?php
include('head.php');
 ?>
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
            <p class="bannerDescription">
<?php
    require("conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db

    $nombre = $_POST["nombre"];  # nombre de la banda/artista

    # consulta a las bd 33
    $query33 = "SELECT b.bid as id_banda, null as id_integrante_actual, p.aid as id_integrante_pasado, correo, disco
                FROM bandas b, participado p, artista a, contactos, publicado pu, disco d
                WHERE b.bid = p.bid AND p.aid = a.aid AND a.aid = contactos.aid AND
                pu.bid = b.bid AND pu.did = d.did AND b.nombre = '$nombre'
                UNION
                SELECT b.bid as id_banda, p.aid as id_integrante_actual, null as id_integrante_pasado, correo, disco
                FROM bandas b, participado p, artista a, contactos, publicado pu, disco d
                WHERE b.bid = p.bid AND p.aid = a.aid AND a.aid = contactos.aid AND
                pu.bid = b.bid AND pu.did = d.did AND b.nombre = '$nombre';";
    $result33 = $db33 -> prepare($query33);
    $result33 -> execute();
    $row33 = $result33 -> fetch();
    # consulta la bd 4
    $query4 = "SELECT b.id_b as id_banda, n.titulo as noticia, c.nombre as concierto
               FROM banda b, banda_involucrada bo, noticia n, banda_invitada bi, concierto c
               WHERE b.id_b = bo.id_b AND bo.id_n = n.id_n AND bi.id_b = b.id_b AND bi.id_c = c.id_c AND b.nombre = '$nombre'
               UNION
               SELECT b.id_b as id_banda, n.titulo as noticia, c.nombre as concierto
               FROM banda b, banda_involucrada bo, noticia n, concierto_banda cb, concierto c
               WHERE b.id_b = bo.id_b AND bo.id_n = n.id_n AND cb.id_b = b.id_b AND cb.id_c = c.id_c AND b.nombre = '$nombre';";
    $data = array();
    while ($row33) {
        $result4 = $db4 -> prepare($query4);
        $result4 -> execute();
        $row4 = $result4 -> fetch();
        while ($row4) {
            if ($row4[0] == $row33[0]) {
                array_push ($data, array(
                    "id_banda" => $row33[0],
                    "integrante_actual" => $row33[1],
                    "integrante_pasado" => $row33[2],
                    "correo" => $row33[3],
                    "disco" => $row33[4],
                    "noticia" => $row4[1],
                    "concierto" => $row4[2]
                ));
            $row4 = $result4 -> fetch();
            }
        $row33 = $result33 -> fetch();
        }
    }
?>

<?php
    echo "<h2>$nombre</h2>"
?>

<table>

<?php
    echo "<h3>Integrantes actuales</h3>
    <table>
    <tr> <td>Nombre</td> <td>Correo</td> </tr>";
    foreach ($data as $p) {
        if ($p[integrante_actual] <> '') {
            echo "<tr>
            <td>$p[integrante_actual]</td>
            <td>$p[correo]</td>
            </tr>";
        }
    }
    echo "</table>
    <h3>Integrantes anteriores</h3>
    <table>
    <tr> <td>Nombre</td> <td>Correo</td> </tr>";
    foreach ($data as $p) {
        if ($p[integrante_pasado] <> '') {
            echo "<tr>
            <td>$p[integrante_pasado]</td>
            <td>$p[correo]</td>
            </tr>";
        }
    }
    echo "</table>";
    echo "<table>
    <h3>Discos</h3>
    <table>
    <tr> <td>Nombre</td> </tr>";
    foreach ($data as $p) {
        if ($p[disco] <> '') {
            echo "<tr>
            <td>$p[disco]</td>
            </tr>";
        }
    }
    echo "</table>";
    echo "<table>
    <h3>Noticias</h3>
    <table>
    <tr> <td>Titulos</td> </tr>";
    foreach ($data as $p) {
        if ($p[noticia] <> '') {
            echo "<tr>
            <td>$p[disco]</td>
            </tr>";
        }
    }
    echo "</table>";
    echo "<table>
    <h3>Conciertos</h3>
    <table>
    <tr> <td>Nombre</td> </tr>";
    foreach ($data as $p) {
        if ($p[concierto] <> '') {
            echo "<tr>
            <td>$p[disco]</td>
            </tr>";
        }
    }
    echo "</table>";
?>
            </p>
            <div class="button">
              <a href="usuario.php" class="btn">Volver</a>
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
 


<?php
include('footer.php');
?>
