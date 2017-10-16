<!DOCTYPE html>

<?php
include('head.php');
?>

<!-- aca va la consulta -->
<?php 
    require('conexion.php');

    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $usuario = $_POST['usuario'];
    $correo = $_POST['mail'];
    $clave = $_POST['clave'];


    $query = "SELECT user_name FROM Usuario WHERE user_name = '$usuario';";
    $result = $db33 -> prepare($query);
    $result -> execute();
    $dataCollected = $result -> fetch();

    if (empty($dataCollected)){
        $query2 = "INSERT INTO Usuario VALUES ('$usuario', '$clave', '$nombre', $edad, '$correo');";
        $result2 = $db33 -> prepare($query2);
        $result2 -> execute();

        echo "Usuario registrado";
        echo '<form action="index.php" method="post">
              <input type="submit" value="Volver">
              </form>';
    }

    else {
        echo "No está disponible este nombre de usuario";
        echo '<form action="index.php" method="post">
              <input type="submit" value="Volver">
              </form>';
    }
    
 ?>
