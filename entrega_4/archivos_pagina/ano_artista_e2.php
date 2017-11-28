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

	$ano = $_POST['ano'];
	$anomin = $ano."-01-01";
	$anomax = $ano."-12-31";
	

    $max_artista = "SELECT nd.nombre_artista, nd.cant_discos
                           FROM (SELECT a.nombre AS nombre_artista, COUNT(d.did) AS cant_discos
                		         FROM disco d, publicado p, artista a, banda b, participado par
                                 WHERE d.did = p.did AND b.bid = p.bid AND par.bid = b.bid AND par.fecha_termino IS NULL AND par.aid = a.aid AND d.fecha_publicacion >= '$anomin' AND d.fecha_publicacion <= '$anomax'
                                 GROUP BY a.nombre) AS nd
							WHERE nd.cant_discos = MAX(nd.cant_discos);";
    $result = $db33 -> prepare($max_artista);
	$result -> execute();
	$artista = $result -> fetchAll();
	if (empty($artista)){
		echo "No se encontraron discos del año $ano";
		echo "<br>";
		echo "<br>";
	}
	else {
		echo "Artista con mayor cantidad de discos el ano $ano";
		echo "<br>";
		echo "<br>";
		foreach($artista as $a){
			echo "$a[0] con $a[1] discos ";
			echo "<br>";
		}
	echo "<br>";

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