<?php
    header("Content-Type: text/html;charset=utf-8");
    
    $mysqli = new mysqli("localhost", "root", "", "cine2");//"127.0.0.1"
    $acentos = $mysqli->query("SET NAMES 'utf8'"); 

	if ($mysqli->connect_errno)
		echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    if(!isset($_GET['q']))
        echo "Los datos de las películas: ";
    else
    {
        $q = $_GET['q'];
        $query = "select * from peliculas where Genero = '$q'";
        $res = $mysqli->query($query)or 
						die("Falló la consulta: (" . $mysqli->errno . ") " . $mysqli->error);
        echo "<div class='table-responsive'>
            <table class='table table-striped'>
                <tr class='text-center'>
                    <th>Poster</th>
                    <th>Nombre</th>
                    <th>Duración</th>
                    <th>Año de estreno</th>
                    <th>Descripción</th>
                    <th>Director</th>
                    <th>Idioma</th>
                    <th>Trailer</th>
                    <th>Rating</th>
                </tr>
        ";
        while($row = $res->fetch_assoc())
        {
            $tipo=$row['tipoimagen'];
            $imagen=base64_encode($row['Poster']);
            //width='122' height='185'
            echo "<tr> 
                    <td class='text-center'><img class='rounded img-fluid' src='data:$tipo;base64,$imagen' alt='".$row['Nombre']."'></td>
                    <td class='text-center'>".$row['Nombre']."</td>
                    <td class='text-center'>".$row['Duracion']." min. </td>
                    <td class='text-center'>".$row['Anio_estreno']."</td>
                    <td class='text-justify'>".$row['Descripcion']."</td>
                    <td class='text-center'>".$row['Director']."</td>
                    <td class='text-center'>".$row['Idioma']."</td>
                    <td class='text-center'><a class='link-danger' href=".$row['Trailer'].">".$row['Trailer']."</a></td>
                    <td class='text-center'>".$row['Rating']."/5</td>
                </tr>
            ";
        }
        echo "</table></div>";
    }
    $res->free();
	$mysqli->close();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
    <meta http-equiv=”Content-Type” content=”text/html; charset=ISO-8859-1″ />
    
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <link rel="icon" href="../Imagenes/logo.png">
    <link href="../CSS/estilos.css" rel="stylesheet" type="text/css">

    <style>

    </style>

  </head>
  <body>
  </body> 
</html> 