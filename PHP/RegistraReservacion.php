<?php
    extract($_REQUEST);

    //var_dump($_POST);
    
    $query = "INSERT INTO reservaciones (Id_Usuario,Id_Funcion,Metodo_pago,Tipo,asiento_fila,asiento_columna) values ($id,$funcion,'$metodoPago','$tipoReservacion','$fila',$columna)";

    $mysqli = new mysqli("localhost", "root", "", "cine2");//"127.0.0.1"
    $acentos = $mysqli->query("SET NAMES 'utf8'"); 

    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    $res = $mysqli->query($query) or 
            die("Falló la consulta: (" . $mysqli->errno . ") " . $mysqli->error);
    $mysqli->close();
    header("Location: http://localhost:/pruebaCine/PHP/Reserva.php?id=$id");
?>   
