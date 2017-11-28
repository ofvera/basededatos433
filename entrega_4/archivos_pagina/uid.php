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
	$uid = $_POST['uid'];
	$uid2 = str_replace(' ', '%20', $uid);

	if (!empty($uid)) {
		echo "<br>";
		echo "<br>";
		echo "<br>";
		echo "<br>";
		if (is_numeric($uid2)){
			$url = "http://bd11.ing.puc.cl/user/".$uid2;
			$info = json_decode(file_get_contents($url), true);
			$datos = $info[1];
			if (!empty($datos)){
				$datos = $datos[0];

				$nombre = $datos['name'];
				$edad = $datos['age'];
				$id = $datos['id'];
				$descripcion = $datos['description'];
				echo 'Nombre: '.$nombre;
				echo "<br>";
				echo 'Edad: '.$edad;
				echo "<br>";
				echo "Id: " .$id;
				echo "<br>";
				echo "Descripcion: ". $descripcion;
				echo "<br>";
				echo "<br>";
				echo "<br>";



				echo "Mensajes enviados por $nombre: ";
				foreach($datos['msg'] as $m){
					echo "<br>";
					echo "<br>";
					echo '- receptor: '.$m["receptant"];
					echo "<br>";
					echo '     mensaje: '.$m['message'];
					}
			}
			else{
				echo "No hay un usuario con id $uid";
			}
		}
		else{
			echo "Se debe ingresar un id numerico";
		}

	}
	else {
		echo "<br>";
		echo "<br>";
		echo "<br>";
		echo "<br>";
		echo "Debe ingresar un id de usuario";
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


