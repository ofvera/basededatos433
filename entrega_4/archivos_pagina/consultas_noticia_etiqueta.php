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
<!-- aca va la consulta -->
<?php 
    require('conexion.php');
    $fecha_1 = $_POST['Fecha1'];
    $fecha_2 = $_POST['Fecha2'];
    $etiqueta = $_POST["Etiqueta"];

    $query_noticias_etiqueta = "SELECT n.titulo, n.fecha, n.contenido FROM (SELECT n.id_n FROM noticia n WHERE n.fecha >= '$fecha_1' AND n.fecha <= '$fecha_2') QN, tiene t, etiqueta e, noticia n WHERE e.nombre = '$etiqueta' AND e.id_e = t.id_e AND QN.id_n = t.id_n AND n.id_n = QN.id_n;";


    $result4 = $db4 -> prepare($query_noticias_etiqueta);
    $result4 -> execute();
    $row4 = $result4 -> fetchAll();


    if ($fecha_1 >=  $fecha_2){
        echo "Fechas mal ingresadas";
    }
    elseif (count($row4) == 0) {
        echo "No se encontraron noticias";
    }
    else {
        foreach ($row4 as $r){
            echo "Titulo: ".$r[0];
            echo "Fecha: ".$r[1];
            echo "Contenido: ".$r[2];
        }

    }
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