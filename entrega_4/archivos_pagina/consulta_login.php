<!DOCTYPE html>

<?php
include('head.php');
session_start();
 ?>

<!-- aca va la consulta -->
<?php
	require('conexion.php');

	$usuario = $_POST['usuario'];
	$clave = $_POST['clave'];

	$query = "SELECT user_name, clave FROM Usuario WHERE user_name = '$usuario' AND clave = '$clave';";

	$result = $db33 -> prepare($query);
	$result -> execute();
	$dataCollected = $result -> fetch();

	if (empty($dataCollected)) {
		echo "El usuario o clave incorrecta";
		header("Location: http://bases.ing.puc.cl/~grupo4/entrega4/index.php");
	}

	else {
        $_SESSION['usr'] = array();
        array_push($_SESSION['usr'], $usuario);
		header("Location: http://bases.ing.puc.cl/~grupo4/entrega4/usuario.php");
        exit();
	}

 ?>
