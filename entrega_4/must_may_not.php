<!DOCTYPE html>

<?php
include('head.php');
 ?>

<!-- aca va la consulta -->
<?php 
	require('conexion.php');

	$must = $_POST['must'];
	$may = $_POST['may'];
	$not = $_POST['not'];
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<br>";


	if ((empty($not)) && (empty($may)) && (!empty($must))){
		$url = 'http://bd11.ing.puc.cl/must-be/'.$must;
		$info = json_decode(file_get_contents($url), true);
		$datos = $info[1];

		if (!empty($datos)){

			//info mensajes
			echo "Mensajes que contiene: ".$must;
			

			foreach($datos as $m){
				echo "<br>";
				echo "<br>";
				echo 'Puntaje de coincidencia del mensaje: '.$m["score"]; //arreglar
				echo "<br>";
				echo 'Fecha: '.$m["date"];
				echo "<br>";
				echo "Id Emisor: ".$m['sender'];
				echo "<br>";
				echo 'Id Receptor: '.$m['receptant'];
				echo "<br>";
				echo 'Mensaje: '.$m['message'];
				echo "<br>";
				echo 'Latitud: '.$m['lat'];
				echo "<br>";
				echo 'Longitud: '.$m['long'];
				}
		}
		else {
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "No se encontraron mensajes que contengan: ".$must;
		}
	}

	elseif ((!empty($may)) && (!empty($not)) && (!empty($must))){
		$url = "http://bd11.ing.puc.cl/textsearch/".$must.'/'.$may."/".$not;
		$info = json_decode(file_get_contents($url), true);
		$datos = $info[1];
		//mensajes que contengan
		if (!empty($datos)){

			//info mensajes
			echo "Mensajes que contienen ".$must.", pueden contener ".$may." y no contienen ".$not;

			foreach($datos as $m){
				echo "<br>";
				echo "<br>";
				echo 'Puntaje de coincidencia del mensaje: '.$m["score"];
				echo "<br>";
				echo 'Fecha: '.$m["date"];
				echo "<br>";
				echo "Id Emisor: ".$m['sender'];
				echo "<br>";
				echo 'Id Receptor: '.$m['receptant'];
				echo "<br>";
				echo 'Mensaje: '.$m['message'];
				echo "<br>";
				echo 'Latitud: '.$m['lat'];
				echo "<br>";
				echo 'Longitud: '.$m['long'];
				}
		}
		else {
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "No se encontraron mensajes que contengan ".$must.", puedan contener ".$may." y no contienen ".$not;
		}
	}

	else {
		echo "<br>";
		echo "<br>";
		echo "<br>";
		echo "<br>";
		echo 'Debe ingresar datos al menos en "palabra o frase obligatoria"';
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