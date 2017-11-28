<!DOCTYPE html>

<?php
include('head.php');
 ?>

<!-- aca va la consulta -->
<?php 
	require('conexion.php');

	$genero = $_POST['Genero'];
	$genero = ucwords($genero);

	$query_genero_33 = "SELECT genero FROM pertenece WHERE genero = '$genero';";

	$query_ranking_disco = "SELECT D.nombre, A.fav FROM (SELECT QD.did, CASE WHEN QR.fav IS NULL THEN 0 ELSE QR.fav END 
												  FROM (SELECT B.bid, D.did 
												  	    FROM banda B, disco D, publicado P, pertenece Pe 
												  	    WHERE D.did = P.did AND P.bid = B.bid AND D.did = Pe.did AND Pe.genero = '$genero') QD 
												  	NATURAL LEFT OUTER JOIN 
												  		(SELECT bid, COUNT(bid) AS fav 
												  	  	FROM favoritos GROUP BY bid) QR) A, 
												  disco D 
                                                  WHERE A.did = D.did ORDER BY A.fav DESC;";
    $result = $db33 -> prepare($query_genero_33);
	$result -> execute();
	$query_genero = $result -> fetch();
	
    echo "<h2>$genero</h2>";
   	if (empty($query_genero)){
   		echo "No hay discos para el genero ingresado";
   	}
   	else {
   		echo "<table><tr> <th>'Disco'</th> <th>'Seguidores'</th></tr>";
   		$result = $db33 -> prepare($query_ranking_disco);
		$result -> execute();
		$query_ranking = $result -> fetchAll();
		foreach ($query_ranking as $r){
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