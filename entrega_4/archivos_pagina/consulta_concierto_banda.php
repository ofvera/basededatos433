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
	$fecha_inicio = $_POST['fecha_inicio'];
	$fecha_termino = $_POST['fecha_termino'];

	if is_null($fecha_inicio) or is_null($fecha_termino){

		echo "Debes ingresar ambas fechas para realizar la consulta"

	}

	else {
		if is_null($banda){
			$querry = "SELECT C.nombre, C.fecha FROM concierto C WHERE C.fecha > '$fecha_inicio' AND C.fecha < '$fecha_termino';";
		}

		else {
			$querry = "SELECT C.nombre C.fecha FROM banda B, banda_invitada BI, concierto C WHERE B.nombre = '$banda' AND B.id_b = BI.id_b AND BI.id_c = C.id_c AND C.fecha > '$fecha_inicio' AND C.fecha < '$fecha_termino'
				UNION
				SELECT C.nombre, C.fecha FROM banda B, concierto_banda CB, concierto C WHERE B.nombre = '$banda' AND B.id_b = CB.id_b AND CB.id_c = C.id_c AND C.fecha > '$fecha_inicio' AND C.fecha < '$fecha_termino';"

			## no estoy seguro de esto ##

			$result = $db4 -> prepare($querry);
			$result -> execute();
			$dataCollected = $result -> fetch();

			if (empty($dataCollected)){
				echo "No hay conciertos en esas fechas"
			}
			else {
				echo "<h3>Conciertos</h3>
   				<table>
    			<tr> <td>Nombre</td> <td>Fecha</td> </tr>";
    			foreach ($dataCollected as $p) {
        	   		echo "<tr>
            		<td>$p[0]</td>
            		<td>$p[1]</td>
            		</tr>";

    			}
			}

			## hasta aca ##
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
