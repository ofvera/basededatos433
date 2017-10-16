<!DOCTYPE html>

<?php
include('head.php');
 ?>

<!-- aca va la consulta -->
<?php 
	require('conexion.php');

	$genero = $_POST['Genero']

	$query_genero_33 = 'SELECT genero FROM pertenece WHERE genero = '$genero';';

	$query_ranking_disco = "SELECT D.nombre FROM (SELECT QD.did, CASE WHEN QR.fav IS NULL THEN 0 ELSE QR.fav END 
												  FROM (SELECT B.bid, D.did 
												  	    FROM banda B, disco D, publicado P, pertenece Pe 
												  	    WHERE D.did = P.did AND P.bid = B.bid AND D.did = Pe.did AND Pe.genero = '$genero') QD 
												  	NATURAL LEFT OUTER JOIN 
												  		(SELECT bid, COUNT(Bid) AS fav 
												  	  	FROM favoritos GROUP BY bid) QR) A, 
												  disco D 
                                                  WHERE A.did = D.did ORDER BY A.fav DESC;";
    $result = $db4 -> prepare($query_genero_33);
	$result -> execute();
	$query_genero = $result -> fetch();                                            

   	if (empty($query_genero)){
   		echo "No hay discos para el genero ingresado";
   	}
   	else {
   		echo $genero;
   		echo "Discos";
   		$result = $db4 -> prepare($query_ranking_disco);
		$result -> execute();
		$query_ranking = $result -> fetchAll();
		foreach ($query_ranking as $r){
		 	echo $r[0];
		}
   	}
?>     