<?php

session_start();

// Verifica si la sesión está activa
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
} else {
    // Redirige al archivo de inicio de sesión si la sesión no está activa
    header("Location: http://localhost/pruebaCine/PHP/Inicio.html");
    exit();
}

header("Content-Type: text/html;charset=utf-8");

$html = "";
$cont = 0;

$mysqli = new mysqli("localhost", "root", "", "cine2");
$acentos = $mysqli->query("SET NAMES 'utf8'");

if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

$res = $mysqli->query("select * from peliculas") or
    die("Falló la consulta: (" . $mysqli->errno . ") " . $mysqli->error);
$Nregistros = $res->num_rows;
$html = "";
$contador = 0;

while ($registro = $res->fetch_assoc()) {
    $tipo = $registro['tipoimagen'];
    $imagen = base64_encode($registro['Poster']);
    if (($contador % 4) == 0 && $contador != 0)
        $html .= "</div><br>";
    if (($contador % 4) == 0) //renglones
    {
        //echo "$contador";
        $html .= "<div class='card-group'>";
    }
    $html .= "<div class='card'>
            <img src='data:$tipo;base64,$imagen' class='card-img-top' alt='" . $registro['Nombre'] . "'>
            <div class='card-body'>
              <h4 class='card-title text-center'>" . $registro['Nombre'] . "</h4>
              <p class='card-text text-center'>" . $registro['Anio_estreno'] . "</p>
              <p class='card-text text-center'>" . $registro['Descripcion'] . "</p>
              <p class='card-text text-center'><strong>Idioma: </strong>" . $registro['Idioma'] . "</p>
              <p class='card-text text-center'><strong>Género: </strong>" . $registro['Genero'] . "</p>
              <p class='card-text text-center'><strong>Duración: </strong>" . $registro['Duracion'] . " min. </p>
              <p class='card-text text-center'><strong>Director: </strong>" . $registro['Director'] . "</p>
            </div>
			  </div>";
    $cont++;
    $contador++;
}
$html .= "</div>";
$res->free();
$mysqli->close();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <!--<link href="/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">-->

    <link rel="icon" href="../Images/logo.png">
    <link href="../CSS/estilos.css" rel="stylesheet" type="text/css">
    <link href="../CSS/carousel.css" rel="stylesheet">

    <title>Peliculas</title>

    <style>
        body {
            padding-top: 5rem;
            padding-bottom: 5rem;
            color: #5a5a5a;
        }

        .card {
            border-radius: 4px;
            background: #fff;
            box-shadow: 0 6px 10px rgba(0, 0, 0, .08), 0 0 6px rgba(0, 0, 0, .05);
            cursor: pointer;
            border-radius: 10px;
        }

        .card img {
            border-radius: 10px 10px 0px 0px;
        }

        .card:hover {
            transform: scale(1.01);
            box-shadow: 0 10px 20px rgba(0, 0, 0, .12), 0 4px 8px rgba(0, 0, 0, .06);
        }

        .featurette-divider {
            margin: 5rem 0;
        }

        .featurette-heading {
            font-weight: 300;
            line-height: 1;
            letter-spacing: -.05rem;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">CinemaOps</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDropdownMenuLink" aria-controls="navbarDropdownMenuLink" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarDropdownMenuLink">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="InicioAdmi.php?id=<?php echo $_SESSION['id']; ?>">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Promociones_Admi.php?id=<?php echo $_SESSION['id']; ?>">Promociones</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="PeliculasAdmi.php?id=<?php echo $_SESSION['id']; ?>">Películas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="CatalogoAdmi.php?id=<?php echo $_SESSION['id']; ?>">Catálogo</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Añadir
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="AnadirPelicula.php?id=<?php echo $_SESSION['id']; ?>">Añadir Pelicula</a></li>
                                <li><a class="dropdown-item" href="AnadirFunciones.php?id=<?php echo $_SESSION['id']; ?>">Añadir Función</a></li>
                                <li><a class="dropdown-item" href="AnadirSala.php?id=<?php echo $_SESSION['id']; ?>">Añadir Sala</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Lista
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="Lista.php?id=<?php echo $_SESSION['id']; ?>">Lista de Pelicula</a></li>
                                <li><a class="dropdown-item" href="FuncionesRegistradas.php?id=<?php echo $_SESSION['id']; ?>">Lista de Funciones</a></li>
                                <li><a class="dropdown-item" href="UsuariosRegistrados.php?id=<?php echo $_SESSION['id']; ?>">Lista de Usuarios</a></li>
                                <li><a class="dropdown-item" href="SalasRegistradas.php?id=<?php echo $_SESSION['id']; ?>">Lista de Salas</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="EditaPerfilAdmi.php?id=<?php echo $_SESSION['id']; ?>"><img class="userImage" src="../Images/user.png"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main role="main">
        <div class="container marketing">
            <?= $html ?>
            <hr class="featurette-divider">
        </div>
    </main>

    <footer class="container">
        <p class="float-right"><a href="#" class="link-danger">Volver al inicio</a></p>
        <p>&copy; 2022 Company, Inc. &middot; <a href="#" class="link-danger">Privacidad</a> &middot; <a href="#" class="link-danger">Condiciones</a></p>
    </footer>
</body>

</html>