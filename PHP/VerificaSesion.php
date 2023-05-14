<?php
	session_start();

	if (isset($_POST['correo'], $_POST['contrasena'])) {
		$mysqli = new mysqli("localhost", "root", "", "cine2");

		if ($mysqli->connect_errno) {
			echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		}

		$query = "SELECT * FROM usuarios 
				WHERE Correo_electronico='".$_POST['correo']."' 
				AND Contrasena='".$_POST['contrasena']."'";

		$res = $mysqli->query($query) or die("Falló la consulta: (" . $mysqli->errno . ") " . $mysqli->error);
		$Nregistros = $res->num_rows;

		if ($Nregistros == 1) {
			// $registro = $res->fetch_assoc();
			// echo "Id_Usuario: ".$registro['Id_Usuario'].
            //     "<br> Correo: ".$registro['Correo_electronico'].
            //     "<br> Nombre: ".$registro['Nombre'];
			$registro = $res->fetch_assoc();
			$_SESSION['usuario'] = $registro['Nombre'];
			$_SESSION['id_usuario'] = $registro['Id_Usuario'];
			header("Location: http://localhost/pruebaCine/PHP/EditaPerfil.php");
			exit();
		} else {
			header("Location: http://localhost/pruebaCine/PHP/InicioSesion.php?error=1");
			exit();
		}
	} else {
		die("No proporcionó usuario y/o contraseña");
	}
?>
