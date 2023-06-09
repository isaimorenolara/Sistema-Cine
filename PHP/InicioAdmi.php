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
    <link href="../CSS/carousel.css" rel="stylesheet">

    <script src="../JS/funcionesInicio.js"></script>

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

    <title>Inicio</title>
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
                            <a class="nav-link active" aria-current="page" href="InicioAdmi.php?id=<?php echo $_SESSION['id']; ?>">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Promociones_Admi.php?id=<?php echo $_SESSION['id']; ?>">Promociones</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="PeliculasAdmi.php?id=<?php echo $_SESSION['id']; ?>">Películas</a>
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

        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active bg-dark">
                    <!--style="background-image: url('../Images/spiderman.jpg');"-->
                    <!--<svg class="d-block w-100" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img"><rect width="100%" height="100%" fill="#777"/></svg>-->
                    <!--<img src="../Images/spiderman.jpg" style="width: 100%; height: auto;">-->
                    <div class="container align-items-center text-center">
                        <img class="img-fluid align-middle" src="../Images/spiderman.jpg" style="width: 100%; height: auto;">
                        <div class="cajaPeliculas carousel-caption rounded">
                            <h1>Spider-Man: No Way Home</h1>
                            <p>Tras descubrirse la identidad secreta de Peter Parker como Spider-Man, la vida del joven se vuelve una locura. Peter decide pedirle ayuda al Doctor Extraño para recuperar su vida. Pero algo sale mal y provoca una fractura en el multiverso.</p>
                            <p><a class="btn btn-lg btn-danger" href="https://youtu.be/rt-2cxAiPJk" role="button">Ver trailer &raquo;</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item bg-dark">
                    <!--<svg class="d-block w-100" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img"><rect width="100%" height="100%" fill="#777"/></svg>-->
                    <!--<img src="../Images/eternals2.png" width="100%" height="100%">-->
                    <div class="container">
                        <img src="../Images/eternals2.jpg" width="100%" height="100%">
                        <div class="cajaPeliculas carousel-caption rounded">
                            <h1>Eternals</h1>
                            <p>Los Eternos son una raza de seres inmortales con poderes sobrehumanos que han vivido en secreto en la Tierra durante miles de años. Aunque nunca han intervenido en el destino de la población, ahora una amenaza se cierne sobre la humanidad.</p>
                            <p><a class="btn btn-lg btn-danger" href="https://youtu.be/x_me3xsvDgk" role="button">Ver trailer &raquo;</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item bg-dark">
                    <!--<svg class="d-block w-100" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img"><rect width="100%" height="100%" fill="#777"/></svg>-->
                    <!--<img src="../Images/black widow2.jpg" style="width: 100%; height: auto;">-->
                    <div class="container">
                        <img src="../Images/black widow2.jpg" style="width: 100%; height: auto;">
                        <div class="cajaPeliculas carousel-caption rounded">
                            <h1>Black Widow</h1>
                            <p>Una peligrosa conspiración, relacionada con su pasado, persigue a Natasha Romanoff, también conocida como Viuda Negra. La agente tendrá que lidiar con las consecuencias de haber sido espía, así como con las relaciones rotas, para sobrevivir.</p>
                            <p><a class="btn btn-lg btn-danger" href="https://youtu.be/RxAtuMu_ph4" role="button">Ver trailer &raquo;</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <button type="button" class="carousel-control-prev" role="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button type="button" class="carousel-control-next" role="button" data-bs-target="#myCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <div class="container marketing">
            <div class="row">
                <div class="col-lg-4">
                    <img src="../Images/thor.jpg" class="bd-placeholder-img rounded" preserveAspectRatio="xMidYMid slice" focusable="false">
                    <br><br>
                    <h2>Thor: Love And Thunder</h2>
                    <!--<p>Mucho tiempo después de los eventos sucedidos en Avengers: Endgame, los Guardianes de la Galaxia deben convencer a Thor para que regrese al campo de batalla y se enfrente a un villano empeñado en matar a todas las criaturas divinas en todo el cosmos. Para luchar contra esta amenaza, Thor debe reclutar a sus amigos Valkyrie, Korg y su ex novia Jane Foster, quien misteriosamente puede empuñar el martillo de Thor y por ende poseer su gran poder. THOR: AMOR Y TRUENO contiene varias escenas con luces intermitentes que pueden afectar a personas susceptibles a la epilepsia fotosensible o a padecer otras foto sensibilidades.</p>-->
                    <h5>Clasificación</h5>
                    <p>S/C</p>
                    <h5>Género</h5>
                    <p></p>Acción, Aventura, Fantasía</p>
                    <p><button type="button" class="btn btn-danger rounded-pill" onclick="mostrarDetalles('detalle1');">Ver detalles &raquo;</button></p>
                </div>
                <div class="col-lg-4">
                    <img src="../Images/minions.jpg" class="bd-placeholder-img rounded" preserveAspectRatio="xMidYMid slice" focusable="false">
                    <br><br>
                    <h2>Minions: The Rise of Gru</h2>
                    <!--<p>Son los años 70 y Gru crece en un barrio residencial, en pleno boom de los peinados cardados y los pantalones de campana. Como fan incondicional de un famoso supergrupo de villanos, 'Los salvajes seis', Gru idea un plan para demostrarles que es lo suficientemente malvado como para trabajar con ellos. Por suerte, cuenta con la ayuda de sus fieles seguidores, los Minions, siempre dispuestos a sembrar el caos. Juntos, Kevin, Stuart, Bob, y Otto -un nuevo Minion con aparato en los dientes y desesperado por sentirse aceptado- desplegarán su potencial para construir junto a Gru su primera guarida, experimentar con sus primeras armas y llevar a cabo sus primeras misiones. Secuela de "Los Minions".</p>-->
                    <h5>Clasificación</h5>
                    <p>S/C</p>
                    <h5>Género</h5>
                    <p></p>Animación</p>
                    <p><button type="button" class="btn btn-danger rounded-pill" onclick="mostrarDetalles('detalle2');">Ver detalles &raquo;</button></p>
                </div>
                <div class="col-lg-4">
                    <img src="../Images/buzz.jpg" class="bd-placeholder-img rounded" preserveAspectRatio="xMidYMid slice" focusable="false">
                    <br><br>
                    <h2>Lightyear</h2>
                    <!--<p>LIGHTYEAR de Disney y Pixar es una aventura llena de diversión que cuenta la historia del origen de Buzz Lightyear (voz en inglés de Chris Evans), el héroe que inspiró el juguete. LIGHTYEAR presenta al legendario Guardián Espacial en una aventura intergaláctica junto a un grupo de ambiciosos reclutas (voces en inglés de Keke Palmer, Dale Soules y Taika Waititi), y su divertido compañero robot Sox (voz en inglés de Peter Sohn). También participan del elenco Uzo Aduba, James Brolin, Mary McDonald-Lewis, Efren Ramirez e Isiah Whitlock Jr. Dirigida por Angus MacLane (codirector de BUSCANDO A DORY) y producida por Galyn Susman (Toy Story: Olvidados En El Tiempo), LIGHTYEAR estrenará el 16 de junio de 2022 solo en cines.</p>-->
                    <h5>Clasificación</h5>
                    <p>A</p>
                    <h5>Género</h5>
                    <p></p>Animación</p>
                    <p><button type="button" class="btn btn-danger rounded-pill" onclick="mostrarDetalles('detalle3');">Ver detalles &raquo;</button></p>
                </div>
            </div>

            <div class="detalles card text-center" id="detalle1" style="display: none;">
                <div class="card-header">
                    Detalles:
                </div>
                <div class="card-body">
                    <h5 class="card-title">Thor: Love And Thunder</h5>
                    <p class="card-text">Mucho tiempo después de los eventos sucedidos en Avengers: Endgame, los Guardianes de la Galaxia deben convencer a Thor para que regrese al campo de batalla y se enfrente a un villano empeñado en matar a todas las criaturas divinas en todo el cosmos. Para luchar contra esta amenaza, Thor debe reclutar a sus amigos Valkyrie, Korg y su ex novia Jane Foster, quien misteriosamente puede empuñar el martillo de Thor y por ende poseer su gran poder. THOR: AMOR Y TRUENO contiene varias escenas con luces intermitentes que pueden afectar a personas susceptibles a la epilepsia fotosensible o a padecer otras foto sensibilidades.</p>
                    <h6>Clasificación</h6>
                    <p>S/C</p>
                    <h6>Género</h6>
                    <p></p>Acción, Aventura, Fantasía</p>
                    <h6>Director</h6>
                    <p></p>Taika Waititi</p>
                    <h6>Actores</h6>
                    <p></p>Chris Hemsworth, Natalie Portman, Christian Bale</p>
                    <h6>País</h6>
                    <p></p>Estados Unidos</p>
                    <a href="#" class="btn btn-danger rounded-pill">Comprar boletos &raquo;</a>
                </div>
                <div class="card-footer text-muted">
                    Hace 2 días.
                </div>
            </div>

            <div class="detalles card text-center" id="detalle2" style="display: none;">
                <div class="card-header">
                    Detalles:
                </div>
                <div class="card-body">
                    <h5 class="card-title">Minions: The Rise of Gru</h5>
                    <p class="card-text">Son los años 70 y Gru crece en un barrio residencial, en pleno boom de los peinados cardados y los pantalones de campana. Como fan incondicional de un famoso supergrupo de villanos, 'Los salvajes seis', Gru idea un plan para demostrarles que es lo suficientemente malvado como para trabajar con ellos. Por suerte, cuenta con la ayuda de sus fieles seguidores, los Minions, siempre dispuestos a sembrar el caos. Juntos, Kevin, Stuart, Bob, y Otto -un nuevo Minion con aparato en los dientes y desesperado por sentirse aceptado- desplegarán su potencial para construir junto a Gru su primera guarida, experimentar con sus primeras armas y llevar a cabo sus primeras misiones. Secuela de "Los Minions".</p>
                    <h6>Clasificación</h6>
                    <p>S/C</p>
                    <h6>Género</h6>
                    <p></p>Animación</p>
                    <h6>Director</h6>
                    <p></p>Kyle Balda, Brad Ableson</p>
                    <h6>Actores</h6>
                    <p></p>Steve Carell, Pierre Coffin, Taraji P. Henson, Jean-Claude Van Damme, Michelle Yeoh, Dolph Lundgren</p>
                    <h6>País</h6>
                    <p></p>Estados Unidos</p>
                    <a href="#" class="btn btn-danger rounded-pill">Comprar boletos &raquo;</a>
                </div>
                <div class="card-footer text-muted">
                    Hace 5 días.
                </div>
            </div>

            <div class="detalles card text-center" id="detalle3" style="display: none;">
                <div class="card-header">
                    Detalles:
                </div>
                <div class="card-body">
                    <h5 class="card-title">Lightyear</h5>
                    <p class="card-text">LIGHTYEAR de Disney y Pixar es una aventura llena de diversión que cuenta la historia del origen de Buzz Lightyear (voz en inglés de Chris Evans), el héroe que inspiró el juguete. LIGHTYEAR presenta al legendario Guardián Espacial en una aventura intergaláctica junto a un grupo de ambiciosos reclutas (voces en inglés de Keke Palmer, Dale Soules y Taika Waititi), y su divertido compañero robot Sox (voz en inglés de Peter Sohn). También participan del elenco Uzo Aduba, James Brolin, Mary McDonald-Lewis, Efren Ramirez e Isiah Whitlock Jr. Dirigida por Angus MacLane (codirector de BUSCANDO A DORY) y producida por Galyn Susman (Toy Story: Olvidados En El Tiempo), LIGHTYEAR estrenará el 16 de junio de 2022 solo en cines.</p>
                    <h6>Clasificación</h6>
                    <p>A</p>
                    <h6>Género</h6>
                    <p></p>Animación</p>
                    <h6>Director</h6>
                    <p></p>Angus MacLane</p>
                    <h6>Actores</h6>
                    <p></p>Chris Evans, Uzo Aduba, James Brolin, Mary McDonald-Lewis, Keke Palmer, Efren Ramirez, Peter Sohn</p>
                    <h6>País</h6>
                    <p></p>Estados Unidos</p>
                    <a href="#" class="btn btn-danger rounded-pill">Comprar boletos &raquo;</a>
                </div>
                <div class="card-footer text-muted">
                    Hace 7 días.
                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7">
                    <h2 class="featurette-heading">Avengers: Endgame</h2>
                    <small>2019 &bull; 3h 5 min</small>
                    <h3>Detalles</h3>
                    <p class="lead">En el final épico de la Saga del Infinito, los Avengers se enfrentan al villano más poderoso del universo, Thanos. Cuando eventos devastadores arrasan con la mitad de la población mundial y fracturan sus filas, los héroes restantes luchan por avanzar. Pero deben unirse para restaurar el orden y la armonía en el universo y traer de vuelta a sus seres queridos. Algunas secuencias o patrones de luces intermitentes pueden afectar a espectadores fotosensibles.</p>
                    <div id="divVideo" class="video embed-responsive embed-responsive-16by9" style="display: none;">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/hA6hldpSTF8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <br>
                    <button type="button" class="btn btn-danger rounded-pill" onclick="mostrarVideo();">Ver Tráiler</button>
                    <br>
                </div>
                <div class="col-md-5">
                    <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto rounded" src="../Images/avengers4.jpg" width="394" height="700">
                    <!--<svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 500x500"><rect width="100%" height="100%" fill="#eee"/></svg>-->
                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7 order-md-2">
                    <h2 class="featurette-heading">The Twilight Saga: Breaking Dawn – Part 2</h2>
                    <small>2012 &bull; 1h 55 min</small>
                    <h3>Detalles</h3>
                    <p class="lead">En el quinto y último capítulo de la saga The Twilight, el nacimiento del bebé de Bella y Edward desencadena fuerzas que amenazan con destruirlos a todos. Los Cullen deben emplear la ayuda de amigos lejanos y de antiguos enemigos, incluida la jauría de lobos de Jacob, mientras las tensiones aumentan hacia una guerra total en la emocionante conclusión de este fenómeno épico.</p>
                    <div id="divVideo2" class="video embed-responsive embed-responsive-16by9" style="display: none;">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/bUXjqQ4GKRg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <br>
                    <button type="button" class="btn btn-danger rounded-pill" onclick="mostrarVideo();">Ver Tráiler</button>
                    <br>
                </div>
                <div class="col-md-5 order-md-1">
                    <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto rounded" src="../Images/crepusculop2.jpg" width="394" height="700">
                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7">
                    <h2 class="featurette-heading">Black Widow</h2>
                    <small>2021 &bull; 2h 15 min</small>
                    <h3>Detalles</h3>
                    <p class="lead">En el thriller de espionaje y acción de Marvel “Black Widow”, Natasha Romanoff lucha contra una peligrosa conspiración mientras enfrenta su peor batalla hasta ahora: el pasado que dejó atrás antes de convertirse en vengadora. Ser espía no fue nada fácil, pero es momento de volver a las raíces aunque el mal aceche en cada paso. Scarlett Johansson es Natasha (Black Widow); Florence Pugh es Yelena; David Harbour es Alexei (Red Guardian), y Rachel Weisz es Melina. La primera película de la fase cuatro del Universo Cinematográfico de Marvel cuenta con Cate Shortland en dirección y Kevin Feige en producción.</p>
                    <div id="divVideo3" class="video embed-responsive embed-responsive-16by9" style="display: none;">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/ybji16u608U" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <br>
                    <button type="button" class="btn btn-danger rounded-pill" onclick="mostrarVideo();">Ver Tráiler</button>
                    <br>
                </div>
                <div class="col-md-5">
                    <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto rounded" src="../Images/black widow.jpg" width="394" height="700">
                </div>
            </div>

            <hr class="featurette-divider">

        </div>

        <footer class="container">
            <p class="float-right"><a href="#" class="link-danger">Volver al inicio</a></p>
            <p>&copy; 2022 Company, Inc. &middot; <a href="#" class="link-danger">Privacidad</a> &middot; <a href="#" class="link-danger">Condiciones</a></p>
        </footer>
    </main>
</body>

</html>