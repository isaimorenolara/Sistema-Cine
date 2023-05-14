<?php
    if (isset($_GET['success'])) {
        if ($_GET['success'] == 'true') {
            echo '<div class="alert alert-success" role="alert">El mensaje ha sido enviado exitosamente.</div>';
        } else {
            $error = urldecode($_GET['error']);
            echo '<div class="alert alert-danger" role="alert">Ha ocurrido un error al enviar el mensaje: ' . $error . '</div>';
        }
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
    <link href="../CSS/carousel.css" rel="stylesheet">

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
    </style>

    <title>Contacto</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">CinemaOps</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDropdownMenuLink" aria-controls="navbarDropdownMenuLink" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="Inicio.html">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Promociones.html">Promociones</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Más
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="MiSala.html">Mi Sala</a></li>
                                <li><a class="dropdown-item bg-danger" href="Contacto.php">Contacto</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="InicioSesion.php"><img class="userImage" src="../Images/user.png"></a>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Buscar">
                        <button class="btn btn-danger" type="submit">Buscar</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>

    <main role="main">
        <div class="container marketing">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6 d-none d-sm-block">
                        <div class="px-3 py-3 align-center" style='height:100vh'>
                            <form action="Correo.php" method="POST">
                                <h2>Contáctanos</h2>
                                <p class="lead">¡Gracias por querer contactarte con nosotros! Por favor llena el siguiente formulario para que podamos ponernos en contacto contigo:</p>
                                <div class="form-outline mb-4">
                                    <label class="form-lg">Nombre</label>
                                    <input type="text" id="name" class="form-control form-control-lg" name="name" />
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-lg">Correo electrónico</label>
                                    <input type="email" id="email" class="form-control form-control-lg" name="email" />
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-lg">Mensaje</label>
                                    <textarea class="form-control form-control-lg" rows="4" name="message" id="message"></textarea>
                                </div>

                                <div class="form-outline mb-4 col-sm-6 d-none d-sm-block">
                                    <button type="submit" class="btn btn-lg btn-block btn-danger mx-3">Enviar</button>
                                    <button type="reset" class="btn btn-lg btn-block btn-outline-danger">Limpiar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-6 d-none d-sm-block" style='height:100vh'>
                        <div class="text-center">
                            <img src="../Images/palomitas_icono.png" class="img-fluid">
                        </div>
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

    <script>
        $(document).ready(function() {
            $('form').submit(function(event) {
                event.preventDefault();

                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            alert('El mensaje ha sido enviado correctamente.');
                            $('form')[0].reset();
                        } else {
                            alert('Ha ocurrido un error al enviar el mensaje: ' + response.error);
                        }
                    },
                    error: function(xhr, status, error) {
                        alert('Ha ocurrido un error al enviar el mensaje: ' + error);
                    }
                });
            });
        });
    </script>
</body>

</html>