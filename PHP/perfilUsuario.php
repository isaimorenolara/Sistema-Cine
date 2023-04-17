<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <!--<link href="/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">-->

    <link rel="icon" href="../../Images/logo.png">
    <link href="../CSS/estilos.css" rel="stylesheet" type="text/css">

    <title>Perfil Usuario</title>

    <style>
        body {
            padding-top: 5rem;
            padding-bottom: 5rem;
            color: #5a5a5a;
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

    <script src="../JS/funcionesLista.js"></script>
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
                            <a class="nav-link" aria-current="page" href="Inicio.html">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Promociones.html">Promociones</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="Peliculas.php">Películas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="Catalogo.php">Catálogo</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Añadir
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="AnadirPelicula.php">Añadir Pelicula</a></li>
                                <li><a class="dropdown-item" href="AnadirFunciones.php">Añadir Función</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Lista
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="Lista.php">Lista de Pelicula</a></li>
                                <li><a class="dropdown-item" href="FuncionesRegistradas.php">Lista de Funciones</a></li>
                                <li><a class="dropdown-item" href="UsuariosRegistrados.php">Lista de Usuarios</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="InicioSesion.php"><img class="userImage" src="../Images/user.png"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main role="main">
        <div class="container marketing">
            <div class="container-fluid">
                <div class="row">
                    <h2>Edita perfil</h2>
                    <div class="col-sm-6 text-black">
                        <form action="Correo.php" method="POST">
                            <div class="form-outline mb-4">
                                <label class="form-lg">Nombre completo</label>
                                <input type="text" id="name" class="form-control form-control-lg" name="name" />
                            </div>
                            <div class="form-outline mb-4">
                                <label class="form-lg">Correo electrónico</label>
                                <input type="email" id="email" class="form-control form-control-lg" name="email" />
                            </div>
                            <div class="form-outline mb-4">
                                <label class="form-lg">Contraseña</label>
                                <input type="password" id="password" class="form-control form-control-lg" name="password" />
                            </div>
                            <div class="pt-1 mb-4">
                                <button type="submit" class="btn btn-lg btn-block btn-danger mx-3">Guardar</button>
                            </div>
                        </form>
                    </div>
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