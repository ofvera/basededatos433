<!DOCTYPE html>

<?php
include('head.php');
 ?>

<!-- aca va la consulta -->
<?php 
	require('conexion.php');

	$banda = $_POST['banda'];

    //id banda
    $id_banda_33 = "SELECT b.bid 
    				FROM banda b
    				WHERE b.nombre = '$banda';";

// hago las consultas
$result = $db33 -> prepare($id_banda_33);
$result -> execute();
$query_id_banda = $result -> fetch();


//busca si existe el disco o no
if (empty($query_id_banda)) {
	echo "Banda $banda no encontrada";
}

else {

	echo "Banda $banda";
	echo "<br>";
	echo "<br>";
	$id_banda = $query_id_banda[0];


	//integrantes
	//id y nombre integrantes banda
    $query_integrantes_33 = "SELECT DISTINCT a.nombre AS nombre_artista, a.aid AS id_artista
                			 FROM disco d, artista a, banda b, participado pa
                			 WHERE pa.bid = '$id_banda' AND a.aid = pa.aid AND pa.fecha_termino IS NOT NULL;";

	$result = $db33 -> prepare($query_integrantes_33);
	$result -> execute();
	$query_integrantes = $result -> fetchAll();
	if (empty($query_integrantes)){
		echo "No tiene ex-integrantes";
	}
	else{ 
		echo "Ex-Integrantes";
		echo "<br>";
		foreach ($query_integrantes as $i) {
		echo "- $i[0]";
		echo "<br>";
		}
	}
	echo "<br>";
	echo "<br>";
}

?>

<form action="usuario.php" method="post">
    <input type="submit" value="Volver">
</form>

<?php
include('footer.php');
?>