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
	//CASO EN QUE ID NO EXISTA
	require('conexion.php');

	echo "<br>";
	echo "<br>";
	$must = $_POST['must'];
	$may = $_POST['may'];
	$not = $_POST['not'];

	if (empty($must)) {
		$must = '!433!';
		}

	if (empty($may)) {
		$may = '!433!';
		}

	if (empty($not)) {
		$not = '!433!';
		}

	$must = str_replace(' ', '%20', $must);
	$may = str_replace(' ', '%20', $may);
	$not = str_replace(' ', '%20', $not);

	$url = "http://bd11.ing.puc.cl/textsearch/".$must."/".$may."/".$not;
	$info = json_decode(file_get_contents($url), true);
	$datos = $info[1];

	if (!empty($datos)){
		echo "Mensajes que cumplen con el filtro deseado, en orden de relevancia:";
		$numero = 0;
		foreach($datos as $m){
			$numero = $numero + 1;
			echo "<br>";
			echo "<br>";
			echo '- '.$numero.'.';
			echo "<br>";
			echo '		Fecha: '.$m["date"];
			echo "<br>";
			echo "      Emisor: ".$m['sender'];
			echo "<br>";
			echo '      Receptor: '.$m['receptant'];
			echo "<br>";
			echo '     Mensaje: '.$m['message'];
			}
			
		}
	
	else{
		echo "No se encontraron mensajes que cumplan con los filtros";
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