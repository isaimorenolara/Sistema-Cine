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

// Cierra la sesión y redirige al archivo de inicio
if (isset($_GET['logout'])) {
	session_destroy();
	header("Location: http://localhost/pruebaCine/PHP/Inicio.html");
	exit();
}

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

	<title>Perfil</title>
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
		<section class="vh-75" style="background-color: #D5D5D5;">
			<div class="container py-5 h-100">
				<div class="row d-flex justify-content-center align-items-center h-100">
					<div class="col col-md-9 col-lg-7 col-xl-5">
						<div class="card" style="border-radius: 15px;">
							<div class="card-body p-4">
								<div class="d-flex text-black">
									<div class="flex-shrink-0">
										<img src="../Images/user.png" alt="<?php echo $nombre; ?>" class="img-fluid">
									</div>
									<div class="flex-grow-1 ms-3">
										<h5 class="mb-1"><?php echo $nombre; ?></h5>
										<p class="mb-2 pb-1" style="color: #2b2a2a;"><?php echo $email; ?></p>
										<div class="d-flex pt-1">
											<a href="?logout=true">
												<button type="button" class="btn btn-danger">Cerrar Sesión</button>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<div class="container marketing align-items-center mt-5">
			<h2>Editar Perfil</h2>
			<form action="ActualizarPerfil.php" method="post" enctype="multipart/form-data">
				<div class="form-outline mb-4">
					<label class="form-label">Nombre</label>
					<input value="<?php echo $nombre; ?>" type="text" class="form-control form-control-label" name="nombreUsuario" id="nombreUsuario" required="required">
				</div>
				<div class="form-outline mb-4">
					<label class="form-label">Correo</label>
					<input value="<?php echo $email; ?>" type="email" class="form-control form-control-label" name="correoUsuario" id="correoUsuario" required="required">
				</div>
				<input type="hidden" id="id" name="id" value="<?php echo $_GET['id']; ?>">
				<div class="form-outline mb-4">
					<button type="submit" class="btn btn-danger">Actualizar</button>
				</div>
			</form>
			<hr class="featurette-divider">
		</div>
		<footer class="container">
			<p class="float-right"><a href="#" class="link-danger">Volver al inicio</a></p>
			<p>&copy; 2022 Company, Inc. &middot; <a href="#" class="link-danger">Privacidad</a> &middot; <a href="#" class="link-danger">Condiciones</a></p>
		</footer>
	</main>
</body>

</html>