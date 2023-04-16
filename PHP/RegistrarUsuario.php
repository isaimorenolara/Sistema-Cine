<?php
    extract($_REQUEST);
    
    $query = "insert into usuarios (Nombre,Correo_electronico,Contrasena) values ('$nombre_completo','$correo','$contrasena')";

    $mysqli = new mysqli("localhost", "root", "", "cine2");//"127.0.0.1"
    $acentos = $mysqli->query("SET NAMES 'utf8'"); 

    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    $res = $mysqli->query($query) or 
            die("Falló la consulta: (" . $mysqli->errno . ") " . $mysqli->error);
    $mysqli->close();
    header("Location: http://localhost:/pruebaCine/PHP/InicioSesion.php");
?>