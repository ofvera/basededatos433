<!DOCTYPE html>

<?php
include('head.php');
 ?>

<!-- aca va la consulta -->
<?php
	require('conexion.php');

	$banda = $_POST['banda'];
	$fecha_inicio = $_POST['fecha_inicio'];
	$fecha_termino = $_POST['fecha_termino'];

	if is_null($fecha_inicio) or is_null($fecha_termino){

	echo "Debes ingresar ambas fechas para realizar la consulta"

	}

	else {
		if is_null($banda){
			$querry = "SELECT C.nombre FROM concierto C WHERE C.fecha > '$fecha_inicio' AND C.fecha < '$fecha_termino'";
		}
		
		else {
			$querry = "SELECT C.nombre FROM banda B, banda_invitada BI, concierto_banda CB, concierto C WHERE B.nombre = '$banda' AND ((B.id_b = BI.id_b AND BI.id_c = C.id_c) OR (B.id_b = CB.id_b AND CB.id_c = C.id_c)) AND C.fecha > '$fecha_inicio' AND C.fecha < '$fecha_termino'";
		}
	
	$result = $db4 -> prepare($querry);
	$result -> execute();
	$dataCollected = $result -> fetch();

	<?php
    echo "<h3>Integrantes actuales</h3>
    <table>
    <tr> <td>Nombre</td> <td>Correo</td> </tr>";
    foreach ($data as $p) {
        if ($p[integrante_actual] <> '') {
            echo "<tr>
            <td>$p[integrante_actual]</td>
            <td>$p[correo]</td>
            </tr>";
        }
    }

    ?>

	}
	