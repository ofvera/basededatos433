<!DOCTYPE html>

<?php
include('head.php');
 ?>

<!-- aca va la consulta -->
<?php 
	require('conexion.php');

	$artista = $_POST['artista'];

	//consulta bd 33
	//busca al artista en la bd
	$query_artista = "SELECT a.aid
					  FROM artista a
					  WHERE a.nombre = '$artista';";

	//bandas a las que actualmente pertenece
	$query_bandas_actuales = "SELECT b.nombre
							  FROM artista a, banda b, participado p 
							  WHERE a.nombre = '$artista' AND a.aid = p.aid AND p.fecha_termino IS NULL AND p.bid = b.bid;";


	//bandas a las que perteneció
    $query_bandas_antiguas = "SELECT b.nombre
							  FROM artista a, banda b, participado p 
							  WHERE a.nombre = '$artista' AND a.aid = p.aid AND p.fecha_termino IS NOT NULL AND p.bid = b.bid;";


// hago las consultas
$result = $db33 -> prepare($query_artista);
$result -> execute();
$id_artista = $result -> fetch();


//busca si el artista esta en la base de datos
if (empty($id_artista)) {
	echo "Artista $artista no encontrado" ;
}

else {
	echo $artista;
	echo "<br>";
	echo "<br>";

	//bandas a las que pertenece
	$result = $db33 -> prepare($query_bandas_actuales);
	$result -> execute();
	$bandas_actuales = $result -> fetchAll();
	if (empty($bandas_actuales)) {
		echo "No pertenece a ninguna banda actuamente";
		echo "<br>";
	}
	else { 
		echo "Bandas a las que pertenece actualmente: ";
		echo "<br>";
		foreach ($bandas_actuales as $b) {
			echo "- $b[0]";
			echo "<br>";
		}
	}
	echo "<br>";

	//bandas a las que pertenecio
	$result = $db33 -> prepare($query_bandas_antiguas);
	$result -> execute();
	$bandas_antiguas = $result -> fetchAll();
	if (!empty($bandas_antiguas)) {
		echo "Bandas a las que perteneció: ";
		echo "<br>";
		foreach ($bandas_antiguas as $b) {
		echo "- $b[0]";
		echo "<br>";
	    } 
	}
}

?>

<form action="usuario.php" method="post">
    <input type="submit" value="Volver">
</form>

<?php
include('footer.php');
?>