<!DOCTYPE html>

<?php
include('head.php');
 ?>

<!-- aca va la consulta -->
<?php 
	//cambiar url
	require('conexion.php');

	$uid1 = $_POST['uid1'];
	$uid2 = $_POST['uid2'];
	if ((!empty($_POST['uid1'])) && (!empty($_POST['uid2']))){
		$url = file_get_contents("http://bd11.ing.puc.cl/users/".$uid1.'-'.$uid2);
		$info = json_decode($url, true);
		$datos = $info[1];

		if (!empty($datos)){
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<br>";
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
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "No hay mensajes intercambiados por ".$uid1." y ".$uid2;
		}

	}
	else{
		echo "<br>";
		echo "<br>";
		echo "<br>";
		echo "<br>";
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