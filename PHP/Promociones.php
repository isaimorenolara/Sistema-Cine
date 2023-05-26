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
    <script src="../JS/funcionesPromociones.js"></script>

    <title>Promociones</title>

    <style>
        .userImage:hover {
            filter: brightness(150%);
        }

        body {
            padding-top: 5rem;
            padding-bottom: 5rem;
            color: #5a5a5a;
        }

        .featurette-divider {
            margin: 3rem 0;
        }

        .featurette-heading {
            font-weight: 300;
            line-height: 1;
            letter-spacing: -.05rem;
        }

        .card {
            border-radius: 4px;
            background: #fff;
            box-shadow: 0 6px 10px rgba(0, 0, 0, .08), 0 0 6px rgba(0, 0, 0, .05);
            cursor: pointer;
            border-radius: 10px;
            width: auto;
            margin: 15px;
        }

        .card img {
            border-radius: 10px 10px 0px 0px;
        }

        .card:hover {
            transform: scale(1.01);
            box-shadow: 0 10px 20px rgba(0, 0, 0, .12), 0 4px 8px rgba(0, 0, 0, .06);
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
                            <a class="nav-link" aria-current="page" href="Inicio.php?id=<?php echo $_SESSION['id']; ?>">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="Promociones.php?id=<?php echo $_SESSION['id']; ?>">Promociones</a>
                        </li>
                        <li class="nav-item">
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
                    <!-- <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Buscar">
                <button class="btn btn-danger" type="submit">Buscar</button>
              </form> -->
                </div>
            </div>
        </nav>
    </header>

    <main role="main">
        <div class="container marketing align-items-center">
            <div class="row align-items-center">
                <div class='card'>
                    <div class="col-lg-4">
                        <img src="../Images/palomas.jpg" class="bd-placeholder-img rounded" preserveAspectRatio="xMidYMid slice" focusable="false" onclick="mostrarPromocion('prom1');">
                    </div>
                </div>
                <div class='card'>
                    <div class="col-lg-4">
                        <img src="../Images/palomas2.jpg" class="bd-placeholder-img rounded" preserveAspectRatio="xMidYMid slice" focusable="false" onclick="mostrarPromocion('prom2');">
                    </div>
                </div>
                <div class="col-lg-4" id="prom1" style="display: none;">
                    <h1>Vive la Magia de la copa Mundial de la FIFA con Coca-Cola</h1>
                    <h3>Participa para vivir la magia y poder ganar premios mundialistas y uno de los viajes dobles a Catar 2022</h3>
                    <p>Participa y consulta las bases <a href="https://magiadelacopa.com.mx/?utm_source=cinemex&utm_medium=web&utm_content=promo&utm_campaign=mundial2022" class="link-danger">haciendo click AQUÍ</a></p>
                </div>
                <div class="col-lg-4" id="prom2" style="display: none;">
                    <h1>Descarga la app</h1>
                    <h3>En esta temporada de grandes estrenos, no hagas filas</h3>
                    <p>Haz <a href="#" class="link-danger">clic aquí</a></p>
                </div>
            </div>
            <hr class="featurette-divider">
        </div>
    </main>

    <footer class="container">
        <p class="float-right"><a href="#" class="link-danger">Volver al inicio</a></p>
        <p>&copy; 2022 Company, Inc. &middot; <a href="#" class="link-danger">Privacidad</a> &middot; <a href="#" class="link-danger">Condiciones</a></p>
    </footer>
</body>

</html>