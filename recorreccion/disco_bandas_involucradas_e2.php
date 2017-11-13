<!DOCTYPE html>

<?php
include('head.php');
 ?>

<!-- aca va la consulta -->
<?php 
	require('conexion.php');

	$disco = $_POST['disco'];

	//consulta bd 33

	//canciones del disco
    $id_canciones= "SELECT c.cid AS id_cancion
                		   FROM disco d, cancion c, posee p
                           WHERE d.nombre = '$disco' AND p.did = d.did AND p.cid = c.cid;";
    //id banda
    $id_banda_33 = "SELECT b.bid, b.nombre
    				FROM banda b, disco d, publicado p 
    				WHERE d.nombre = '$disco' AND d.did = p.did AND p.bid = b.bid;";


// hago las consultas
$result = $db33 -> prepare($id_banda_33);
$result -> execute();
$query_id_banda = $result -> fetch();


//busca si existe el disco o no
if (empty($query_id_banda)) {
	echo "Disco $disco no encontrado";
}

else {
	echo "Disco $disco";
	echo "<br>";
	echo "<br>";
	$id_banda = $query_id_banda[0];
	$nombre_banda = $query_id_banda[1];
	$query_integrantes_33 = "SELECT DISTINCT a.nombre AS nombre_artista
                			 FROM disco d, artista a, banda b, participado pa
                			 WHERE pa.bid = '$id_banda' AND a.aid = pa.aid AND pa.fecha_termino IS NULL;";
    $result = $db33 -> prepare($query_integrantes_33);
	$result -> execute();
	$query_integrantes = $result -> fetchAll();
	if ((count($query_integrantes) == 1) && ($query_integrantes[0][0] == $nombre_banda)) {
		echo "Pertenece al artista $nombre_banda";
	}
	else {
		echo "Pertenece a la banda $nombre_banda";
    	echo "<br>";
    	echo "<br>";
		echo "Integrantes";
		echo "<br>";
		foreach ($query_integrantes as $i) {
		echo "- $i[0]";
		echo "<br>";
		}
	}

	$query_bandas_involucradas = "SELECT DISTINCT b.nombre, b.bid
								  FROM banda b, colabora c, posee p, disco d
								  WHERE b.bid = c.bid AND c.cid = p.cid AND p.did = d.did AND d.nombre = '$disco';";
	$result = $db33 -> prepare($query_bandas_involucradas);
	$result -> execute();
	$bandas_involucradas = $result -> fetchAll();
	echo "<br>";
	if (count($bandas_involucradas) != 1){
		echo "Bandas Involucradas:";
		foreach($bandas_involucradas as $bi){
			$nombre_banda_involucrada = $bi[0];
			$id_banda_involucrada = $bi[1];
			$query_integrantes_inv = "SELECT DISTINCT a.nombre AS nombre_artista
                			 	FROM disco d, artista a, banda b, participado pa
                			 	WHERE pa.bid = '$id_banda_involucrada' AND a.aid = pa.aid AND pa.fecha_termino IS NULL;";
            $result = $db33 -> prepare($query_integrantes_inv);
			$result -> execute();
			$query_integrantes_inv = $result -> fetchAll();
			if ((count($query_integrantes) == 1) && ($query_integrantes[0][0] == $nombre_banda)) {
				echo "<br>";
				echo "<br>";
				echo "- $nombre_banda_involucrada";
				}
			else {
				echo "<br>";
				echo "<br>";
				echo "- $nombre_banda";
    			echo "<br>";
				echo "   Integrantes:";
				echo "<br>";
				foreach ($query_integrantes_inv as $inv) {
					echo "   - $inv[0]";
					echo "<br>";
					}
			}
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
