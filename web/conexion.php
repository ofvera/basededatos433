<?php

    try {
        require('./data.php'); #Pide las variables para conectarse a la base de datos.
    } catch (Exception $e) {
        echo "Error al obtener las credenciales del sistema: $e";
    }
    try {
        require('./data.php'); #Pide las variables para conectarse a la base de datos.
        $db4 = new PDO("pgsql:dbname=$DBgrupo4;host=localhost;port=5432;user=$DBuser4;password=$DBpassword4");
    } catch (Exception $e) {
        echo "No se pudo conectar a la base de datos: $e";
    }
    try {
        $db33 = new PDO("pgsql:dbname=$DBgrupo33;host=localhost;port=5432;user=$DBuser33;password=$DBpassword33");
    } catch (Exception $e) {
        echo "No se pudo conectar a la base de datos: $e";
    }
?>
