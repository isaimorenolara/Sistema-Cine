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

$mysqli = new mysqli("localhost", "root", "", "cine2"); //"127.0.0.1"
$acentos = $mysqli->query("SET NAMES 'utf8'");

if ($mysqli->connect_errno)
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;

$query = "SELECT * FROM usuarios WHERE Id_Usuario = '$id'";
$resultado = $mysqli->query($query) or
    die("Falló la consulta: (" . $mysqli->errno . ") " . $mysqli->error);

// Verifica si se encontraron resultados
if (mysqli_num_rows($resultado) > 0) {
    // Obtiene los datos del usuario
    $row = mysqli_fetch_assoc($resultado);
    $nombre = $row['Nombre'];
    $email = $row['Correo_electronico'];
} else {
    echo "No se encontró ningún usuario con ese ID.";
}

header("Content-Type: text/html;charset=utf-8");


$html = "";
$cont = 0;
$contador = 0;
$res = $mysqli->query("select * from reservaciones r, funciones f, peliculas p where Id_Usuario = '$id' and r.Id_Funcion = f.Id_Funcion and f.Id_Pelicula = p.Id_Pelicula") or
    die("Falló la consulta: (" . $mysqli->errno . ") " . $mysqli->error);
$Nregistros = $res->num_rows;

$html .= "<div class='table-responsive'>
<table class='table table-striped'>
    <tr class='text-center'>
        <th>Poster</th>
        <th>Nombre</th>
        <th>Duración</th>
        <th>Descripción</th>
        <th>Idioma</th>
        <th>Fecha</th>
        <th>Hora</th>
    </tr>
";

while ($registro = $res->fetch_assoc()) {
    $tipo = $registro['tipoimagen'];
    $imagen = base64_encode($registro['Poster']);

    $html .= "<tr>
      <td class='text-center'><img class='rounded img-fluid' src='data:$tipo;base64,$imagen' alt='" . $registro['Nombre'] . "'></td>
      <td class='text-center'>" . $registro['Nombre'] . "</td>
      <td class='text-center'>" . $registro['Duracion'] . " min. </td>
      <td class='text-justify'>" . $registro['Descripcion'] . "</td>
      <td class='text-center'>" . $registro['Idioma'] . "</td>
      <td class='text-center'>" . $registro['Fecha'] . "</td>
      <td class='text-center'>" . $registro['Hora_inicio'] . "</td>
  </tr>";
    $cont++;
    $contador++;
}
$html .= "</table></div>";

// Cierra la conexión a la base de datos
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

    <script src="../JS/funcionesInicio.js"></script>
    <script src="../JS/funcionesAsientos2.js"></script>

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .userImage:hover {
            filter: brightness(150%);
        }

        .cajaPeliculas {
            backdrop-filter: blur(10px);
            background-color: rgba(255, 255, 255, 0.232);
            padding: 10px;
        }
    </style>

    <title>Mis Reservaciones</title>
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
                            <a class="nav-link" aria-current="page" href="Inicio.php?id=<?php echo $_SESSION['id']; ?>">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Promociones.php?id=<?php echo $_SESSION['id']; ?>">Promociones</a>
                        </li <li class="nav-item">
                        <a class="nav-link" href="Peliculas.php?id=<?php echo $_SESSION['id']; ?>">Películas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="Reserva.php?id=<?php echo $_SESSION['id']; ?>">Reserva</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Más
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="MisReservaciones.php?id=<?php echo $_SESSION['id']; ?>">Mis Reservaciones</a></li>
                                <li><a class="dropdown-item" href="Contacto.php?id=<?php echo $_SESSION['id']; ?>">Contacto</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="EditaPerfil.php?id=<?php echo $_SESSION['id']; ?>"><img class="userImage" src="../Images/user.png"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main role="main">
        <div class="container marketing align-items-center mt-5">
            <h2>Mis Reservaciones</h2>
            <br>
            <?= $html ?>
            <hr class="featurette-divider">
        </div>
        <footer class="container">
            <p class="float-right"><a href="#" class="link-danger">Volver al inicio</a></p>
            <p>&copy; 2022 Company, Inc. &middot; <a href="#" class="link-danger">Privacidad</a> &middot; <a href="#" class="link-danger">Condiciones</a></p>
        </footer>

    </main>
</body>

</html>