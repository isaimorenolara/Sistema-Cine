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

$html .= "<div class='table-responsive'>
          <table class='table table-striped'>
              <tr class='text-center'>
                  <th>Poster</th>
                  <th>Nombre</th>
                  <th>Duración</th>
                  <th>Año de estreno</th>
                  <th>Descripción</th>
                  <th>Director</th>
                  <th>Idioma</th>
                  <th>Rating</th>
                  <th colspan='2'>Editar</th>
              </tr>
      ";

while ($registro = $res->fetch_assoc()) {
  $tipo = $registro['tipoimagen'];
  $imagen = base64_encode($registro['Poster']);

  $html .= "<tr>
                <td class='text-center'><img class='rounded img-fluid' src='data:$tipo;base64,$imagen' alt='" . $registro['Nombre'] . "'></td>
                <td class='text-center'>" . $registro['Nombre'] . "</td>
                <td class='text-center'>" . $registro['Duracion'] . " min. </td>
                <td class='text-center'>" . $registro['Anio_estreno'] . "</td>
                <td class='text-justify'>" . $registro['Descripcion'] . "</td>
                <td class='text-center'>" . $registro['Director'] . "</td>
                <td class='text-center'>" . $registro['Idioma'] . "</td>
                <td class='text-center'>" . $registro['Rating'] . "/5</td>
                <td class='text-center'><button type='button' class='btn btn-success' onclick='muestraCaja(" . $registro['Id_Pelicula'] . ")'>Modificar</button></td>
                <td class='text-center'><button type='button' class='btn btn-danger' onclick='location.href=\"BorrarPelicula.php?Id_Pelicula=" . $registro['Id_Pelicula'] . "\"'>Eliminar</button></td>
            </tr>";
  $cont++;
  $contador++;
}
$html .= "</table></div>";

$res->free();
$mysqli->close();
?>

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

  <link rel="icon" href="../Images/logo.png">
  <link href="../CSS/estilos.css" rel="stylesheet" type="text/css">

  <title>Lista de Peliculas</title>

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

    #frmModificar {
      display: none;
      visibility: hidden;
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
              <a class="nav-link" aria-current="page" href="InicioAdmi.php?id=<?php echo $_SESSION['id']; ?>">Inicio</a>
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
    <div class="container marketing">
      <div id="frmModificar">
        <h2>Modificar película</h2>
        <form action="ActualizarPelicula.php" method="post" enctype="multipart/form-data">
          <div class="form-outline mb-4">
            <label class="form-label">Nombre</label>
            <input type="text" class="form-control form-control-label" name="nombrePelicula" required="required">
          </div>
          <div class="form-outline mb-4">
            <label class="form-label">Subir Poster</label><br>
            <input type="file" class="form-control-file form-control-label" name="posterPelicula" required="required">
          </div>
          <div class="form-outline mb-4">
            <label class="form-label">Duración (min.)</label>
            <input type="number" class="form-control form-control-label" name="duracionPelicula" required="required">
          </div>
          <div class="form-outline mb-4">
            <label class="form-label">Año de estreno</label>
            <input type="number" class="form-control form-control-label" name="añoPelicula" required="required">
          </div>
          <div class="form-outline mb-4">
            <label class="form-label">Género</label>
            <select class="form-control form-control-label" name="generoPelicula" required="required">
              <option value="Accion">Accion</option>
              <option value="Ciencia Ficcion">Ciencia Ficcion</option>
              <option value="Drama">Drama</option>
              <option value="Fantasia">Fantasia</option>
              <option value="Terror">Terror</option>
              <option value="Suspenso">Suspenso</option>
              <option value="Animacion">Animacion</option>
              <option value="Crimen">Crimen</option>
              <option value="Comedia">Comedia</option>
              <option value="Musical">Musical</option>
              <option value="Romance">Romance</option>
            </select>
          </div>
          <div class="form-outline mb-4">
            <label class="form-label">Descripción</label>
            <textarea class="form-control form-control-label" rows="3" name="descripcionPelicula" required="required"></textarea>
          </div>
          <div class="form-outline mb-4">
            <label class="form-label">Director</label>
            <input type="text" class="form-control form-control-label" name="directorPelicula" required="required">
          </div>
          <div class="form-outline mb-4">
            <label class="form-label">Idioma</label>
            <select multiple class="form-select form-select-label" size="2" name="idiomaPelicula" required="required" multiple>
              <option value="Español">Español</option>
              <option value="Ingles">Ingles</option>
            </select>
          </div>
          <div class="form-outline mb-4">
            <label class="form-label">Rating</label>
            <input type="number" class="form-control form-control-label" name="ratingPelicula" step=0.1 required="required" min="1" max="5">
          </div>
          <div class="form-outline mb-4">
            <label class="form-label">Trailer (url)</label>
            <input type="url" class="form-control form-control-label" name="trailerPelicula" required="required">
          </div>
          <div class="form-outline mb-4">
            <input type="hidden" id="Id_Pelicula" name="Id_Pelicula">
            <button type="submit" class="btn btn-lg btn-block btn-danger mx-3">Modificar</button>
            <button type="reset" class="btn btn-lg btn-block btn-outline-danger">Limpiar</button>
          </div>
        </form>
      </div>
      <h2>Lista de películas en la Base de Datos</h2>
      <br>
      <?= $html ?>
      <nav class="navbar">
        <a class="navbar-brand text-danger" href="ReportePeliculas.php">
          <button class="btn btn-danger">Descargar Reporte de Películas</button>
        </a>
      </nav>
      <hr class="featurette-divider">
    </div>
  </main>

  <footer class="container">
    <p class="float-right"><a href="#" class="link-danger">Volver al inicio</a></p>
    <p>&copy; 2022 Company, Inc. &middot; <a href="#" class="link-danger">Privacidad</a> &middot; <a href="#" class="link-danger">Condiciones</a></p>
  </footer>
</body>

</html>