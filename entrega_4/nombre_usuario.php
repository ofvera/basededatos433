<!DOCTYPE html>

<?php
include('head.php');
 ?>

<!-- aca va la consulta -->
<?php 
	//falta cambiar pagina y caso en que nombre no exista


	require('conexion.php');
	$nombre_usuario = $_POST['nombre_usuario'];
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<br>";
	if (!empty($nombre_usuario)) {
		$nombre_usuario = ucwords($nombre_usuario);
		$nombre_usuario2 = str_replace(' ', '%20', $nombre_usuario);
		$url = "http://bd11.ing.puc.cl/finduid/".$nombre_usuario2; //cambiar
		$info = json_decode(file_get_contents($url), true);
		$datos = $info[1];
		if (!empty($datos)){
			$url = "http://bd11.ing.puc.cl/user/".$datos[0]["id"];
			$info = json_decode(file_get_contents($url), true);
			$datos = $info[1][0];
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
			echo "No se encontró un usuario con el nombre $nombre_usuario";
		}

	}
	else {
		echo "Debe ingresar el nombre de un usuario";
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