<?php
    $query = "delete from peliculas where Id_Pelicula =".$_REQUEST['Id_Pelicula'];
    $mysqli = new mysqli("localhost", "root", "", "cine2");//"127.0.0.1"
	if ($mysqli->connect_errno) {
		echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}
	$res = $mysqli->query($query) or 
			die("Falló la consulta: (" . $mysqli->errno . ") " . $mysqli->error);
	$mysqli->close();
    header("Location: http://localhost:/pruebaCine/PHP/Lista.php");
?>