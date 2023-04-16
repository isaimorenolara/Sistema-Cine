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

    if($archivo != "none")
    {
        $fp = fopen($archivo,"rb");
        $contenido = fread($fp,$tamano);
        $contenido = addslashes($contenido);
        fclose($fp);

        $query = "update peliculas set
						Nombre='$nombrePelicula', 
						Poster='$contenido', 
						tipoImagen='$tipo', 
						Duracion='$duracionPelicula', 
						Anio_estreno='$añoPelicula', 
						Genero='$generoPelicula',
                        Descripcion='$descripcionPelicula',
                        Director='$directorPelicula',
                        Idioma='$idiomaPelicula',
                        Rating='$ratingPelicula',
                        Trailer='$trailerPelicula' 
        		   where Id_Pelicula=$Id_Pelicula";
        $mysqli = new mysqli("localhost", "root", "", "cine2");//"127.0.0.1"
        $acentos = $mysqli->query("SET NAMES 'utf8'");
		if ($mysqli->connect_errno) {
			echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		}
		$res = $mysqli->query($query) or 
				die("Falló la consulta: (" . $mysqli->errno . ") " . $mysqli->error);
        $mysqli->close();
        /*echo "El archivo fue actualizado correctamente<br><br>";
        echo "<a href=\"Anadir.php\">Subir un archivo nuevo</a><br>";*/
        /*echo '<script type="text/javascript">'
        , 'jsfunction();'
        , '</script>'
        ;*/
    }
    else
    {
        /*echo "No fue posible transferir el archivo al servidor<br><br>";
        echo "<a href=\"Anadir.php\">Subir un archivo</a>";*/
    }
    echo "<a href=\"Lista.php\">Ver todos los archivos cargados</a>";
?>