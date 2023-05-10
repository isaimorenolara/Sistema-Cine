<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <!--<link href="/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">-->

    <link rel="icon" href="../Imagenes/logo.png">
    <title>Asientos</title>
    <link rel="stylesheet" href="../CSS/estilosAsientos.css">

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
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main role="main">
        <div class="container marketing">
            <div class="row mb-3">
                <div class="col-sm-4">
                    <div class="row align-items-center">
                        <div class="calendar">
                            <div class="calendar-header">
                                <button class="prev-btn">&lt;</button>
                                <div class="month-year"></div>
                                <button class="next-btn">&gt;</button>
                            </div>
                            <div class="calendar-body"></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="row align-items-center">
                        <div class="cinema-seats">
                            <div class="row">
                                <div class="seat">A1</div>
                                <div class="seat">A2</div>
                                <div class="seat">A3</div>
                                <div class="seat">A4</div>
                                <div class="seat">A5</div>
                            </div>
                            <div class="row">
                                <div class="seat">B1</div>
                                <div class="seat">B2</div>
                                <div class="seat">B3</div>
                                <div class="seat">B4</div>
                                <div class="seat">B5</div>
                            </div>
                            <div class="row">
                                <div class="seat">C1</div>
                                <div class="seat">C2</div>
                                <div class="seat">C3</div>
                                <div class="seat">C4</div>
                                <div class="seat">C5</div>
                            </div>
                            <div class="row">
                                <div class="seat">D1</div>
                                <div class="seat">D2</div>
                                <div class="seat">D3</div>
                                <div class="seat">D4</div>
                                <div class="seat">D5</div>
                            </div>
                            <div class="row">
                                <div class="seat">E1</div>
                                <div class="seat">E2</div>
                                <div class="seat">E3</div>
                                <div class="seat">E4</div>
                                <div class="seat">E5</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 asientos">
                    Asientos seleccionados:
                    <br>
                </div>
            </div>
            <hr class="featurette-divider">
        </div>
    </main>

    <footer class="container">
        <p class="float-right"><a href="#" class="link-danger">Volver al inicio</a></p>
        <p>&copy; 2022 Company, Inc. &middot; <a href="#" class="link-danger">Privacidad</a> &middot; <a href="#" class="link-danger">Condiciones</a></p>
    </footer>
    <script src="../JS/funcionesAsientos.js"></script>
    <script src="../JS/funcionesCalendario.js"></script>
</body>

</html>