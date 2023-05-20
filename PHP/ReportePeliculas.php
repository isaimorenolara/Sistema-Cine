<?php
    include 'pdf/mpdf.php';
	
	$titulo='CinemaOps';
	$subtitulo='Lista de Películas';
	$mysqli = new mysqli("localhost", "root", "", "cine2"); //"127.0.0.1"
    $acentos = $mysqli->query("SET NAMES 'utf8'"); 

	if ($mysqli->connect_errno) {
		echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}

	$res = $mysqli->query("SELECT * FROM peliculas") or 
				die("Falló la consulta: (" . $mysqli->errno . ") " . $mysqli->error);
	$contenido="<div class='table-responsive'>
                    <h1>$titulo</h1>
					<h2>$subtitulo</h2>
                    <table class='table table-striped'>
                        <tr>
                            <td>Nombre</td>
                            <td>Descripción</td>
							<td>Año de estreno</td>
							<td>Director</td>
                            <td>Idioma</td>
                            <td>Rating</td>
                        </tr>";
	while($registro = $res->fetch_assoc())
	{
		// extract($registro);
		// $tipo = $tipoimagen;
		// $picture = base64_encode($imagen);
        // $tipo=$registro['tipoimagen'];
        // $imagen=base64_encode($registro['Poster']);
		$contenido.="<tr>
                        <td class='text-center'>".$registro['Nombre']."</td>
                        <td class='text-justify'>".$registro['Descripcion']."</td>
						<td class='text-justify'>".$registro['Anio_estreno']."</td>
                        <td class='text-center'>".$registro['Director']."</td>
						<td class='text-center'>".$registro['Idioma']."</td>
                        <td class='text-center'>".$registro['Rating']."</td>
                    </tr>";
	}
	$contenido.="</table></div>";
	$mpdf=new mpdf('UTF-8-s','Letter');//$mpdf->showImageErrors = true;
	$mpdf->SetTitle('Reporte de Películas');
	$mpdf->SetDisplayMode('fullpage');
	$mpdf->showWatermarkImage=true;
	$piepag="<div class='DIVpiepagina'>El contenido de este documento es propiedad de la empresa CinemaOps</div>";
	$mpdf->SetHTMLFooter($piepag);
	$mpdf->SetProtection(array('print'));//,'password'); //Configura protección del documento. Solo permite impresion
	$stylesheet = file_get_contents('../CSS/estilosReporte.css');
	$mpdf->WriteHTML($stylesheet,1);
	$mpdf->WriteHTML($contenido);
	$mpdf->Output($titulo.'.pdf','I');
	return $mpdf;
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

    <link rel="icon" href="../Images/logo.png">
    <link href="../CSS/estilos.css" rel="stylesheet" type="text/css">

  </head>
  <body>
  </body> 
</html> 