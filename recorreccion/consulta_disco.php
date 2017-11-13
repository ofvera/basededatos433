<!DOCTYPE html>

<?php
include('head.php');
 ?>

<!-- aca va la consulta -->
<?php 
	require('conexion.php');

	$disco = $_POST['Disco'];

	//consulta bd 33

	//canciones del disco
    $query_canciones_33 = "SELECT c.nombre AS nombre_cancion
                		   FROM disco d, cancion c, posee p
                           WHERE d.nombre = '$disco' AND p.did = d.did AND p.cid = c.cid;";
    //id banda
    $id_banda_33 = "SELECT b.bid 
    				FROM banda b, disco d, publicado p 
    				WHERE d.nombre = '$disco' AND d.did = p.did AND p.bid = b.bid;";

    //fecha disco
    $fecha_disco_33 = "SELECT D.fecha_publicacion 
    				   FROM disco D 
    				   WHERE D.nombre = '$disco';";


// hago las consultas
$result = $db33 -> prepare($id_banda_33);
$result -> execute();
$query_id_banda = $result -> fetch();


//busca si existe el disco o no
if (empty($query_id_banda)) {
	echo "Disco no encontrado";
}

else {
	$id_banda = $query_id_banda[0];

	//canciones
	$result = $db33 -> prepare($query_canciones_33);
	$result -> execute();
	$query_canciones = $result -> fetchAll();
	echo "Canciones";
	echo "<br>";
	foreach ($query_canciones as $c) {
		echo $c[0];
		echo "<br>";
	}
	echo "<br>";
	//integrantes
	//id y nombre integrantes banda
    $query_integrantes_33 = "SELECT DISTINCT a.nombre AS nombre_artista, a.aid AS id_artista
                			 FROM disco d, artista a, banda b, participado pa
                			 WHERE pa.bid = '$id_banda' AND a.aid = pa.aid AND pa.fecha_termino IS NULL;";

	$result = $db33 -> prepare($query_integrantes_33);
	$result -> execute();
	$query_integrantes = $result -> fetchAll();
	echo "Integrantes";
	echo "<br>";
	foreach ($query_integrantes as $i) {
		echo $i[0];
		echo "<br>";
		}

	$result = $db33 -> prepare($fecha_disco_33);
	$result -> execute();
	$fecha_disco_33 = $result -> fetchAll();
	$fecha_disco = $fecha_disco_33[0][0];

	///// cambio bi.bid por bi.id_b y bi.id_C por bi.id_c y se agrego lo siguiente
	$fecha = str_replace("-", "", $fecha_disco);
	$fecha_2 = strval(intval($fecha) + 200);

	//conciertos asociados si no hay discos dsp
	$query_conciertos_sf_4 = "SELECT DISTINCT C.nombre 
							  FROM concierto C, concierto_banda CB, banda_invitada BI 
							  WHERE ((CB.id_b = '$id_banda' AND C.id_c = CB.id_c) OR (BI.id_b = '$id_banda' AND C.id_c = BI.id_c)) AND C.fecha >= '$fecha_disco';";

	//fecha publicacion siguiente disco
    $fecha_disco_sig_33 = "SELECT MIN(Discos_b_id.fecha_publicacion) 
    					   FROM (SELECT D.fecha_publicacion FROM publicado P, disco D WHERE D.did = P.did AND P.bid = '$id_banda') AS Discos_b_id
						   WHERE Discos_b_id.fecha_publicacion > '$fecha';";
	//cambio nombre tablas (se quitaron s)

	//noticias asociadas artistas 
 	$query_noticias_art_4 = "SELECT AI.id_a, N.titulo 
 							 FROM noticia N, artista_involucrado AI 
 							 WHERE N.id_n = AI.id_n AND N.fecha <= 'fecha_2' AND N.fecha >= 'fecha';";
 	//noticias asociadas banda
 	$query_noticia_band_4 = "SELECT N.titulo 
 						     FROM noticia N, banda_involucrada BI 
 							 WHERE N.id_n = BI.id_n AND BI.id_b = '$id_banda' AND N.fecha <= '$fecha_2' AND N.fecha >= '$fecha';";

 	//noticias asociadas banda
 	$result4 = $db4 -> prepare($query_noticia_band_4);
 	$result4 -> execute();
 	$query_noticias_band = $result4 -> fetchAll();

 	echo "Noticias Banda";
 	echo "<br>";
 	foreach ($query_noticias_band as $n) {
 		echo $n[0];
 		echo "<br>";
 		}
 	//noticias asociadas artistas
 	//// cambio de fetchAll a fetch
 	$result4 = $db4 -> prepare($query_noticias_art_4);
 	$result4 -> execute();
 	$query_noticias_art = $result4 -> fetch();
 
 	$result3 = $db33 -> prepare($query_integrantes_33);
 	$result3 -> execute();
 	$query_integrantes = $result3 -> fetch();
 
 	echo "Noticias Artistas";
 	echo "<br>";
 
 	while ($query_integrantes){
 
 		while($query_noticias_art){
 			if ($query_integrantes[1] == $query_noticias_art[0]){
 				echo $query_noticias_art[1];
 				echo "<br>";
 			}
 	
 			$query_noticias_art = $result4 -> fetch();
 		}
 		$query_integrantes = $result3 -> fetch();
 	}


	$result = $db33 -> prepare($fecha_disco_sig_33);
	$result -> execute();
	$fecha_disco_sig = $result -> fetch();

	//no hay proximo disco 
	if (empty($fecha_disco_sig[0])) {

		//conciertos
		$result4 = $db4 -> prepare($query_conciertos_sf_4);
		$result4 -> execute();
		$query_conciertos = $result -> fetchAll();
	}

	//si hay proximo disco
	else {
		$fecha_disco_sig = $fecha_disco_sig[0];
		$fecha_disco_s = str_replace("-", "", $fecha_disco_sig);

		//conciertos asociados si hay disco dsp
		$query_conciertos_cf_4 = "SELECT C.nombre 
						      	FROM concierto C, concierto_banda CB, banda_invitada BI 
						      	WHERE ((CB.id_b = '$id_banda' AND C.id_c = CB.id_c) OR (BI.id_b = '$id_banda' AND C.id_c = BI.id_c)) AND C.fecha <= '$fecha_disco_sig' AND C.fecha >= '$fecha_disco';";

		//conciertos
		$result4 = $db4 -> prepare($query_conciertos_cf_4);
		$result4 -> execute();
		$query_conciertos = $result4 -> fetchAll();
	}

	foreach ($query_conciertos as $conciertos) {
		echo $conciertos[0];
	}
}

?>

<form action="usuario.php" method="post">
    <input type="submit" value="Volver">
</form>

<?php
include('footer.php');
?>






