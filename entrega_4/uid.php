<!DOCTYPE html>

<?php
include('head.php');
 ?>

<!-- aca va la consulta -->
<?php 
	require('conexion.php');
	$uid = $_POST['uid'];
	$uid2 = str_replace(' ', '%20', $uid);

	if (!empty($uid)) {
		echo "<br>";
		echo "<br>";
		echo "<br>";
		echo "<br>";
		if (is_numeric($uid2)){
			$url = "http://bd11.ing.puc.cl/user/".$uid2;
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
		else{
			echo "Se debe ingresar un id numerico";
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


