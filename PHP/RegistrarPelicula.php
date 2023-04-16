<?php
    if(sizeof($_FILES) == 0)//checa el tamano del archivo
    {
        echo "No se puede subir el archivo";
        exit();
    }

    $archivo = $_FILES['posterPelicula']['tmp_name'];//archivo es la variable del control file en default
    $tamano = $_FILES['posterPelicula']['size'];
    $tipo = $_FILES['posterPelicula']['type'];
    $nombreArchivo = $_FILES['posterPelicula']['name'];//nombre original del archivo

    extract($_REQUEST);

    if($archivo != "none")//si apache(servidor) cargo el archivo
    {
        $fp = fopen($archivo,"rb");
        $contenido = fread($fp,$tamano);
        $contenido = addslashes($contenido);
        fclose($fp);

        $query = "insert into peliculas 
                (Nombre,Poster,tipoImagen,Duracion,Anio_estreno,Genero,Descripcion,Director,Idioma,Rating,Trailer) 
                values ('$nombrePelicula','$contenido','$tipo','$duracionPelicula','$añoPelicula','$generoPelicula','$descripcionPelicula','$directorPelicula','$idiomaPelicula','$ratingPelicula','$trailerPelicula')";
                                
        $mysqli = new mysqli("localhost", "root", "", "cine2");//"127.0.0.1"
        $acentos = $mysqli->query("SET NAMES 'utf8'"); 

		if ($mysqli->connect_errno) {
			echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		}
		$res = $mysqli->query($query) or 
				die("Falló la consulta: (" . $mysqli->errno . ") " . $mysqli->error);
        $mysqli->close();
        echo "La película se añadió correctamente<br><br>";
        echo "<a href=\"Lista.php\">Ver todas las película</a>";
    }
    else
    {
        echo "No se pudo añadir la película correctamente<br><br>";
        echo "<a href=\"Lista.php\">Subir otra pelicula</a>";
    }
?>