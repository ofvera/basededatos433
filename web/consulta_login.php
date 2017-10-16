<!DOCTYPE html>

<?php
include('head.php');
 ?>

<!-- aca va la consulta -->
<?php 
	require('conexion.php');

	$usuario = $_POST['usuario'];
	$clave = $_POST['clave'];

	$query = "SELECT user_name, clave FROM Usuario WHERE user_name = '$usuario' AND clave = '$clave;'";

	$result = $db33 -> prepare($query);
	$result -> execute();
	$dataCollected = $result -> fetch();

	if (is_null($dataCollected)){
		echo "El usuario o clave incorrecta";
		echo '<form action="index.php" method="post">
			<input type="submit" value="Volver">
			</form>';
	}

	else {
		echo '<form action="usuario.php" method="post">
			<input type="submit" value="Volver">
			</form>';
	}
	
 ?>
