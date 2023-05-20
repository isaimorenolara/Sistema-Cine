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

    <link rel="icon" href="../Images/logo.png">
    <title>Asientos Prueba</title>
    <!-- <link rel="stylesheet" href="../CSS/estilosAsientos.css"> -->

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

    <script src="../JS/funcionesAsientos2.js"></script>
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
                <div class="form-outline mb-4">
                    <label class="form-label">Sala</label>
                    <select class="form-select" name="sala" required="required" onchange="limpiarAsientos(); mostrarSala(this.value)">
                        <?php
                        $mysqli = new mysqli("localhost", "root", "", "cine2"); //"127.0.0.1"
                        $acentos = $mysqli->query("SET NAMES 'utf8'");

                        if ($mysqli->connect_errno) {
                            echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
                        }

                        $res = $mysqli->query("select * from salas") or
                            die("Falló la consulta: (" . $mysqli->errno . ") " . $mysqli->error);
                        while ($registro = $res->fetch_assoc()) {
                            echo "<option hidden disabled selected value>&#160;</option>" .
                                "<option value=\"" . $registro['id_sala'] . "\">" . $registro['tipo_sala'] . " (" . $registro['asientosxfila'] . " asientos) " . "</option>";
                        }
                        $res->free();
                        $mysqli->close();
                        ?>
                    </select>
                </div>
                <!-- Visualización de los asientos -->
                <div id="asientos-container" class="contenedorAsientos">
                    <!-- Aquí se creará la visualización de los asientos-->
                </div>
                <div id="asientos" class="asientos">
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

    <script>
        
        function asientos(seat) {
            
            const seats = document.querySelectorAll('.row .seat');
            const asientosSeleccionados = document.querySelector('.asientos');

            if (!seat.classList.contains('reserved')) {
                seat.classList.toggle('selected');
                console.log(`Asiento ${seat.textContent} ${seat.classList.contains('selected') ? 'seleccionado' : 'deseleccionado'}`);

                // Agregamos el asiento seleccionado al div
                if (seat.classList.contains('selected')) {
                    asientosSeleccionados.innerHTML += ` ${seat.textContent}`;
                } else {
                    asientosSeleccionados.innerHTML = asientosSeleccionados.innerHTML.replace(` ${seat.textContent}`, '');
                }
            }
        }

        function limpiarAsientos() {
            const asientosSeleccionados = document.querySelector('.asientos');
            asientosSeleccionados.innerHTML = 'Asientos seleccionados:<br>';
        }
    </script>
</body>

</html>