<!DOCTYPE html>

<?php
include('head.php');
?>

<!-- aca va la consulta -->
<?php 
    require('conexion.php');
    $fecha_1 = $_POST['Fecha1'];
    $fecha_2 = $_POST['Fecha2'];
    $etiqueta = $_POST["Etiqueta"];

    $query_noticias_etiqueta = "SELECT n.titulo, n.fecha, n.contenido FROM (SELECT n.id_n FROM noticia n WHERE n.fecha >= '$fecha_1' AND n.fecha <= '$fecha_2') QN, tiene t, etiqueta e, noticia n WHERE e.nombre = '$etiqueta' AND e.id_e = t.id_e AND QN.id_n = t.id_n AND n.id_n = QN.id_n;";


    $result4 = $db4 -> prepare($query_noticias_etiqueta);
    $result4 -> execute();
    $row4 = $result4 -> fetchAll();


    if ($fecha_1 >=  $fecha_2){
    	echo "Fechas mal ingresadas";
    }
    elseif (count($row4) == 0) {
    	echo "No se encontraron noticias";
    }
    else {
    	foreach ($row4 as $r){
		 	echo "Titulo: ".$r[0];
		 	echo "Fecha: ".$r[1];
		 	echo "Contenido: ".$r[2];
		}

    }
?>

<form action="index.php" method="post">
    <input type="submit" value="Volver">
</form>

<?php
include('footer.php');
?> 