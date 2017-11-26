<!DOCTYPE html>

<?php
include('head.php');
 ?>

<!-- aca va la consulta -->
<?php 
	require('conexion.php');
	$uid = $_POST['uid'];

	if (!empty($uid)) {
		echo "<br>";
		echo "<br>";
		echo "<br>";
		echo "<br>";
		$url = "http://bd11.ing.puc.cl/user/".$uid;
		$info = json_decode(file_get_contents($url), true);
		$datos = $info[1];
		if (!empty($datos)){
			$datos = $datos[0];

			$nombre = $datos['name'];
			$edad = $datos['age'];
			$id = $datos['id'];
			$descripcion = $datos['description'];
			echo 'Nombre: '.$nombre;
			echo "<br>";
			echo 'Edad: '.$edad;
			echo "<br>";
			echo "Id: " .$id;
			echo "<br>";
			echo "Descripcion: ". $descripcion;
			echo "<br>";
			echo "<br>";
			echo "<br>";



			echo "Mensajes enviados por $nombre: ";
			foreach($datos['msg'] as $m){
				echo "<br>";
				echo "<br>";
				echo '- receptor: '.$m["receptant"];
				echo "<br>";
				echo '     mensaje: '.$m['message'];
				}
		}
		else{
			echo "No hay un usuario con id $uid";
		}

	}
	else {
		echo "<br>";
		echo "<br>";
		echo "<br>";
		echo "<br>";
		echo "Debe ingresar un id de usuario";
	}
echo "<br>";
echo "<br>";
echo "<br>";
?>

<form action="usuario.php" method="post">
    <input type="submit" value="Volver">
</form>

<?php
include('footer.php');
?>


