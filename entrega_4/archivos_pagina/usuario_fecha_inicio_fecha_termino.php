<!DOCTYPE html>

<?php
include('head.php');
 ?>

<!-- aca va la consulta -->
<?php 
	require('conexion.php');
	function validateDate($date, $format = 'Y-m-d')
	{
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
	}
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<br>";
	$artista = $_POST['artista'];
	$fecha_inicio = $_POST['fecha_inicio'];
	$fecha_termino = $_POST['fecha_termino'];
	$datos_finales = false;

	// ve si se rellenaron los 3 campos
	if ((!empty($artista)) && (!empty($fecha_inicio)) && (!empty($fecha_termino))){
		// ve si las fechas son validas
		if (validateDate($fecha_inicio) && validateDate($fecha_termino)){
			if ($fecha_termino > $fecha_inicio){
				//ve si se ingreso id 
				if (is_numeric($artista)){
					$url = "http://bd11.ing.puc.cl/user/".$artista;
					$info = json_decode(file_get_contents($url), true);
					$datos = $info[1];
					//ve si existe el id
					if (!empty($datos)){
						$id = $artista;
						$nombre = $datos[0]["name"];
						$url = "http://bd11.ing.puc.cl/filterdates/".$fecha_inicio."/".$fecha_termino."/".$artista;
						$datos_finales = json_decode(file_get_contents($url), true);
					}
					else{
						echo "No existe un usuario con id $artista";
					}
				}
				// se ingreso nombre del artista
				else{
					$nombre = ucwords($artista);
					$artista2 = str_replace(' ', '%20', $nombre);
					$url = "http://bd11.ing.puc.cl/finduid/".$artista2;
					$info = json_decode(file_get_contents($url), true);	
					$datos = $info[1];
					//existe el usuario ingresado
					if (!empty($datos)){
						$id = $datos[0]["id"];
						$url = "http://bd11.ing.puc.cl/user/".$id;
						$info = json_decode(file_get_contents($url), true);
						$datos = $info[1];
						//ve si existe el id
						if (!empty($datos)){
							$url = "http://bd11.ing.puc.cl/filterdates/".$fecha_inicio."/".$fecha_termino."/".$id;
							$datos_finales = json_decode(file_get_contents($url), true);
						}
						else{
							echo "No existe un usuario con nombre $artista";
						}
					}
					else{
						echo "No existe un usuario con nombre $artista";
					}
				}
				if ($datos_finales){
					$datos_finales = $datos_finales[1];
          foreach($datos_finales as $m){
            $lat = $m['lat'];
            $long = $m['long'];
          }
					if (!empty($datos_finales)){
						echo "Lugares donde $nombre se encontraba entre $fecha_inicio y $fecha_termino :";
						echo "<br>";
						echo "<br>";
						foreach($datos_finales as $m){
							echo "<br>";
						//	echo '- Fecha: '.$m["date"];
						//	echo "<br>";
						//	echo '  Id Receptos: '.$m['receptant'];
						//	echo "<br>";
						//	echo '  Latitud: '.$m['lat'];
						//	echo "<br>";
						//	echo '  Longitud: '.$m['long'];
						//	echo "<br>";
						//	echo '  Mensaje: '.$m['message'];
						}
            
					}
					else{
						echo" No hay mensajes emitidos por $nombre con id $id entre $fecha_inicio y $fecha_termino";
					}

				}		
			}
			else{
				echo "La fecha de termino debe ser mayor a la fecha de inicio";
			}
		}
		else{
			echo "Debe ingresar fechas en fromato 'YYYY-mm-dd'";
		}

	}
	else{
		echo "Debe rellenar los tres campos";
	}
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
?>


<div id='mapid'></div>
<script src='https://unpkg.com/leaflet@1.2.0/dist/leaflet.js' integrity='sha512-lInM/apFSqyy1o6s89K4iQUKg6ppXEgsVxT35HbzUupEVRh2Eu9Wdl4tHj7dZO0s1uvplcYGmt3498TtHq+log==' crossorigin=''></script>
<script type="text/javascript">
  var mymap = L.map('mapid').setView([51.505, -0.09], 13);
  L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpandmbXliNDBjZWd2M2x6bDk3c2ZtOTkifQ._QA7i5Mpkd_m30IGElHziw', {
      maxZoom: 18,
      attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
          '<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
          'Imagery © <a href="http://mapbox.com">Mapbox</a>',
      id: 'mapbox.streets'
  }).addTo(mymap);
  L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(mymap);
</script>
<br>


<form action="usuario.php" method="post">
    <input type="submit" value="Volver">
</form>
<br>
<br>
<br>
<br>
<br>
<br>

<?php
include('footer.php');
?>