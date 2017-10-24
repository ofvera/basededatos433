<!DOCTYPE html>

<?php
include('head.php');
session_start();
 ?>

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
		
		if (empty($querry)){
			echo "No existe esa banda";
		
			}
		
		else{

			$result = $db4 -> prepare($querry);
			$result -> execute();
			$bid = $result -> fetch();

			$insert = "INSERT INTO favoritos VALUE('$usuario','$bid');";
			$apply = $db4 -> prepare($querry);
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
	