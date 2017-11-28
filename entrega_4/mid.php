<!DOCTYPE html>

<?php
include('head.php');
 ?>

<!-- aca va la consulta -->
<?php 
	//CASO EN QUE ID NO EXISTA
	require('conexion.php');

	$mid = $_POST['mid'];
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<br>";
	$mid2 = str_replace(' ', '%20', $mid);

	if (!empty($mid)) {
		$url = "http://bd11.ing.puc.cl/messages/".$mid2;
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
			echo "Id Emisor: ".$datos['sender'];
			echo "<br>";
			echo "<br>";
			echo 'Id Receptor: '.$datos['receptant'];
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

<form action="usuario.php" method="post">
    <input type="submit" value="Volver">
</form>

<?php
include('footer.php');
?>