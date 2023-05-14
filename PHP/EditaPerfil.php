<?php
	session_start(); //crea o recupera la sesión

	if(!isset($_SESSION['Id_Usuario'])) {
		header("Location: http://localhost/pruebaCine/PHP/InicioSesion.php"); // Redirigir al usuario a la página de inicio de sesión
		exit();
	}

	$mysqli = new mysqli("localhost", "root", "", "cine2");//"127.0.0.1"
	if ($mysqli->connect_errno) {
		echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}

	if(isset($_POST['nombre'], $_POST['apellidos'], $_POST['correo'])) {
		$query="UPDATE usuarios SET Nombre='".$_POST['nombre']."', Apellidos='".$_POST['apellidos']."', Correo_electronico='".$_POST['correo']."' WHERE Id_Usuario=".$_SESSION['Id_Usuario'];
		$res = $mysqli->query($query) or die("Falló la consulta: (" . $mysqli->errno . ") " . $mysqli->error);
		if($mysqli->affected_rows > 0) {
			$message = "Perfil actualizado correctamente";
		}
	}

	$query="SELECT * FROM usuarios WHERE Id_Usuario=".$_SESSION['Id_Usuario'];
	$res = $mysqli->query($query) or die("Falló la consulta: (" . $mysqli->errno . ") " . $mysqli->error);
	$registro = $res->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Editar perfil - Cine</title>
	<link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
	<h1>Editar perfil</h1>
	<?php if(isset($message)) { ?>
		<div class="message"><?php echo $message ?></div>
	<?php } ?>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
		<label for="nombre">Nombre:</label>
		<input type="text" name="nombre" id="nombre" value="<?php echo $registro['Nombre'] ?>" required>
		<label for="apellidos">Apellidos:</label>
		<input type="text" name="apellidos" id="apellidos" value="<?php echo $registro['Apellidos'] ?>" required>
		<label for="correo">Correo electrónico:</label>
		<input type="email" name="correo" id="correo" value="<?php echo $registro['Correo_electronico'] ?>" required>
		<input type="submit" value="Guardar cambios">
	</form>
	<a href="CerrarSesion.php">Cerrar sesión</a>
</body>
</html>
