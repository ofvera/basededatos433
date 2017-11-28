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
	//CASO EN QUE ID NO EXISTA
	require('conexion.php');

	$mid = $_POST['mid'];
	$mid = str_replace(' ', '%20', $mid);
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<br>";

	if (!empty($mid)) {
		$url = "http://bd11.ing.puc.cl/messages/".$mid;
		$info = json_decode(file_get_contents($url), true);
		$datos = $info[1];
		if (!empty($datos)){
			$datos = $datos[0];
			echo 'Id Mensaje: '.$mid;
			echo "<br>";
			echo "<br>";
			echo 'Fecha: '.$datos["date"];
			echo "<br>";
			echo "<br>";
			echo "Emisor: ".$datos['sender'];
			echo "<br>";
			echo "<br>";
			echo 'Receptor: '.$datos['receptant'];
			echo "<br>";
			echo "<br>";
			echo 'Mensaje: '.$datos['message'];
			echo "<br>";
			echo "<br>";
			echo 'Latitud: '.$datos['lat'];
			echo "<br>";
			echo "<br>";
			echo 'Longitud: '.$datos['long'];
		}
		else{
			echo "No hay un mensaje con id $mid";
		}
	}
	else{
		echo "Debe ingresar un id de mensaje";
	}
echo "<br>";
echo "<br>";
echo "<br>";

?>

			</p>
         	<div class="button">
			  <a href="usuario.php" class="btn">Volver</a>
			</div>
          </div>
        </div>
      </div> <!-- end of row -->
    </div> <!-- end of container -->
  </div>
</section>


<?php
include('footer.php');
?>