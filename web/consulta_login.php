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
<<<<<<< HEAD
		header("Location: http://bases.ing.puc.cl/~grupo4/entrega3/usuario.php");
        exit();
=======
		header('Location: http://bases.ing.puc.cl/~grupo4/entrega3/usuario.php');
		exit();
>>>>>>> 39341fa73f7e883f2fe959a8933a7186ec5bb750
	}

 ?>
