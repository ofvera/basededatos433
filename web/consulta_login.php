<!DOCTYPE html>

<?php
include('head.php');
 ?>

<!-- aca va la consulta -->
	<?php 
		require('conexion.php')
		$usuario = $_POST['usuario']
		$clave = $_POST['clave']
		$query = 'SELECT '
	 ?>

<form action="index.php" method="post">
  <input type="submit" value="Volver">
</form>

<?php
include('final.php');
 ?>
