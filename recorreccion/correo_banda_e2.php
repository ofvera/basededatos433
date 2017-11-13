<!DOCTYPE html>

<?php
include('head.php');
 ?>

<!-- aca va la consulta -->
<?php 
	require('conexion.php');

	$banda = $_POST['banda'];

	//consulta bd 33

    //id banda
    $id_banda_33 = "SELECT b.bid 
    				FROM banda b, disco d, publicado p 
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
	$id_banda = $query_id_banda[0];

	//integrantes
	//id y nombre integrantes banda
    $query_integrantes_33 = "SELECT DISTINCT a.nombre AS nombre_artista, c.correo AS correo_artista
                			 FROM disco d, artista a, banda b, participado pa, contacto c
                			 WHERE pa.bid = '$id_banda' AND a.aid = pa.aid AND c.aid = a.aid AND pa.fecha_termino IS NULL;";

	$result = $db33 -> prepare($query_integrantes_33);
	$result -> execute();
	$query_integrantes = $result -> fetchAll();
   	echo "<table><tr> <th>Integrante</th> <th>Correo</th></tr>";
	foreach ($query_integrantes as $r){
		echo "<tr> <th>$r[0]</th> <th>$r[1]</th> </tr>";
		}
		echo "</table>";
}

?>

<form action="usuario.php" method="post">
    <input type="submit" value="Volver">
</form>

<?php
include('footer.php');
?>

