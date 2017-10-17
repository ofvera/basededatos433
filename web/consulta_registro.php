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
        header('Location: http://bases.ing.puc.cl/~grupo4/paula/usuario.php');
        exit();
    }

    else {
        echo "No está disponible este nombre de usuario";
        header('Location: http://bases.ing.puc.cl/~grupo4/paula/index.php');
        exit();
    }
    
 ?>


<?php
include('footer.php');
 ?>
