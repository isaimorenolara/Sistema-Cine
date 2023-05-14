<?php
    extract($_REQUEST);

    // Muestra los valores recibidos
    // echo "Tipo de sala: " . $tipoSala . "<br>";
    // echo "Número de asientos: " . $numAsientos . "<br>";
    // echo "Número de filas: " . $numFilas . "<br>";
    // echo "Asientos por fila: " . $asientosfilas . "<br>";
    
    $query = "insert into salas (tipo_sala,numero_asientos,filas,asientosxfila) values ('$tipoSala',$numAsientos,$numFilas,$asientosfilas)";

    $mysqli = new mysqli("localhost", "root", "", "cine2");//"127.0.0.1"
    $acentos = $mysqli->query("SET NAMES 'utf8'"); 

    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    $res = $mysqli->query($query) or 
            die("Falló la consulta: (" . $mysqli->errno . ") " . $mysqli->error);
    $mysqli->close();
    header("Location: http://localhost:/pruebaCine/PHP/AnadirSala.php");
?>   
