<!DOCTYPE html>

<?php
include('head.php');
session_start();
 ?>

<!-- arreglado luego de pequeños cambios de ejecucion -->

<!-- aca va la consulta -->
<?php
	require('conexion.php');

	$banda = $_POST['Banda'];
	$usuario = $_SESSION['usr'][0];

	if (empty($banda)) {

		echo "Debes ingresar una banda";

		}

	else {	
		$querry = "SELECT B.bid FROM banda B WHERE B.nombre = '$banda';";
		// mover esto a este lugar
		$result = $db33 -> prepare($querry);
		$result -> execute();
		$bid = $result -> fetch();
		// hasta aca, cambiando la ejecucion a db33

		if (empty($bid)){
			// vemos que bid sea empty no querry
			echo "No existe esa banda";
		
			}
		
		else{
			// VALUES no value
			$insert = "INSERT INTO favoritos VALUES('$usuario', $bid[0]);";
			// cambiar db33 y $insert
			$apply = $db33 -> prepare($insert);
			$apply -> execute();
			echo "La banda fue guardada existosamente!";
		}			
	}	
 ?>


<form action="usuario.php" method="post">
    <input type="submit" value="Volver">
</form>

<?php
include('footer.php');
 ?>
	