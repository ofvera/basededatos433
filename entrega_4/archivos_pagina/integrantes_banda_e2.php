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

	$banda = $_POST['banda'];

    //id banda
    $id_banda_33 = "SELECT b.bid 
    				FROM banda b
    				WHERE b.nombre = '$banda';";

// hago las consultas
$result = $db33 -> prepare($id_banda_33);
$result -> execute();
$query_id_banda = $result -> fetch();


//busca si existe el disco o no
if (empty($query_id_banda)) {
	echo "Banda $banda no encontrada";
}

else {

	echo "Banda $banda";
	echo "<br>";
	echo "<br>";
	$id_banda = $query_id_banda[0];

	//integrantes
	//id y nombre integrantes banda
    $query_integrantes_33 = "SELECT DISTINCT a.nombre AS nombre_artista, a.aid AS id_artista
                			 FROM disco d, artista a, banda b, participado pa
                			 WHERE pa.bid = '$id_banda' AND a.aid = pa.aid AND pa.fecha_termino IS NULL;";

	$result = $db33 -> prepare($query_integrantes_33);
	$result -> execute();
	$query_integrantes = $result -> fetchAll();
	echo "Integrantes";
	echo "<br>";
	foreach ($query_integrantes as $i) {
		echo "- $i[0]";
		echo "<br>";
	}
	echo "<br>";
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