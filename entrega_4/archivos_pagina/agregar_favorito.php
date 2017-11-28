<!DOCTYPE html>

<?php
include('head.php');
 ?>
    </div>
  </div> <!-- end of navbar -->
</header>

<!-- arreglado luego de pequeños cambios de ejecucion -->

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
	session_start();
	require('conexion.php');

	$banda = $_POST['Banda'];
	$usuario = $_SESSION['usr'][0];

	if (empty($banda)) {

		echo "Debes ingresar una banda";

		}

	else {	
		$querry = "SELECT B.bid FROM banda B WHERE B.nombre = '$banda';";
		// mover esto a este lugar
		$result = $db33 -> prepare($querry);
		$result -> execute();
		$bid = $result -> fetch();
		// hasta aca, cambiando la ejecucion a db33

		if (empty($bid)){
			// vemos que bid sea empty no querry
			echo "No existe esa banda";
		
			}
		
		else{
			// VALUES no value
			$insert = "INSERT INTO favoritos VALUES('$usuario', $bid[0]);";
			// cambiar db33 y $insert
			$apply = $db33 -> prepare($insert);
			$apply -> execute();
			echo "La banda fue guardada existosamente!";
		}			
	}	
 ?></p>
 
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
<!-- aca va la consulta -->



<?php
include('footer.php');
 ?>
	