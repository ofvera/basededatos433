<!DOCTYPE html>

<?php
include('head.php');
 ?>

<!-- aca va la consulta -->
<?php 
	//cambiar url
	require('conexion.php');
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<br>";

	$uid1 = $_POST['uid1'];
	$uid2 = $_POST['uid2'];
	if ((!empty($_POST['uid1'])) && (!empty($_POST['uid2']))){
		if (!is_numeric($uid1)){
			$nombre_1 = ucwords($uid1);
			$uid1 = str_replace(' ', '%20', $nombre_1);
			$url = "http://bd11.ing.puc.cl/finduid/".$uid1; //cambiar
			$info = json_decode(file_get_contents($url), true);
			$datos1 = $info[1];
			if(!empty($datos1)){
				$uid1 = $datos1[0]["id"];
			}
		}
		if (!is_numeric($uid2)){
			$nombre_2 = ucwords($uid2);
			$uid22 = str_replace(' ', '%20', $nombre_2);
			$url = "http://bd11.ing.puc.cl/finduid/".$uid22; //cambiar
			$info = json_decode(file_get_contents($url), true);
			$datos2 = $info[1];
			if(!empty($datos2)){
				$uid2 = $datos2[0]["id"];
			}
		}
		if ((is_numeric($uid1)) && (is_numeric($uid2))){
			$url = file_get_contents("http://bd11.ing.puc.cl/users/".$uid1.'-'.$uid2);
			$info = json_decode($url, true);
			$datos = $info[1];

			if (!empty($datos)){
				echo "Mensajes intercambiados por ".$uid1." y ".$uid2.":";
				foreach($datos as $m){
					echo "<br>";
					echo "<br>";
					echo '- Fecha: '.$m["date"];
					echo "<br>";
					echo "      Emisor: ".$m['sender'];
					echo "<br>";
					echo '      Receptor: '.$m['receptant'];
					echo "<br>";
					echo '     Mensaje: '.$m['message'];
					echo "<br>";
					echo '     Latitud: '.$m['lat'];
					echo "<br>";
					echo '     Longitud: '.$m['long'];
					}
					
				}
			else {
				echo "No hay mensajes intercambiados por ".$uid1." y ".$uid2;
			}
		}
		elseif (!is_numeric($uid1)){
			echo "El usuario $nombre_1 no existe";
		}
		elseif (!is_numeric($uid2)){
			echo "El usuario $nombre_2 no existe";
		}

	}
	else{
		echo "Se deben rellenar ambos campos";
	}
echo "<br>";
echo "<br>";
echo "<br>";

?>

<form action="usuario.php" method="post">
    <input type="submit" value="Volver">
</form>

<?php
include('footer.php');
?>