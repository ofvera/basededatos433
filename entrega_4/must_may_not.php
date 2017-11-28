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
	$frase = false;
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<br>";


	if ((empty($not)) && (empty($may)) && (!empty($must))){
		$frase = "Mensajes que contienen $must";
		$frase_not = "No se encontraron mensajes que contiengan $must";
		}
	elseif ((empty($not)) && (!empty($may)) && (empty($must))){
		$frase = "Mensajes que pueden contener $may";
		$frase_not = "No se encontraron mensajes que puedan contener $may";
	}
	elseif ((!empty($not)) && (empty($may)) && (empty($must))){
		$frase = "mensajes que no contienen $not";
		$frase_not = "No se encontraron mensajes que no contengan $not";
	}
	elseif ((empty($not)) && (!empty($may)) && (!empty($must))){
		$frase = "Mensajes que pueden contener $may y contienen $must";
		$frase_not = "No se encontraron mensajes que puedan contener $may y contengan $must";
	}
	elseif ((!empty($not)) && (!empty($may)) && (!empty($must))){
		$frase =  "Mensajes que contienen ".$must.", pueden contener ".$may." y no contienen ".$not;
		$frase_not =  "No se encontraron mensajes que contengan ".$must.", puedan contener ".$may." y no contienen ".$not;

	}
	elseif ((!empty($not)) && (empty($may)) && (!empty($must))){
		$frase = "Mensajes que no contienen $not y contienen $must";
		$frase_not = "No se encontraron mensajes que no contengan $not y contengan $must";
	}
	elseif ((!empty($not)) && (!empty($may)) && (empty($must))){
		$frase = "Mensajes que no contienen $not y pueden contener $may";
		$frase_not = "No se encontraron mensajes que no contengan $not y puedan contener $may";
	}


	if ((!empty($may))  || (!empty($not))  || (!empty($must))){
		if (empty($not)){
			$not = "!433!";
		}
		if (empty($may)){
			$may = "!433!";
		}
		if (empty($must)){
			$must = "!433!";
		}

		$must2 = str_replace(' ', '%20', $must);
		$may2 = str_replace(' ', '%20', $may);
		$not2 = str_replace(' ', '%20', $not);

		$url = "http://bd11.ing.puc.cl/textsearch/".$must2.'/'.$may2."/".$not2;
		$info = json_decode(file_get_contents($url), true);
		$datos = $info[1];
		//mensajes que contengan
		if (!empty($datos)){

			//info mensajes
			echo $frase;

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
			echo $frase_not;
		}
	}

	else {
		echo "<br>";
		echo "<br>";
		echo "<br>";
		echo "<br>";
		echo 'Debe ingresar datos al menos un campo';
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