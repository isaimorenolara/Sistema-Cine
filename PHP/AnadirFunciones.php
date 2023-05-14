<?php

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

    <title>Añadir Función</title>

    <style>
      body 
      {
        padding-top: 5rem;
        padding-bottom: 5rem;
        color: #5a5a5a;
      }

      .card
      {
        border-radius: 4px;
        background: #fff;
        box-shadow: 0 6px 10px rgba(0,0,0,.08), 0 0 6px rgba(0,0,0,.05);
        cursor: pointer;
        border-radius: 10px;
      }

      .card img 
      {
        border-radius: 10px 10px 0px 0px;
      }

      .card:hover
      {
        transform: scale(1.01);
        box-shadow: 0 10px 20px rgba(0,0,0,.12), 0 4px 8px rgba(0,0,0,.06);
      }

      .featurette-divider 
      {
        margin: 5rem 0;
      }

      .featurette-heading 
      {
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
                    <li><a class="dropdown-item" href="AnadirSala.php">Añadir Sala</a></li>
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
          <h2>Añadir una función</h2>
          <form action="RegistrarFuncion.php" method="post" enctype="multipart/form-data">
            <div class="form-outline mb-4">
              <label class="form-label">Hora Inicio</label>
              <input type="time" class="form-control form-control-label" name="hora" required="required">
            </div>
            <div class="form-outline mb-4">
              <label class="form-label">Fecha</label>
              <input type="date" class="form-control form-control-label" name="fecha" required="required">
            </div>
            <div class="form-outline mb-4">
              <label class="form-label">Película</label>
              <select class="form-control form-control-label" name="idpelicula" required="required">
                <?php
                  $mysqli = new mysqli("localhost", "root", "", "cine2");//"127.0.0.1"
                  $acentos = $mysqli->query("SET NAMES 'utf8'");

                  if ($mysqli->connect_errno) 
                  {
                      echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
                  }
                  
                  $res = $mysqli->query("select * from peliculas") or 
                      die("Falló la consulta: (" . $mysqli->errno . ") " . $mysqli->error);
                  while($registro = $res->fetch_assoc())
                  {
                      echo "<option hidden disabled selected value>&#160;</option>".
                          "<option value=\"".$registro['Id_Pelicula']."\">".$registro['Nombre']."</option>";
                  }
                  $res->free();
                  $mysqli->close();
                ?>
              </select>
            </div>
            <div class="form-outline mb-4">
              <label class="form-label">Sala</label>
              <select class="form-control form-control-label" name="idsala" required="required">
                <?php
                  $mysqli = new mysqli("localhost", "root", "", "cine2");//"127.0.0.1"
                  $acentos = $mysqli->query("SET NAMES 'utf8'");

                  if ($mysqli->connect_errno) 
                  {
                      echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
                  }
                  
                  $res = $mysqli->query("select * from salas") or 
                      die("Falló la consulta: (" . $mysqli->errno . ") " . $mysqli->error);
                  while($registro = $res->fetch_assoc())
                  {
                      echo "<option hidden disabled selected value>&#160;</option>".
                          "<option value=\"".$registro['id_sala']."\">".$registro['tipo_sala']."</option>";
                  }
                  $res->free();
                  $mysqli->close();
                ?>
              </select>
            </div>
            <div class="form-outline mb-4">
              <button type="submit" class="btn btn-lg btn-block btn-danger mx-3">Añadir</button>
              <button type="reset" class="btn btn-lg btn-block btn-outline-danger">Limpiar</button>
            </div>
          </form>
          <hr class="featurette-divider">
        </div>
      </main>

      <footer class="container">
        <p class="float-right"><a href="#" class="link-danger">Volver al inicio</a></p>
        <p>&copy; 2022 Company, Inc. &middot; <a href="#" class="link-danger">Privacidad</a> &middot; <a href="#" class="link-danger">Condiciones</a></p>
      </footer>
    </body>
</html>
